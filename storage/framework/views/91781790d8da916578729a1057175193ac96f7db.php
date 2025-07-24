<!DOCTYPE html>
<html class="loading" data-textdirection="<?php echo e(\App::currentLocale() == 'sa' ? 'rtl' : 'ltr'); ?>">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digiimpact <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/vendors.min.css')); ?>">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <?php if(\App::currentLocale() == 'sa'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/style-rtl.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/themes/vertical-dark-menu-template/materialize.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/themes/vertical-dark-menu-template/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/loader/main.css')); ?>">
    <?php else: ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/loader/main.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/loader/normalize.css')); ?>">



    <!-- vue js -->
    <?php echo $__env->yieldContent('css'); ?>

    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns noprint ">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock">
                <div class="nav-wrapper">
                    <ul class="navbar-list left" style="padding-left: 60px;">
                        <li><span style="font-weight: bold; font-size: x-large; ">Digiimpact</span></li>
                    </ul>
                    <ul class="navbar-list right">
                        <?php if(isset(session()->get("settings")->logo) && Storage::disk('public')->exists(session()->get("settings")->logo)): ?>
                        <li style="padding: 5px 0;">
                            <img style="max-height:50px" src="<?php echo e(session()->get('settings')->logo_url); ?>" alt="avatar">
                        </li>
                        <?php endif; ?>
                        <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-<?php echo e(\App::currentLocale()); ?>"></span></a></li>
                        <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                        <?php if( Auth::user()->can('view issue token') || Auth::user()->can('view display')): ?>
                        <li class="navbar-list left"><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="extra-dropdown"><i class="material-icons">attachment</i></a></li>
                        <?php endif; ?>
                        <li class="navbar-list left"><a href="<?php echo e(route('profile')); ?>"><b><?php echo e(session()->get("settings")->name); ?>,<?php echo e(session()->get("settings")->location); ?></b></a></li>

                        <!-- <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status "><img src="<?php echo e(Auth::user()->image_url); ?>" alt="avatar"></span></a></li> -->

                        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status ">
                                    <?php if(isset(Auth::user()->image) && Storage::disk('public')->exists(Auth::user()->image)): ?>
                                    <img style="width:28px;height:28px" src="<?php echo e(Auth::user()->image_url); ?>" alt="avatar">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('app-assets/images/avatar/avatar.png')); ?>" alt="avatar">
                                    <?php endif; ?>
                                </span></a>
                        </li>

                        <!-- <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li> -->
                    </ul>

                    <ul class="dropdown-content" id="translation-dropdown">
                        <li class="dropdown-item" onclick="changeLanguage(1)"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(2)"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(3)"><a class="grey-text text-darken-1" href="#!" data-language="in"><i class="flag-icon flag-icon-in"></i> Hindi</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(4)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-sa"></i> Arabic</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(5)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-es"></i> Spanish</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(6)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(7)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-it"></i> Italian</a></li>
                        <li class="dropdown-item" onclick="changeLanguage(8)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-id"></i> Indonesian</a></li>
                    </ul>

                    <ul class="dropdown-content" id="profile-dropdown">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view profile')): ?>
                        <li><a class="grey-text text-darken-1" href="<?php echo e(route('profile')); ?>"><i class="material-icons">person_outline</i> <?php echo e(__('messages.common.profile')); ?></a></li>
                        <li class="divider"></li>
                        <?php endif; ?>
                        <li><a class="grey-text text-darken-1" href="<?php echo e(route('logout')); ?>"><i class="material-icons">keyboard_tab</i> <?php echo e(__('messages.common.logout')); ?></a></li>
                    </ul>

                    <ul class="dropdown-content" id="extra-dropdown">
                        <li><a href="" style="font-weight: 600; color:black"><?php echo e(__('messages.common.links')); ?></a></li>
                        <li class="divider"></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('issue token')): ?>
                        <li><a class="grey-text text-darken-1" href="<?php echo e(route('issue_token')); ?>" target="_blank"> <?php echo e(__('messages.menu.issue token url')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view display')): ?>
                        <li><a class="grey-text text-darken-1" href="<?php echo e(route('display')); ?>" target="_blank"><?php echo e(__('messages.menu.display url')); ?></a></li>
                        <?php endif; ?>
                        <!-- <li class="divider"></li> -->
                        <!-- <li><a class="grey-text text-darken-1" href="<?php echo e(route('logout')); ?>"><i class="material-icons">keyboard_tab</i> Logout</a></li> -->
                    </ul>

                </div>

            </nav>
        </div>
    </header>
    <!-- END: Header-->
    <!-- BEGIN: SideNav-->
    <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <?php echo $__env->yieldContent('content'); ?>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->
    <footer class="page-footer1" style="z-index: 200; background-color:#f9f9f9">
        <div class="footer-copyright" >
            <div class="container" style="display: flex; justify-content: end;">Powered by&nbsp;<a href="https://www.digiimpact.ae" target="_blank" style="color:#000000;font-weight: bolder;">Digiimpact</a>&nbsp;All rights reserved.</div>
        </div>
    </footer>
    <?php echo $__env->yieldContent('c-js'); ?>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(asset('app-assets/js/loader/modernizr-2.6.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/app.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('body').addClass('loaded');
        });
        $(document).on("click", 'a.frmsubmit', function(e) {
            var message = '';
            if (e.currentTarget.attributes.message != undefined) {
                message = e.currentTarget.attributes.message.value;
            } else {
                message = 'Are you sure you want delete ?';
            }
            if (message != 'false') {
                if (confirm(message)) {
                    e.preventDefault();
                    var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post"><?php echo e(@csrf_field()); ?><input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
                    $('body').append(myForm);
                    myForm = $('#hidfrm');
                    myForm.submit();
                }
            } else {
                e.preventDefault();
                var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post"><?php echo e(@csrf_field()); ?><input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
                $('body').append(myForm);
                myForm = $('#hidfrm');
                myForm.submit();
            }
            return false;
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>
    <script>
        function changeLanguage(id) {
            $('body').removeClass('loaded');
            var data = "language=" + id + '&_token=<?php echo e(csrf_token()); ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo e(Route('change_session_language')); ?>",
                data: data,
                cache: false,
                success: function(response) {
                    location.reload(true);
                },
                error: function() {
                    $('body').addClass('loaded');
                    M.toast({
                        html: 'something went wrong',
                        classes: "toast-error"
                    });
                }
            });
        }
    </script>
    <?php echo $__env->make('common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/layout/app.blade.php ENDPATH**/ ?>