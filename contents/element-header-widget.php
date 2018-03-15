<?php
if(is_active_sidebar('header-1')){
	echo '<div class="empower-header-widget">';
		dynamic_sidebar( 'header-1' );
	echo '</div>';	
}