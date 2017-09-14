<?php
/*
Template Name: Card - Customers logos
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_customer_container col-fixed-normal <?php echo get_field("text_color")?> <?php echo get_field("background_color")?>" style="background-image: url('<?php echo get_field('background_image'); ?>');">



	<div class="section section-card section-card_customer-logos col-content">

		<div class="container">

			<div class="section-card_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<div class="section-card_customer-logos_images">

				<?php if(get_field('customer_logos')): ?>

						<?php while(has_sub_field('customer_logos')): ?>

							<div class="section-card_customer-logos_imgs">
								<img src="<?php the_sub_field('customer_logo'); ?>" title="<?php the_sub_field('customer_name'); ?>" />
							</div>

						<?php endwhile; ?>

				<?php endif; ?>
			</div>

		</div>

	</div>

</section>
