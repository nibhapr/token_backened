
<?php $__env->startSection('content'); ?>
<!-- BEGIN: Page Main-->
<div id="loader-wrapper">
<div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<div id="main" class="no-print" style="padding: 15px 15px 0px;">

    <div class="wrapper" style=" min-height: 557px;" id="display-page">
        <section class="content-wrapper no-print">
            <div id="callarea" class="row" style="line-height:1.23;display:flex; flex-direction:row-reverse">
                <div class="col m4">
                    <div class="card-panel center-align p-0" style="margin-bottom:0;height:74vh" id="side-token-display">
                        <div style="border-bottom:1px solid #ddd;height:25%;display:flex;flex-direction:row;justify-content:start;align-items:start">
                            <div>
                                <span v-if="tokens[1]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2">{{tokens[1]?.token_letter}}-{{tokens[1]?.token_number}}</span>
                                <span v-if="!tokens[1]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2"><?php echo e(__('messages.display.nil')); ?></span><br>
                                <small v-if="tokens[1]" class="bolder-color" id="counter1" style="font-size:25px; font-weight:bold;">{{tokens[1]?.counter.name}}</small>
                                <small v-if="!tokens[1]" class="bolder-color" id="counter1" style="font-size:25px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small><br>
                                <small v-if="tokens[1]?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>" style="font-size:20px; color:#009688; font-weight:bold;"><?php echo e(__('messages.display.served')); ?></small>
                                <small v-if="tokens[1]?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>" style="font-size:20px;font-weight:bold;color:red"><?php echo e(__('messages.display.noshow')); ?></small>
                                <small v-if="tokens[1] && tokens[1]?.call_status_id == null" style="font-size:20px; color:orange; font-weight:bold;"><?php echo e(__('messages.display.serving')); ?></small>
                                <small v-if="!tokens[1]" style="font-size:20px;"><?php echo e(__('messages.display.nil')); ?></small>
                            </div>
                        </div>
                        <div style="border-bottom:1px solid #ddd;height:25%;display:flex;flex-direction:row;justify-content:center;align-items:center">
                            <div>
                                <span v-if="tokens[2]" class="bolder-color" style="font-size:45px; font-weight:bold;line-height:1.2">{{tokens[2]?.token_letter}}-{{tokens[2]?.token_number}}</span>
                                <span v-if="!tokens[2]" class="bolder-color" style="font-size:45px; font-weight:bold;line-height:1.2"><?php echo e(__('messages.display.nil')); ?></span><br>
                                <small v-if="tokens[2]" class="bolder-color" id="counter2" style="font-size:25px;font-weight:bold;">{{tokens[2]?.counter.name}}</small>
                                <small v-if="!tokens[2]" class="bolder-color" id="counter2" style="font-size:25px;font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small><br>
                                <small v-if="tokens[2]?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>" style="font-size:20px; color:#009688; font-weight:bold;"><?php echo e(__('messages.display.served')); ?></small>
                                <small v-if="tokens[2]?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>" style="font-size:20px; font-weight:bold; color:red"><?php echo e(__('messages.display.noshow')); ?></small>
                                <small v-if="tokens[2] && tokens[2]?.call_status_id == null" style="font-size:20px;color:orange;font-weight:bold;"><?php echo e(__('messages.display.serving')); ?></small>
                                <small v-if="!tokens[2]" style="font-size:20px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small>
                            </div>
                        </div>
                        <div style="height:25%;border-bottom:1px solid #ddd;display:flex;flex-direction:row;justify-content:center;align-items:center">
                            <div>
                                <span v-if="tokens[3]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2">{{tokens[3]?.token_letter}}-{{tokens[3]?.token_number}}</span>
                                <span v-if="!tokens[3]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2"><?php echo e(__('messages.display.nil')); ?></span><br>
                                <small v-if="tokens[3]" class="bolder-color" id="counter3" style="font-size:25px; font-weight:bold;">{{tokens[3]?.counter.name}}</small>
                                <small v-if="!tokens[3]" class="bolder-color" id="counter3" style="font-size:25px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small><br>
                                <small v-if="tokens[3]?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>" style="font-size:20px; color:#009688; font-weight:bold;"><?php echo e(__('messages.display.served')); ?></small>
                                <small v-if="tokens[3]?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>" style="font-size:20px; font-weight:bold; color:red"><?php echo e(__('messages.display.noshow')); ?></small>
                                <small v-if="tokens[3] && tokens[3]?.call_status_id == null" style="font-size:20px; color:orange; font-weight:bold;"><?php echo e(__('messages.display.serving')); ?></small>
                                <small v-if="!tokens[3]" style="font-size:20px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small>
                            </div>
                        </div> 
                        <div style="height:25%;display:flex;flex-direction:row;justify-content:center;align-items:center">
                            <div>
                                <span v-if="tokens[4]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2">{{tokens[4]?.token_letter}}-{{tokens[4]?.token_number}}</span>
                                <span v-if="!tokens[4]" class="bolder-color" style="font-size:45px;font-weight:bold;line-height:1.2"><?php echo e(__('messages.display.nil')); ?></span><br>
                                <small v-if="tokens[4]" class="bolder-color" id="counter4" style="font-size:25px; font-weight:bold;">{{tokens[4]?.counter.name}}</small>
                                <small v-if="!tokens[4]" class="bolder-color" id="counter4" style="font-size:25px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small><br>
                                <small v-if="tokens[4]?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>" style="font-size:20px; color:#009688; font-weight:bold;"><?php echo e(__('messages.display.served')); ?></small>
                                <small v-if="tokens[4]?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>" style="font-size:20px; font-weight:bold; color:red"><?php echo e(__('messages.display.noshow')); ?></small>
                                <small v-if="tokens[4] &&tokens[4]?.call_status_id == null" style="font-size:20px; color:orange; font-weight:bold;"><?php echo e(__('messages.display.serving')); ?></small>
                                <small v-if="!tokens[4]" style="font-size:20px; font-weight:bold;"><?php echo e(__('messages.display.nil')); ?></small>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- <div class="col m12">
                    <div class="card-panel left-align" style="margin-bottom:0;height:74vh;display:flex;flex-direction:row;justify-content:center;align-items:center">
                        <div>
                            <div class="bolder-color" style="font-size:50px; margin:0px"><?php echo e(__('messages.display.token number')); ?></div>
                            <span v-if="tokens[0]" style="font-size:130px;color:red;font-weight:bold;line-height:1.2">{{tokens[0]?.token_letter}}-{{tokens[0]?.token_number}}</span>
                            <span v-if="!tokens[0]" style="font-size:130px;color:red;font-weight:bold;line-height:1.2"><?php echo e(__('messages.display.nil')); ?></span>
                            <div v-if="tokens[0]?.call_status_id == <?php echo e(CallStatuses::SERVED); ?>" style="font-size:40px; color:#009688"><?php echo e(__('messages.display.served')); ?></div>
                            <div v-if="tokens[0]?.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?>" style="font-size:40px; color:red"><?php echo e(__('messages.display.noshow')); ?></div>
                            <div v-if="tokens[0] && tokens[0]?.call_status_id == null" style="font-size:40px; color:orange; font-weight: bold"><?php echo e(__('messages.display.serving')); ?></div>
                            <div v-if="!tokens[0]" style="font-size:40px; color:orange; font-weight: bold"><?php echo e(__('messages.display.nil')); ?></div>
                            <div class="bolder-color" style="font-size:40px; line-height:1.4"><?php echo e(__('messages.display.please proceed to')); ?></div>
                            <div v-if="tokens[0]" id="counter0" style="font-size:70px; color:red;line-height:1.5">{{tokens[0]?.counter.name}}</div>
                            <div v-if="!tokens[0]" style="font-size:70px; color:red;line-height:1.5"><?php echo e(__('messages.display.nil')); ?></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <p>{{ tokens }}</p>
            <p>{{ queue }}</p> -->
            <div class="row" style="margin-bottom:0; margin-top: 15px;">
                <marquee><span style="font-size:<?php echo e($settings->display_font_size); ?>px;color:<?php echo e($settings->display_font_color); ?>"><?php echo e($settings->display_notification ? $settings->display_notification : 'Hello'); ?><span></span></span></marquee>
            </div>
            <audio id="called_sound">
                <source src="<?php echo e(asset('app-assets/audio/sound.mp3')); ?>" type="audio/mpeg">
            </audio>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('b-js'); ?>

<script>

    window.JLToken = {
        get_tokens_for_display_url: "<?php echo e(asset($file)); ?>",
        get_initial_tokens: "<?php echo e(route('get-tokens-for-display')); ?>",
        date_for_display: "<?php echo e($date); ?>",
        voice_type: "<?php echo e($settings->language->display); ?>",
        voice_content_one: "<?php echo e($settings->language->token_translation); ?>",
        voice_content_two: "<?php echo e($settings->language->please_proceed_to_translation); ?>",
        date_for_display: "<?php echo e($date); ?>",
        audioEl: document.getElementById('called_sound'),
    }
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.call_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/display/index.blade.php ENDPATH**/ ?>