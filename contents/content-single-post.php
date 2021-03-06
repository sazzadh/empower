<div class="single-post-page">
<?php
while ( have_posts() ) : the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() && !is_search()): ?>
                    <div class="entry-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="entry-meta">
                        <?php empower_posted_on(); ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
            
                <div class="entry-content">
                    <?php
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'empower' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
            
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'empower' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            
                <footer class="entry-footer">
                    <?php empower_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->
            <?php
		
			the_post_navigation();
		
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		
	endwhile; // End of the loop.
	?>
</div>