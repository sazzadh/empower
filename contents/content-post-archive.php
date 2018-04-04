<div class="post-archive">
	<?php
		if ( have_posts() ) :
			echo '<div class=" empower-post-items">';		
				while ( have_posts() ) : the_post();
					get_template_part('contents/content', 'post-item');
				endwhile;
			echo '</div>';
			echo empower_paginate();
			
		else :
			_e('Sorry No entry Found', 'empower');
		endif;
	?>
</div>