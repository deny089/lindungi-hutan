

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCFUkpUT8OQ_2kblunHrU8tH_raZg4yOAo" type="text/javascript"></script>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin')); ?> 
            	<i class="fa fa-angle-right margin-separator"></i> 
            		<?php echo e(trans('admin.edit')); ?>

            		
            		<i class="fa fa-angle-right margin-separator"></i> 
            		<?php echo e($data->title); ?>

            		
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="content">
        		
       <div class="row">
       	
       	<div class="col-md-9">
    
        	<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Monitoring Campaign</h3>
                </div><!-- /.box-header -->
               
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/campaigns/pantau/'.$data->id)); ?>" enctype="multipart/form-data">
                	
                	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
			
					<?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Petani</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->petani); ?>" name="petani" class="form-control" placeholder="Masukan nama petani yang merawat pohon">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jabatan Petani</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->jabatan_petani); ?>" name="jabatan_petani" class="form-control" placeholder="Jabatan Petani yang merawat pohon">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Pohon yang hidup</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e($data->hidup); ?>" name="hidup" class="form-control" placeholder="Jumlah pohon yang masih hidup">&nbsp;&nbsp;&nbsp;
                      </div>pohon
                    </div>
                  </div><!-- /.box-body -->
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Pohon yang mati</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e($data->mati); ?>" name="mati" class="form-control" placeholder="Jumlah pohon yang telah mati">&nbsp;&nbsp;&nbsp;
                      </div>pohon
                    </div>
                  </div><!-- /.box-body -->
									
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tinggi rata-rata pohon</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e(number_format($data->tinggi, 2, '.', ',')); ?>" name="tinggi" class="form-control" placeholder="Tinggi rata-rata dari pohon yang telah ditanam">&nbsp;&nbsp;&nbsp;
                      </div>centimeter
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Diameter rata-rata pohon</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e(number_format($data->diameter, 2, '.', ',')); ?>" name="diameter" class="form-control" placeholder="Diameter rata-rata dari pohon yang telah ditanam">&nbsp;&nbsp;&nbsp;
                      </div>centimeter
                    </div>
                  </div><!-- /.box-body -->
                  

                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Perkembangan Pohon</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e(number_format($data->perkembangan, 2, '.', ',')); ?>" name="perkembangan" class="form-control" placeholder="Perkembangan pohon dari petani">&nbsp;&nbsp;&nbsp;
                      </div>persen
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Proyeksi Kedepan</label>
                      <div class="col-sm-8">
                        <input type="text" value="<?php echo e($data->proyeksi); ?>" name="proyeksi" class="form-control form-lg" placeholder="Proyeksi kedepan yang ingin Anda sampaikan">&nbsp;&nbsp;&nbsp;
                      </div>centimeter
                    </div>
                  </div><!-- /.box-body -->
                  
                  
                  
                  <div class="box-footer">
                  	 <a href="<?php echo e(url('panel/admin/campaigns')); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel')); ?></a>
                    <button type="submit" class="btn btn-success pull-right"><?php echo e(trans('admin.save')); ?></button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
              
        </div><!-- /. col-md-9 -->
        
        <div class="col-md-3">
        	
        	<div class="block-block text-center">
        		<img src="<?php echo e(asset('public/campaigns/small').'/'.$data->small_image); ?>" class="thumbnail img-responsive">
        	</div>
		
		<div class="block-block text-center">
		<?php echo Form::open([
			            'method' => 'POST',
			            'url' => 'panel/admin/campaign/delete',
			            'class' => 'displayInline'
				        ]); ?>

				        <?php echo Form::hidden('id',$data->id );; ?>

	            	<?php echo Form::submit(trans('misc.delete_campaign'), ['class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']); ?>

	        	<?php echo Form::close(); ?>

	        </div>
		
		</div><!-- col-md-3 -->        			        		
        		
        		</div><!-- /.row -->
        		
        	</div><!-- /.content -->
        	
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	
	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/tinymce/tinymce.min.js')); ?>" type="text/javascript"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function() {
    $(".onlyNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

$(".actionDelete").click(function(e) {
   	e.preventDefault();
   	   	
   	var element = $(this);
	var id     = element.attr('data-url');
	var form    = $(element).parents('form');
	
	element.blur();
	
	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm')); ?>",  
		text: "<?php echo e(trans('misc.confirm_delete_campaign')); ?>",
		  type: "warning", 
		  showLoaderOnConfirm: true,
		  showCancelButton: true,   
		  confirmButtonColor: "#DD6B55",  
		   confirmButtonText: "<?php echo e(trans('misc.yes_confirm')); ?>",   
		   cancelButtonText: "<?php echo e(trans('misc.cancel_confirm')); ?>",  
		    closeOnConfirm: false, 
		    }, 
		    function(isConfirm){  
		    	 if (isConfirm) {   
		    	 	form.submit(); 
		    	 	//$('#form' + id).submit();
		    	 	}
		    	 });
		    	 
		    	 
		 });
		 
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });
        
        		function initTinymce() {
			tinymce.remove('.tinymce-txt');		
tinymce.init({
  selector: '.tinymce-txt',
  relative_urls: false,
  resize: true,
  menubar:false,
    statusbar: false,
    forced_root_block : false,
    extended_valid_elements : "span[!class]", 
    //visualblocks_default_state: true,
  setup: function(editor){
  	        
    	editor.on('change',function(){
    		editor.save();
    	});
   },   
  theme: 'modern',
  height: 150,
  plugins: [
    'advlist autolink autoresize lists link image charmap preview hr anchor pagebreak', //image
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save code contextmenu directionality', //
    'emoticons template paste textcolor colorpicker textpattern ' //imagetools
  ],
  toolbar1: 'undo redo | bold italic underline strikethrough charmap | bullist numlist  | link | image',
  image_advtab: true,
 });
 
}

initTinymce();	
	
	</script>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>