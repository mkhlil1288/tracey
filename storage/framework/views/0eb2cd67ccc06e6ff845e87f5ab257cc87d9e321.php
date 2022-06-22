
<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Change Password")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route("user.change_password.update")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__("Current Password")); ?></label>
                    <input type="password" name="current-password" placeholder="<?php echo e(__("Current Password")); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("New Password")); ?></label>
                    <input type="password" name="new-password" placeholder="<?php echo e(__("New Password")); ?>" class="form-control">
                                   </div>
                <div class="form-group">
                    <label><?php echo e(__("New Password Again")); ?></label>
                    <input type="password" name="new-password_confirmation" placeholder="<?php echo e(__("New Password Again")); ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="<?php echo e(__("Change Password")); ?>">
                <a href="<?php echo e(route("user.profile.index")); ?>" class="btn btn-default"><?php echo e(__("Cancel")); ?></a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m5lil/Sites/mytravel/themes/Base/User/Views/frontend/changePassword.blade.php ENDPATH**/ ?>