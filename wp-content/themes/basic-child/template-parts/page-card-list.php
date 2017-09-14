<?php
/*
Template Name: Card - List items
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_list_container col-fixed-normal <?php echo get_field("background_color")?>">

	<div class="section section-card section-card_list col-content">

		<div class="container">

			<div class="section-card_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<div class="section-card_list-items">
				<?php $c = 1; ?>
				<?php if(get_field('list_items')): ?>

						<?php while(has_sub_field('list_items')): ?>

							<div class="section-card_list-item col-group">
								<div class="col-mb-12 col-tb-4">
									<div class="col-content section-card_list-item--title">
										<h3>
											<?php echo $c ?>.
											<?php the_sub_field('item_title'); ?>
										</h3>
									</div>
								</div>
								<div class="col-mb-12 col-tb-8">
									<div class="col-content section-card_list-item--description">
										<?php the_sub_field('item_description'); ?>
									</div>
								</div>
							</div>

							<?php $c++; ?>

						<?php endwhile; ?>

				<?php endif; ?>
			</div>

		</div>

	</div>

</section>
