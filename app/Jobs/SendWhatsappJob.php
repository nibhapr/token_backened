<?php

namespace App\Jobs;

use Carbon\Carbon;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;

class SendWhatsappJob  implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     * 
     */
    protected $token;
    protected $pdf;
    protected $text;
    protected $settings;
    protected $from_call;


    public function __construct($token, $pdf, $text, $settings, $from_call)
    {
        $this->token = $token;
        $this->pdf = $pdf;
        $this->text = $text;
        $this->from_call = $from_call;
        $this->settings = $settings;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = config('app.url') . '/live/' . $this->token->reference_no;
        try {
            $data = [
                'api_key' => 'vVU1424nhsmqF7S',
                'sender' => '917012749946',
                'number' => $this->token->phone,
                'message' => $url,
                'url'  => $this->pdf,
                'type' => 'pdf',

            ];
            $response = Http::post('https://saakshi.tech/send-media', $data);

            if ($response->failed()) {
                session()->flash('status', 'Task was successful!');
                throw new \Exception("Failed to send message");
            }
        } catch (\Exception $e) {
            session()->flash('status', 'Task was successful!');
        }
    }
}
