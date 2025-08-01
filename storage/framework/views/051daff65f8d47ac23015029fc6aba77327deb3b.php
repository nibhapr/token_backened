
<?php $__env->startSection('title','Settings'); ?>
<?php $__env->startSection('settings','active'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/colorpicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper" style="width:101%">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5 pb-1" style="margin:10px 0 0"><b><?php echo e(__('messages.menu.settings')); ?></b></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12" style="margin-top: 10px; padding-right:0">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
                <li class="tab"><a href="#test40" class="active"><?php echo e(__('messages.settings.General Settings')); ?></a></li>
                <li class="tab"><a class="" href="#test5"><?php echo e(__('messages.settings.SMS Settings')); ?></a></li>
                <li class="indicator" style="left: 0px; right: 796px;"></li>
            </ul>
        </div>
        <div class="col s12">
            <div id="test40" class="col s12 active" style="display: block;">
                <div class="row">
                    <div class="col s12 m12 l6 pl-3">
                        <div id="basic-form" class="card card card-default scrollspy">
                            <div class="card-content">
                                <h4 class="card-title"><?php echo e(__('messages.settings.company settings')); ?></h4>
                                <form id="company_settings" method="post" action="<?php echo e(route('update_settings')); ?>" enctype="multipart/form-data">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" id="name" name="name" value="<?php echo e($settings->name); ?>" data-error=".name">
                                            <label for="fn"><?php echo e(__('messages.settings.name')); ?></label>
                                            <div class="name">
                                                <?php if($errors->has('name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" name="email" type="email" value="<?php echo e($settings->email); ?>" data-error=".email">
                                            <label for="email"><?php echo e(__('messages.settings.email')); ?></label>
                                            <div class="email">
                                                <?php if($errors->has('email')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="address" name="address" class="materialize-textarea" data-error=".address"><?php echo e($settings->address); ?></textarea>
                                            <label for="textarea2"><?php echo e(__('messages.settings.address')); ?></label>
                                            <div class="address">
                                                <?php if($errors->has('address')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('address')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="phone" name="phone" type="text" value="<?php echo e($settings->phone); ?>" data-error=".phone">
                                            <label for="password"><?php echo e(__('messages.settings.phone')); ?></label>
                                            <div class="phone">
                                                <?php if($errors->has('phone')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="location" name="location" type="text" value="<?php echo e($settings->location); ?>" data-error=".location">
                                            <label for="location"><?php echo e(__('messages.settings.location')); ?></label>
                                            <div class="location">
                                                <?php if($errors->has('location')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('location')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="timezone" id="timezone" data-error=".timezone">
                                                <option value="" disabled selected><?php echo e(__('messages.settings.select timezone')); ?></option>
                                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($timezone); ?>" <?php if($timezone==$settings->timezone): ?> selected <?php endif; ?>><?php echo e($timezone); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <label><?php echo e(__('messages.settings.timezone')); ?></label>
                                            <div class="timezone">
                                                <?php if($errors->has('timezone')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('timezone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if($settings->logo && Storage::disk('public')->exists($settings->logo)): ?><div class="pl-3"><img height="40px" width="60px" src="<?php echo e($settings->logo_url); ?>"></div><?php endif; ?>
                                        <div class="file-field input-field col s9">
                                            <div class="btn">
                                                <span><?php echo e(__('messages.settings.logo')); ?></span>
                                                <input type="file" name="logo" data-error=".logo">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                            <?php if($errors->has('logo')): ?>
                                            <span class="text-danger errbk"><?php echo e($errors->first('logo')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($settings->logo): ?>
                                        <div class="col s3" style="padding-top: 15px;">
                                            <div class="btn" style="display: block; padding:0 1rem; background-color:#f15353;" onclick="removeLogo()">
                                                <span><?php echo e(__('messages.common.delete')); ?></span>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn  waves-effect waves-light right" type="submit" name="action"><?php echo e(__('messages.common.update')); ?>

                                                <i class="material-icons right">import_export</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m12 l6">
                        <div id="basic-form" class="card card card-default scrollspy">
                            <div class="card-content">
                                <h4 class="card-title"><?php echo e(__('messages.settings.change default language')); ?></h4>
                                <form action="<?php echo e(route('update_language_settings')); ?>" method="POST">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="language" data-error=".language">
                                                <option value="" disabled selected><?php echo e(__('messages.settings.select language')); ?></option>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($language->id); ?>" <?php echo e($language->id == $settings->language_id ?'selected':''); ?>><?php echo e($language->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <label><?php echo e(__('messages.settings.select language')); ?></label>
                                            <div class="language">
                                                <?php if($errors->has('language')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('language')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12" style="margin: 10px 0;">
                                            <button class="btn  waves-effect waves-light right" type="submit" name="action"><?php echo e(__('messages.common.update')); ?>

                                                <i class="material-icons right">import_export</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m12 l6">
                        <div id="basic-form" class="card card card-default scrollspy">
                            <div class="card-content">
                                <h4 class="card-title"><?php echo e(__('messages.settings.notification')); ?></h4>
                                <h6 style="font-size: 1rem;"><?php echo e(__('messages.settings.Preview')); ?>:</h6>
                                <div class="row">
                                    <span style="font-size:<?php echo e($settings->display_font_size); ?>px;color:<?php echo e($settings->display_font_color); ?>">
                                        <marquee><?php echo e($settings->display_notification ? $settings->display_notification : 'Hello'); ?></marquee>
                                    </span>
                                </div>
                                <form id="notification_settings" action="<?php echo e(route('update_display_settings')); ?>" method="post">
                                    <?php echo e(@csrf_field()); ?>

                                    <div class="row">
                                        <div class="input-field col s12" style="margin: 5px 0;">
                                            <input type="text" id="notification_text" name="notification_text" value="<?php echo e($settings->display_notification); ?>" data-error=".notification_text">
                                            <label for="fn"><?php echo e(__('messages.settings.notification text')); ?></label>
                                            <div class="notification_text">
                                                <?php if($errors->has('notification_text')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('notification_text')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6" style="margin: 5px 0;">
                                            <input id="font_size" type="number" name="font_size" value="<?php echo e($settings->display_font_size); ?>" data-error=".font_size">
                                            <label for="font_size"><?php echo e(__('messages.settings.font size')); ?></label>
                                            <div class="font_size">
                                                <?php if($errors->has('font_size')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('font_size')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6" style="margin: 5px 0;">
                                            <input id="color" type="text" name="color" value="<?php echo e($settings->display_font_color); ?>" data-error=".color">
                                            <label for="color"><?php echo e(__('messages.settings.color')); ?></label>
                                            <div class="color">
                                                <?php if($errors->has('color')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('color')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <h4><?php echo e(__('messages.settings.display voice settings')); ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6" style="margin: 5px 0;">
                                            <input id="token_translation" type="text" name="token_translation" value="<?php echo e($settings->language->token_translation); ?>" data-error=".token_translation">
                                            <label for="token_translation"><?php echo e(__('messages.settings.token translation')); ?></label>
                                            <div class="token_translation">
                                                <?php if($errors->has('token_translation')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('token_translation')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6" style="margin: 5px 0;">
                                            <input id="please_proceed_to_translation" type="text" name="please_proceed_to_translation" value="<?php echo e($settings->language->please_proceed_to_translation); ?>" data-error=".please_proceed_to_translation">
                                            <label for="please_proceed_to_translation"><?php echo e(__('messages.settings.please proceed to translation')); ?></label>
                                            <div class="please_proceed_to_translation">
                                                <?php if($errors->has('please_proceed_to_translation')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('please_proceed_to_translation')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12" style="margin: 10px 0;">
                                            <button class="btn  waves-effect waves-light right" type="submit" name="action"><?php echo e(__('messages.common.update')); ?>

                                                <i class="material-icons right">import_export</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="test5" class="col s12" style="display: none;">
                <div class="col s12">
                    <div class="card-panel" style="margin-top: 15px;">
                        <div class="row">
                            <form id="sms_settings" method="post" action="<?php echo e(route('update_sms_settings')); ?>">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s3">
                                            <select name="sms_enabled" id="sms_enabled" data-error=".sms_enabled" onchange="changeSmsEnabled()">
                                                <option value="0" <?php if($settings->sms_enabled== 0): ?> selected <?php endif; ?>>No</option>
                                                <option value="1" <?php if($settings->sms_enabled== 1): ?> selected <?php endif; ?>>Yes</option>
                                            </select>
                                            <label><?php echo e(__('messages.settings.SMS Enabled')); ?></label>
                                            <div class="sms_enabled">
                                                <?php if($errors->has('sms_enabled')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('sms_enabled')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s9" id="url_tab">
                                            <label for="sms_url"><?php echo e(__('messages.settings.SMS URL')); ?></label>
                                            <input id="sms_url" name="sms_url" type="text" value="<?php echo e($settings->sms_url); ?>" data-error=".sms_url">
                                            <div class="sms_url">
                                                <?php if($errors->has('sms_url')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('sms_url')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form_align">
                                        <div class="input-field col s3" style="float:right;margin:0">
                                            <button class="btn waves-effect right waves-light submit" type="submit"><?php echo e(__('messages.common.submit')); ?>

                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 10px;" id="url_keywords">
                                        <div class="col s12">
                                            <h6 style="font-size: 1.2rem; margin:10px 0"><?php echo e(__('messages.settings.URL Keywords')); ?></h6>
                                        </div>
                                        <div class="col s2">$phone$</div>
                                        <div class="col s10"><?php echo e(__('messages.settings.Phone Number')); ?></div>
                                        <div class="col s2">$text$</div>
                                        <div class="col s10"><?php echo e(__('messages.settings.SMS Text')); ?></div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/colorpicker.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#color').colorpicker();
        changeSmsEnabled();
    })
    // $('body').addClass('loaded');
    $(function() {
        $('#company_settings').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                address: {
                    required: true
                },
                timezone: {
                    required: true
                },
                location: {
                    required: true
                },
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

    $(function() {
        $('#notification_settings').validate({
            rules: {
                notification_text: {
                    required: true,
                    minlength: 5

                },
                font_size: {
                    required: true,
                    number: true,
                    min: 15,
                    max: 50
                },
                color: {
                    required: true,
                },
                token_tranlation: {
                    required: true,
                },
                please_proceed_to_translation: {
                    required: true,
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

    function changeSmsEnabled() {
        if ($('#sms_enabled').val() == 1) {
            $('#url_keywords,#url_tab').show();
        } else {
            $('#url_tab,#url_keywords').hide();
        }
    }

    $(function() {
        $('#sms_settings').validate({
            rules: {
                sms_enabled: {
                    required: true
                },
                sms_url: {
                    required: function(element) {
                        return $("#sms_enabled").val() == "1";
                    },
                },
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
</script>
<script>
    function removeLogo() {
        $('body').removeClass('loaded');
        $.ajax({
            type: "GET",
            url: "<?php echo e(Route('remove_logo')); ?>",
            cache: false,
            success: function(response) {
                if (response.status_code == 200) {
                    M.toast({
                        html: 'successfully removed'
                    });
                    location.reload(true);
                } else {
                    M.toast({
                        html: 'something went wrong',
                        classes: "toast-error"
                    });
                    $('body').addClass('loaded');
                }
            },
            error: function() {
                M.toast({
                    html: 'something went wrong',
                    classes: "toast-error"
                });
                $('body').addClass('loaded');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token_backend\resources\views/settings/settings.blade.php ENDPATH**/ ?>