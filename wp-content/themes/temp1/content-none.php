	
	<?php 
		$noDataClassName;
		if(is_search()){
			$noDataClassName='sr-nodata';
		}else{
			$noDataClassName='normal-nodata';
		}
	 ?>
	<div class="log-nodata">
		<div class="gbl-nodata <?php echo $noDataClassName;?>"></div>
	</div>