<?php
/*
Template Name: Card - Article
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section_landing-page section_double-box <?php echo the_field("background_color")?>">

	<div class="section section-top">

		<div class="container col-flex" id="post-<?php the_ID(); ?>">
			<div class="col-group">
				<div class="col-mb-12 col-tb-10 col-dt-10 col-ld-8 col-el-7 section-card-block">

					<div class="col-content">

						<div class="section-top-title">
							<?php if ( ! empty ( $post->post_parent ) )
							{
							    $parent_title = get_the_title($post->post_parent);
							    echo "<h3>$parent_title</h3>";
							} ?>

							<h1><?php the_title(); ?></h1>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="col-group">

			<div class="col-mb-12 col-tb-7 col-dt-6 section_double-box--one">

				<div class="col-content col-fixed-square"></div>

			</div>
			<div class="col-mb-12 col-tb-5 col-dt-6 section_double-box--two">

				<div class="col-content col-fixed-square" style="background-image: url(<?php echo get_field("background_image"); ?>)"></div>

			</div>

		</div>

	</div>

</section>

<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-post-container">
	<div class="section">
		<div class="container">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="col-mb-12 col-tb-8 col-tb-offset-2">
					<div class="col-content">
						<div class="entry-content">
							<?php
								the_content();
							?>
						</div><!-- .entry-content -->

					</div>
				</div>
			</article><!-- #post-## -->

		</div>
	</div>
</section>
