<?php $settings = App\Models\AdminSettings::first(); ?>

<?php $__env->startSection('title'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="jumbotron md index-header jumbotron_set jumbotron-cover">
      <div class="container wrap-jumbotron position-relative">
       <h1 class="title-site"></h1>
        <p class="subtitle-site"><strong></strong></p>

        <br>
        <br>
        <br>
      </div>
    </div>

<div class="container margin-bottom-40" >
	
	<div class="row">
<!-- Col MD -->
<div class="col-md-12" >	
	
    <div class="login-form" >
	   <h2 class="text-center line position-relative">Selamat!!</h2>
        <br>
        <h4 class="text-center  position-relative">Laporan Anda Berhasil Terkirim</h4>
        
        <br>
        <br>
        <br>
        <br>
        <a href="<?php echo e(url('/')); ?>"  class="btn btn-main btn-lg btn-block custom-rounded pull-right" >Kembali</a>
                      	
        <br>    
        <br>
		
    </div>
 </div><!-- /COL MD -->
  
</div><!-- ROW -->
 
 </div><!-- row -->
 
 <!-- container wrap-ui -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>