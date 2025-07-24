<?php $__env->startSection('title','Counters'); ?>
<?php $__env->startSection('counter','active'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5"><b> <?php echo e(__('messages.counter_page.counters')); ?></b></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <a class="btn-floating waves-effect waves-light tooltipped" href="<?php echo e(route('counters.create')); ?>" data-position="top" data-tooltip="<?php echo e(__('messages.counter_page.add counter')); ?>">
                            <i class="material-icons">add</i>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                                                    <th width=65%><?php echo e(__('messages.counter_page.name')); ?></th>
                                                    <th><?php echo e(__('messages.counter_page.status')); ?></th>
                                                    <th><?php echo e(__('messages.counter_page.action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($counter->name); ?></td>
                                                    <td>
                                                        <div class="switch">
                                                            <label>
                                                                <input type="checkbox" <?php echo e($counter->status?'checked':''); ?> onchange="changeStatus(<?php echo e($counter->id); ?>)">
                                                                <span class="lever"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="btn-floating btn-action waves-effect waves-light orange tooltipped" href="<?php echo e(route('counters.edit',[$counter->id])); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.edit')); ?>"><i class="material-icons">edit</i></a>

                                                        <a class="btn-floating btn-action waves-effect waves-light red tooltipped frmsubmit" href="<?php echo e(route('counters.destroy',[$counter->id])); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.delete')); ?>" method="DELETE"><i class="material-icons">delete</i></a>

                                                    </td>
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
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script>
    $('#page-length-option').DataTable({
        "responsive": true,
        "autoHeight": false,
        "scrollX": true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

    $(document).ready(function() {
        $('body').addClass('loaded');
    });
</script>
<script>
    function changeStatus(id) {
        $('body').removeClass('loaded');
        var data = "id=" + id + '&_token=<?php echo e(csrf_token()); ?>';
        $.ajax({
            type: "POST",
            url: "<?php echo e(Route('counter_change_status')); ?>",
            data: data,
            cache: false,
            success: function(response) {

                location.reload(true);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/milan/Desktop/Apps/token_backend/resources/views/counter/index.blade.php ENDPATH**/ ?>