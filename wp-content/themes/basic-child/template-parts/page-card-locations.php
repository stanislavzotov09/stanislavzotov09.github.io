<?php
/*
Template Name: Card (Locations)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal <?php echo get_field("background_color")?> section-card-triple-icons-container">

	<div class="section section-card section-card-triple-icons col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12 col-tb-4">

					<div class="icon-container icon-1">
						<img src="<?php echo get_field('triple_icon_1') ?>" height="100" alt="">
					</div>

					<div data-aos="fade-up">
						<h4 data-aos-delay="0">
							<?php the_field('triple_content_1_title'); ?>
						</h4>

						<p data-aos-delay="0">
							<?php the_field('triple_content_1'); ?><br>
							<?php the_field('triple_content_1_2'); ?><br>
							<?php the_field('triple_content_1_3'); ?>
						</p>
					</div>

				</div>

				<div class="col-mb-12 col-tb-4">

					<div class="icon-container icon-2">
						<img src="<?php echo get_field('triple_icon_2') ?>" height="100" alt="">
					</div>

					<div data-aos="fade-up" data-aos-delay="50">
						<h4 data-aos-delay="0">
							<?php the_field('triple_content_2_title'); ?>
						</h4>

						<p data-aos-delay="0">
							<?php the_field('triple_content_2'); ?><br>
							<?php the_field('triple_content_2_2'); ?><br>
							<?php the_field('triple_content_2_3'); ?>
						</p>
					</div>

				</div>

				<div class="col-mb-12 col-tb-4">

					<div class="icon-container icon-3">
						<img src="<?php echo get_field('triple_icon_3') ?>" height="100" alt="">
					</div>

					<div data-aos="fade-up" data-aos-delay="100">
						<h4 data-aos-delay="0">
							<?php the_field('triple_content_3_title'); ?>
						</h4>

						<p data-aos-delay="0">
							<?php the_field('triple_content_3'); ?><br>
							<?php the_field('triple_content_3_2'); ?><br>
							<?php the_field('triple_content_3_3'); ?>
						</p>
					</div>

				</div>

			</article>

		</div>

	</div>

</section>
