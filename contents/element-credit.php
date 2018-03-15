<?php
$empower_output = empower_mood('footer_copy_text', 'Copyright © [year] <a href="[link]" title="[name]"><span>[name]</span></a>. All rights reserved.');
$empower_output = str_replace( '[year]', date('Y'), $empower_output );
$empower_output = str_replace( '[link]', esc_url(home_url('/')), $empower_output );
$empower_output = str_replace( '[name]', get_bloginfo( 'name' ), $empower_output );
		
$empower_theme_name = empower_mood('theme_display_name', 'Empower');
$empower_theme_url = empower_mood('theme_page_url', '#');
$empower_theme_author = empower_mood('theme_author_name', 'WpEmpower');
?>
<div class="copyright">
	<?php echo wp_kses_post($empower_output); ?>
	<?php if(empower_mood('remove_theme_redit') != 'remove'): ?>
		<br>
		<?php _e('Powered by', 'empower') ?> <a href="<?php echo esc_url('http://wordpress.org'); ?>" target="_blank" title="WordPress"><span>WordPress</span></a>. 
		<?php _e('Theme:', 'empower') ?> <a href="<?php esc_url($empower_theme_url) ?>" target="_blank" title="<?php echo esc_attr($empower_theme_author); ?>" rel="designer"><?php echo esc_attr($empower_theme_name); ?></a>.
		<?php _e('By:', 'empower') ?> <a href="<?php esc_url($empower_theme_url) ?>" target="_blank" title="<?php echo esc_attr($empower_theme_author); ?>" rel="designer"><span><?php echo esc_attr($empower_theme_author); ?></span></a>.
	<?php endif; ?>
</div>