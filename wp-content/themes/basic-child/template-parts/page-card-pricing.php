<?php
/*
Template Name: Card - Pricing
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal section-card-pricing-container">

	<div class="section section-card section-card-pricing col-content">

		<div class="container">
			<?php the_content(); ?>
			<div class="section-card_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<article class="col-group">

				<div class="col-mb-12 col-tb-6 section-card-block section-card-block_jet">

					<img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/plane.png">

					<div class="col-group">

						<div class="col-content">

							<div class="section-card-block_pack section-card-block_pack--name">
								<h3>Jet</h3>
								<p>Package</p>
							</div>
							<div class="section-card-block_pack section-card-block_pack--price">
								<h1 data-aos="zoom-in"><span>$</span> <?php echo get_field('pack_price_2') ?></h1>
								<p>per month</p>
							</div>
							<div class="section-card-block_pack section-card-block_pack--features">
								<ul>
									<?php $c = 1; ?>
									<?php if(get_field('pack_features_2')): ?>

											<?php while(has_sub_field('pack_features_2')): ?>
												<li data-aos="zoom-in"><?php echo get_sub_field('feature_2') ?></li>
											<?php $c++; ?>

											<?php endwhile; ?>

									<?php endif; ?>
								</ul>


								<a href="<?php echo get_field('link_2') ?>" class="btn btn-white">Try it now</a>
							</div>


							<div class="blur-effect"></div>

						</div>

					</div>

				</div>

				<div class="col-mb-12 col-tb-6 section-card-block section-card-block_rocket">

					<img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/rocket.png">

					<div class="col-group">

						<div class="col-content">

							<div class="section-card-block_pack section-card-block_pack--name">
								<h3>Rocket</h3>
								<p>Package</p>
							</div>
							<div class="section-card-block_pack section-card-block_pack--price">
								<h1 data-aos="zoom-in"><span>$</span> <?php echo get_field('pack_price_1') ?></h1>
								<p>per month</p>
							</div>
							<div class="section-card-block_pack section-card-block_pack--features">
								<ul>
									<?php $c = 1; ?>
									<?php if(get_field('pack_features_1')): ?>

											<?php while(has_sub_field('pack_features_1')): ?>
												<li data-aos="zoom-in"><?php echo get_sub_field('feature_1') ?></li>
											<?php $c++; ?>

											<?php endwhile; ?>

									<?php endif; ?>
								</ul>


								<a href="<?php echo get_field('link_1') ?>" class="btn btn-white">Try it now</a>
							</div>

						</div>

					</div>

				</div>

			</article>

		</div>

	</div>
	<div class="section-card-pricing--background" style="background-image: url(<?php echo get_field("background_image"); ?>)">

	</div>
</section>
