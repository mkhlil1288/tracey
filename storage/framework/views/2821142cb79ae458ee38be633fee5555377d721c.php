
<?php $__env->startSection('content'); ?>
    <iframe width="100%" style="height: calc(100vh - 30px)" src="<?php echo e(route(config('chatify.path'),['user_id'=>request('user_id')])); ?>" frameborder="0"></iframe>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout::user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m5lil/Sites/mytravel/themes/Base/User/Views/frontend/chat/index.blade.php ENDPATH**/ ?>