<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.item.saved-item')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.item.saved-item-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.items.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('backend.item.add-item')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?php echo e(__('backend.category.category')); ?></th>
                                <th><?php echo e(__('backend.item.title')); ?></th>
                                <th><?php echo e(__('backend.item.address')); ?></th>
                                <th><?php echo e(__('backend.city.city')); ?></th>
                                <th><?php echo e(__('backend.state.state')); ?></th>
                                <th><?php echo e(__('backend.item.featured')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.category.category')); ?></th>
                                <th><?php echo e(__('backend.item.title')); ?></th>
                                <th><?php echo e(__('backend.item.address')); ?></th>
                                <th><?php echo e(__('backend.city.city')); ?></th>
                                <th><?php echo e(__('backend.state.state')); ?></th>
                                <th><?php echo e(__('backend.item.featured')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $saved_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->category->category_name); ?></td>
                                    <td><?php echo e($item->item_title); ?></td>
                                    <td><?php echo e($item->item_address); ?></td>
                                    <td><?php echo e($item->city->city_name); ?></td>
                                    <td><?php echo e($item->state->state_name); ?></td>
                                    <td><?php echo e($item->item_featured == 1 ? 'Featured' : ''); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="btn btn-sm btn-primary mb-1 rounded-circle" target="_blank">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a class="btn btn-sm mb-1 btn-secondary rounded-circle text-white saved-item-remove-button" id="saved-item-remove-button-<?php echo e($item->id); ?>"><i class="far fa-trash-alt"></i></a>
                                        <form id="saved-item-remove-button-<?php echo e($item->id); ?>-form" action="<?php echo e(route('admin.items.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();

            $('.saved-item-remove-button').on('click', function(){
                $(this).addClass("disabled");
                $("#" + $(this).attr('id') + "-form").submit();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/backend/admin/item/saved.blade.php ENDPATH**/ ?>