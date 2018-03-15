<?php
if(empower_mood('contact_info_text') != ''){
	echo '<div class="empower_element_contactText">';
		echo wp_kses_post(empower_mood('contact_info_text'));
	echo '</div>';
}