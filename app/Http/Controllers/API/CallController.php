<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Service;
use App\Models\Call;
use App\Models\Session as ModelsSession;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Repositories\API\CallRepository;
use App\Repositories\TokenRepository;
use Illuminate\Support\Facades\DB;

class CallController extends Controller
{

    protected $callRepository, $tokenRepository;
    public function __construct(TokenRepository $tokenRepository, CallRepository $callRepository)
    {

        $this->tokenRepository = $tokenRepository;
        $this->callRepository = $callRepository;
    }


    public function callNext(Request $request)
    {


        $request->validate([
            'service_id' => 'required|exists:services,id',
            'counter_id' => 'required_if:by_id,==,false|exists:counters,id',
            'by_id' => 'required',
            'queue_id' => 'required_if:by_id,==,true|exists:queues,id',
        ]);

        DB::beginTransaction();
        try {
            if ($request->by_id) $called = $this->callRepository->callnextTokenById($request->queue_id, $request->service_id);
            else $called = $this->callRepository->callNext($request->service_id, $request->counter_id);
            if (!$called) return response()->json(['no_token_found' => true]);
            $settings = Setting::first();
            $this->callRepository->setCallsForDisplay($called->service);
            $this->tokenRepository->setTokensOnFile();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            return response()->json(['status_code' => 500]);
        }

        DB::commit();
        return response()->json($called);
    }

    public function setServiceApiCounter(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'counter_id' => 'required|exists:counters,id',
            'session_id' => 'required'
        ]);

        $service = Service::find(request()->service_id);
        $counter = Counter::find(request()->counter_id);
        $tokens_for_call = [];
        $called_tokens = [];
        $tokens_for_call = $this->tokenRepository->getTokensForCall($service);
        $called_tokens = $this->tokenRepository->getCalledTokens($service, $counter);
        return response()->json(['service' => $service, 'counter' => $counter, 'tokens_for_call' => $tokens_for_call, 'called_tokens' => $called_tokens]);
    }

    public function getTokensForCall()
    {
        $service = Service::findOrFail(request()->service_id);
        $counter = Counter::findOrFail(request()->counter_id);
        $tokens_for_call = [];
        $called_tokens = [];
        if ($service && $counter) {
            $tokens_for_call = $this->tokenRepository->getTokensForCall($service);
            $called_tokens = $this->tokenRepository->getCalledTokens($service, $counter);
        }
        return  response()->json(['service' => $service, 'counter' => $counter, 'tokens_for_call' => $tokens_for_call, 'called_tokens' => $called_tokens]);
    }

    public function noShowApiToken(Request $request)
    {

    
        $request->validate([
            'call_id' => 'required|exists:calls,id',
        ]);
        DB::beginTransaction();
        try {
            $call = Call::where('id', $request->call_id)->whereNull('call_status_id')->first();
            if ($call) {
                $call = $this->callRepository->noShowToken($call);
                $settings = Setting::first();
                if ($call->queue->service->sms_enabled && $call->queue->service->noshow_message_enabled && $call->queue->phone && $settings->sms_url) {
                    SendSmsJob::dispatch($call->queue, $call->queue->service->call_message_format, $settings, 'noshow');
                }
                $this->callRepository->setCallsForDisplay($call->service);
                $this->tokenRepository->setTokensOnFile();
            } else {
                return response()->json(['already_executed' => true]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status_code' => 500]);
        }
        db::commit();
        return response()->json($call);
    }

    public function serveApiToken(Request $request)
    {
        $request->validate([
            'call_id' => 'required|exists:calls,id',
        ]);

  
        DB::beginTransaction();
        try {
            $call = Call::where('id', $request->call_id)->whereNull('call_status_id')->first();
            if ($call) {
                $call = $this->callRepository->serveToken($call);
                $settings = Setting::first();
                if ($call->queue->service->sms_enabled && $call->queue->service->completed_message_enabled && $call->queue->phone && $settings->sms_url) {
                    SendSmsJob::dispatch($call->queue, $call->queue->service->call_message_format, $settings, 'served');
                }
                $this->callRepository->setCallsForDisplay($call->service);
                $this->tokenRepository->setTokensOnFile();
            } else {
                return response()->json(['already_executed' => true]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status_code' => 500]);
        }
        DB::commit();
        return response()->json($call);
    }

    public function recallApiToken(Request $request)
    {

         
        $request->validate([
            'call_id' => 'required|exists:calls,id',
        ]);
        DB::beginTransaction();
        try {
            $call = Call::find($request->call_id);
            $call = $this->callRepository->recallToken($call);
            $this->callRepository->setCallsForDisplay($call->service);
            $this->tokenRepository->setTokensOnFile();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status_code' => 500]);
        }

        DB::commit();

        // session()->push('called', $call);
        return response()->json($call);
    }

}
