<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vefstofan
 */

get_header(); ?>

<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>">
	<div class="section">
		<div class="container">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div>
	</div>
</section>

<?php
get_sidebar();
get_footer();
