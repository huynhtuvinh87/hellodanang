<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/vendor/flexslider/flexslider.css')); ?>" type="text/css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('frontend/images/placeholder/header-item-0.jpg')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">

            <div class="row align-items-center item-blocks-cover d-none d-md-flex d-lg-flex d-xl-flex">

                <div class="col-lg-2 col-md-2 pt-5" data-aos="fade-up" data-aos-delay="400">
                    <?php if(!empty($item->item_image_tiny)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="Image" class="img-fluid rounded">
                    <?php elseif(!empty($item->item_image)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                    <?php else: ?>
                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.jpg')); ?>" alt="Image" class="img-fluid rounded">
                    <?php endif; ?>
                </div>
                <div class="col-lg-7 col-md-5 pt-5" data-aos="fade-up" data-aos-delay="400">

                    <h1 class="item-cover-title-section"><?php echo e($item->item_title); ?></h1>
                    <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item->category->category_slug)); ?>">
                        <span class="category"><?php echo e($item->category->category_name); ?></span>
                    </a>
                    <p class="item-cover-address-section">
                        <?php if($item->item_address_hide == 0): ?>
                            <?php echo e($item->item_address); ?> <br>
                        <?php endif; ?>
                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                    </p>
                    <a class="btn btn-primary rounded text-white" id="item-share-button"><i class="fas fa-share-alt"></i> <?php echo e(__('frontend.item.share')); ?></a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                        <form id="item-save-form" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                            <a class="btn btn-warning rounded text-white" id="item-saved-button"><i class="fas fa-check"></i> <?php echo e(__('frontend.item.saved')); ?></a>
                            <form id="item-unsave-form" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                            <form id="item-save-form" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="col-lg-3 col-md-5 pt-5 pl-0 pr-0 item-cover-contact-section" data-aos="fade-up" data-aos-delay="400">
                    <?php if(!empty($item->item_phone)): ?>
                    <h3><i class="fas fa-phone-alt"></i> <?php echo e($item->item_phone); ?></h3>
                    <?php endif; ?>
                    <p>
                        <?php if(!empty($item->item_website)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_website); ?>" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_facebook)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_twitter)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_twitter); ?>" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_linkedin)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_linkedin); ?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="row align-items-center item-blocks-cover d-flex d-md-none d-lg-none d-xl-none">
                <div class="col-12 pt-5" data-aos="fade-up" data-aos-delay="400">

                    <h1 class="item-cover-title-section"><?php echo e($item->item_title); ?></h1>
                    <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item->category->category_slug)); ?>">
                        <span class="category"><?php echo e($item->category->category_name); ?></span>
                    </a>
                    <p class="item-cover-address-section">
                        <?php if($item->item_address_hide == 0): ?>
                            <?php echo e($item->item_address); ?> <br>
                        <?php endif; ?>
                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                    </p>

                    <?php if(!empty($item->item_phone)): ?>
                        <p><i class="fas fa-phone-alt"></i> <?php echo e($item->item_phone); ?></p>
                    <?php endif; ?>

                    <p>
                        <?php if(!empty($item->item_website)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_website); ?>" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_facebook)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_twitter)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_twitter); ?>" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_linkedin)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_linkedin); ?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                    </p>

                    <a class="btn btn-primary rounded text-white" id="item-share-button"><i class="fas fa-share-alt"></i> <?php echo e(__('frontend.item.share')); ?></a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                        <form id="item-save-form" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                            <a class="btn btn-warning rounded text-white" id="item-saved-button"><i class="fas fa-check"></i> <?php echo e(__('frontend.item.saved')); ?></a>
                            <form id="item-unsave-form" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                            <form id="item-save-form" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <?php echo $__env->make('backend.admin.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row mb-5">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.item.all-categories')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.category', $item->category->category_slug)); ?>"><?php echo e($item->category->category_name); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.category.state', ['category_slug'=>$item->category->category_slug, 'state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.category.state.city', ['category_slug'=>$item->category->category_slug, 'state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($item->item_title); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="mb-4">

                        <div class="flexslider">
                            <ul class="slides">

                                <?php if(count($item->galleries) > 0): ?>
                                    <?php $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li data-thumb="<?php echo e(Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name)); ?>">
                                            <img src="<?php echo e(Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name)); ?>" alt="Image" class="img-fluid rounded">
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php if(empty($item->item_image)): ?>
                                        <li data-thumb="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.jpg')); ?>">
                                            <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.jpg')); ?>" alt="Image" class="img-fluid rounded">
                                        </li>
                                    <?php else: ?>
                                        <li data-thumb="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>">
                                            <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>

                    <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.description')); ?></h4>
                    <p><?php echo clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>

                    <h4 class="h5 mb-4 mt-4 text-black"><?php echo e(__('frontend.item.location')); ?></h4>
                    <div class="row pt-2 pb-2">
                        <div class="col-12">
                            <div id="mapid-item"></div>
                            <small>
                                <?php if($item->item_address_hide == 0): ?>
                                    <?php echo e($item->item_address); ?>

                                <?php endif; ?>
                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                            </small>
                        </div>
                    </div>

                    <h4 class="h5 mb-4 mt-4 text-black"><?php echo e(__('frontend.item.features')); ?></h4>
                    <?php $__currentLoopData = $item->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row pt-2 pb-2 <?php echo e($key%2 == 0 ? 'bg-light' : ''); ?>">
                            <div class="col-3">
                                <?php echo e($feature->customField->custom_field_name); ?>

                            </div>

                            <div class="col-9">
                                <?php if($feature->item_feature_value): ?>
                                    <?php if($feature->customField->custom_field_type == \App\CustomField::TYPE_LINK): ?>
                                        <a target="_blank" rel=”nofollow” href="<?php echo e($feature->item_feature_value); ?>"><?php echo e(parse_url($feature->item_feature_value)['host']); ?></a>

                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT): ?>
                                        <?php if(count(explode(',', $feature->item_feature_value))): ?>

                                            <?php $__currentLoopData = explode(',', $feature->item_feature_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="review"><?php echo e($value); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>
                                            <?php echo e($feature->item_feature_value); ?>

                                        <?php endif; ?>

                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_SELECT): ?>
                                        <?php echo e($feature->item_feature_value); ?>


                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_TEXT): ?>
                                        <?php echo clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>



                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <h4 class="h5 mb-4 mt-4 text-black"><?php echo e(__('frontend.item.comments')); ?></h4>
                        <?php echo $__env->make('comments::components.comments', [
                            'model' => $item,
                            'approved' => true,
                            'perPage' => 10
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <h4 class="h5 mb-4 mt-4 text-black"><?php echo e(__('frontend.item.share')); ?></h4>
                    <div class="row">
                        <div class="col-12">

                            <!-- Create link with share to Facebook -->
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="facebook">
                                <i class="fab fa-facebook-f"></i>
                                <?php echo e(__('social_share.facebook')); ?>

                            </a>

                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="twitter">
                                <i class="fab fa-twitter"></i>
                                <?php echo e(__('social_share.twitter')); ?>

                            </a>

                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <?php echo e(__('social_share.linkedin')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="blogger">
                                <i class="fab fa-blogger-b"></i>
                                <?php echo e(__('social_share.blogger')); ?>

                            </a>

                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="pinterest">
                                <i class="fab fa-pinterest-p"></i>
                                <?php echo e(__('social_share.pinterest')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="evernote">
                                <i class="fab fa-evernote"></i>
                                <?php echo e(__('social_share.evernote')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="reddit">
                                <i class="fab fa-reddit-alien"></i>
                                <?php echo e(__('social_share.reddit')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="buffer">
                                <i class="fab fa-buffer"></i>
                                <?php echo e(__('social_share.buffer')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wordpress">
                                <i class="fab fa-wordpress-simple"></i>
                                <?php echo e(__('social_share.wordpress')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="weibo">
                                <i class="fab fa-weibo"></i>
                                <?php echo e(__('social_share.weibo')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="skype">
                                <i class="fab fa-skype"></i>
                                <?php echo e(__('social_share.skype')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="telegram">
                                <i class="fab fa-telegram-plane"></i>
                                <?php echo e(__('social_share.telegram')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="viber">
                                <i class="fab fa-viber"></i>
                                <?php echo e(__('social_share.viber')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <?php echo e(__('social_share.whatsapp')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wechat">
                                <i class="fab fa-weixin"></i>
                                <?php echo e(__('social_share.wechat')); ?>

                            </a>
                            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="line">
                                <i class="fab fa-line"></i>
                                <?php echo e(__('social_share.line')); ?>

                            </a>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3 ml-auto">

                    <div class="sticky-top pt-3">

                        <div class="row mb-4 align-items-center">
                            <div class="col-4">
                                <?php if(empty($item->user->user_image)): ?>
                                    <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                                <?php else: ?>

                                    <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                <?php endif; ?>
                            </div>
                            <div class="col-8 pl-0">
                                <span class="font-size-13"><?php echo e($item->user->name); ?></span><br/>
                                <span class="font-size-13">Posted <?php echo e($item->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-12">

                                <?php if(Auth::check()): ?>

                                    <?php if(Auth::user()->id != $item->user_id): ?>
                                        <?php if(Auth::user()->isAdmin()): ?>
                                            <a href="<?php echo e(route('admin.messages.create', ['item'=>$item->id])); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.send-message')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('user.messages.create', ['item'=>$item->id])); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.send-message')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <a href="<?php echo e(route('user.messages.create', ['item'=>$item->id])); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.send-message')); ?></a>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php echo $__env->make('frontend.partials.search.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php if($similar_items->count() > 0): ?>
    <div class="site-section bg-light">
        <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.item.similar-listings')); ?></h2>
            </div>
        </div>
        <div class="row mt-5">

            <?php $__currentLoopData = $similar_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $similar_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="d-block d-md-flex listing">
                        <a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($similar_item->item_image_small) ? Storage::disk('public')->url('item/' . $similar_item->item_image_small) : (!empty($similar_item->item_image) ? Storage::disk('public')->url('item/' . $similar_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg'))); ?>)"></a>
                        <div class="lh-content">
                            <a href="<?php echo e(route('page.category', $similar_item->category->category_slug)); ?>">
                                <span class="category"><?php echo e($similar_item->category->category_name); ?></span>
                            </a>

                            <h3><a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>"><?php echo e($similar_item->item_title); ?></a></h3>
                            <address>
                                <a href="<?php echo e(route('page.city', ['state_slug'=>$similar_item->state->state_slug, 'city_slug'=>$similar_item->city->city_slug])); ?>"><?php echo e($similar_item->city->city_name); ?></a>,
                                <a href="<?php echo e(route('page.state', ['state_slug'=>$similar_item->state->state_slug])); ?>"><?php echo e($similar_item->state->state_name); ?></a>
                            </address>

                            <div class="row">
                                <div class="col-2 pr-0">
                                    <?php if(empty($similar_item->user->user_image)): ?>
                                        <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($similar_item->user->id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                                    <?php else: ?>

                                        <img src="<?php echo e(Storage::disk('public')->url('user/' . $similar_item->user->user_image)); ?>" alt="<?php echo e($similar_item->user->name); ?>" class="img-fluid rounded-circle">
                                    <?php endif; ?>
                                </div>
                                <div class="col-10 line-height-1-2">

                                    <div class="row pb-1">
                                        <div class="col-12">
                                            <span class="font-size-13"><?php echo e($similar_item->user->name); ?></span>
                                        </div>
                                    </div>
                                    <div class="row line-height-1-0">
                                        <div class="col-12">
                                            <?php if($similar_item->totalComments() > 1): ?>
                                                <span class="review"><?php echo e($similar_item->totalComments() . ' comments'); ?></span>
                                            <?php elseif($similar_item->totalComments() == 1): ?>
                                                <span class="review"><?php echo e($similar_item->totalComments() . ' comment'); ?></span>
                                            <?php endif; ?>
                                            <span class="review"><?php echo e($similar_item->created_at->diffForHumans()); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    </div>
    <?php endif; ?>

    <?php if($nearby_items->count() > 0): ?>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 text-left border-primary">
                    <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.item.nearby-listings')); ?></h2>
                </div>
            </div>
            <div class="row mt-5">

                <?php $__currentLoopData = $nearby_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nearby_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <div class="d-block d-md-flex listing">
                            <a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($nearby_item->item_image_small) ? Storage::disk('public')->url('item/' . $nearby_item->item_image_small) : (!empty($nearby_item->item_image) ? Storage::disk('public')->url('item/' . $nearby_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg'))); ?>)"></a>
                            <div class="lh-content">
                                <a href="<?php echo e(route('page.category', $nearby_item->category->category_slug)); ?>">
                                    <span class="category"><?php echo e($nearby_item->category->category_name); ?></span>
                                </a>

                                <h3><a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>"><?php echo e($nearby_item->item_title); ?></a></h3>
                                <address>
                                    <a href="<?php echo e(route('page.city', ['state_slug'=>$nearby_item->state->state_slug, 'city_slug'=>$nearby_item->city->city_slug])); ?>"><?php echo e($nearby_item->city->city_name); ?></a>,
                                    <a href="<?php echo e(route('page.state', ['state_slug'=>$nearby_item->state->state_slug])); ?>"><?php echo e($nearby_item->state->state_name); ?></a>
                                </address>

                                <div class="row">
                                    <div class="col-2 pr-0">
                                        <?php if(empty($nearby_item->user->user_image)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($nearby_item->user->id % 10) . '.jpg')); ?>" alt="Image" class="img-fluid rounded-circle">
                                        <?php else: ?>

                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . $nearby_item->user->user_image)); ?>" alt="<?php echo e($nearby_item->user->name); ?>" class="img-fluid rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-10 line-height-1-2">

                                        <div class="row pb-1">
                                            <div class="col-12">
                                                <span class="font-size-13"><?php echo e($nearby_item->user->name); ?></span>
                                            </div>
                                        </div>
                                        <div class="row line-height-1-0">
                                            <div class="col-12">
                                                <?php if($nearby_item->totalComments() > 1): ?>
                                                    <span class="review"><?php echo e($nearby_item->totalComments() . ' comments'); ?></span>
                                                <?php elseif($nearby_item->totalComments() == 1): ?>
                                                    <span class="review"><?php echo e($nearby_item->totalComments() . ' comment'); ?></span>
                                                <?php endif; ?>
                                                <span class="review"><?php echo e($nearby_item->created_at->diffForHumans()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>

<!-- Modal - share -->
<div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('frontend.item.share-listing')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">

                        <p><?php echo e(__('frontend.item.share-listing-social-media')); ?></p>

                        <!-- Create link with share to Facebook -->
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="facebook">
                            <i class="fab fa-facebook-f"></i>
                            <?php echo e(__('social_share.facebook')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="twitter">
                            <i class="fab fa-twitter"></i>
                            <?php echo e(__('social_share.twitter')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                            <?php echo e(__('social_share.linkedin')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="blogger">
                            <i class="fab fa-blogger-b"></i>
                            <?php echo e(__('social_share.blogger')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="pinterest">
                            <i class="fab fa-pinterest-p"></i>
                            <?php echo e(__('social_share.pinterest')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="evernote">
                            <i class="fab fa-evernote"></i>
                            <?php echo e(__('social_share.evernote')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="reddit">
                            <i class="fab fa-reddit-alien"></i>
                            <?php echo e(__('social_share.reddit')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="buffer">
                            <i class="fab fa-buffer"></i>
                            <?php echo e(__('social_share.buffer')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wordpress">
                            <i class="fab fa-wordpress-simple"></i>
                            <?php echo e(__('social_share.wordpress')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="weibo">
                            <i class="fab fa-weibo"></i>
                            <?php echo e(__('social_share.weibo')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="skype">
                            <i class="fab fa-skype"></i>
                            <?php echo e(__('social_share.skype')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="telegram">
                            <i class="fab fa-telegram-plane"></i>
                            <?php echo e(__('social_share.telegram')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="viber">
                            <i class="fab fa-viber"></i>
                            <?php echo e(__('social_share.viber')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            <?php echo e(__('social_share.whatsapp')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wechat">
                            <i class="fab fa-weixin"></i>
                            <?php echo e(__('social_share.wechat')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="line">
                            <i class="fab fa-line"></i>
                            <?php echo e(__('social_share.line')); ?>

                        </a>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo e(__('frontend.item.share-listing-email')); ?></p>
                        <?php if(!Auth::check()): ?>
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e(__('frontend.item.login-require')); ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('page.item.email', ['item_slug' => $item->item_slug])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-row mb-3">
                                <div class="col-md-4">
                                    <label for="item_share_email_name" class="text-black"><?php echo e(__('frontend.item.name')); ?></label>
                                    <input id="item_share_email_name" type="text" class="form-control <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_name" value="<?php echo e(old('item_share_email_name')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="item_share_email_from_email" class="text-black"><?php echo e(__('frontend.item.email')); ?></label>
                                    <input id="item_share_email_from_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_from_email" value="<?php echo e(old('item_share_email_from_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="item_share_email_to_email" class="text-black"><?php echo e(__('frontend.item.email-to')); ?></label>
                                    <input id="item_share_email_to_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_to_email" value="<?php echo e(old('item_share_email_to_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12">
                                    <label for="item_share_email_note" class="text-black"><?php echo e(__('frontend.item.add-note')); ?></label>
                                    <textarea class="form-control <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="item_share_email_note" rows="3" name="item_share_email_note" <?php echo e(Auth::check() ? '' : 'disabled'); ?>><?php echo e(old('item_share_email_note')); ?></textarea>
                                    <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tooltip">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary py-2 px-4 text-white rounded" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                        <?php echo e(__('frontend.item.send-email')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/vendor/flexslider/jquery.flexslider-min.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/vendor/goodshare/goodshare.min.js')); ?>"></script>

    <script>
        $(document).ready(function(){

            /**
             * Start initial map
             */
            var map = L.map('mapid-item', {
                center: [<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>],
                zoom: 13,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map);
            /**
             * End initial map
             */

            /**
             * Start initial slider
             */
            $('.flexslider').flexslider({
                animation: "slide"
            });
            /**
             * End initial slider
             */

            $('#item-share-button').on('click', function(){
                $('#share-modal').modal('show');
            });

            <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            $('#item-save-button').on('click', function(){
                $("#item-save-button").addClass("disabled");
                $("#item-save-form").submit();
            });

            $('#item-saved-button').on('click', function(){
                $("#item-saved-button").off("mouseenter");
                $("#item-saved-button").off("mouseleave");
                $("#item-saved-button").addClass("disabled");
                $("#item-unsave-form").submit();
            });

            $("#item-saved-button").on('mouseenter', function(){
                $("#item-saved-button").attr("class", "btn btn-danger rounded text-white");
                $("#item-saved-button").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button").on('mouseleave', function(){
                $("#item-saved-button").attr("class", "btn btn-warning rounded text-white");
                $("#item-saved-button").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });

        });
    </script>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/frontend/item.blade.php ENDPATH**/ ?>