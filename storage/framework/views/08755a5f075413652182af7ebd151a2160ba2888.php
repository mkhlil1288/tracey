<div class="favorite-list-item">
    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
        style="background-image: url('<?php echo e($user->getAvatarUrl()); ?>');">
    </div>
    <p><?php echo e(strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name); ?></p>
</div>
<?php /**PATH /home/m5lil/Sites/mytravel/resources/views/vendor/Chatify/layouts/favorite.blade.php ENDPATH**/ ?>