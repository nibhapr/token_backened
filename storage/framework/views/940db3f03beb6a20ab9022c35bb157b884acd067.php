
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('qr-code','active'); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5 "><b>QR code</b></h5>
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
                <div class="col s10 m8 offset-m2">
                    <div class="card-panel center-align">
                        <img src=<?php echo e($qr); ?> alt="digiimpact" class="responsive-img">
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/qr/index.blade.php ENDPATH**/ ?>