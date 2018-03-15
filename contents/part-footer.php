<footer class="site_footer">
        <div class="footer-top">
            <div class="section-inner clear">
				<?php get_template_part('contents/element', 'address'); ?>
				<?php get_template_part('contents/element', 'phone'); ?>
				<?php get_template_part('contents/element', 'email'); ?>
				<?php get_template_part('contents/element', 'openHours'); ?>
            </div>
        </div>
        <div class="footer-widgets">
            <div class="section-inner clear">
                <?php get_template_part('contents/element', 'footer-widgets'); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="section-inner clear">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6"><?php get_template_part('contents/element', 'credit'); ?></div>
                        <div class="col-md-6"><?php get_template_part('contents/element', 'footer-nav'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>