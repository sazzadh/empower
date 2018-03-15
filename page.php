<?php get_header(); ?>
<main class="site-content has-sidebar">
	<div class="site-content-in section-inner">
        <div class="primary">
            <?php get_template_part('contents/content', 'page'); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>