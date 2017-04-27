

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin')); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.donations')); ?> (<?php echo e($data->total()); ?>)
          </h4>
     
        </section>

        <!-- Main content -->
        <section class="content">
        	 		      			    
        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> 
                  		<?php echo e(trans('misc.donations')); ?>                    		
                  	</h3>
                </div><!-- /.box-header -->
		
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(trans('auth.full_name')); ?></th>
                      <th class="active"><?php echo e(trans_choice('misc.campaigns_plural', 1)); ?></th>
                      <th class="active"><?php echo e(trans('auth.email')); ?></th>
                      <th class="active">Phone</th>
                      <th class="active"><?php echo e(trans('misc.donation')); ?></th>
                      <th class="active"><?php echo e(trans('admin.date')); ?></th>
                      <th class="active">Konfirm</th>
                      <th class="active"><?php echo e(trans('admin.actions')); ?></th>
                    </tr><!-- /.TR -->
                  
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                      <td><?php echo e($donation->id); ?></td>
                      <td><?php echo e($donation->fullname); ?></td>
                      <td><a href="<?php echo e(url('campaign',$donation->campaigns_id)); ?>" target="_blank"><?php echo e(str_limit($donation->campaigns()->title, 10, '...')); ?> <i class="fa fa-external-link-square"></i></a></td>
                      <td><?php echo e($donation->email); ?></td>
                      <td><?php echo e($donation->phone); ?></td>
                      <td><?php echo e($settings->currency_symbol.number_format($donation->donation)); ?></td>
                      <td><?php echo e(date('d M, y', strtotime($donation->date))); ?></td>
                      <?php
                          if($donation->confirmed == 1){
                            $konfirm = 'Sudah';
                          }else{
                            $konfirm = 'Belum';
                          }
                      ?>
                      <td><?php echo e($konfirm); ?></td>
                      <td>  <a href="<?php echo e(url('panel/admin/donations',$donation->id)); ?>" class="btn btn-success btn-xs padding-btn">
                          		View / Confirm
                          	</a>
                            <a href="javascript:void(0);" data-url="<?php echo e(url('panel/admin/donations/delete/').'/'.$donation->id); ?>" class="btn btn-danger btn-xs padding-btn actionDelete">
                              Delete
                            </a> 
                      </td>
                    </tr><!-- /.TR -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                    <?php else: ?>
                    <hr />
                    	<h3 class="text-center no-found"><?php echo e(trans('misc.no_results_found')); ?></h3>

                    <?php endif; ?>
                                        
                  </tbody>
                  
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <?php if( $data->lastPage() > 1 ): ?>
             <?php echo e($data->links()); ?>

             <?php endif; ?>
            </div>
          </div>        	
        	
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  
<script type="text/javascript">

$(".actionDelete").click(function(e) {
    e.preventDefault();
        
    var element = $(this);
  var url     = element.attr('data-url');
  
  element.blur();
  
  swal(
    {   title: "<?php echo e(trans('misc.delete_confirm')); ?>",  
     text: "Yakin Hapus Donasi?",  
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
            window.location.href = url;
            }
           });
           
           
     });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>