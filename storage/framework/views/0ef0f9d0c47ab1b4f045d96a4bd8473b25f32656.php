<form action="<?php echo e(route('page.search.do')); ?>" method="GET">
  <div class="row align-items-center">
    <div class="col-lg-12 mb-8 mb-xl-0 col-xl-7">
      <input name="search_query" type="text" class="form-control rounded <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '')); ?>" placeholder="<?php echo e(__('frontend.search.what-are-you-looking-for')); ?>">
      <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="invalid-tooltip">
        <?php echo e($message); ?>

      </div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <!-- <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
            <div id="multiple-datasets" class="wrap-icon">
                <span class="icon icon-room z-index-1000"></span>
                <input name="city_state" type="text" class="form-control rounded typeahead <?php $__errorArgs = ['city_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('city_state') ? old('city_state') : (isset($last_search_city_state) ? $last_search_city_state : '')); ?>" placeholder="<?php echo e(__('frontend.search.state-or-city')); ?>" aria-describedby="basic-addon1">
                <?php $__errorArgs = ['city_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-tooltip state-city-invalid-tooltip">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div> -->
    <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
      <div class="select-wrap">
        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
        <select class="form-control rounded <?php $__errorArgs = ['categories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="categories">
          <option value="0"><?php echo e(__('frontend.search.all-categories')); ?></option>
          <?php $__currentLoopData = $search_all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option <?php echo e($category->id == (old('categories') ? old('categories') : (isset($last_search_category) ? $last_search_category : 0)) ? 'selected' : ''); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['categories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-tooltip">
          <?php echo e($message); ?>

        </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
    <div class="col-lg-12 col-xl-2 ml-auto text-right">
      <input type="submit" class="btn btn-primary btn-block bg-default br-default rounded text-white" value="<?php echo e(__('frontend.search.search')); ?>">
    </div>

  </div>
</form><?php /**PATH /Applications/projects/hellodanang/resources/views/frontend/partials/search/head.blade.php ENDPATH**/ ?>