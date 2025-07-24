<?php $__env->startSection('call','active'); ?>
<?php $__env->startSection('content'); ?>
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<div id="main" style="width:99%">
    <div class="wrapper no-print" id="call-page">
        <section id="content" class="content-wrapper no-print" v-cloak>
            <div class="container" style="background:#f9f9f9 !important;">
                <div id="card-reveal" class="section" style="padding:0px !important;">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s12" style="padding:0px !important;">
                                <div class="card" style=" margin:0px !important; box-shadow: none; background:#f9f9f9 !important;">
                                    <div class="card-content" v-if="selected_counter && selected_service">
                                        <div class="col  m12 s12" style="min-height: 500px;">
                                            <div class="row" style="min-width: 800px;">
                                                <div class="col s12 center" v-if="token">
                                                    <span style="font-size: 115px;" class="truncate">
                                                        <a class="waves-effect waves-light  modal-trigger" href="#modal5" dismissible="false" style="color: #000;">
                                                            <input type="hidden" name="transfer_queue" id="transfer_queue" value="1989">
                                                            <input type="hidden" name="last_call" id="last_call" value="queue" v-cloak>
                                                            {{token.letter?token.letter : token.token_letter }}-{{token.number? token.number : token.token_number}}
                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="col s12 center" v-if="!token">
                                                    <span style="font-size: 115px; color:black" class="truncate">
                                                        <?php echo e(__('messages.call_page.nil')); ?>

                                                    </span><br>
                                                </div>
                                                <div class="col s12 center">
                                                    <div style="font-size:25px;" v-if="token?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>"><?php echo e(__('messages.call_page.served')); ?></div>
                                                    <div style="font-size:25px;" v-if="token?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>"><?php echo e(__('messages.call_page.noshow')); ?></div>
                                                    <div style="font-size:30px;" v-if="token && isCalled && this.token.ended_at == null">{{time_after_called}}</div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:50px; min-width:800px">
                                                <div class=" col m6 offset-m3 col s12 center">
                                                    <div class="input-field col s6">
                                                        <button class="btn waves-effect waves-light center call-bt submit" type="submit" @click="serveToken(token.id)" style="min-width:165px" :disabled="!isCalled ||servedClicked"><?php echo e(__('messages.call_page.served')); ?>

                                                            <i class="material-icons right">send</i>
                                                        </button>

                                                    </div>
                                                    <div class="input-field col s6">
                                                        <button class="btn waves-effect waves-light center submit call-bt" type="submit" @click="recallToken(token.id)" name="action" style="min-width:165px" :disabled="!isCalled || recallClicked"><?php echo e(__('messages.call_page.recall')); ?>

                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col m6 offset-m3 col s12 center">
                                                    <div class="input-field col s6">
                                                        <button class="btn waves-effect waves-light center submit call-bt" type="submit" name="action" @click="noShowToken(token.id)" :disabled="!isCalled || noshowClicked" :style="[font_size_smaller  ? { 'font-size' : '14px', 'padding' : '0 4px' } : '']" style="min-width:165px;"><?php echo e(__('messages.call_page.noshow')); ?>

                                                            <i class="material-icons right" :style="[font_size_smaller ? { 'margin-left' : '0px' } : '']">send</i>
                                                        </button>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <button id="next_call" class="btn waves-effect waves-light center call-bt submit " :style="[font_size_smaller  ? { 'font-size' : '14px', 'padding' : '0 4px' } : '']" type="submit" style="min-width:165px;" @click="callNext()" :disabled="isCalled || callNextClicked"><?php echo e(__('messages.call_page.call next')); ?>

                                                            <i class="material-icons right" :style="[font_size_smaller ? { 'margin-left' : '0px' } : '']">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col s12 center-align mt-2" v-if="selected_service && selected_counter">
                                                    <b><?php echo e(__('messages.call_page.service')); ?>:</b> {{ selected_service.name }}|
                                                    <b><?php echo e(__('messages.call_page.counter')); ?>: </b>{{selected_counter.name}} |
                                                    <a class="btn-floating btn-action waves-effect waves-light orange tooltipped" @click="openSetServiceModal()" data-position="top" data-tooltip="Change"><i class="material-icons">edit</i></a>
                                                </div>
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
                            <?php echo e(__('messages.call_page.set service and counter')); ?>

                        </h4>
                        <div class="divider col s12"></div>
                        <div class="row" style="padding-top: 7px;">
                            <div class="row">
                                <div class="input-field col s10 offset-s1">
                                    <div class="input-field col s12">
                                        <select v-model="service_id">
                                            <option value="" disabled selected><?php echo e(__('messages.call_page.choose your service')); ?></option>
                                            <option v-for="service in services" :value="service.id">{{service.name}}</option>
                                        </select>
                                        <label><?php echo e(__('messages.call_page.service')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <div class="input-field col s12">
                                        <select v-model="counter_id">
                                            <option value="" disabled selected><?php echo e(__('messages.call_page.choose your counter')); ?></option>
                                            <option v-for="counter in counters" :value="counter.id">{{counter.name}}</option>
                                        </select>
                                        <label><?php echo e(__('messages.call_page.counter')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a v-if="!selected_service && !selected_counter" href="<?php echo e(route('dashboard')); ?>"><button class="btn waves-effect waves-light red" style="margin-right: 20px ; margin-left: 20px" type="button"><?php echo e(__('messages.common.go back')); ?>

                            <i class="material-icons right">close</i>
                        </button></a>
                    <button v-if="selected_service && selected_counter" class="modal-close btn waves-effect waves-light red" style="margin-right: 20px ; margin-left: 20px" type="button"><?php echo e(__('messages.common.close')); ?>

                        <i class="material-icons right">close</i>
                    </button>
                    <button class="btn waves-effect waves-light submit" type="submit" name="action" :disabled="!service_id || !counter_id" @click="setService()"><?php echo e(__('messages.common.submit')); ?>

                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
        </section>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('b-js'); ?>
<script>
    window.JLToken = {
        current_lang: '<?php echo e(\App::currentLocale()); ?>',
        call_page_loaded: true,
        set_service_counter_url: "<?php echo e(route('set-service-and-counter')); ?>",
        get_token_for_call_url: "<?php echo e(route('get-token-for-call')); ?>",
        get_services_url: "<?php echo e(route('get-token-for-call')); ?>",
        isServiceSelected: "<?php echo e(session()->has('service')); ?>",
        get_services_and_counters_url: "<?php echo e(route('get-services-counters')); ?>",
        get_called_tokens_url: "<?php echo e(route('get-called-tokens')); ?>",
        call_next_url: "<?php echo e(route('call_next')); ?>",
        serve_token_url: "<?php echo e(route('serve_token')); ?>",
        noshow_token_url: "<?php echo e(route('noshow-token')); ?>",
        noshow_token_url: "<?php echo e(route('noshow-token')); ?>",
        recall_token_url: "<?php echo e(route('recall_token')); ?>",
        services: JSON.parse('<?php echo $services->toJson(); ?>'),
        counters: JSON.parse('<?php echo $counters->toJson(); ?>'),
        selectedCounter: "<?php echo e(session()->has('counter')); ?>" ? JSON.parse('<?php echo session()->get("counter"); ?>') : null,
        selectedService: "<?php echo e(session()->has('service')); ?>" ? JSON.parse('<?php echo session()->get("service"); ?>') : null,
        get_tokens_from_file: "<?php echo e(asset('storage/tokens_for_callpage.json')); ?>",
        date: "<?php echo e($date); ?>",
        served_lang: "<?php echo e(__('messages.call_page.served')); ?>",
        noshow_lang: "<?php echo e(__('messages.call_page.noshow')); ?>",
        called_lang: "<?php echo e(__('messages.call_page.called')); ?>",
        recalled_lang: "<?php echo e(__('messages.call_page.recalled')); ?>",
        no_ticket_lang: "<?php echo e(__('messages.call_page.no ticket available')); ?>",
        alredy_used_lang: "<?php echo e(__('messages.call_page.already used')); ?>",
        alredy_selected_lang: "<?php echo e(__('messages.call_page.already selected')); ?>",
        error_lang: "<?php echo e(__('messages.call_page.something went wrong')); ?>",
        alredy_called_lang: "<?php echo e(__('messages.call_page.already called')); ?>",

    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.call_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/milan/Desktop/Apps/token_backend/resources/views/call/call.blade.php ENDPATH**/ ?>