<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vefstofan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-group'); ?>>
	<div class="col-mb-12">
		<div class="col-content">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content();
				?>
			</div><!-- .entry-content -->

		</div>
	</div>
</article><!-- #post-## -->
