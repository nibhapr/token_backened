<?php

namespace App\Http\Controllers;

use App\Jobs\SendSmsJob;
use App\Jobs\SendWhatsappJob;
use App\Models\Call;
use App\Models\Queue;
use App\Models\Service;
use App\Models\Setting;
use App\Repositories\ServiceRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Repositories\TokenRepository;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;

class TokenController extends Controller
{
    public $services, $tokenRepository;

    public function __construct(ServiceRepository $services, TokenRepository $tokenRepository)
    {
        $this->services = $services;
        $this->tokenRepository = $tokenRepository;
    }

    public function issueToken()

    {

        return view(
            'issue_token.index',
            ['services' => $this->services->getAllActiveServices(), 'settings' => Setting::first()]
        );
    }



    public function createToken(Request $request, Service $service)
    {

        DB::beginTransaction();
        try {
            $service = Service::findOrFail($request->service_id);

            $request->validate([
                'service_id' => 'required|exists:services,id',
                'with_details' => 'required',
                'name' => Rule::requiredIf(function () use ($request, $service) {
                    return $request->with_details && ($service->name_required == 1);
                }),
                'email' => [Rule::requiredIf(function () use ($request, $service) {
                    return $request->with_details && ($service->email_required == 1);
                })],
                'phone' => [Rule::requiredIf(function () use ($request, $service) {
                    return $request->with_details && ($service->email_required == 1);
                })],

            ]);
            $queue = $this->tokenRepository->createToken($service, $request->all(), $request->with_details ? true : false);
            $customer_waiting = $this->tokenRepository->customerWaiting($service);
            $customer_waiting = $customer_waiting > 0 ?  $customer_waiting - 1 : $customer_waiting;

            $settings = Setting::first();

            //    dd($queue->number);
            if ($service->sms_enabled && $service->optin_message_enabled && $queue->phone && $settings->sms_url) {
                SendSmsJob::dispatch($queue, $service->optin_message_format, $settings, 'issue_token');
            }



            $this->tokenRepository->setTokensOnFile();
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Validation\ValidationException) {
                $errors = $e->errors();
                $message = $e->getMessage();
                return response()->json(['status_code' => 422, 'errors' => $errors]);
            }
            DB::rollback();
            return response()->json(['status_code' => 500]);
        }
        DB::commit();

        $queue = $queue->load('service');
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf = Pdf::loadView('pdf.template', ['queue' => $queue, 'customer_waiting' => $customer_waiting, 'settings' => $settings]);
        $tempPdfPath = public_path('temp-pdfs/' . $queue->id . '.pdf');
        
        $pdf->save($tempPdfPath);
        $pdfPath = asset('temp-pdfs/' . $queue->id . '.pdf');
        
        SendWhatsappJob::dispatchAfterResponse($queue, $pdfPath , $service->optin_message_format, $settings, 'issue_token');
        return response()->json(['status_code' => 200, 'queue' => $queue, 'customer_waiting' => $customer_waiting, 'settings' => $settings, 'asset' => asset('temp-pdfs/' . $queue->id . '.pdf')]);
    }
    public function liveToken(Queue $queue)
    {
        $settings = Setting::first();
        $file = 'storage/tokens_for_callpage.json';
        $date = Carbon::now()->toDateString();
        return view('live.index', compact('queue', 'settings', 'file', 'date'));
    }
}
