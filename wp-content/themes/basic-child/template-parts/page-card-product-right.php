<?php
/*
Template Name: Card - Product Card (Right)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal section_double-box">

	<div class="section section-card section-card-product section-card-product--right col-content">

		<div class="container">

			<article class="col-group">

				<div class="col-mb-12 section-card-block col-flex">

					<div class="col-content">

						<?php the_content(); ?>

						<div class="main-carousel">
						  <div class="carousel-cell" data-aos="zoom-in">
						  	<img src="<?php echo get_stylesheet_directory_uri()."/_/img/clone-your-best-sales-rep.svg" ?>">
							<h4><?php echo get_field("burlb_1"); ?></h4>
							<p><?php echo get_field("sub_burlb_1"); ?></p>
						  </div>
						  <div class="carousel-cell" data-aos="zoom-in">
						  	<img src="<?php echo get_stylesheet_directory_uri()."/_/img/match-winning-content.svg" ?>">
							<h4><?php echo get_field("burlb_2"); ?></h4>
							<p><?php echo get_field("sub_burlb_2"); ?></p>
						  </div>
						  <div class="carousel-cell" data-aos="zoom-in">
						  	<img src="<?php echo get_stylesheet_directory_uri()."/_/img/real-time.svg" ?>">
							<h4><?php echo get_field("burlb_3"); ?></h4>
							<p><?php echo get_field("sub_burlb_3"); ?></p>
						  </div>
						</div>

						<a href="<?php echo get_field("button_1_link"); ?>" class="btn"><?php echo get_field("button_1_label"); ?></a>
						<a href="<?php echo get_field("button_2_link"); ?>" class="btn btn-noborder"><?php echo get_field("button_2_label"); ?></a>

					</div>

				</div>

			</article>

		</div>

		<div class="col-group">

			<div class="col-mb-12 col-tb-12 col-dt-12 section_double-box--two">

				<div class="col-content col-fixed-square" style="background-image: url(<?php echo get_field("background_image"); ?>)"></div>

			</div>

		</div>

	</div>

</section>
