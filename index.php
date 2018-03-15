<?php get_header(); ?>
<main class="site-content has-sidebar">
	<div class="site-content-in section-inner">
        <div class="primary">
            <?php 
				if(is_page()){
					get_template_part('contents/content', 'page');
				}elseif(is_search()){
					get_template_part('contents/content', 'search');
				}elseif(is_single()){
					get_template_part('contents/content', 'single-post');
				}else{
					get_template_part('contents/content', 'post-archive'); 
				}
			?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>