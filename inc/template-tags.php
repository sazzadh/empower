<?php
if(file_exists(get_stylesheet_directory().'/inc/customize-std.php')){
	$GLOBALS['empower_STD_theme_mod_data'] = include(get_stylesheet_directory().'/inc/customize-std.php');
}elseif(file_exists(get_template_directory().'/inc/customize-std.php')){
	$GLOBALS['empower_STD_theme_mod_data'] = include(get_template_directory().'/inc/customize-std.php');
}else{
	$GLOBALS['empower_STD_theme_mod_data'] = array();
}

if(!function_exists('empower_mood')):
	function empower_mood($id, $std = NULL){
		$mods = get_theme_mods();
		$array_data = $GLOBALS['empower_STD_theme_mod_data'];
		$std_data_pre = (isset($array_data[$id])) ? $array_data[$id] : NULL;
		
		//check if the data alreay in the database or send STD data to output
		if(isset($mods[$id])){
			$std_data = $std;	
		}else{
			$std_data = ($std_data_pre != '') ? $std_data_pre : $std;	
		}
		
		if(get_theme_mod($id)){
			return get_theme_mod($id, $std_data);
		}else{
			return $std_data;
		}
	}
endif;


if(!function_exists('empower_customize_std')):
	function empower_customize_std($id){
		
	}
endif;



/**
 * Pagination function for any post type
==========================================================*/
if(!function_exists('empower_paginate')):
	function empower_paginate($query = NULL){
		global $wp_query; 
		if( $query == NULL ){ $query = $wp_query; }
		$output = null;
		if ($query->max_num_pages > 1) {
			$output .= '<div class="pagenav">';
				$big = 999999999; // need an unlikely integer		
				$output .= paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $query->max_num_pages
				));
			$output .= '</div>';
		}
		return $output;
	}
endif;



/**
 * Custom Post excerpt
==========================================================*/
if(!function_exists('empower_get_excerpt')):
	function empower_get_excerpt($limit = 77){
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	  } else {
		$content = implode(" ",$content);
	  }	
	  $content = preg_replace('/[.+]/','', $content);
	  $content = apply_filters('the_content', $content); 
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}
endif;



/**
 * Custom Post excerpt
==========================================================*/
if(!function_exists('empower_the_content')):
	function empower_the_content($limit = 77){
	  if(strpos(get_the_content(), '<!--more-->') !== false){
		 the_content();
	  }else{
		  echo empower_get_excerpt($limit);
		  echo '<a href="'.esc_url( get_permalink() ).'">'.empower_string('read_more').'</a>';
		  
	  }
	}
endif;




/**
 * Site Logo
==========================================================*/
if(!function_exists('empower_site_logo')):
	function empower_site_logo(){
		$output = '';
		$description = get_bloginfo( 'description', 'display' );
				
		// Try to retrieve the Custom Logo
		if (function_exists('get_custom_logo')){
			if(has_custom_logo()){
				$output = get_custom_logo();
			}
		}
			
		// Nothing in the output: Custom Logo is not supported, or there is no selected logo
		// In both cases we display the site's name
		if (empty($output)){
			if ( is_front_page() && is_home() ){
				$output = '<h1  class="site-title"><a href="' . esc_url(home_url('/')) . '">'.get_bloginfo( 'name' ).'</a></h1>';
			}else{
				$output = '<p  class="site-title"><a href="' . esc_url(home_url('/')) . '">'.get_bloginfo( 'name' ).'</a></p>';
			}
			if ( $description || is_customize_preview() ){
				$output .= '<p  class="site-description">'.$description.'</p>';
			}
		}
				
		/*Validating using wp_kses as the output contain images and h1 tags*/
		echo '<div class="header_logo">'.wp_kses($output, wp_kses_allowed_html( 'post' )).'</div>';
	}
endif;



if ( ! function_exists( 'empower_posted_on' ) ) :
function empower_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'empower' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'empower' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'empower_entry_footer' ) ) :
function empower_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'empower' ) );
		if ( $categories_list && empower_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'empower' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'empower' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'empower' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'empower' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'empower' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function empower_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'empower_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'empower_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so empower_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so empower_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in empower_categorized_blog.
 */
function empower_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'empower_categories' );
}
add_action( 'edit_category', 'empower_category_transient_flusher' );
add_action( 'save_post',     'empower_category_transient_flusher' );



/**
 * Show HTML of the header
 *
 * @return html
 */
if(!function_exists('empower_site_header')){
	function empower_site_header(){
		get_template_part('contents/part', 'header');
	}
}
add_action( 'empower_site_header', 'empower_site_header' );


/**
 * Show HTML of the Footer
 *
 * @return html
 */
if(!function_exists('empower_site_footer')){
	function empower_site_footer(){
		get_template_part('contents/part', 'footer');
	}
}
add_action( 'empower_site_footer', 'empower_site_footer' );



function empower_string($id){
	$string = array(
		'read_more' => __('Read More', 'empower'),
	);
	
	if(isset($string[$id])){
		return $string[$id];
	}
}