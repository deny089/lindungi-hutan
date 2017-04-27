<?php $settings = App\Models\AdminSettings::first(); ?>


<?php $__env->startSection('title'); ?><?php echo e(trans('misc.create_campaign').' - '); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<style>
      #map {
        height: 100%;
        border: 1px solid #DDD; 
        width:600px;
        height: 300px;
        float:left;  
        margin: 0px 0 0 10px;
        -webkit-box-shadow: #AAA 0px 0px 15px;
      }
      
    </style>
    <script src="https://maps.google.com/maps/api/js?v=3.5&key=AIzaSyCFUkpUT8OQ_2kblunHrU8tH_raZg4yOAo" type="text/javascript"></script>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/datepicker/datepicker3.css')); ?>">

 <div class="jumbotron md index-header jumbotron_set jumbotron-cover">
      <div class="container wrap-jumbotron position-relative">
      	<h2 class="title-site"><?php echo e(trans('misc.create_campaign')); ?></h2>
      </div>
    </div>
  
<div class="container margin-bottom-40 padding-top-40">
	<div class="row">
		
	<!-- col-md-8 -->
	<div class="col-md-12">
		<div class="wrap-center center-block">
			<?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if( Auth::user()->status == 'active' ): ?>			
    <!-- form start -->
    <form method="POST" action="<?php echo e(url('create/campaign')); ?>" enctype="multipart/form-data" id="formUpload">
    	
    	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<div class="filer-input-dragDrop position-relative" id="draggable">
			<input type="file" accept="image/*" name="photo" id="filePhoto">
			
			<!-- previewPhoto -->
			<div class="previewPhoto">
				
				<div class="btn btn-danger btn-sm btn-remove-photo" id="removePhoto">
					<i class="fa fa-trash myicon-right"></i> <?php echo e(trans('misc.delete')); ?>

					</div>
					
			</div><!-- previewPhoto -->
			
			<div class="filer-input-inner">
				<div class="filer-input-icon">
					<i class="fa fa-cloud-upload"></i>
					</div>
					<div class="filer-input-text">
						<h3 class="margin-bottom-10"><?php echo e(trans('misc.click_select_image')); ?></h3>
						<h3><?php echo e(trans('misc.max_size')); ?>: <?php echo e(App\Helper::formatBytes($settings->file_size_allowed * 1024) .' - '.$settings->min_width_height_image); ?> </h3>
					</div>
				</div>
			</div>
			
                 <!-- Start Form Group -->
                    <div class="form-group">
                      <label><?php echo e(trans('misc.campaign_title')); ?></label>
                        <input type="text" value="<?php echo e(old('title')); ?>" name="title" id="title" class="form-control" placeholder="<?php echo e(trans('misc.campaign_title')); ?>">
                    </div><!-- /.form-group-->
                     
                    <!-- Start Form Group -->
                    <!-- edited cacip
                    <div class="form-group">
                      <label><?php echo e(trans('misc.choose_a_category')); ?></label>
                      	<select name="categories_id" class="form-control">
                      		<option value=""><?php echo e(trans('misc.select_one')); ?></option>
                      	<?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 	
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </select>
                  </div>
                  -->
                  <!-- /.form-group-->

                  <!-- edited cacip -->

                  <div id="catpohon" >
                  <div class="form-group">
                      <label>Pilih Pohon untuk ditanam <i></i></label>
                      	<select name="id_pohon" class="form-control">
                      		<option value="">Pilih salah satu pohon</option>
		                      	<?php $__currentLoopData = App\Models\Pohon::orderBy('id_pohon')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pohon): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 	
		                            <option value="<?php echo e($pohon->id_pohon); ?>"><?php echo e($pohon->nama); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </select>
                  </div>

                  <div class="form-group">
				    <label>Goal Penanaman <i></i></label>
				    <div class="input-group">
				      <input type="number" min="1" class="form-control" name="goal" id="onlyNumber" value="<?php echo e(old('goal')); ?>" placeholder="10000">
				      <div class="input-group-addon addon-dollar"><?php echo e($settings->kode_pohon); ?></div>
				    </div>
				  </div>
				  </div>

				  <div class="form-group">
				    <label>Tanggal Pelaksanaan</label>
				    <div class="input-group">
				      <input class="form-control" id="datepicker" data-date-format="dd-mm-yyyy" name="tanggal_pelaksanaan" placeholder="DD/MM/YYY" type="text"/>
			    	</div>
				  </div>

				  <!-- youtube -->
                    <div class="form-group">
                      <label>Link Embed Youtube</label>
                        <input type="text" value="<?php echo e(old('youtube')); ?>" name="youtube" class="form-control" placeholder="masukan link embeded youtube">
                    </div><!-- /.form-group-->
                  <!-- end edited cacip -->

                  <!-- Start Form Group -->
                    <div class="form-group">
                      <label><?php echo e(trans('misc.location')); ?></label>
                        <input type="text" value="<?php echo e(old('location')); ?>" name="location" class="form-control" placeholder="<?php echo e(trans('misc.location')); ?>">
                    </div><!-- /.form-group-->

                  
                  <div class="form-group">
                      <label><?php echo e(trans('misc.campaign_description')); ?></label>
                      	<textarea name="description" rows="4" id="description" class="form-control tinymce-txt" placeholder="<?php echo e(trans('misc.campaign_description_placeholder')); ?>"><?php echo e(old('description')); ?></textarea>
                    </div>
                    
				<!-- map -->
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Maps Lokasi</label>
                      <div  class="col-sm-10 col-md-9 col-sx-6" id="map"></div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Latitude</label>
                      <input type="text" value="<?php echo e(old('lat')); ?>"  class="form-control " name="lat" id="lat">
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Longitude</label>
                      <input type="text" value="<?php echo e(old('lng')); ?>"  class="form-control " name="lng" id="lng">
                    </div>
                  <!-- end map -->

                    <!-- Alert -->
                    <div class="alert alert-danger display-none" id="dangerAlert">
							<ul class="list-unstyled" id="showErrors"></ul>
						</div><!-- Alert -->
                
                  <div class="box-footer">
                  	<hr />
                    <button type="submit" id="buttonFormSubmit" class="btn btn-block btn-lg btn-main custom-rounded"><?php echo e(trans('misc.create_campaign')); ?></button>
                  </div><!-- /.box-footer -->
                </form>
                
                <?php else: ?>
                
	<div class="btn-block text-center margin-top-40">
	    			<i class="icon-warning ico-no-result"></i>
	    		</div>
	    		
	   <h3 class="margin-top-none text-center no-result no-result-mg">
	    	<?php echo e(trans('misc.confirm_email')); ?> <strong><?php echo e(Auth::user()->email); ?></strong>
	    	</h3>
                
                <?php endif; ?>
               
               </div><!-- wrap-center -->
		</div><!-- col-md-12-->
				
	</div><!-- row -->
</div><!-- container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/tinymce/tinymce.min.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/datepicker/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/js/lokasi.js')); ?>" type="text/javascript"></script>

	<script type="text/javascript">


  //   $(document).ready(function() {

		// var cat = $('#cat').val();
	 //    $('#catpohon').hide();
	 //    $('#cathewan').hide();
	 //    switch(cat){
	 //    	case 1 :
	 //    		$('#catpohon').show();
	 //    		break;
	 //    	case 2 :
	 //    		$('#cathewan').show();
	 //    		break;
	 //    	default:
	 //    		$('#catpohon').hide();
	 //    		$('#cathewan').hide();
	 //    }

	 //    // $('#cat').click(function(){
	 //    // 	if( $('#cat').val() == 1 ){
	 //    // 		$('#catpohon').show();
	 //    // 		$('#categories').load();
	 //    // 	}else if( $('#cat').val() == 2 ){
	 //    // 		$('#cathewan').show();
	 //    // 		$('#categories').load();
	 //    // 	}else{
	 //    // 		$('#catpohon').hide();
	 //    // 		$('#cathewan').hide();
	 //    // 		$('#categories').load();
	 //    // 	}
	    	
	 //    // 		$('#categories').load();
	 //    // });
  //   });

	</script>
	
	<script type="text/javascript">
    

    $(document).ready(function() {

	$( "#datepicker" ).datepicker('option', 'dateFormat', 'yy-mm-dd');
    
    $('input').iCheck({
	  	checkboxClass: 'icheckbox_square-red',
    	radioClass: 'iradio_square-red',
	    increaseArea: '20%' // optional
	  });
	  
});

	//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });
        
$('#removePhoto').click(function(){
	 	$('#filePhoto').val('');
	 	$('.previewPhoto').css({backgroundImage: 'none'}).hide();
	 	$('.filer-input-dragDrop').removeClass('hoverClass');
	 });
	 	
//================== START FILE IMAGE FILE READER
$("#filePhoto").on('change', function(){
	
	var loaded = false;
	if(window.File && window.FileReader && window.FileList && window.Blob){
		if($(this).val()){ //check empty input filed
			oFReader = new FileReader(), rFilter = /^(?:image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/png|image)$/i;
			if($(this)[0].files.length === 0){return}
			
			
			var oFile = $(this)[0].files[0];
			var fsize = $(this)[0].files[0].size; //get file size
			var ftype = $(this)[0].files[0].type; // get file type
			
			
			if(!rFilter.test(oFile.type)) {
				$('#filePhoto').val('');
				$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.formats_available')); ?>").fadeIn(500).delay(5000).fadeOut();
				return false;
			}
			
			var allowed_file_size = <?php echo e($settings->file_size_allowed * 1024); ?>;	
						
			if(fsize>allowed_file_size){
				$('#filePhoto').val('');
				$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.max_size').': '.App\Helper::formatBytes($settings->file_size_allowed * 1024)); ?>").fadeIn(500).delay(5000).fadeOut();
				return false;
			}
		<?php $dimensions = explode('x',$settings->min_width_height_image); ?>
			
			oFReader.onload = function (e) {
				
				var image = new Image();
			    image.src = oFReader.result;
			    
				image.onload = function() {
			    	
			    	if( image.width < <?php echo e($dimensions[0]); ?>) {
			    		$('#filePhoto').val('');
			    		$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.width_min',['data' => $dimensions[0]])); ?>").fadeIn(500).delay(5000).fadeOut();
			    		return false;
			    	} 
			    	
			    	if( image.height < <?php echo e($dimensions[1]); ?> ) {
			    		$('#filePhoto').val('');
			    		$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.height_min',['data' => $dimensions[1]])); ?>").fadeIn(500).delay(5000).fadeOut();
			    		return false;
			    	} 
			    	
			    	$('.previewPhoto').css({backgroundImage: 'url('+e.target.result+')'}).show();
			    	$('.filer-input-dragDrop').addClass('hoverClass');
			    	var _filname =  oFile.name;
					var fileName = _filname.substr(0, _filname.lastIndexOf('.'));
			    };// <<--- image.onload

				
           }
           
           oFReader.readAsDataURL($(this)[0].files[0]);
			
		}
	} else{
		$('.popout').html('Can\'t upload! Your browser does not support File API! Try again with modern browsers like Chrome or Firefox.').fadeIn(500).delay(5000).fadeOut();
		return false;
	}
});

		$('input[type="file"]').attr('title', window.URL ? ' ' : '');
	

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
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>