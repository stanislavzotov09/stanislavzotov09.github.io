<?php
/*
Template Name: Page - Landing page (parent)
*/
get_header(); ?>

	<?php query_posts(array( 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_parent' => $wp_query->get_queried_object_id() )); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php

		$template_name = str_replace(".php", "", get_page_template_slug());
		$template_name = str_replace("template-parts/page-", "", $template_name);
		get_template_part( 'template-parts/page', $template_name);

		?>

	<?php endwhile; endif; ?>

<?php
get_footer();
