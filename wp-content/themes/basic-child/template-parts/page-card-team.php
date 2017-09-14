<?php
/*
Template Name: Card - Team
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_team_container col-fixed-normal align-<?php echo get_field("text_alignment") ?> <?php echo get_field("text_color")?> <?php echo get_field("background_color")?> <?php echo get_field("card_format")?>" style="background-image: url(<?php echo get_field("background_image"); ?>)">

	<div class="section section-card section-card_team col-content">

		<div class="container">

			<div class="section-card_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<div class="section-card_team_content">

				<?php $c = 1; ?>
				<?php if(get_field('team_items')): ?>

						<?php while(has_sub_field('team_items')): ?>

							<div class="section-card_team_content_item" data-aos="fade-up" data-aos-delay="100">

								<div class="section-card_team_content_item_meta">
									<h3><?php the_sub_field('team_name'); ?></h3>
									<p><?php the_sub_field('team_title'); ?></p>
								</div>
								<div class="section-card_team_content_item_photo col-fixed-square" style="background-image:url('<?php the_sub_field('team_photo'); ?>')">

								</div>

							</div>

						<?php $c++; ?>

						<?php endwhile; ?>

				<?php endif; ?>

			</div>

		</div>

</section>