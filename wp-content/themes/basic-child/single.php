<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vefstofan
 */

get_header(); ?>

<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section_landing-page section_double-box background-blue">

	<div class="section section-top">

		<div class="container col-flex" id="post-<?php the_ID(); ?>">
			<div class="col-group">
				<div class="col-mb-12 col-tb-10 col-dt-10 col-ld-8 col-el-7 section-card-block">

					<div class="col-content">

						<div class="section-top-title">
							<?php $categories = get_the_category();
							$output = '';
							if ( ! empty( $categories ) ) {
							    foreach( $categories as $category ) {
							        $output .= '<h3>' . esc_html( $category->name ) . '</h3>';
							    }
							    echo trim( $output );
							} ?>

							<h1><?php the_title(); ?></h1>
							<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>	
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

				<div class="col-content col-fixed-square" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>

			</div>

		</div>

	</div>

</section>


<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-post-container">
	<div class="section">
		<div class="container">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</div>
	</div>
</section>

<?php
get_footer();
