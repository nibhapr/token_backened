<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>JL Token| Installer</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('app-assets/installer/img/favicon/favicon-16x16.png')); ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('app-assets/installer/img/favicon/favicon-32x32.png')); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('app-assets/installer/img/favicon/favicon-96x96.png')); ?>" sizes="96x96" />
    <link href="<?php echo e(asset('app-assets/installer/css/style.min.css')); ?>" rel="stylesheet" />
    <style>
        .loader {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 2s linear infinite;
            margin: 0 auto;
        }

        @keyframes  spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        [v-cloak] {
            display: none;
        }
    </style>
    <?php echo $__env->yieldContent('style'); ?>
    <script>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
</head>

<body>
    <div class="master">
        <div class="box">
            <div class="header">
                <h1 class="header__title"><?php echo $__env->yieldContent('title'); ?></h1>
            </div>
            <div class="main" id="installer" v-cloak>
            <?php echo $__env->yieldContent('container'); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->yieldContent('b-script'); ?>
    <script src="<?php echo e(asset('public/js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <script type="text/javascript">
        var x = document.getElementById('error_alert');
        var y = document.getElementById('close_alert');
        if (y) {
            y.onclick = function() {
                x.style.display = "none";
            };
        }
    </script>
</body>

</html><?php /**PATH /Users/milan/Desktop/Apps/token_backend/resources/views/vendor/installer/layouts/master.blade.php ENDPATH**/ ?>