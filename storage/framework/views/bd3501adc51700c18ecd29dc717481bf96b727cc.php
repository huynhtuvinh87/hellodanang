<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    
    <?php echo $__env->make('frontend.partials.tracking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo SEO::generate(); ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- favicon -->
    <?php if($site_global_settings->setting_site_favicon): ?>
        <link rel="icon" type="icon" href="<?php echo e(Storage::disk('public')->url('setting/'. $site_global_settings->setting_site_favicon)); ?>" sizes="96x96"/>
    <?php else: ?>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-16x16.ico')); ?>" sizes="16x16"/>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-32x32.ico')); ?>" sizes="32x32"/>
        <link rel="icon" type="icon" href="<?php echo e(asset('favicon-96x96.ico')); ?>" sizes="96x96"/>
    <?php endif; ?>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('backend/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <!-- Custom Style File -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/my-style-admin.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    
    <?php echo $__env->make('backend.admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            
            <?php echo $__env->make('backend.admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <?php echo $__env->make('backend.admin.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        
        <?php echo $__env->make('backend.admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?php echo e(asset('frontend/vendor/pace/pace.min.js')); ?>"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('backend/js/sb-admin-2.min.js')); ?>"></script>

<script>
    $(document).ready(function(){

        /**
         * The front-end form disable submit button UI
         */
        $("form").on("submit", function () {
            $("form :submit").attr("disabled", true);
            $("form :submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            return true;
        });

    });

</script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>


<?php /**PATH /Applications/projects/hellodanang/resources/views/backend/admin/layouts/app.blade.php ENDPATH**/ ?>