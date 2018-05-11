<article id="post-<?php the_ID(); ?>" <?php post_class('empower-post-item'); ?>>    
    <?php
		$entry_featured_image = '';
		$entry_media_content = '';
		$content = apply_filters( 'the_content', get_the_content() );
		$audio   = false;
		$video   = false;
		
		if( has_post_thumbnail() && !is_search()){
			$entry_featured_image = '<div class="entry-image">'.get_the_post_thumbnail(get_the_ID(), 'empower_blog').'</div>';
		}
		
		if(get_post_format() == 'audio'){ 
			if ( false === strpos( $content, 'wp-playlist-script' ) ) {
				$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
			}
			$entry_media_content .= $entry_featured_image;
			if ( ! empty( $audio ) ) {
				foreach ( $audio as $audio_html ) {
					$entry_media_content .= '<div class="entry-audio">';
						$entry_media_content .= $audio_html;
					$entry_media_content .= '</div><!-- .entry-audio -->';
				}
			}
		}elseif(get_post_format() == 'image'){ 
			if(!has_post_thumbnail()){
				$get_first_image_url = empower_get_first_image_url_from_string($content);
				if($get_first_image_url != ''){
					$entry_media_content .= '<a href="' . esc_url( get_permalink() ) . '">';
						$entry_media_content .= '<img src="'.esc_url($get_first_image_url).'" alt="'.esc_attr(get_the_title()).'">';
					$entry_media_content .= '</a>';
				}
			}else{
				$entry_media_content .= '<a href="' . esc_url( get_permalink() ) . '">';
					$entry_media_content .= $entry_featured_image;
				$entry_media_content .= '</a>';
			}
			
		}elseif(get_post_format() == 'video'){ 
			if ( false === strpos( $content, 'wp-playlist-script' ) ) {
				$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
			}
			if ( ! empty( $video ) ) {
				foreach ( $video as $video_html ) {
					$entry_media_content .= '<div class="entry-video">';
						$entry_media_content .= $video_html;
					$entry_media_content .= '</div>';
				}
			}
			
		}
	?>
    
    <?php if(($entry_media_content != '') && !is_search()): ?>
    	<div class="entry-media">
        	<?php echo $entry_media_content; ?>
        </div>
    <?php endif; ?>

            
    
	<header class="entry-header">
		<?php
			if ( !is_single() ){
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
        
			if ( ('post' === get_post_type()) && !is_single() ) : ?>
                <div class="entry-meta">
                    <?php empower_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif; 
		?>
	</header><!-- .entry-header -->
        
	<div class="entry-content">
		<?php	
			the_excerpt();		
			echo '<a href="' . esc_url( get_permalink() ) . '" class="ep_button entry-button">'.__('Continue Reading', 'empower').'</a>';
		?>
	</div><!-- .entry-content -->
        
	<footer class="entry-footer">
		<?php empower_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->