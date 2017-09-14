<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vefstofan
 */

?>

	</div><!-- #content -->

</div><!-- #page -->

<footer>
	<div class="container">
		<div class="col-group">
			<div class="col-mb-12">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>
			<div class="col-mb-12">
				<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
