  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiimpact</title>
  </head>

  <body>
    @extends('layout.live_page')
    @section('content')
    <div v-cloak class="center2" id="live-page">
      <div v-if="token?.id" class="token-slip">
        <div class="title">Your Token: {{$queue->letter}} {{$queue->number}}</div>
        <div class="token-details">
          <div v-if="lastToken">Current Token:<strong> @{{lastToken?.token_letter}} @{{lastToken?.token_number}}</strong> </div>
          <div v-if="averageTime"><strong>Average Time: @{{averageTime}}</strong></div>
        </div>
      </div>
      <div v-else>
        <h3>ERROR</h3>
      </div>
    </div>
  </body>

  </html>
  @endsection
  @section('b-js')
  <script>
    window.JLToken = {
      get_token_for_call_url: "{{ asset($file) }}",
      get_initial_tokens: "{{ route('get-tokens-for-display') }}",
      date_for_display: "{{$date}}",
      voice_type: "{{$settings->language->display}}",
      voice_content_one: "{{$settings->language->token_translation}}",
      voice_content_two: "{{$settings->language->please_proceed_to_translation}}",
      date_for_display: "{{$date}}",
      audioEl: document.getElementById('called_sound'),
      token_reference: "{{$queue->reference_no}}"
    }
  </script>

 <style>
    .token-slip {
      border: none;
      background: #fff;
      box-shadow: 0 4px 16px rgba(0,0,0,0.10), 0 1.5px 4px rgba(0,0,0,0.08);
      border-radius: 16px;
      width: 320px;
      padding: 48px 40px;
      margin: 6px auto;
      font-family: 'Segoe UI', Arial, sans-serif;
      color: #222;
      transition: box-shadow 0.2s;
    }

    .token-slip:hover {
      box-shadow: 0 8px 32px rgba(0,0,0,0.16), 0 3px 8px rgba(0,0,0,0.12);
    }

    .title {
      font-size: 32px;
      font-weight: 800;
      margin-bottom: 16px;
      color: #1976d2;
      letter-spacing: 1px;
    }

    .token-details {
      font-size: 27px;
      margin-bottom: 12px;
      background: #f5f7fa;
      border-radius: 8px;
      padding: 12px 0;
      box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    }

    .token-details strong {
      color: #388e3c;
      font-weight: 700;
      margin-left: 4px;
    }

    .barcode {
      border-top: 1px solid #e0e0e0;
      margin-top: 14px;
      text-align: center;
      padding-top: 7px;
    }

    .center2 {
      text-align: center;
      padding: 10px;
      height: 50%;
      position: absolute;
      top: 20%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    h5 {
      font-size: 18px;
    }

    h1 {
      font-size: 24px;
    }

    h2 {
      font-size: 20px;
    }

    h3 {
      font-size: 16px;
    }
    .center .h2,
    .center .h3 {
      display: none;
    }
  </style>
  @endsection
