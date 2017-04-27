<?php 	
	
		$hashAvatar 	= md5( strtolower( trim( $donation->email ) ) );  
		
		// $response		= DB::table('campaigns')->select('hargapohon')->where('id',$donation->campaign_id)->where('status','active')->get();
		$donasi 		= $donation->donation;
		$hargapohon 	= $donation->campaigns()->hargapohon;
		if($donasi == 0 || $hargapohon == 0){
       		$jumlahdonasi = 0;
       	}else{
			$jumlahdonasi 	= $donasi / $hargapohon;
       	}
?>
<li class="list-group-item">
       	<div class="media">
			  <div class="media-left">
			      <img class="media-object img-circle holderImage" data-src="holder.js/40x40?bg=f45302&fg=FFFFFF&text=<?php echo e(strtoupper($letter)); ?>" width="40" height="40" alt="<?php echo e($letter); ?>">
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading"><?php echo e($donation->fullname); ?></h4>
			    <span class="btn-block recent-donation-amount font-default">
			    	<?php echo e(number_format($jumlahdonasi).'  '.$settings->kode_pohon); ?>

			    </span>
			    <?php if( $donation->comment != '' ): ?>
			    <p class="margin-bottom-5"><?php echo e($donation->comment); ?></p>
			    <?php endif; ?>
			    <small class="btn-block timeAgo text-muted" data="<?php echo e(date('c', strtotime( $donation->date ))); ?>"></small>
			  </div>
		</div>
</li>