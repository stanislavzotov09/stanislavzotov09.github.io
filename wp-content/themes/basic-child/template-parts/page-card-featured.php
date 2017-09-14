<?php
/*
Template Name: Card (Featured)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal section-card-featured-container">

	<div class="section section-card section-card-featured col-content"  style="background-image: url(<?php echo get_field("background_image"); ?>)">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12">

					<?php the_content(); ?>

				</div>

			</article>

		</div>

	</div>

</section>
