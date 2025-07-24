
<?php $__env->startSection('title','Reports'); ?>
<?php $__env->startSection('report','active'); ?>
<?php $__env->startSection('monthly_report','active'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/data-tables.css')); ?>">
<style>
    .count-box {
        background-color: aquamarine;
        height: 22px;
        width: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bolder;

    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12 pb-1">
                    <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.menu.monthly report')); ?></b></h5>
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
                    <form id="monthly_form" action="<?php echo e(route('monthly_report')); ?>" autocomplete="off">
                        <div class="row">
                            <div class="input-field col s4">
                                <select name="service_id" id="service_id" data-error=".service_id">
                                    <option value="" selected><?php echo e(__('messages.reports.all services')); ?></option>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($service->id); ?>" <?php echo e($service->id == $selected['service'] ?'selected':''); ?>><?php echo e($service->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- <option value="2">Option 2</option>
                                    <option value="3">Option 3</option> -->
                                </select>
                                <label><?php echo e(__('messages.reports.select service')); ?></label>
                                <div class="service_id">
                                    <?php if($errors->has('service_id')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('service_id')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-field col s4">
                                <select name="counter_id" id="counter_id" data-error=".counter_id">
                                    <option value="" selected><?php echo e(__('messages.reports.all counters')); ?></option>
                                    <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($counter->id); ?>" <?php echo e($counter->id == $selected['counter'] ?'selected':''); ?>><?php echo e($counter->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label><?php echo e(__('messages.reports.select counter')); ?></label>
                                <div class="counter_id">
                                    <?php if($errors->has('counter_id')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('counter_id')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-field col s4">
                                <select name="user_id" id="user_id" data-error=".user_id">
                                    <option value="" selected><?php echo e(__('messages.reports.all users')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $selected['user'] ?'selected':''); ?>><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label><?php echo e(__('messages.reports.select user')); ?></label>
                                <div class="user_id">
                                    <?php if($errors->has('user_id')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('user_id')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <select name="call_status" id="call_status" data-error=".call_status">
                                    <option value="" selected><?php echo e(__('messages.reports.all statuses')); ?></option>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id); ?>" <?php echo e($status->id == $selected['status'] ?'selected':''); ?>><?php echo e($status->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label><?php echo e(__('messages.reports.select status')); ?></label>
                                <div class="call_status">
                                    <?php if($errors->has('call_status')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('call_status')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-field col m3 s3">
                                <input id="starting_date" name="starting_date" type="text" class="datepicker" data-error=".starting_date" value="<?php echo e($selected['starting_date']); ?>">
                                <label for="starting_date"><?php echo e(__('messages.reports.starting date')); ?></label>
                                <div class="starting_date">
                                    <?php if($errors->has('starting_date')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('starting_date')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-field col m3 s3">
                                <input id="ending_date" name="ending_date" type="text" class="datepicker" value="<?php echo e($selected['ending_date']); ?>" data-error=".ending_date">
                                <label for="ending_date"><?php echo e(__('messages.reports.ending date')); ?></label>
                                <div class="ending_date">
                                    <?php if($errors->has('ending_date')): ?>
                                    <span class="text-danger errbk"><?php echo e($errors->first('ending_date')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-field col m2 s2">
                                <div class="input-field col s12">
                                    <button id="gobtn" class="btn  waves-effect waves-light">
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
                                <div class="row" style="padding: 5px 30px 10px 30px;">
                                    <div class="col m6 s12">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col s9">Waiting people</div>
                                            <div class="col s3"><span class="count-box" style="background-color: #00bcd4 ;"><?php echo e($token_count['queue']); ?></span></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col s9">Tickets in serving</div>
                                            <div class="col s3"><span class="count-box" style="background-color: #66bb6a  ;"><?php echo e($token_count['serving']); ?></span></div>
                                        </div>
                                    </div>
                                    <div class="col m6 s12">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col s9">No Show</div>
                                            <div class="col s3"><span class="count-box" style="background-color: #ffa726 ;"><?php echo e($token_count['noshow']); ?></span></div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="col s9">Served</div>
                                            <div class="col s3"><span class="count-box" style="background-color: #ff5252 ;"><?php echo e($token_count['served']); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="10px">#</th>
                                                    <th><?php echo e(__('messages.reports.user')); ?></th>
                                                    <th><?php echo e(__('messages.reports.token number')); ?></th>
                                                    <th><?php echo e(__('messages.reports.service')); ?></th>
                                                    <th><?php echo e(__('messages.reports.counter')); ?></th>
                                                    <th><?php echo e(__('messages.reports.date')); ?></th>
                                                    <th><?php echo e(__('messages.reports.called at')); ?></th>
                                                    <th><?php echo e(__('messages.reports.served at')); ?></th>
                                                    <th><?php echo e(__('messages.reports.waiting time')); ?></th>
                                                    <th><?php echo e(__('messages.reports.served time')); ?></th>
                                                    <th><?php echo e(__('messages.reports.total time')); ?></th>
                                                    <th><?php echo e(__('messages.counter_page.status')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($report->user_name ? $report->user_name : 'Nil'); ?></td>
                                                    <td><?php echo e($report->token_letter); ?>-<?php echo e($report->token_number); ?></td>
                                                    <td><?php echo e($report->service_name); ?></td>
                                                    <td><?php echo e($report->counter_name ? $report->counter_name : 'Nil'); ?></td>
                                                    <td><?php echo e($report->date ? \Carbon\Carbon::parse($report->date)->timezone($timezone)->format('d F Y h:i A') : 'Nil'); ?></td>
                                                    <td><?php echo e($report->called_at ? \Carbon\Carbon::parse($report->called_at)->timezone($timezone)->format('d F Y h:i A') :'Nil'); ?></td>
                                                    <td><?php echo e($report->served_at ? \Carbon\Carbon::parse($report->served_at)->timezone($timezone)->format('d F Y h:i A') : 'Nil'); ?></td>
                                                    <td><?php echo e($report->waiting_time ? \Carbon\Carbon::today()->diffForHumans(\Carbon\Carbon::createFromFormat('H:i:s', $report->waiting_time), true, true, 2) : 'Nil'); ?></td>
                                                    <td><?php echo e($report->served_time ? \Carbon\Carbon::today()->diffForHumans(\Carbon\Carbon::createFromFormat('H:i:s', $report->served_time), true, true, 2) : 'Nil'); ?></td>
                                                    <td><?php echo e($report->total_time ? \Carbon\Carbon::today()->diffForHumans(\Carbon\Carbon::createFromFormat('H:i:s',$report->total_time), true, true, 2): 'Nil'); ?></td>
                                                    <td><?php echo e($report->status ? $report->status : ($report->counter_name ? 'Serving' : 'Waiting')); ?></td>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        let a = $(".input-field").find('.select-wrapper')
        a.css('display', 'block');
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('body').addClass('loaded');

        var starting_date = $('#starting_date').val();
        var ending_date = $('#ending_date').val();

        if (starting_date == "" || ending_date == "") {
            $('#gobtn').attr('disabled', 'disabled');
        } else {
            $('#gobtn').removeAttr('disabled');
        }

    });

    $('#page-length-option').DataTable({
        "autoHeight": true,
        "scrollX": true,
        "showAllColumns": true,
        "columnDefs": [{
            "width": "2%",
            "targets": 2
        }],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

    $('#starting_date,#ending_date').change(function(event) {
        let starting_date = $('#starting_date').val();
        let ending_date = $('#ending_date').val();

        if (starting_date == "" || ending_date == "") {
            $('#gobtn').attr('disabled', 'disabled');
        } else {
            $('#gobtn').removeAttr('disabled');
        }
    });

    $('#monthly_form').validate({
        rules: {
            starting_date: {
                required: true,
            },
            ending_date: {
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
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/reports/monthly_report.blade.php ENDPATH**/ ?>