<?php
/*
Template Name: Card (Simple)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal align-<?php echo get_field("text_alignment") ?> <?php echo get_field("text_color")?> <?php echo get_field("background_color")?> <?php echo get_field("card_format")?>" style="background-image: url(<?php echo get_field("background_image"); ?>)">

	<div class="section section-card section-card-simple col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12">

					<?php the_content(); ?>

				</div>

			</article>

		</div>

	</div>

</section>
