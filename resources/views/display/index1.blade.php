@extends('layout.call_page')
@section('content')
<!-- BEGIN: Page Main-->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div id="main" class="no-print" style="padding: 15px 15px 0px;">
    <div class="wrapper" style=" min-height: 557px;" id="display-page">
        <section class="content-wrapper no-print">
            <div id="callarea">
                <div>
                    <table class="table table-dark" style="justify-content:center;margin-bottom:0;">
                        <thead class="text-center" style="background-color:#00BFFF; justify-content: space-between;align-items: center;margin-left:20px">
                            <tr>

                                <th scope="col" style="font-size:45px;padding-left:130px; font-weight:bold;color:white;line-height:1.2">Token No</th>
                                <th scope="col" style="font-size:45px;font-weight:bold;color:white;line-height:1.2">Counter No</th>
                                <th scope="col" style="font-size:45px;font-weight:bold;color:white;line-height:1.2">Token Status</th>
                                <th scope="col" style="font-size:45px;font-weight:bold;color:white;line-height:1.2">Doctor Name</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr v-for="token in tokens">
                                <td v-if="token" style="font-size:45px;padding-left:160px; font-weight:bold;line-height:1.2">@{{token?.token_letter}}-@{{token?.token_number}}</td>
                                <td v-if="!token" style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2">{{__('messages.display.nil')}}</td>
                                <td v-if="token" style="font-size:45px;padding-left:30px; font-weight:bold;line-height:1.2">@{{token?.counter.name}}</td>
                                <td v-if="!token" style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2">{{__('messages.display.nil')}}</td>
                                <td v-if="token?.call_status_id == {{CallStatuses::SERVED}}" style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2;color:#00DB3A">{{__('messages.display.served')}}</td>
                                <td v-if="token?.call_status_id == {{CallStatuses::NOSHOW}}" style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2;color:red">{{__('messages.display.noshow')}}</td>
                                <td v-if="token?.call_status_id != {{CallStatuses::SERVED}} &&  token?.call_status_id != {{CallStatuses::NOSHOW}}" style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2;color:#D9AD09">Serving</td>
                                <td style="font-size:45px;padding-left:30px;font-weight:bold;line-height:1.2;color:#50C878">Dr.Sanjay</td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>                
                <div class ="bottom-div">
                    <marquee><span style="font-size:{{$settings->display_font_size}}px;color:{{$settings->display_font_color}}">{{$settings->display_notification ? $settings->display_notification : 'Hello' }}<span></span></span></marquee>
                </div>
                <audio id="called_sound">
                    <source src="{{asset('app-assets/audio/sound.mp3')}}" type="audio/mpeg">
                </audio>
        </section>
    </div>
</div>
@endsection
@section('b-js')
<script>
    window.JLToken = {
        get_tokens_for_display_url: "{{ asset($file) }}",
        get_initial_tokens: "{{ route('get-tokens-for-display') }}",
        date_for_display: "{{$date}}",
        voice_type: "{{$settings->language->display}}",
        voice_content_one: "{{$settings->language->token_translation}}",
        voice_content_two: "{{$settings->language->please_proceed_to_translation}}",
        date_for_display: "{{$date}}",
        audioEl: document.getElementById('called_sound'),
    }
</script>
@endsection

<style>
    .center-table {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
              
    }
    .bottom-div {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f0f0f0;
    padding: 20px;
    text-align: center;
}
</style>