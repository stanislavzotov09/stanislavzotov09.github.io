<?php
/*
Template Name: Card - Product features (with icons)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-features section-card_products_container col-fixed-normal <?php echo get_field("text_color")?> <?php echo get_field("background_color")?>">

	<div class="section section-card section-card_products col-content">

		<div class="container">
			<?php the_content(); ?>
			<div class="section-features_title">
				<h3><?php echo get_field('title') ?></h3>
			</div>

			<div class="section-card_products-content">

				<?php if(get_field('products')): ?>

					<div class="section-card_products-block">

						<div class="col-group">

							<?php while(has_sub_field('products')): ?>

								<div class="col-tb-6 col-ld-4 section-card_products-block--main">

									<div class="col-content">
										<div class="image-wrapper" style="background-image: url('<?php echo get_sub_field('products_image') ?>');">

											<img src="<?php echo get_sub_field('products_image') ?>" alt="">
											<p class="title"><?php echo get_sub_field('products_title') ?></p>

											<div class="hover-content">

												<div class="table">

													<div class="table-cell">
														<img src="<?php echo get_sub_field('products_icon') ?>" alt="">
														<p class="title"><?php echo get_sub_field('products_title') ?></p>
														<p class="description"><?php echo get_sub_field('products_description') ?></p>
													</div>

												</div>

											</div>

										</div>

									</div>

								</div>

							<?php endwhile; ?>

							<!--<div class="col-mb-12 section-features--button">-->
							<!--	<a href="#" class="btn"><?php echo get_field('button_text') ?></a>-->
							<!--</div>-->

						</div>

					</div>

				<?php endif; ?>
			</div>

		</div>

	</div>

</section>
