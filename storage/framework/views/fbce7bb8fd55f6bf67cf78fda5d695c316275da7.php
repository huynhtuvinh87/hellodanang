<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.custom-field.add-custom-field')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.custom-field.add-custom-field-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.custom-fields.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text"><?php echo e(__('backend.shared.back')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="<?php echo e(route('admin.custom-fields.store')); ?>" class="p-5">
                        <?php echo csrf_field(); ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="custom_field_name" class="text-black"><?php echo e(__('backend.custom-field.custom-field-name')); ?></label>
                                <input id="custom_field_name" type="text" class="form-control <?php $__errorArgs = ['custom_field_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="custom_field_name" value="<?php echo e(old('custom_field_name')); ?>" autofocus>
                                <?php $__errorArgs = ['custom_field_name'];
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

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="custom_field_type"><?php echo e(__('backend.custom-field.custom-field-type')); ?></label>

                                <select class="custom-select" name="custom_field_type">
                                    <option value="<?php echo e(\App\CustomField::TYPE_STRING); ?>" <?php echo e(old('custom_field_type') == \App\CustomField::TYPE_STRING ? 'selected' : ''); ?>><?php echo e(__('backend.custom-field.string')); ?></option>
                                    <option value="<?php echo e(\App\CustomField::TYPE_TEXT); ?>" <?php echo e(old('custom_field_type') == \App\CustomField::TYPE_TEXT ? 'selected' : ''); ?>><?php echo e(__('backend.custom-field.text')); ?></option>
                                    <option value="<?php echo e(\App\CustomField::TYPE_SELECT); ?>" <?php echo e(old('custom_field_type') == \App\CustomField::TYPE_SELECT ? 'selected' : ''); ?>><?php echo e(__('backend.custom-field.select')); ?></option>
                                    <option value="<?php echo e(\App\CustomField::TYPE_MULTI_SELECT); ?>" <?php echo e(old('custom_field_type') == \App\CustomField::TYPE_MULTI_SELECT ? 'selected' : ''); ?>><?php echo e(__('backend.custom-field.multi-select')); ?></option>
                                    <option value="<?php echo e(\App\CustomField::TYPE_LINK); ?>" <?php echo e(old('custom_field_type') == \App\CustomField::TYPE_LINK ? 'selected' : ''); ?>><?php echo e(__('backend.custom-field.link')); ?></option>
                                </select>
                                <?php $__errorArgs = ['custom_field_type'];
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

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="custom_field_seed_value"><?php echo e(__('backend.custom-field.custom-field-seed-value')); ?></label>
                                <input id="custom_field_seed_value" type="text" class="form-control <?php $__errorArgs = ['custom_field_seed_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="custom_field_seed_value" value="<?php echo e(old('custom_field_seed_value')); ?>" aria-describedby="seedValueHelpBlock">
                                <small id="seedValueHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('backend.custom-field.custom-field-seed-value-help')); ?>

                                </small>
                                <?php $__errorArgs = ['custom_field_seed_value'];
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

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="custom_field_order"><?php echo e(__('backend.custom-field.custom-field-order')); ?></label>
                                <input id="custom_field_order" type="number" min="0" class="form-control <?php $__errorArgs = ['custom_field_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="custom_field_order" value="<?php echo e(old('custom_field_order')); ?>">
                                <?php $__errorArgs = ['custom_field_order'];
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

                        <div class="row form-group mb-5">

                            <div class="col-md-12">
                                <label class="text-black" for=""><?php echo e(__('backend.custom-field.categories')); ?></label><br>
                                <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input <?php echo e(in_array($category->id, old('category') ? old('category') : array()) ? 'checked' : ''); ?> class="form-check-input" type="checkbox" id="<?php echo e($category->category_slug); ?>" name="category[]" value="<?php echo e($category->id); ?>">
                                        <label class="form-check-label" for="<?php echo e($category->category_slug); ?>"><?php echo e($category->category_name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__errorArgs = ['category'];
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


                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('backend.shared.create')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/resources/views/backend/admin/custom-field/create.blade.php ENDPATH**/ ?>