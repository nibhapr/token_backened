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
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<!-- END: Head-->

<body class="bg-gray-50">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm border-2s">
      <!-- <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" class="mx-auto h-10 w-auto" /> -->
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </div>
    <?php if($errors->has('error')): ?>
<div class="sm:mx-auto sm:w-full sm:max-w-sm border-2s">
<p class="mt-10 text-center font-normal tracking-tight text-red-400"><?php echo e($errors->first('error')); ?></p>
</div>
 <?php endif; ?>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form action="<?php echo e(route('post_login')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-sky-400 hover:text-sky-500">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-sky-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Not a member?
        <a href="#" class="font-semibold text-sky-400 hover:text-sky-500">Start a 14 day free trial</a>
      </p>
    </div>
  </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/search.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/custom/custom-script.js')); ?>"></script>
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

</html><?php /**PATH C:\Users\Milan\Desktop\Work\token_backend\resources\views/login/login.blade.php ENDPATH**/ ?>