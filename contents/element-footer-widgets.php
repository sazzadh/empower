<?php if(empower_mood('footer_widgets_disable') != true): ?>
<div class="empower_element_address">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<div class="col-md-3"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<div class="col-md-3"><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<div class="col-md-3"><?php dynamic_sidebar( 'footer-4' ); ?></div>
		</div>
	</div>
</div>
<?php endif; ?>