<?php if(empower_mood('contact_address_disable') != true): ?>
<div class="empower_element_address <?php echo ((empower_mood('contact_address_icon') == '') ? 'no_icon' : 'has_icon') ?>">
	<div class="empower_element_address_in">
    	<?php if(empower_mood('contact_address_icon') != ''): ?>
            <div class="empower_element_address_icon">
                <img src="<?php echo esc_url(empower_mood('contact_address_icon')); ?>" alt="<?php esc_attr(empower_mood('contact_address_line1')); ?>">
            </div>
        <?php endif; ?>
        <div class="empower_element_address_text">
        	<span class="line_1"><?php echo wp_kses_post(empower_mood('contact_address_line1')); ?></span>
           	<span class="line_2"><?php echo wp_kses_post(empower_mood('contact_address_line2')); ?></span>
        </div>
    </div>
</div>
<?php endif; ?>