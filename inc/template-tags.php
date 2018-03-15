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





/**
 * Primary Menu
==========================================================*/
if(!function_exists('empower_html_menu_primary')):
	function empower_html_menu_primary(){
		?>
        <nav class="primary_nav"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary_nav' ) ); ?></nav>
        <?php
	}
endif;


/**
 * Secondary Menu
==========================================================*/
if(!function_exists('empower_html_menu_secondary')):
	function empower_html_menu_secondary(){
		?>
        <nav class="secondary_nav"><?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary_nav' ) ); ?></nav>
        <?php
	}
endif;




/**
 * Social Icons HTMLoutput
==========================================================*/
if(!function_exists('empower_html_social_icons')):
	function empower_html_social_icons(){
		echo '<div class="empower-social-icons">';
			echo '<ul>';
				if((empower_mood('social_icons_link_1') != '') && (empower_mood('social_icons_image_1') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_1')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_1')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_1')).'" alt="'.esc_attr(empower_mood('social_icons_title_1')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_2') != '') && (empower_mood('social_icons_image_2') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_2')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_2')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_2')).'" alt="'.esc_attr(empower_mood('social_icons_title_2')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_3') != '') && (empower_mood('social_icons_image_3') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_3')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_3')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_3')).'" alt="'.esc_attr(empower_mood('social_icons_title_3')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_4') != '') && (empower_mood('social_icons_image_4') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_4')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_4')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_4')).'" alt="'.esc_attr(empower_mood('social_icons_title_4')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_5') != '') && (empower_mood('social_icons_image_5') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_5')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_5')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_5')).'" alt="'.esc_attr(empower_mood('social_icons_title_5')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_6') != '') && (empower_mood('social_icons_image_6') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_6')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_6')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_6')).'" alt="'.esc_attr(empower_mood('social_icons_title_6')).'">';
						echo '</a>';
					echo '</li>';
				}
				if((empower_mood('social_icons_link_7') != '') && (empower_mood('social_icons_image_7') != '')){
					echo '<li>';
						echo '<a href="'.esc_url(empower_mood('social_icons_link_7')).'" target="_blank" rel="nofollow" title="'.esc_attr(empower_mood('social_icons_title_7')).'">';
							echo '<img src="'.esc_url(empower_mood('social_icons_image_7')).'" alt="'.esc_attr(empower_mood('social_icons_title_7')).'">';
						echo '</a>';
					echo '</li>';
				}
			echo '</ul>';
		echo '</div>';
	}
endif;




/**
 * Page Hero HTML output
==========================================================*/
if(!function_exists('empower_html_page_hero')):
	function empower_html_page_hero(){
		
	}
endif;



/**
 * Page Title HTML output
==========================================================*/
if(!function_exists('empower_html_page_title')):
	function empower_html_page_title(){
		
	}
endif;




/**
 * Icon search with on click pupup search form
==========================================================*/
if(!function_exists('empower_html_search_icon')):
	function empower_html_search_icon($attr = NULL){
		$settings = array(
			'class' => 'icon-light'
		);
		if(is_array($attr)){
			$settings = array_merge($settings , $attr);
		}
		
		echo '<div class="empower_search_icon '.$settings['class'].'">';
			echo '<a href="#empower_search_icon_content" class="empower_search_icon_hand inline-lightbox">'.__('Search', 'empower').'</a>';
		echo '</div>';
		
		echo '<div style="display:none;">';
			echo '<div id="empower_search_icon_content" class="empower_search_icon_content">';
				get_search_form();
			echo '</div>';
		echo '</div>';
	}
endif;


/**
 * WooCommerce Cart
==========================================================*/
if(!function_exists('empower_html_woo_cart')):
	function empower_html_woo_cart($attr = NULL){
		$settings = array(
			'class' => 'icon-light'
		);
		if(is_array($attr)){
			$settings = array_merge($settings , $attr);
		}
		if(function_exists('WC')){
			echo '<div class="empower_woo_cart '.$settings['class'].'">';
				echo '<a href="'.wc_get_cart_url().'">';
					echo '<strong>'.sprintf ( _n( '%d <em class="screen-reader-text">item</span>', '%d <em class="screen-reader-text">items</em>', WC()->cart->get_cart_contents_count(), 'empower' ), WC()->cart->get_cart_contents_count() ).'</strong>';
					echo '<p>'.WC()->cart->get_cart_total().'</p>';
				echo '</a>';
			echo '</div>';
		}
	}
endif;


/**
 * Single Post Author Bio
==========================================================*/
if(!function_exists('empower_html_singe_author_bio')):
	function empower_html_singe_author_bio(){
		
	}
endif;



/**
 * Content of 404 not found page
==========================================================*/
if(!function_exists('empower_html_404_content')):
	function empower_html_404_content(){
		
	}
endif;