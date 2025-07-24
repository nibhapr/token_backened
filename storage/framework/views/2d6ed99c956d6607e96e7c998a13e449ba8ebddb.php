
<?php $__env->startSection('title','Counters'); ?>
<?php $__env->startSection('counter','active'); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.counter_page.add counter')); ?></b></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <a class="btn-floating waves-effect waves-light teal tooltipped" href="<?php echo e(route('counters.index')); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.go back')); ?>"><i class="material-icons">arrow_back</i></a>
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
                            <form id="counter_form" method="post" action="<?php echo e(route('counters.store')); ?>">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s12">
                                            <label for="name"><?php echo e(__('messages.counter_page.counter name')); ?></label>
                                            <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" data-error=".name">
                                            <div class="name">
                                                <?php if($errors->has('name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

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
    $(function() {
        $(document).ready(function() {
            $('body').addClass('loaded');
        });
        $('#counter_form').validate({
            rules: {
                name: {
                    required: true,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/counter/create.blade.php ENDPATH**/ ?>