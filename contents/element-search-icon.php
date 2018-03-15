<?php
echo '<div class="empower_search_icon icon-light">';
			echo '<a href="#empower_search_icon_content" class="empower_search_icon_hand inline-lightbox">'.__('Search', 'empower').'</a>';
		echo '</div>';
		
		echo '<div style="display:none;">';
			echo '<div id="empower_search_icon_content" class="empower_search_icon_content">';
				get_search_form();
			echo '</div>';
		echo '</div>';