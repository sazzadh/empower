<?php
if(!function_exists('empower_customize_register')):
function empower_customize_register( $wp_customize ) {
	
	/*========================================================
		START::: Contact Info
	=========================================================*/
	$wp_customize->add_panel( 'contact_panel', array(
		'title'			=> __('***Contact Info', 'empower'),
		'description'	=> '',
		'priority'   => 30,
	));
	
	/*
		Contact Info --> Contact Text
	===============================================*/
	if(apply_filters('empower_active_contact_text', false)){
		$prefix = 'contact_info_';
		$section = 'contact_info_section_';
		
		$wp_customize->add_section( $section , array(
			'title'      => __( 'Contact Text', 'empower' ),
			'priority'   => 30,
			'panel'		=> 'contact_panel',
		));
		$uid = $prefix.'text';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Contact Info', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'textarea',
			'description' => 'Add your Email or Mobile Number here. In order to make the number a tap-to-call for the mobile site, simply add this piece of code to the field:',
		));
		$uid = $prefix.'info1';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_info( $wp_customize, $uid, array(
			'label'      => __( 'Examples:', 'empower' ),
			'description' => '<span style="font-size:18px;" >Call Us: <a href="tel:1234567890" style="color:#000000;">1-2345-678-90</a></span>',
			'section'    => $section,
			'settings'   => $uid,
		)));
	}
	
	/*
		Contact Info --> Phone Number
	===============================================*/
	if(apply_filters('empower_active_phone', false)){
		$prefix = 'contact_phone_';
		$section = 'contact_phone_section_';
		
		$wp_customize->add_section( $section , array(
			'title'      => __( 'Phone Number', 'empower' ),
			'priority'   => 30,
			'panel'		=> 'contact_panel',
		));
		$uid = $prefix.'text';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Phone Number', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => 'Example: (123)-456-7898',
		));
		$uid = $prefix.'link';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Phone Number for Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => 'Example: 123456780',
		));
		$uid = $prefix.'des';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Description', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
			'type'       => 'text',
		));
		$uid = $prefix.'icon';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
	}
	
	/*
		Contact Info --> Email
	===============================================*/
	if(apply_filters('empower_active_email', false)){
		$prefix = 'contact_email_';
		$section = 'contact_email_section_';
		
		$wp_customize->add_section( $section , array(
			'title'      => __( 'Email Address', 'empower' ),
			'priority'   => 30,
			'panel'		=> 'contact_panel',
		));
		$uid = $prefix.'text';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Email Address', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'des';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Description', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
			'type'       => 'text',
		));
		$uid = $prefix.'icon';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
	}
	
	/*
		Contact Info --> Opening Hours
	===============================================*/
	if(apply_filters('empower_active_hours', false)){
		$prefix = 'contact_hours_';
		$section = 'contact_hours_section_';
		
		$wp_customize->add_section( $section , array(
			'title'      => __( 'Opening Hours', 'empower' ),
			'priority'   => 30,
			'panel'		=> 'contact_panel',
		));
		$uid = $prefix.'text';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Opening Hours', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'des';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Description', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
			'type'       => 'text',
		));
		$uid = $prefix.'icon';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
	}
	
	/*
		Contact Info --> Address
	===============================================*/
	if(apply_filters('empower_active_address', false)){
		$prefix = 'contact_address_';
		$section = 'contact_address_section_';
		
		$wp_customize->add_section( $section , array(
			'title'      => __( 'Address', 'empower' ),
			'priority'   => 30,
			'panel'		=> 'contact_panel',
		));
		$uid = $prefix.'line1';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Address Line 1', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'line2';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'wp_kses_post', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Address Line 2', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'icon';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
	}
	/*========================================================
		END ::: Contact Info
	=========================================================*/
	
	
	
	/*========================================================
		START::: Social Icons
	=========================================================*/
	if(apply_filters('empower_active_social_icons', false)){
		$prefix = 'social_icons_';
		$section = 'social_icons_section_';
		
		$wp_customize->add_section( $section , array(
			'title'			=> __('***Social Bookmarking', 'empower'),
			'priority'   => 30,
		));
		
		$uid = $prefix.'heading1';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #1', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_1';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_1';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_1';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		
		$uid = $prefix.'heading2';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #2', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_2';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_2';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_2';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		
		$uid = $prefix.'heading3';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #3', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_3';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_3';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_3';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		
		$uid = $prefix.'heading4';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #4', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_4';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_4';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_4';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		$uid = $prefix.'heading5';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #5', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_5';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_5';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_5';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		$uid = $prefix.'heading6';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #6', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_6';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_6';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_6';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
		
		$uid = $prefix.'heading7';
		$wp_customize->add_setting($uid, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control(new empower_Customize_Control_heading( $wp_customize, $uid, array(
			'label'      => __( 'Social Profile #7', 'empower' ),
			'section'    => $section,
			'settings'   => $uid,
		)));
		
		$uid = $prefix.'title_7';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Title', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'link_7';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'sanitize_text_field', ));
		$wp_customize->add_control( $uid, array(
			'label'      => __('Link', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'type'       => 'text',
			'description' => '',
		));
		$uid = $prefix.'image_17';
		$wp_customize->add_setting($uid, array( 'default' => empower_customize_std($uid), 'sanitize_callback' => 'esc_url', ));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $uid, array(
			'label'      => __('Icon', 'empower'),
			'section'    => $section,
			'settings'   => $uid,
			'description' => '',
		)));
	}
	/*========================================================
		END::: Social Icons
	=========================================================*/
	
	
	
}
endif;
add_action( 'customize_register', 'empower_customize_register' );



function empower_Customize_Control_heading($wp_customize){
	if( class_exists( 'WP_Customize_Control' ) ):
		class empower_Customize_Control_heading extends WP_Customize_Control {
			public $label;
			public $description;
			public $type = 'empower-heading';
			
			public function render_content(){
				?>
				<div class="empower_Customize_Control_heading" style="background: #fff; box-sizing: border-box; padding: 15px 20px; margin-left: -20px; margin-right: -20px; margin-top: 10px;">
					<?php
					if($this->label){ 
						echo '<h4 style="margin:0; font-size: 17px;">';
							echo $this->label;
						echo '</h4>'; 
					}
					if($this->description){ echo '<p>'.$this->description.'</p>'; }
					?>
				</div>
				<?php
			}
		}
	endif;
}
add_action( 'customize_register', 'empower_Customize_Control_heading', 1 );



function empower_Customize_Control_info($wp_customize){
	if( class_exists( 'WP_Customize_Control' ) ):
		class empower_Customize_Control_info extends WP_Customize_Control {
			public $label;
			public $description;
			public $type = 'empower-info';
			
			public function render_content(){
				?>
				<div>
					<?php
					if($this->label){ 
						echo '<h4 style="margin:0; font-size: 17px;">';
							echo $this->label;
						echo '</h4>'; 
					}
					if($this->description){ echo esc_html($this->description); }
					?>
				</div>
				<?php
			}
		}
	endif;
}
add_action( 'customize_register', 'empower_Customize_Control_info', 1 );