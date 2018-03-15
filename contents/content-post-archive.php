<div class="post-archive">
	<?php
		if ( have_posts() ) :			
			while ( have_posts() ) : the_post();
				get_template_part('contents/content', 'post-item');
			endwhile;
			//the_posts_navigation();
			
		else :
			_e('Sorry No entry Found', 'steed');
		endif;
	?>
</div>