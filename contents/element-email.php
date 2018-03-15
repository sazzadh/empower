<?php if(empower_mood('contact_email_disable') != true): ?>
<div class="empower_element_email <?php echo ((empower_mood('contact_email_icon') == '') ? 'no_icon' : 'has_icon') ?>">
	<div class="empower_element_email_in">
    	<?php if(empower_mood('contact_email_icon') != ''): ?>
            <div class="empower_element_email_icon">
                <img src="<?php echo esc_url(empower_mood('contact_email_icon')); ?>" alt="<?php echo esc_attr(empower_mood('contact_email_des')); ?>">
            </div>
        <?php endif; ?>
        <div class="empower_element_email_text">
        	<span class="des"><?php echo wp_kses_post(empower_mood('contact_email_des')); ?></span>
           	<span class="text"><a href="mailto:<?php echo esc_attr(empower_mood('contact_email_text')); ?>"><?php echo esc_attr(empower_mood('contact_email_text')); ?></a></span>
        </div>
    </div>
</div>
<?php endif; ?>