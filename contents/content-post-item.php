<article id="post-<?php the_ID(); ?>" <?php post_class('empower-post-item'); ?>>
			<?php if ( has_post_thumbnail() && !is_search()): ?>
                <div class="entry-image">
                    <?php the_post_thumbnail('empower_blog'); ?>
                </div>
            <?php endif; ?>
            <header class="entry-header">
                <?php
                if ( !is_single() ) :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
        
                if ( ('post' === get_post_type()) && !is_single() ) : ?>
                <div class="entry-meta">
                    <?php empower_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </header><!-- .entry-header -->
        
            <div class="entry-content">
                <?php
                    
        			
					empower_the_content();
					
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