<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    
    <?php echo $__env->make('frontend.partials.tracking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo SEO::generate(); ?>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <?php if($site_global_settings->setting_site_favicon): ?>
        <link rel="icon" type="icon" href="<?php echo e(Storage::disk('public')->url('setting/'. $site_global_settings->setting_site_favicon)); ?>" sizes="96x96"/>
    <?php else: ?>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-16x16.ico')); ?>" sizes="16x16"/>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-32x32.ico')); ?>" sizes="32x32"/>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-96x96.ico')); ?>" sizes="96x96"/>
    <?php endif; ?>

    <!-- font awesome free icons -->
    <link href="<?php echo e(asset('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/icomoon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/flaticon/font/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/rangeslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <!-- Custom Style File -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/my-style.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

<div class="site-wrap">

    
    <?php echo $__env->make('frontend.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('content'); ?>

    
    <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script src="<?php echo e(asset('frontend/vendor/pace/pace.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/rangeslider.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>


<script>
    $(document).ready(function(){

        /**
         * The front-end form disable submit button UI
         */
        $("form").on("submit", function () {
            $("form :submit").attr("disabled", true);
            return true;
        });

    });
</script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>


<?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>