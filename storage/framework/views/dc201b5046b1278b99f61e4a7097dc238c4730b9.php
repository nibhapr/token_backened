
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('profile','active'); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.common.profile')); ?></b></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <a class="btn-floating waves-effect waves-light teal tooltipped" href="<?php echo e(route('users.index')); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.go back')); ?>"><i class="material-icons">arrow_back</i></a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="row">
                <div class="col  s10 m8  offset-m2">
                    <div class="card-panel">
                        <div class="row">
                            <form id="user_form" method="post" action="<?php echo e(route('update_profile',[$profile->id])); ?>" enctype="multipart/form-data">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s6">
                                            <label for="name"><?php echo e(__('messages.user_page.name')); ?></label>
                                            <input id="name" name="name" type="text" value="<?php echo e($profile->name); ?>" data-error=".name">
                                            <div class="name">
                                                <?php if($errors->has('name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6">
                                            <label for="email"><?php echo e(__('messages.user_page.email')); ?></label>
                                            <input id="email" name="email" type="text" value="<?php echo e($profile->email); ?>" data-error=".email">
                                            <div class="email">
                                                <?php if($errors->has('email')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form_align">
                                        <div class="file-field input-field col s6">
                                            <div class="btn">
                                                <span><?php echo e(__('messages.user_page.image')); ?></span>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                            <?php if($errors->has('image')): ?>
                                            <span class="text-danger errbk"><?php echo e($errors->first('image')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                         <?php if(isset($profile->image) && Storage::disk('public')->exists($profile->image)): ?>       
                                        <div class="col s6 ">
                                            <img class="responsive-img circle z-depth-5" width="80" style="height: 80px;" src="<?php echo e($profile->image_url); ?>" alt="">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right submit" type="submit" name="action"><?php echo e(__('messages.common.update')); ?>

                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="row">
                            <h4><?php echo e(__('messages.profile.change password')); ?></h4>
                            <form id="password_form" method="post" action="<?php echo e(route('change_password')); ?>">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s6">
                                            <label for="password"><?php echo e(__('messages.profile.new password')); ?></label>
                                            <input id="newpassword" name="newpassword" type="password" data-error=".newpassword">
                                            <div class="newpassword">
                                                <?php if($errors->has('newpassword')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('newpassword')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-field col s6">
                                            <label for="cpassword"><?php echo e(__('messages.profile.confirm password')); ?></label>
                                            <input id="confirmpassword" name="confirmpassword" type="password" data-error=".confirmpassword">
                                            <div class="confirmpassword">
                                                <?php if($errors->has('confirmpassword')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('confirmpassword')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right submit" type="submit" name="action"><?php echo e(__('messages.common.submit')); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('body').addClass('loaded');
    });
    $(function() {
        $('#user_form').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
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

        $('#password_form').validate({
            rules: {
                newpassword: {
                    required: true,
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/profile/index.blade.php ENDPATH**/ ?>