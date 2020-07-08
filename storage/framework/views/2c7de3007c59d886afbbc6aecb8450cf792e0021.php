<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="site-blocks-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-1.jpg')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-12">


        <div class="row justify-content-center mb-4">
          <div class="col-md-10 text-center">
            <h1 class="" data-aos="fade-up"><?php echo e(__('frontend.homepage.title')); ?></h1>
            <p data-aos="fade-up" data-aos-delay="100"><?php echo e(__('frontend.homepage.description')); ?></p>
          </div>
        </div>

        <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
          <?php echo $__env->make('frontend.partials.search.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">

    <div class="overlap-category mb-5">
      <div class="row align-items-stretch no-gutters">

        <?php if(count($categories)): ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <a href="<?php echo e(route('page.category', $category->category_slug)); ?>" class="popular-category h-100">

            <?php if($category->category_icon): ?>
            <span class="icon"><span><i class="<?php echo e($category->category_icon); ?>"></i></span></span>
            <?php else: ?>
            <span class="icon"><span><i class="fas fa-heart"></i></span></span>
            <?php endif; ?>
            <span class="caption mb-2 d-block"><?php echo e($category->category_name); ?></span>
            <span class="number"><?php echo e(number_format($category->items_count)); ?></span>
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <a href="<?php echo e(route('page.categories')); ?>" class="popular-category h-100">

            <span class="icon"><span><i class="fas fa-th"></i></span></span>
            <span class="caption mb-2 d-block"><?php echo e(__('frontend.homepage.all-categories')); ?></span>
            <span class="number"><?php echo e(number_format($total_items_count)); ?></span>
          </a>
        </div>
        <?php else: ?>
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <p><?php echo e(__('frontend.homepage.no-categories')); ?></p>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h2 class="h5 mb-4 text-black"><?php echo e(__('frontend.homepage.featured-ads')); ?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12  block-13">
        <div class="owl-carousel nonloop-block-13">

          <?php if(count($paid_items)): ?>
          <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="d-block d-md-flex listing vertical">
            <a href="<?php echo e(url($item->item_slug.'-'.$item->id)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($item->item_image_small) ? Storage::disk('public')->url('item/' . $item->item_image_small) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg'))); ?>)"></a>
            <div class="lh-content">
              <a href="<?php echo e(route('page.category', $item->category_slug)); ?>">
                <span class="category"><?php echo e($item->category_name); ?></span>
              </a>

              <h3><a href="<?php echo e(url($item->item_slug.'-'.$item->id)); ?>"><?php echo e(str_limit($item->item_title, 44, '...')); ?></a></h3>
              <address>
                <a href="<?php echo e(route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug])); ?>"><?php echo e($item->city_name); ?></a>
              </address>

              <div class="row">
                <div class="col-3 pr-1">
                  <?php if(empty($item->user_image)): ?>
                  <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                  <?php else: ?>

                  <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user_image)); ?>" alt="<?php echo e($item->fullname); ?>" class="img-fluid rounded-circle">
                  <?php endif; ?>
                </div>
                <div class="col-9 line-height-1-2">

                  <div class="row pb-1">
                    <div class="col-12">
                      <span class="font-size-13"><?php echo e($item->fullname); ?></span>
                    </div>
                  </div>
                  <div class="row line-height-1-0">
                    <div class="col-12">
                      <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="d-block d-md-flex listing vertical">
            No featured listings
          </div>
          <?php endif; ?>

        </div>
      </div>


    </div>
  </div>
</div>

<div class="site-section" data-aos="fade">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-default"><?php echo e(__('frontend.homepage.nearby-listings')); ?></h2>
        <p class="color-black-opacity-5"><?php echo e(__('frontend.homepage.popular-listings')); ?></p>
      </div>
    </div>

    <div class="row">

      <?php if(count($popular_items)): ?>
      <?php $__currentLoopData = $popular_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

        <div class="listing-item listing">
          <div class="listing-image">
            <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg'))); ?>" alt="Image" class="img-fluid">
          </div>
          <div class="listing-item-content">
            <a class="px-3 mb-3 category" href="<?php echo e(route('page.category', $item->category_slug)); ?>"><?php echo e($item->category_name); ?></a>
            <h2 class="mb-1"><a href="<?php echo e(url( $item->item_slug.'-'.$item->id)); ?>"><?php echo e($item->item_title); ?></a></h2>
            <span class="address">
              <a href="<?php echo e(route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug])); ?>"><?php echo e($item->city_name); ?></a>
            </span>

            <div class="row mt-1">
              <div class="col-2 pr-0">
                <?php if(empty($item->user_image)): ?>
                <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                <?php else: ?>

                <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user_image)); ?>" alt="<?php echo e($item->fullname); ?>" class="img-fluid rounded-circle">
                <?php endif; ?>
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13"><?php echo e($item->fullname); ?></span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-7 text-left border-primary">
        <h2 class="font-weight-light text-default"><?php echo e(__('frontend.homepage.recent-listings')); ?></h2>
      </div>
    </div>
    <div class="row mt-5">

      <?php if(count($latest_items)): ?>
      <?php $__currentLoopData = $latest_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-6">
        <div class="d-block d-md-flex listing">
          <a href="<?php echo e(url( $item->item_slug.'-'.$item->id)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($item->item_image_small) ? Storage::disk('public')->url('item/' . $item->item_image_small) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg'))); ?>)"></a>
          <div class="lh-content">
            <a href="<?php echo e(route('page.category', $item->category_slug)); ?>">
              <span class="category"><?php echo e($item->category_name); ?></span>
            </a>

            <h3><a href="<?php echo e(url($item->item_slug.'-'.$item->id)); ?>"><?php echo e($item->item_title); ?></a></h3>
            <address>
              <a href="<?php echo e(route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug])); ?>"><?php echo e($item->city_name); ?></a>
            </address>

            <div class="row">
              <div class="col-2 pr-0">
                <?php if(empty($item->user_image)): ?>
                <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                <?php else: ?>

                <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user_image)); ?>" alt="<?php echo e($item->fullname); ?>" class="img-fluid rounded-circle">
                <?php endif; ?>
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13"><?php echo e($item->fullname); ?></span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if(count($all_testimonials)): ?>
<div class="site-section bg-white">
  <div class="container">

    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.testimonials')); ?></h2>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <?php $__currentLoopData = $all_testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div>
        <div class="testimonial">
          <figure class="mb-4">
            <?php if(empty($testimonial->testimonial_image)): ?>
            <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($testimonial->id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid mb-3">
            <?php else: ?>
            <img src="<?php echo e(Storage::disk('public')->url('testimonial/' . $testimonial->testimonial_image)); ?>" alt="Image" class="img-fluid mb-3">
            <?php endif; ?>
            <p>
              <?php echo e($testimonial->testimonial_name); ?>

              <?php if($testimonial->testimonial_job_title): ?>
              <?php echo e('• ' . $testimonial->testimonial_job_title); ?>

              <?php endif; ?>
              <?php if($testimonial->testimonial_company): ?>
              <?php echo e('of ' . $testimonial->testimonial_company); ?>

              <?php endif; ?>
            </p>
          </figure>
          <blockquote>
            <p><?php echo e($testimonial->testimonial_description); ?></p>
          </blockquote>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>
</div>
<?php endif; ?>


<?php if(count($recent_blog)): ?>
<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.our-blog')); ?></h2>
        <p class="color-black-opacity-5"><?php echo e(__('frontend.homepage.our-blog-decr')); ?></p>
      </div>
    </div>
    <div class="row mb-3 align-items-stretch">

      <?php $__currentLoopData = $recent_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <div class="h-entry">
          <?php if(empty($post->featured_image)): ?>
          <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
          <?php else: ?>
          <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(url('laravel_project/public' . $post->featured_image)); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
          <?php endif; ?>
          <h2 class="font-size-regular"><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>" class="text-black"><?php echo e($post->title); ?></a></h2>
          <div class="meta mb-3">
            by <?php echo e($post->user()->get()->first()->name); ?><span class="mx-1">&bullet;</span> <?php echo e($post->updated_at->diffForHumans()); ?> <span class="mx-1">&bullet;</span>
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

      <div class="col-12 text-center mt-4">
        <a href="<?php echo e(route('page.blog')); ?>" class="btn btn-primary rounded py-2 px-4 text-white"><?php echo e(__('frontend.homepage.all-posts')); ?></a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
  $(document).ready(function() {

    /**
     * Start get user lat & lng location
     */

    function success(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      console.log("Latitude: " + latitude + ", Longitude: " + longitude);

      var ajax_url = '/ajax/location/save/' + latitude + '/' + longitude;

      console.log(ajax_url);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: ajax_url,
        method: 'post',
        data: {},
        success: function(result) {
          console.log(result);
        }
      });
    }

    function error() {
      console.log("Unable to retrieve your location");
    }

    if (!navigator.geolocation) {

      console.log("Geolocation is not supported by your browser");
    } else {

      console.log("Locating ...");
      navigator.geolocation.getCurrentPosition(success, error);
    }
    /**
     * End get user lat & lng location
     */

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/resources/views/frontend/index.blade.php ENDPATH**/ ?>