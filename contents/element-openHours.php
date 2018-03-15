<?php if(empower_mood('contact_hours_disable') != true): ?>
<div class="empower_element_hours <?php echo ((empower_mood('contact_hours_icon') == '') ? 'no_icon' : 'has_icon') ?>">
	<div class="empower_element_hours_in">
    	<?php if(empower_mood('contact_hours_icon') != ''): ?>
            <div class="empower_element_hours_icon">
                <img src="<?php echo esc_url(empower_mood('contact_hours_icon')); ?>" alt="<?php echo esc_attr(empower_mood('contact_hours_line1')); ?>">
            </div>
        <?php endif; ?>
        <div class="empower_element_hours_text">
        	<span class="line_1"><?php echo wp_kses_post(empower_mood('contact_hours_text')); ?></span>
           	<span class="line_2"><?php echo wp_kses_post(empower_mood('contact_hours_des')); ?></span>
        </div>
    </div>
</div>
<?php endif; ?>