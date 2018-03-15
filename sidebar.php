<div class="widgets secondary">
	<?php
		if(is_active_sidebar('sidebar-2') && is_page()){
			dynamic_sidebar( 'sidebar-2' );
		}else{
			dynamic_sidebar( 'sidebar-1' );
		}
	?>
</div>