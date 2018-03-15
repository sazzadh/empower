<header class="site-header">
    	<div class="header-top">
        	<div class="section-inner clear">
            	<div class="header-top-left"><?php get_template_part('contents/element', 'social-icons'); ?></div>
                <div class="header-top-right"><?php get_template_part('contents/element', 'contact-text'); ?></div>
            </div>
        </div>
        <div class="header-main">
        	<div class="section-inner clear">
            	<div class="header-main-left"><?php empower_site_logo(); ?></div>
                <div class="header-main-right"><?php get_template_part('contents/element', 'header-widget'); ?></div>
            </div>
        </div>
        
        <div class="header-bottom">
        	<div class="section-inner clear">
            	<div class="header-bottom-left"><?php get_template_part('contents/element', 'primary-nav'); ?></div>
                <div class="header-bottom-right">
                    <?php get_template_part('contents/element', 'search-icon'); ?>
                    <?php get_template_part('contents/element', 'woo-cart'); ?>
                </div>
            </div>
        </div>
        
    </header>