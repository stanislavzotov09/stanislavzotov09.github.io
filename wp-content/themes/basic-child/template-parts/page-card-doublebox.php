<?php
/*
Template Name: Card (Double box)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal">

	<div class="section section-card section-card-double col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12 col-tb-6 section-card-block <?php echo get_field("background_content_1")?>" data-aos="slide-right">

					<div class="col-group col-fixed-square">

						<div class="col-content col-flex col-mb-12">

							<div class="section-card-double-block--one section-card-double-block">

								<span>
									<img class="icon-<?php echo get_field("icon_content_1")?>" src="<?php echo get_stylesheet_directory_uri() . "/_/img/icon-" . get_field("icon_content_1")?>.gif">
								</span>
								
								<?php the_field('double_content_1'); ?>
								
								
							</div>

						</div>

					</div>

				</div>

				<div class="col-mb-12 col-tb-6 section-card-block <?php echo get_field("background_content_2")?>" data-aos="slide-left">

					<div class="col-group col-fixed-square">

						<div class="col-content col-flex col-mb-12">

							<div class="section-card-double-block--one section-card-double-block">
							
								<span>
									<img class="icon-<?php echo get_field("icon_content_2")?>" src="<?php echo get_stylesheet_directory_uri() . "/_/img/icon-" . get_field("icon_content_2")?>.gif">
								</span>
								
								<?php the_field('double_content_2'); ?>
								
							</div>

						</div>

					</div>

				</div>

			</article>

		</div>

	</div>

</section>
