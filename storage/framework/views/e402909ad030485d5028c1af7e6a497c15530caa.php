<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.user.user')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.user.user-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('backend.user.add-user')); ?></span>
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
                                <th><?php echo e(__('backend.user.id')); ?></th>
                                <th><?php echo e(__('backend.user.name')); ?></th>
                                <th><?php echo e(__('backend.user.email')); ?></th>
                                <th><?php echo e(__('backend.user.email-verified')); ?></th>
                                <th><?php echo e(__('backend.user.role')); ?></th>
                                <th><?php echo e(__('backend.user.created-at')); ?></th>
                                <th><?php echo e(__('backend.user.status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.user.id')); ?></th>
                                <th><?php echo e(__('backend.user.name')); ?></th>
                                <th><?php echo e(__('backend.user.email')); ?></th>
                                <th><?php echo e(__('backend.user.email-verified')); ?></th>
                                <th><?php echo e(__('backend.user.role')); ?></th>
                                <th><?php echo e(__('backend.user.created-at')); ?></th>
                                <th><?php echo e(__('backend.user.status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php if(empty($user->email_verified_at)): ?>
                                            <span class="bg-warning text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.user.pending')); ?></span>
                                        <?php else: ?>
                                            <span class="bg-success text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.user.verified')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($user->role_id == \App\Role::USER_ROLE_ID): ?>
                                            <?php echo e(__('backend.user.user')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($user->created_at); ?></td>
                                    <td>
                                        <?php if($user->user_suspended == \App\User::USER_SUSPENDED): ?>
                                            <span class="bg-danger text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.user.suspended')); ?></span>
                                        <?php else: ?>
                                            <span class="bg-success text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.user.active')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-primary btn-circle mb-1">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <?php if($user->user_suspended == \App\User::USER_NOT_SUSPENDED): ?>
                                            <form action="<?php echo e(route('admin.users.suspend', $user)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger mb-1"><?php echo e(__('backend.shared.suspend')); ?></button>
                                            </form>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('admin.users.unsuspend', $user)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-success mb-1"><?php echo e(__('backend.shared.un-lock')); ?></button>
                                            </form>
                                        <?php endif; ?>
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/projects/hellodanang/laravel_project/resources/views/backend/admin/user/index.blade.php ENDPATH**/ ?>