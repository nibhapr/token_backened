
<?php $__env->startSection('title','Services'); ?>
<?php $__env->startSection('service','active'); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.service_page.add service')); ?></b></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <a class="btn-floating waves-effect waves-light teal tooltipped" href="<?php echo e(route('services.index')); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.go back')); ?>"><i class="material-icons">arrow_back</i></a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="row">
                <div class="col s12 m8  offset-m2">
                    <div class="card-panel">
                        <div class="row">
                            <form id="service_form" method="post" action="<?php echo e(route('services.store')); ?>">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s6">
                                            <label for="name"><?php echo e(__('messages.service_page.add service')); ?></label>
                                            <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" data-error=".name">
                                            <div class="name">
                                                <?php if($errors->has('name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                         <div class="input-field col s6">
                                            <label for="details">Details</label>
                                            <input id="details" name="details" type="text" value="<?php echo e(old('details')); ?>" data-error=".details">
                                            <div class="details">
                                                <?php if($errors->has('details')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('details')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row form_align">
                                        <div class="input-field col s6">
                                            <label for="letter"><?php echo e(__('messages.service_page.letter')); ?></label>
                                            <input id="letter" name="letter" type="text" value="<?php echo e(old('letter')); ?>" data-error=".letter">
                                            <div class="letter">
                                                <?php if($errors->has('letter')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('letter')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6">
                                            <label for="start_number"><?php echo e(__('messages.service_page.starting number')); ?></label>
                                            <input id="start_number" name="start_number" type="number" value="<?php echo e(old('start_number')); ?>" data-error=".start_number">
                                            <div class="start_number">
                                                <?php if($errors->has('start_number')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('start_number')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form_align">
                                        <div class="input-field col s3">
                                            <select name="ask_name" id="ask_name" data-error=".ask_name" onchange="enableRequired()">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Ask Name For Token')); ?></label>
                                            <div class="ask_name">
                                                <?php if($errors->has('ask_name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('ask_name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s3">
                                            <select name="name_required" id="name_required" data-error=".name_required">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Name is required')); ?></label>
                                            <div class="name_required">
                                                <?php if($errors->has('name_required')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name_required')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s3">
                                            <select name="ask_email" id="ask_email" data-error=".ask_email" onchange="enableRequired()">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Ask Email For Token')); ?></label>
                                            <div class="ask_email">
                                                <?php if($errors->has('ask_email')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('ask_email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s3">
                                            <select name="email_required" id="email_required" data-error=".email_required">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Email is required')); ?></label>
                                            <div class="email_required">
                                                <?php if($errors->has('email_required')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('email_required')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form_align">
                                        <div class="input-field col s3">
                                            <select name="ask_phone" id="ask_phone" data-error=".ask_phone" onchange="enableRequired()">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Ask Phone For Token')); ?></label>
                                            <div class="ask_phone">
                                                <?php if($errors->has('ask_phone')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('ask_phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s3">
                                            <select name="phone_required" id="phone_required" data-error=".phone_required">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.service_page.Phone is required')); ?></label>
                                            <div class="phone_required">
                                                <?php if($errors->has('phone_required')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('phone_required')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if($settings->sms_enabled): ?>
                                        <div class="input-field col s6">
                                            <select name="sms" id="sms" data-error=".sms" onchange="changeSMS()">
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.settings.SMS Enabled')); ?></label>
                                            <div class="sms">
                                                <?php if($errors->has('sms')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('sms')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($settings->sms_enabled): ?>
                                    <div id="sms_tab">
                                        <div class="row form_align">
                                            <h3 style="margin-left: 16px; margin-right:16px"><?php echo e(__('messages.settings.SMS Settings')); ?></h3>
                                        </div>
                                        <div class="row form_align">
                                            <div class="input-field col s6">
                                                <select name="optin_message" id="optin_message" data-error=".optin_message" onchange="changeOptinMessage()">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label><?php echo e(__('messages.service_page.Optin Message')); ?></label>
                                                <div class="optin_message">
                                                    <?php if($errors->has('optin_message')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('optin_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6">
                                                <select name="call_message" id="call_message" data-error=".call_message" onchange="changeCallMessage()">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label><?php echo e(__('messages.service_page.Call Message')); ?></label>
                                                <div class="call_message">
                                                    <?php if($errors->has('call_message')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('call_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form_align">
                                            <div class="input-field col s6" style="margin-top: 0;" id="optin_message_tab">
                                                <textarea id="optin_message_format" name="optin_message_format" class="materialize-textarea" data-error=".optin_message_format">Your token number is '$token_number$'. You are #$position$ in the '$service_name$' queue</textarea>
                                                <label for="optin_message_format"><?php echo e(__('messages.service_page.Optin Message Format')); ?></label>
                                                <div class="optin_message_format">
                                                    <?php if($errors->has('optin_message_format')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('optin_message_format')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6" style="margin-top: 0; float: right;" id="call_message_tab">
                                                <textarea id="call_message_format" name="call_message_format" class="materialize-textarea" data-error=".call_message_format">Your token number '$token_number$' is next to see to '$service_name$' queue</textarea>
                                                <label for="call_message_format"><?php echo e(__('messages.service_page.Call Message Format')); ?></label>
                                                <div class="call_message_format">
                                                    <?php if($errors->has('call_message_format')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('call_message_format')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form_align">
                                            <div class="input-field col s6">
                                                <select name="noshow_message" id="noshow_message" data-error=".noshow_message" onchange="changeNoshowMessage()">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label><?php echo e(__('messages.service_page.No Show Message')); ?></label>
                                                <div class="noshow_message">
                                                    <?php if($errors->has('noshow_message')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('noshow_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6">
                                                <select name="completed_message" id="completed_message" data-error=".completed_message" onchange="changeCompletedMessage()">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label><?php echo e(__('messages.service_page.Service Completed Message')); ?></label>
                                                <div class="completed_message">
                                                    <?php if($errors->has('completed_message')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('completed_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form_align">
                                            <div class="input-field col s6" style="margin-top: 0;" id="noshow_message_tab">
                                                <textarea id="noshow_message_format" name="noshow_message_format" class="materialize-textarea" data-error=".noshow_message_format">Your token number `$token_number$` is marked as no show</textarea>
                                                <label for="noshow_message_format"><?php echo e(__('messages.service_page.No Show Message Format')); ?></label>
                                                <div class="noshow_message_format">
                                                    <?php if($errors->has('noshow_message_format')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('noshow_message_format')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="input-field col s6" style="margin-top: 0;float: right;" id="completed_message_tab">
                                                <textarea id="completed_message_format" name="completed_message_format" class="materialize-textarea" data-error=".completed_message_format">Thank you for using our service, Have a good day</textarea>
                                                <label for="completed_message_format"><?php echo e(__('messages.service_page.Service Completed Message Format')); ?></label>
                                                <div class="completed_message_format">
                                                    <?php if($errors->has('completed_message_format')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('completed_message_format')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form_align">
                                            <div class="input-field col s6">
                                                <select name="status_message" id="status_message" data-error=".status_message" onchange="changeStatusMessage()">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label><?php echo e(__('messages.service_page.Status Message')); ?></label>
                                                <div class="status_message">
                                                    <?php if($errors->has('status_message')): ?>
                                                    <span class="text-danger errbk"><?php echo e($errors->first('status_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="status_message_tab">
                                            <div class="row form_align">
                                                <div class="input-field col s6">
                                                    <select name="status_message_positions[]" id="status_message_positions" data-error=".status_message_positions" multiple>
                                                        <option value="3" selected>3</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                    </select>
                                                    <label><?php echo e(__('messages.service_page.Send status message when position is')); ?></label>
                                                    <div class="status_message_positions">
                                                        <?php if($errors->has('status_message_positions')): ?>
                                                        <span class="text-danger errbk"><?php echo e($errors->first('status_message_positions')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form_align">
                                                <div class="input-field col s6" style="margin-top: 0;">
                                                    <textarea id="status_message_format" name="status_message_format" class="materialize-textarea" data-error=".status_message_format">Your token number `$token_number$` is at #$position$ in the `$service_name$` queue </textarea>
                                                    <label for="status_message_format"><?php echo e(__('messages.service_page.Status Message Format')); ?></label>
                                                    <div class="status_message_format">
                                                        <?php if($errors->has('status_message_format')): ?>
                                                        <span class="text-danger errbk"><?php echo e($errors->first('status_message_format')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 10px;">
                                            <div class="col s12">
                                                <h6 style="font-size: 1.2rem; margin:10px 0"><?php echo e(__('messages.service_page.Message Keywords')); ?></h6>
                                            </div>
                                            <div class="col s4">$token_number$</div>
                                            <div class="col s8"><?php echo e(__('messages.service_page.Token Number')); ?></div>
                                            <div class="col s4">$service_name$</div>
                                            <div class="col s8"><?php echo e(__('messages.service_page.Name of the service from which user has taken the token')); ?></div>
                                            <div class="col s4">$date$</div>
                                            <div class="col s8"><?php echo e(__('messages.service_page.Token Date')); ?></div>
                                            <div class="col s4">$counter_name$</div>
                                            <div class="col s8"><?php echo e(__('messages.service_page.Name of the counter')); ?></div>
                                            <div class="col s4">$position$</div>
                                            <div class="col s8"><?php echo e(__('messages.service_page.Current position of user in the queue')); ?></div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right submit" type="submit"><?php echo e(__('messages.common.submit')); ?>

                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('body').addClass('loaded');
        $('#sms_tab,#optin_message_tab,#call_message_tab,#noshow_message_tab,#completed_message_tab,#status_message_tab').hide();
        enableRequired();
        enableOrDisableSms();
    });
    $(function() {
        $('#service_form').validate({
            ignore: [],
            rules: {
                name: {
                    required: true,
                },
                letter: {
                    required: true,
                    maxlength: 2
                },
                start_number: {
                    required: true,
                    min: 0
                },
                call_message_format: {
                    required: function(element) {
                        return $("#call_message").val() == "1";
                    },
                },
                optin_message_format: {
                    required: function(element) {
                        return $("#optin_message").val() == "1";
                    },
                },
                noshow_message_format: {
                    required: function(element) {
                        return $("#noshow_message").val() == "1";
                    },
                },
                completed_message_format: {
                    required: function(element) {
                        return $("#completed_message").val() == "1";
                    },
                },
                'status_message_positions[]': {
                    required: function(element) {
                        return $("#status_message").val() == "1";
                    },
                },
                status_message_format: {
                    required: function(element) {
                        return $("#status_message").val() == "1";
                    },
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });

    function changeSMS() {
        if ($('#sms').val() == 1) {
            $('#sms_tab').show();
        } else {
            $('#sms_tab').hide();
        }
    }

    function changeOptinMessage() {
        if ($('#optin_message').val() == 1) {
            $('#optin_message_tab').show();
        } else {
            $('#optin_message_tab').hide();
        }
    }

    function changeCallMessage() {
        if ($('#call_message').val() == 1) {
            $('#call_message_tab').show();
        } else {
            $('#call_message_tab').hide();
        }
    }

    function changeNoshowMessage() {
        if ($('#noshow_message').val() == 1) {
            $('#noshow_message_tab').show();
        } else {
            $('#noshow_message_tab').hide();
        }
    }

    function changeCompletedMessage() {
        if ($('#completed_message').val() == 1) {
            $('#completed_message_tab').show();
        } else {
            $('#completed_message_tab').hide();
        }
    }

    function changeStatusMessage() {
        if ($('#status_message').val() == 1) {
            $('#status_message_tab').show();
        } else {
            $('#status_message_tab').hide();
        }
    }

    function enableRequired() {
        if ($('#ask_name').val() == 1) {
            $('#name_required').prop('disabled', false);
        } else {
            $('#name_required').val(0);
            $('#name_required').prop('disabled', true);
        }
        if ($('#ask_email').val() == 1) {
            $('#email_required').prop('disabled', false);
        } else {
            $('#email_required').val(0);
            $('#email_required').prop('disabled', true);
        }
        if ($('#ask_phone').val() == 1) {
            $('#phone_required,#sms').prop('disabled', false);
        } else {
            $('#sms,#phone_required').val(0);
            $('#phone_required,#sms').prop('disabled', true);
            $('#sms_tab').hide();
        }
        $('select').formSelect();
    }

    function enableOrDisableSms() {
        if ($('#phone_required').val() == 1) {
            $('#sms').prop('disabled', false);
        } else {
            $('#sms').prop('disabled', true);
        }
        $('select').formSelect();
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token_backend\resources\views/service/create.blade.php ENDPATH**/ ?>