
<?php $__env->startSection('title','User Roles'); ?>
<?php $__env->startSection('roles','active'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main" style="width:99%;">
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5"><b><?php echo e(__('messages.user_roles_page.add user role')); ?></b></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <a class="btn-floating waves-effect waves-light teal tooltipped" href="<?php echo e(route('roles.index')); ?>" data-position=top data-tooltip="<?php echo e(__('messages.common.go back')); ?>"><i class="material-icons">arrow_back</i></a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="row">
                <div class="col  s12 m10  offset-m1">
                    <div class="card-panel">
                        <div class="row">
                            <form id="news_form" method="post" action="<?php echo e(route('roles.store')); ?>" enctype="multipart/form-data">
                                <?php echo e(@csrf_field()); ?>

                                <div class="row">
                                    <div class="row form_align">
                                        <div class="input-field col s6">
                                            <label for="name"><?php echo e(__('messages.user_roles_page.role name')); ?></label>
                                            <input id="name" name="name" type="text" value="" data-error=".name" required>
                                            <div class="name">
                                                <?php if($errors->has('name')): ?>
                                                <span class="text-danger errbk"><?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form_align">
                                        <div class="input-field col s12">
                                            <table id="page-length-option" class="display dataTable">
                                                <thead>
                                                    <tr>
                                                        <td style="font-size:large"><b><?php echo e(__('messages.user_roles_page.user roles')); ?></b></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="select_all" />
                                                                <span><?php echo e(__('messages.user_roles_page.select all')); ?></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(__('messages.user_roles_page.module')); ?></th>
                                                        <th><?php echo e(__('messages.user_roles_page.access')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view dashboard')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="dashboard" name="permission[view dashboard]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view counters')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="counters" name="permission[view counters]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view services')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="services" name="permission[view services]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view users')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="users" name="permission[view users]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.call token')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="call" name="permission[call token]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.issue token')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="call" name="permission[issue token]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view display')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="call" name="permission[view display]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view reports')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="reports" name="permission[view reports]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view profile')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="profile" name="permission[view profile]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view settings')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="settings" name="permission[view settings]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(__('messages.user_roles_page.view user roles')); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="checkbox" id="userroles" name="permission[view user_roles]" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right submit" type="submit"><?php echo e(__('messages.common.submit')); ?><i class="mdi-content-send right"></i></button>
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
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });


        $('body').addClass('loaded');

    });
</script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/roles/create.blade.php ENDPATH**/ ?>