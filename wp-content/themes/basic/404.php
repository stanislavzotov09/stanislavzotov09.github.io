<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Vefstofan
 */

get_header(); ?>

	<div class="section">
		<div class="container">
				<div class="col-group">
					<div class="col-mb-12">
						<h1>404</h1>
						<h3><?php _e('The page you are looking for cannot be found.', 'html5reset'); ?></h3>
						<p><a href="<?php echo site_url(); ?>" class="btn">Take me home</a></p>
					</div>
				</div>
		</div>
	</div>

<?php
get_footer();
