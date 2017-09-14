<?php
/*
Template Name: Page - Landing page contact
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section_landing-page section_double-box <?php echo the_field("background_color")?>">

		<div class="section section-top">

			<div class="container col-flex" id="post-<?php the_ID(); ?>">
				<div class="col-group">
					<div class="col-mb-12 <?php echo (is_front_page()) ? "col-dt-6" : "" ?> section-card-block" data-aos="flip-left" data-aos-delay="100">

						<div class="col-content">

							<div class="section-top-title">
								<?php the_content(); ?>
								<form class="contact-us-form">

									<h4>Contact us</h4>

									<input type="text" name="name" placeholder="Name" />
									<input type="email" name="email" placeholder="Email" required />
									<input type="text" name="title" placeholder="Title" />
									<input type="text" name="company" placeholder="Company" />
									<textarea name="message" placeholder="Message"></textarea>

									<input type="submit" value="Send" />

								</form>
							</div>

						</div>

					</div>
				</div>

			</div>

			<div class="col-group">


				<div class="col-mb-12 section_double-box--two" data-aos="flip-right" data-aos-delay="50">

					<div class="col-content col-fixed-square" style="background-image: url(<?php echo get_field("background_image"); ?>)"></div>

				</div>

			</div>

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

	<?php include 'trial-form.php'; ?>

<?php
get_footer();
