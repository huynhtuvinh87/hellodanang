<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-9 mb-3">
        <div class="row">
          <div class="col-md-6">
            <h2 class="footer-heading mb-4"><?php echo e(__('frontend.footer.about')); ?></h2>
            <p><?php echo e($site_global_settings->setting_site_about); ?></p>
          </div>

          <div class="col-md-3">
            <h2 class="footer-heading mb-4"><?php echo e(__('frontend.footer.navigations')); ?></h2>
            <ul class="list-unstyled">
              <li><a href="<?php echo e(route('page.about')); ?>"><?php echo e(__('frontend.footer.about-us')); ?></a></li>
              <li><a href="<?php echo e(route('page.contact')); ?>"><?php echo e(__('frontend.footer.contact-us')); ?></a></li>
              <?php if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED): ?>
              <li><a href="<?php echo e(route('page.terms-of-service')); ?>"><?php echo e(__('frontend.footer.terms-of-service')); ?></a></li>
              <?php endif; ?>
              <?php if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED): ?>
              <li><a href="<?php echo e(route('page.privacy-policy')); ?>"><?php echo e(__('frontend.footer.privacy-policy')); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4"><?php echo e(__('frontend.footer.follow-us')); ?></h2>
            <?php $__currentLoopData = \App\SocialMedia::orderBy('social_media_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social_media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($social_media->social_media_link); ?>" class="pl-0 pr-3">
              <i class="<?php echo e($social_media->social_media_icon); ?>"></i>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <h2 class="footer-heading mb-4"><?php echo e(__('frontend.footer.posts')); ?></h2>
        <ul class="list-unstyled">
          <?php $__currentLoopData = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>
    <div class="row pt-2 mt-5 text-center">
      <div class="col-md-12">
        <div class="border-top pt-3">
          <p>
            <?php echo e(__('frontend.footer.copyright')); ?> &copy; <?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?>

            <script>
              document.write(new Date().getFullYear());
            </script> <?php echo e(__('frontend.footer.rights-reserved')); ?>

          </p>
        </div>
      </div>

    </div>
  </div>
</footer><?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>