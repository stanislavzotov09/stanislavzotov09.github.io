<?php
/*
Template Name: Page - Landing page with header (parent)
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="align-<?php echo get_field("text_alignment") ?> <?php echo get_field("text_color")?> <?php echo get_field("background_color")?>" style="background-image: url(<?php echo get_field("background_image"); ?>">

		<div class="section section-top">

			<article class="col-group" id="post-<?php the_ID(); ?>">

				<div class="col-full">

					<div class="col-content">

						<div class="section-top-title">

							<h1><span><?php the_title(); ?></span></h1>
							<?php the_content(); ?>

						</div>

					</div>

				</div>

			</article>

		</div>

	</section>

	<?php endwhile; endif; ?>

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
