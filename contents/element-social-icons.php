<?php
echo '<div class="empower-social-icons">';
	echo '<div class="empower-social-icons-in">';
		echo '<ul id="empower-social-icons">';
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
	echo '<a href="#empower-social-icons" class="inline-lightbox empower-social-icons-hand">'.__('Social', 'empower').'</a>';
echo '</div>';