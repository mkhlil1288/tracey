
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Two Factor Authentication')); ?></div>
                    <div class="card-body">

                        <?php echo $__env->make('Layout::admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="POST" action="<?php echo e(url('two-factor-challenge')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php switch(request('type')):
                            case ("recovery_code"): ?>
                                <div class="mb-4 text-sm text-gray-600">
                                    <?php echo e(__('Please confirm access to your account by entering one of your emergency recovery codes.')); ?>

                                </div>
                                <!-- Password -->
                                <div class="form-group row">
                                    <label for="recovery_code" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Recovery Code')); ?></label>
                                    <div class="col-md-6">
                                        <input id="recovery_code" type="text" class="form-control<?php echo e($errors->has('recovery_code') ? ' is-invalid' : ''); ?>" name="recovery_code"  required>
                                        <?php if($errors->has('recovery_code')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('recovery_code')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php break; ?>
                            <?php default: ?>
                                <div class="mb-4 text-sm text-gray-600">
                                    <?php echo e(__('Please confirm access to your account by entering the authentication code provided by your authenticator application.')); ?>

                                </div>
                                <!-- Password -->
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Code')); ?></label>
                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" name="code"  required>
                                        <?php if($errors->has('code')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('code')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php break; ?>
                        <?php endswitch; ?>
                            <div class="flex justify-end mt-4">
                                <div class="form-group row mb-0">
                                    <div class="offset-md-4">
                                        <?php if(request('type') == 'recovery_code'): ?>
                                            <a href="<?php echo e(route('two-factor.login')); ?>" class="btn btn-link"><?php echo e(__('Use an authentication code')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('two-factor.login',['type'=>'recovery_code'])); ?>" class="btn btn-link"><?php echo e(__('Use a recovery code')); ?></a>
                                        <?php endif; ?>
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Submit')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m5lil/Sites/mytravel/resources/views/auth/two-factor-challenge.blade.php ENDPATH**/ ?>