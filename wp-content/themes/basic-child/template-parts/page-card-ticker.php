<?php
/*
Template Name: Card - Ticker
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card-ticker-container col-fixed-normal">

	<div class="section section-card section-card-ticker col-content">

		<div class="container">

			<div class="section-card-ticker-content">

				<div class="col-group col-flex">

					<div class="col-mb-12 col-tb-2 section-card-ticker--title">
						<div class="col-content">
							<h3>Next Event</h3>
						</div>
					</div>

					<div class="col-mb-12 col-tb-8">
						<div class="col-content">
							<?php the_content(); ?>
						</div>
					</div>

					<div class="col-mb-12 col-tb-2 section-card-ticker--btn">
						<div class="col-content">
							<a class="btn btn-noborder" href="<?php the_field('link') ?>">More</a>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

</section>
