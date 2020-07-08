<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('frontend/images/placeholder/header-inner.jpg')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


        <div class="row justify-content-center mt-5">
          <div class="col-md-10 text-center">
            <h1><?php echo e(__('frontend.blog.title')); ?></h1>
            <p class="mb-0"><?php echo e(__('frontend.blog.description')); ?></p>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">

      <div class="col-md-8">

        <div class="row mb-3 align-items-stretch">

          <?php $__currentLoopData = $data['posts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <?php if(empty($post->featured_image)): ?>
              <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.jpg')); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
              <?php else: ?>
              <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(url('public' . $post->featured_image)); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
              <?php endif; ?>
              <h2 class="font-size-regular"><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>" class="text-black"><?php echo e($post->title); ?></a></h2>
              <div class="meta mb-3">
                <?php echo e(__('frontend.blog.by')); ?> <?php echo e($post->user()->get()->first()->name); ?><span class="mx-1">&bullet;</span>
                <?php echo e($post->updated_at->diffForHumans()); ?> <span class="mx-1">&bullet;</span>
                <?php if($post->topic()->get()->count() != 0): ?>
                <a href="<?php echo e(route('page.blog.topic', $post->topic()->get()->first()->slug)); ?>"><?php echo e($post->topic()->get()->first()->name); ?></a>
                <?php else: ?>
                <?php echo e(__('frontend.blog.uncategorized')); ?>

                <?php endif; ?>

              </div>
              <p><?php echo e(str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200)); ?></p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


        <div class="col-12 text-center mt-5">
          <?php echo e($data['posts']->links()); ?>


        </div>
      </div>

      <div class="col-md-3 ml-auto">

        <?php echo $__env->make('frontend.blog.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/resources/views/frontend/blog/index.blade.php ENDPATH**/ ?>