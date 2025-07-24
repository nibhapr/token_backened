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
      border-style: dashed;
      width: 250px;
      /* Adjust width as needed */
      padding: 10px;
      margin: 20px auto;
      font-family: Arial, sans-serif;
    }

    .title {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .token-details {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .barcode {
      border-top: 1px solid #000;
      margin-top: 10px;
      text-align: center;
      padding-top: 5px;
    }

    .center2 {
      text-align: center;
      padding: 10px;
      height: 50%;
      position: absolute;
      top: 50%;
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

    /* Hide certain elements */
    /* Example: hide the current token and average time on mobile */
    .center .h2,
    .center .h3 {
      display: none;
    }
  </style>
  @endsection