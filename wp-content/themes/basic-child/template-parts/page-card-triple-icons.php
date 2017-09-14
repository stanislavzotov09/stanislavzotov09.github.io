<?php
/*
Template Name: Card (Triple with icons)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal <?php echo get_field("background_color")?> section-card-triple-icons-container">

	<div class="section section-card section-card-triple-icons col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12 col-tb-4">
					<img src="<?php echo get_field('triple_icon_1') ?>" alt="">

					<div data-aos="fade-up">
						<h3 data-aos-delay="0">
							<?php the_field('triple_content_1_title'); ?>
						</h3>

						<p data-aos-delay="0">
							<?php the_field('triple_content_1'); ?>
						</p>
					</div>

				</div>

				<div class="col-mb-12 col-tb-4">

					<img src="<?php echo get_field('triple_icon_2') ?>" alt="">

					<div data-aos="fade-up" data-aos-delay="50">
						<h3 data-aos-delay="0">
							<?php the_field('triple_content_2_title'); ?>
						</h3>

						<p data-aos-delay="0">
							<?php the_field('triple_content_2'); ?>
						</p>
					</div>

				</div>

				<div class="col-mb-12 col-tb-4">

					<img src="<?php echo get_field('triple_icon_3') ?>" alt="">

					<div data-aos="fade-up" data-aos-delay="100">
						<h3 data-aos-delay="0">
							<?php the_field('triple_content_3_title'); ?>
						</h3>

						<p data-aos-delay="0">
							<?php the_field('triple_content_3'); ?>
						</p>
					</div>

				</div>

			</article>

		</div>

	</div>

</section>
