
<?php $__env->startSection('title','Reports'); ?>
<?php $__env->startSection('report','active'); ?>
<?php $__env->startSection('user_report','active'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/data-tables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main">
    <div>
        <div id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12 pb-1">
                        <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.menu.user report')); ?></b></h5>
                        <ol class="breadcrumbs col s7 right-align">

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="inline-form" class="card card card-default scrollspy">
                    <div class="card-content">
                        <form action="<?php echo e(route('user_report')); ?>" id="user_report_form" autocomplete="off">
                            <div class="row">
                                <div class="input-field col s5">
                                    <select name="user_id" id="user_id" data-error=".user_id">
                                        <option value="" disabled selected><?php echo e(__('messages.reports.all users')); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($selected_user_id==$user->id): ?> selected <?php endif; ?>><?php echo e($user->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label><?php echo e(__('messages.reports.select user')); ?></label>
                                    <div class="user_id">
                                        <?php if($errors->has('user_id')): ?>
                                        <span class="text-danger errbk"><?php echo e($errors->first('user_id')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input-field col m5 s5">
                                    <input id="date" name="date" type="text" class="datepicker" value="<?php echo e($selected_date); ?>" data-error=".date">
                                    <label for="date"><?php echo e(__('messages.reports.date')); ?></label>
                                    <div class="date">
                                        <?php if($errors->has('date')): ?>
                                        <span class="text-danger errbk"><?php echo e($errors->first('date')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="input-field col m2 s2">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light" id="gobtn" type="submit">
                                            <?php echo e(__('messages.reports.go')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if($reports): ?>
        <div class="col s12">
            <div class="container" style="width: 99%;">
                <div class="section-data-tables">
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display dataTable">
                                                <thead>
                                                    <tr>
                                                        <th width="10px">#</th>
                                                        <th><?php echo e(__('messages.reports.service')); ?></th>
                                                        <th><?php echo e(__('messages.reports.token number')); ?></th>
                                                        <th><?php echo e(__('messages.reports.counter')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><?php echo e($report->service_name); ?></td>
                                                        <td><?php echo e($report->token_letter); ?>-<?php echo e($report->token_number); ?></td>
                                                        <td><?php echo e($report->counter_name); ?></td>

                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>


<script>
    $(document).ready(function() {
        let a = $(".input-field").find('.select-wrapper')
        a.css('display','block');
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });


        $('body').addClass('loaded');
        var ndate = $('#date').val();

        if (ndate == "") {
            $('#gobtn').attr('disabled', 'disabled');
        } else {
            $('#gobtn').removeAttr('disabled');
        }

    });
    $('#date').change(function(event) {
        var date = $('#date').val();

        if (date == "") {
            $('#gobtn').attr('disabled', 'disabled');
        } else {
            $('#gobtn').removeAttr('disabled');
        }
    });

    $('#page-length-option').DataTable({
        "responsive": true,
        "autoHeight": false,
        "scrollX": true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

    $('#user_report_form').validate({
        rules: {
            user_id: {
                required: true,
            },
            date: {
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/reports/user_report.blade.php ENDPATH**/ ?>