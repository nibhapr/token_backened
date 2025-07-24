<!DOCTYPE html>
<html class="loading" data-textdirection="<?php echo e(\App::currentLocale() == 'sa' ? 'rtl' : 'ltr'); ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if(Route::current()->getName() == 'issue_token'): ?>
  <title>Kiosk</title>
  <?php elseif(Route::current()->getName() == 'display'): ?>
  <title>Display</title>
  <?php else: ?>
  <title>Digiimpact</title>
  <?php endif; ?>
  <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/vendors.min.css')); ?>">
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
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
  <?php echo $__env->yieldContent('css'); ?>
 
</head>
<body id="page-layout-body" class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns ">

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->yieldContent('b-js'); ?>
<script src="<?php echo e(asset('app-assets/js/loader/modernizr-2.6.2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/plugins.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/voice.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>

</body>


</html>    <?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/layout/live_page.blade.php ENDPATH**/ ?>