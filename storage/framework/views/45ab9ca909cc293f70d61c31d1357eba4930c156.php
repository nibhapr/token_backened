<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="ASTIN Admin template">
    <meta name="author" content="ThemeSelect">
    <!-- <meta name="_token" content="<?php echo csrf_token(); ?>" /> -->
    <title>Digiimpact</title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/vendors.min.css')); ?>">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/login.css')); ?>">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/custom/custom.css')); ?>">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column    blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column" style="background-color: #ffffff;">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                        <?php if($errors->has('error')): ?>
                        <div class="card-alert card red lighten-5">
                            <div class="card-content red-text">
                                <p><?php echo e($errors->first('error')); ?></p>
                            </div>
                            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <?php endif; ?>
                       
                        <form id="login_form" class="login-form" method="post" action="<?php echo e(route('post_login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="input-field col s12 offset-m4">
                                    <h5 class="ml-4" style="font-weight: 800;">Digiimpact</h5>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="email" type="text" name="email" value="<?php echo e(old('email')); ?>">
                                    <label for="email" class="form-control form-control-lg">Email</label>
                                </div>
                            </div>
          

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" name="password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12 ml-2 mt-1">
                                    <p>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Remember Me</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12" style="display: flex; justify-content: center;">
                                    <button type="submit" class="btn waves-effect waves-light   col s6">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo e(asset('app-assets/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/search.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/custom/custom-script.js')); ?>"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <!-- validation -->
    <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script>
        $(function() {
            $('#login_form').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    email: {
                        required: "Please enter the email",
                        email: "enter your correct email address"
                    },
                    password: {
                        required: "Please enter the password",
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
        $(".card-alert .close").click(function() {
            $(this)
                .closest(".card-alert")
                .fadeOut("slow");
        });
    </script>
</body>

</html><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/login/login.blade.php ENDPATH**/ ?>