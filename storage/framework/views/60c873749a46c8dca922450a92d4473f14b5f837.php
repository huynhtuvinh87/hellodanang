<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-blocks-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-inner.jpg')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8 text-center">
                            <h1 class="" data-aos="fade-up"><?php echo e(__('frontend.search.title')); ?></h1>
                            <p data-aos="fade-up" data-aos-delay="100"><?php echo e(__('frontend.search.description')); ?></p>
                        </div>
                    </div>

                    <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                        <?php echo $__env->make('frontend.partials.search.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.search.sub-title-1')); ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="row">

                        <?php if(isset($items)): ?>

                            <?php if(count($items)): ?>

                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-lg-6">

                                        <?php echo $__env->make('frontend.partials.free-item-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p><?php echo e(__('frontend.shared.no-listing')); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="row">
                        <div class="col-12 mt-5 text-center">

                            <?php if(isset($items)): ?>
                                <?php if(count($items)): ?>
                                    <?php echo e($items->links()); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="sticky-top">
                        <?php if(isset($items)): ?>
                        <div id="mapid-search"></div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>

    <script>

        $(document).ready(function(){

            <?php if(isset($items)): ?>

            var map = L.map('mapid-search', {
                //center: [40.712, -74.227],
                zoom: 15,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var bounds = [];
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                bounds.push([ <?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?> ]);
                L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            map.fitBounds(bounds);

            <?php endif; ?>
        });
    </script>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/frontend/search.blade.php ENDPATH**/ ?>