<?php
/*
Template Name: Card - Testimonials
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_testimonial_container col-fixed-normal align-<?php echo get_field("text_alignment") ?> <?php echo get_field("text_color")?> <?php echo get_field("background_color")?> <?php echo get_field("card_format")?>" style="background-image: url(<?php echo get_field("background_image"); ?>)">

	<div class="section section-card section-card_testimonial col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12">

					<div class="col-group section-card_testimonial_content">

						<?php $c = 1; ?>
						<?php if(get_field('testimonial_items')): ?>

								<?php while(has_sub_field('testimonial_items')): ?>
								<?php
								$testimonial_items = get_field('testimonial_items');
								$testimonial_items_count = count($testimonial_items);

								if( $testimonial_items_count > 1 ): ?>
									<div class="section-card_testimonial_content_item">

										<div class="section-card_testimonial_content_item_photo col-mb-12 col-tb-4 col-dt-3">
										<?php if( get_sub_field('testimonial_photo') ): ?>
								        	<img src="<?php the_sub_field('testimonial_photo'); ?>" />
							        	<?php endif; ?>
										</div>
										<div class="section-card_testimonial_content_item_meta col-mb-12 col-tb-8 col-dt-9">
											<div>
												<span><i class="icon-quote-open"></i></span>
												<?php the_sub_field('testimonial_quote'); ?>
												<span><i class="icon-quote-close"></i></span>
											</div>
											<h3><?php the_sub_field('testimonial_name'); ?></h3>
							        		<p><?php the_sub_field('testimonial_title'); ?></p>
										</div>

									</div>
								<?php else : ?>
									<div class="section-card_testimonial_content_item section-card_testimonial_content_item--one">

										<div class="section-card_testimonial_content_item_photo col-mb-12">
										<?php if( get_sub_field('testimonial_photo') ): ?>
							          		<img src="<?php the_sub_field('testimonial_photo'); ?>" />
							        	<?php endif; ?>
										</div>
										<div class="section-card_testimonial_content_item_meta col-mb-12">
											<div>
												<span><i class="icon-quote-open"></i></span>
												<?php the_sub_field('testimonial_quote'); ?>
												<span><i class="icon-quote-close"></i></span>
											</div>
											<h3><?php the_sub_field('testimonial_name'); ?></h3>
							        		<p><?php the_sub_field('testimonial_title'); ?></p>
										</div>

									</div>
								<?php endif; ?>

								<?php $c++; ?>

								<?php endwhile; ?>

						<?php endif; ?>

					</div>

				</div>

			</article>

		</div>

</section>
