<div class="widgets">
	<?php
		if(is_sidebar_active('sidebar-2') && is_page()){
			dynamic_sidebar( 'sidebar-2' );
		}else{
			dynamic_sidebar( 'sidebar-1' );
		}
	?>
</div>