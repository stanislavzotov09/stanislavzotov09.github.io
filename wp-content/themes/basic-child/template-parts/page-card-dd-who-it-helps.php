<?php
/*
Template Name: Card - DD Who it helps
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal section-card_dd-who-it-helps section-card_dd-who-it-helps-bg-<?php echo get_field("background_color")?>">

	<div class="section section-card col-content">

		<div class="container">

			<div class="section-card_dd-who-it-helps_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<div class="section-card_dd-who-it-helps-content">

				<?php if(get_field('products')): ?>

					<div class="section-card_dd-who-it-helps-block">

						<div class="col-group">


								<div class="col-tb-6 col-ld-4 section-card_dd-who-it-helps-block--main">

									<div class="col-content">

										<ul>
											<?php while(has_sub_field('products')): ?>
												<li>
													<div class="glass">
														<div class="img">
															<img src="<?php echo get_sub_field('products_icon') ?>" alt="">
														</div>
														<span class="title"><?php echo get_sub_field('products_title') ?></span>
														<span class="description"><?php echo get_sub_field('products_description') ?></span>
													</div>
												</li>
											<?php endwhile; ?>
										</ul>

									</div>

								</div>


						</div>

					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>