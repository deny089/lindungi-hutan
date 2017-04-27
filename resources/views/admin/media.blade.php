@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           {{ trans('admin.admin') }} <i class="fa fa-angle-right margin-separator"></i> Media
          </h4>
     
        </section>

        <!-- Main content -->
        <section class="content">
        	       	
		    @if(Session::has('success_message'))
		    <div class="alert alert-success">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
		        {{ Session::get('success_message') }}	        
		    </div>
		@endif
		    
        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> Media</h3>
                  <div class="box-tools">
                    <a href="{{ url('panel/admin/media/add') }}" class="btn btn-sm btn-success no-shadow pull-right">
	        		<i class="glyphicon glyphicon-plus myicon-right"></i> {{ trans('misc.add_new') }}
	        		</a>
                  </div>
                </div><!-- /.box-header -->
                
                
		
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>
               	
               	@if( $totalMedia !=  0 )
                   <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Link</th>
                      <th>Gambar</th>
                      <th>{{ trans('admin.actions') }}</th>
                    </tr>
                  
                  @foreach( $media as $medias )
                    <tr>
                      <td>{{ $medias->id }}</td>
                      <td>{{ $medias->nama }}</td>
                      <td>{{ $medias->link }}</td>
                      <td>{{ $medias->gambar }}</td>
                      <td>
                      	<a href="{{ url('panel/admin/media/edit/').'/'.$medias->id }}" class="btn btn-success btn-xs padding-btn">
                      		{{ trans('admin.edit') }}
                      	</a> 
                      	
                      	<a href="javascript:void(0);" data-url="{{ url('panel/admin/media/delete/').'/'.$medias->id }}" class="btn btn-danger btn-xs padding-btn actionDelete">
                      		{{ trans('admin.delete') }}
                      		</a>
                      		
                      </td>
                      		
                    </tr><!-- /.TR -->
                    @endforeach
                    
                    @else
                    <hr />
                    	<h3 class="text-center no-found">{{ trans('misc.no_results_found') }}</h3>
                    @endif
                                        
                  </tbody>
                  
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>        	
        	
          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('javascript')
	
<script type="text/javascript">

$(".actionDelete").click(function(e) {
   	e.preventDefault();
   	   	
   	var element = $(this);
	var url     = element.attr('data-url');
	
	element.blur();
	
	swal(
		{   title: "{{trans('misc.delete_confirm')}}",  
		 text: "{{trans('misc.confirm_delete_category')}}",  
		  type: "warning", 
		  showLoaderOnConfirm: true,  
		  showCancelButton: true,   
		  confirmButtonColor: "#DD6B55",  
		   confirmButtonText: "{{trans('misc.yes_confirm')}}",   
		   cancelButtonText: "{{trans('misc.cancel_confirm')}}",  
		    closeOnConfirm: false,  
		    }, 
		    function(isConfirm){  
		    	 if (isConfirm) {     
		    	 	window.location.href = url;
		    	 	}
		    	 });
		    	 
		    	 
		 });
</script>
@endsection
