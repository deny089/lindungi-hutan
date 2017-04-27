<?php $settings = App\Models\AdminSettings::first(); ?>


<?php $__env->startSection('content'); ?>

<div class="jumbotron md index-header jumbotron_set jumbotron-cover">
      <div class="container wrap-jumbotron position-relative">
        <h1 class="title-site"><?php echo e(trans('auth.reset_password')); ?></h1>
        <p class="subtitle-site"><strong><?php echo e($settings->title); ?></strong></p>
      </div>
    </div>
    
<div class="container-fluid margin-bottom-40">
	<div class="row">
		<div class="col-md-12">
			
			<h2 class="text-center line position-relative"><?php echo e(trans('auth.reset_password')); ?></h2>
	
	<div class="login-form">

					
		<?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	            	
          	<form action="<?php echo e(url('/password/reset')); ?>" method="post" name="form" id="signup_form">
            
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            
            <div class="form-group has-feedback">
              <input type="text" class="form-control login-field custom-rounded" name="email" id="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" placeholder="<?php echo e(trans('auth.email')); ?>" title="<?php echo e(trans('auth.email')); ?>" autocomplete="off">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             </div>
             
             <!-- FORM GROUP -->
         <div class="form-group has-feedback">
              <input type="password" class="form-control login-field custom-rounded" name="password" placeholder="<?php echo e(trans('auth.password')); ?>" title="<?php echo e(trans('auth.password')); ?>" autocomplete="off">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div><!-- ./FORM GROUP -->
         
         <div class="form-group has-feedback">
			<input type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(trans('auth.confirm_password')); ?>" title="<?php echo e(trans('auth.confirm_password')); ?>" autocomplete="off">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
         
           <button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded"><?php echo e(trans('auth.reset_password')); ?></button>
          </form>
     </div><!-- Login Form -->
	
		</div><!-- col-md-12 -->
	</div><!-- row -->
</div><!-- container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>"></script>
	
	<script type="text/javascript">
	 $('#buttonSubmit').click(function(){
    	$(this).css('display','none');
    	$('<div class="btn-block text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw fa-loader"></i></div>').insertAfter('#signup_form');
    });
    
    <?php if(count($errors) > 0): ?>
    	scrollElement('#dangerAlert');
    <?php endif; ?>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>