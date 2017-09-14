<?php
/*
Template Name: Card (Triple)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal align-<?php echo get_field("text_alignment") ?> <?php echo get_field("text_color")?> <?php echo get_field("background_color")?> <?php echo get_field("card_format")?>" style="background-image: url(<?php echo get_field("background_image"); ?>)">

	<div class="section section-card section-card-triple col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12 col-tb-4">

					<p>
						<?php the_field('triple_content_1'); ?>
					</p>

				</div>

				<div class="col-mb-12 col-tb-4">

					<p>
						<?php the_field('triple_content_2'); ?>
					</p>

				</div>

				<div class="col-mb-12 col-tb-4">

					<p>
						<?php the_field('triple_content_3'); ?>
					</p>

				</div>

			</article>

		</div>

	</div>

</section>
