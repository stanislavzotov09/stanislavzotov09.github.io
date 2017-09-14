<?php
/*
Template Name: Card (Quadruple with icons)
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal <?php echo get_field("background_color")?> section-card-quadruple-icons-container" style="background-image: url('<?php echo get_field("background_image")?> ')">

	<div class="section section-card section-card-quadruple-icons col-content">

		<div class="container">

			<div class="section-card-quadruple-icons-content">
				<div class="section-card_title">
					<h3><?php the_title(); ?></h3>
				</div>

				<article class="col-group">

					<div class="col-mb-12 col-tb-6 col-dt-3 section-card-quadruple-icons-item">
						<div class="col-content">
							<img src="<?php echo get_field('quadruple_icon_1') ?>" alt="">

							<h3><?php echo get_field('quadruple_title_1') ?></h3>

							<p data-aos="fade-up" data-aos-delay="0">
								<?php the_field('quadruple_content_1'); ?>
							</p>
						</div>
					</div>

					<div class="col-mb-12 col-tb-6 col-dt-3  section-card-quadruple-icons-item">

						<div class="col-content">
							<img src="<?php echo get_field('quadruple_icon_2') ?>" alt="">

							<h3><?php echo get_field('quadruple_title_2') ?></h3>

							<p data-aos="fade-up" data-aos-delay="50">
								<?php the_field('quadruple_content_2'); ?>
							</p>
						</div>

					</div>

					<div class="col-mb-12 col-tb-6 col-dt-3 section-card-quadruple-icons-item">

						<div class="col-content">
							<img src="<?php echo get_field('quadruple_icon_3') ?>" alt="">

							<h3><?php echo get_field('quadruple_title_3') ?></h3>

							<p data-aos="fade-up" data-aos-delay="100">
								<?php the_field('quadruple_content_3'); ?>
							</p>
						</div>

					</div>

					<div class="col-mb-12 col-tb-6 col-dt-3 section-card-quadruple-icons-item">

						<div class="col-content">
							<img src="<?php echo get_field('quadruple_icon_4') ?>" alt="">

							<h3><?php echo get_field('quadruple_title_4') ?></h3>

							<p data-aos="fade-up" data-aos-delay="100">
								<?php the_field('quadruple_content_4'); ?>
							</p>
						</div>

					</div>

				</article>
			</div>

		</div>

	</div>

</section>
