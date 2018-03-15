<?php if(empower_mood('contact_phone_disable') != true): ?>
<div class="empower_element_phone <?php echo ((empower_mood('contact_phone_icon') == '') ? 'no_icon' : 'has_icon') ?>">
	<div class="empower_element_phone_in">
    	<?php if(empower_mood('contact_phone_icon') != ''): ?>
            <div class="empower_element_phone_icon">
                <img src="<?php echo esc_url(empower_mood('contact_phone_icon')); ?>" alt="<?php echo esc_attr(empower_mood('contact_phone_des')); ?>">
            </div>
        <?php endif; ?>
        <div class="empower_element_phone_text">
        	<span class="des"><?php echo wp_kses_post(empower_mood('contact_phone_des')); ?></span>
           	<span class="text">
            	<?php if(empower_mood('contact_phone_link') != ''): ?>
            		<a href="tel:<?php echo esc_attr(empower_mood('contact_phone_link')); ?>"><?php echo esc_attr(empower_mood('contact_phone_text')); ?></a>
                <?php else: ?>
                	<?php echo esc_attr(empower_mood('contact_phone_text')); ?>
                <?php endif; ?>
            </span>
        </div>
    </div>
</div>
<?php endif; ?>