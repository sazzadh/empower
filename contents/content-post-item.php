<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() && !is_search()): ?>
                <div class="entry-image">
                    <?php the_post_thumbnail('large'); ?>
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