<div class="search-page">
	<?php
		if ( have_posts() ) :
			?>
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'empower' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            <?php
			
			while ( have_posts() ) : the_post();
				get_template_part('contents/content', 'post-item');
			endwhile;
			the_posts_navigation();
			
		else :
			_e('Sorry No entry Found', 'empower');
		endif;
	?>
</div>