<?php
if(function_exists('WC')){
			echo '<div class="empower_woo_cart icon-light">';
				echo '<a href="'.wc_get_cart_url().'">';
					echo '<strong>'.sprintf ( _n( '%d <em class="screen-reader-text">item</span>', '%d <em class="screen-reader-text">items</em>', WC()->cart->get_cart_contents_count(), 'empower' ), WC()->cart->get_cart_contents_count() ).'</strong>';
					echo '<p>'.WC()->cart->get_cart_total().'</p>';
				echo '</a>';
			echo '</div>';
		}