@extends('layout.call_page')
@section('call','active')
@section('content')
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<div id="main" class="w-full">
    <div class="wrapper no-print" id="call-page">
        <section id="content" class="content-wrapper no-print" v-cloak>
            <div class="container bg-gray-50 rounded-xl  p-8">
                <div id="card-reveal" class="section p-0">
                    <div class="w-full">
                        <div class="flex flex-col gap-8">
                            <div class="w-full p-0">
                                <div class="bg-gray-50 rounded-2xl  p-0 ">
                                    <div class="card-content" v-if="selected_counter && selected_service">
                                        <div class="w-full min-h-[500px]">
                                            <div class="flex flex-col items-center min-w-[800px]">
                                                <div v-if="token" class="w-full flex justify-center items-center">
                                                    <span class= "truncate text-black text-[115px] font-extrabold">
                                                        <a class="waves-effect waves-light  modal-trigger" href="#modal5" dismissible="false" style="color: #000;">
                                                            <input type="hidden" name="transfer_queue" id="transfer_queue" value="1989">
                                                            <input type="hidden" name="last_call" id="last_call" value="queue" v-cloak>
                                                            @{{token.letter?token.letter : token.token_letter }}-@{{token.number? token.number : token.token_number}}
                                                        </a>
                                                    </span>
                                                </div>
                                                <div v-if="!token" class="w-full flex justify-center items-center">
                                                    <span class="truncate text-black text-[115px] font-extrabold">
                                                        {{__('messages.call_page.nil')}}
                                                    </span><br>
                                                </div>
                                                <div class="w-full flex flex-col items-center mt-4">
                                                    <div v-if="token?.call_status_id == {{CallStatuses::SERVED}}" class="text-green-600 text-2xl font-bold">{{__('messages.call_page.served')}}</div>
                                                    <div v-if="token?.call_status_id == {{CallStatuses::NOSHOW}}" class="text-red-600 text-2xl font-bold">{{__('messages.call_page.noshow')}}</div>
                                                    <div v-if="token && isCalled && this.token.ended_at == null" class="text-blue-600 text-3xl font-bold animate-pulse">@{{time_after_called}}</div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col md:flex-row justify-center gap-8 mt-12 min-w-[600px]">
                                                <div class="flex flex-col gap-4 w-full md:w-1/2 items-center">
                                                   <button class="w-48 h-16 rounded-xl bg-green-500 text-white text-2xl font-bold shadow-lg hover:bg-green-600 transition-all duration-200" type="button" @click="serveToken(token.id)" :disabled="!isCalled ||servedClicked">
                                                        {{__('messages.call_page.served')}}
                                                    </button>
                                                    <button class="w-48 h-16 rounded-xl bg-yellow-500 text-white text-2xl font-bold shadow-lg hover:bg-yellow-600 transition-all duration-200" type="button" @click="recallToken(token.id)" :disabled="!isCalled || recallClicked">
                                                        {{__('messages.call_page.recall')}}
                                                    </button>
                                                </div>
                                                <div class="flex flex-col gap-4 w-full md:w-1/2 items-center">
                                                   <button class="w-48 h-16 rounded-xl bg-red-500 text-white text-2xl font-bold shadow-lg hover:bg-red-600 transition-all duration-200" type="button" @click="noShowToken(token.id)" :disabled="!isCalled || noshowClicked">
                                                        {{__('messages.call_page.noshow')}}
                                                    </button>
                                                    <button id="next_call" class="w-48 h-16 rounded-xl bg-blue-500 text-white text-2xl font-bold shadow-lg hover:bg-blue-600 transition-all duration-200" type="button" @click="callNext()" :disabled="isCalled || callNextClicked">
                                                        {{__('messages.call_page.call next')}}
                                                    </button>
                                                    <!-- <div class="input-field col s6">
                                                        <button id="next_call" class="btn waves-effect waves-light center call-bt submit " :style="[font_size_smaller  ? { 'font-size' : '14px', 'padding' : '0 4px' } : '']" type="submit" style="min-width:165px;" @click="callNext()" :disabled="isCalled || callNextClicked">{{__('messages.call_page.call next')}}
                                                            <i class="material-icons right" :style="[font_size_smaller ? { 'margin-left' : '0px' } : '']">send</i>
                                                        </button>
                                                    </div> -->
                                                </div></div>
                                                <div v-if="selected_service && selected_counter"class="w-full flex flex-col items-center mt-8">
                                                <div class="flex items-center gap-2">
                                                    <b class="text-lg text-gray-700">{{__('messages.call_page.service')}}:</b>
                                                    <span class="text-xl font-bold text-blue-700">@{{ selected_service.name }}</span>
                                                    <span class="mx-2">|</span>
                                                    <b class="text-lg text-gray-700">{{__('messages.call_page.counter')}}:</b>
                                                    <span class="text-xl font-bold text-blue-700">@{{selected_counter.name}}</span>
                                                    <span class="mx-2">|</span>
                                                    <button class="ml-4 w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center shadow-lg hover:bg-orange-600 transition-all duration-200" @click="openSetServiceModal()" title="Change">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                                    </button>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="select-service" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <div class="offset-s1"></div>

                    <form action="" method="" class="form-horizontal">
                        <h4 class="header center" style="font-size:34px;text-transform:none;">
                            {{__('messages.call_page.set service and counter')}}
                        </h4>
                        <div class="divider col s12"></div>
                        <div class="row" style="padding-top: 7px;">
                            <div class="row">
                                <div class="input-field col s10 offset-s1">
                                    <div class="input-field col s12">
                                        <select v-model="service_id">
                                            <option value="" disabled selected>{{__('messages.call_page.choose your service')}}</option>
                                            <option v-for="service in services" :value="service.id">@{{service.name}}</option>
                                        </select>
                                        <label>{{__('messages.call_page.service')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <div class="input-field col s12">
                                        <select v-model="counter_id">
                                            <option value="" disabled selected>{{__('messages.call_page.choose your counter')}}</option>
                                            <option v-for="counter in counters" :value="counter.id">@{{counter.name}}</option>
                                        </select>
                                        <label>{{__('messages.call_page.counter')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a v-if="!selected_service && !selected_counter" href="{{route('dashboard')}}"><button class="btn waves-effect waves-light red" style="margin-right: 20px ; margin-left: 20px" type="button">{{__('messages.common.go back')}}
                            <i class="material-icons right">close</i>
                        </button></a>
                    <button v-if="selected_service && selected_counter" class="modal-close btn waves-effect waves-light red" style="margin-right: 20px ; margin-left: 20px" type="button">{{__('messages.common.close')}}
                        <i class="material-icons right">close</i>
                    </button>
                    <button class="btn waves-effect waves-light submit" type="submit" name="action" :disabled="!service_id || !counter_id" @click="setService()">{{__('messages.common.submit')}}
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection

@section('b-js')
<script>
    window.JLToken = {
        current_lang: '{{\App::currentLocale()}}',
        call_page_loaded: true,
        set_service_counter_url: "{{ route('set-service-and-counter') }}",
        get_token_for_call_url: "{{ route('get-token-for-call') }}",
        get_services_url: "{{ route('get-token-for-call') }}",
        isServiceSelected: "{{session()->has('service')}}",
        get_services_and_counters_url: "{{route('get-services-counters')}}",
        get_called_tokens_url: "{{route('get-called-tokens')}}",
        call_next_url: "{{route('call_next')}}",
        serve_token_url: "{{route('serve_token')}}",
        noshow_token_url: "{{route('noshow-token')}}",
        noshow_token_url: "{{route('noshow-token')}}",
        recall_token_url: "{{route('recall_token')}}",
        services: JSON.parse('{!!$services->toJson()!!}'),
        counters: JSON.parse('{!!$counters->toJson()!!}'),
        selectedCounter: "{{session()->has('counter')}}" ? JSON.parse('{!!session()->get("counter")!!}') : null,
        selectedService: "{{session()->has('service')}}" ? JSON.parse('{!!session()->get("service")!!}') : null,
        get_tokens_from_file: "{{ asset('storage/tokens_for_callpage.json') }}",
        date: "{{ $date }}",
        served_lang: "{{__('messages.call_page.served')}}",
        noshow_lang: "{{__('messages.call_page.noshow')}}",
        called_lang: "{{__('messages.call_page.called')}}",
        recalled_lang: "{{__('messages.call_page.recalled')}}",
        no_ticket_lang: "{{__('messages.call_page.no ticket available')}}",
        alredy_used_lang: "{{__('messages.call_page.already used')}}",
        alredy_selected_lang: "{{__('messages.call_page.already selected')}}",
        error_lang: "{{__('messages.call_page.something went wrong')}}",
        alredy_called_lang: "{{__('messages.call_page.already called')}}",

    }
</script>
@endsection