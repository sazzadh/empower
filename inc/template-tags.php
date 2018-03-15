<?php
if(file_exists(get_stylesheet_directory().'/inc/customize-std.php')){
	$GLOBALS['empower_STD_theme_mod_data'] = include(get_stylesheet_directory().'/inc/customize-std.php');
}elseif(file_exists(get_template_directory().'/inc/customize-std.php')){
	$GLOBALS['empower_STD_theme_mod_data'] = include(get_template_directory().'/inc/customize-std.php');
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