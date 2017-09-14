<?php
/*
Template Name: Card - DD Contact Block
*/
?>
<?php the_content(); ?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="col-fixed-normal section-card_dd-contact-block <?php echo get_field("background_color")?> section-card-triple-icons-container">

	<div class="section section-card section-card-triple-icons col-content">

		<div class="container">

			<div class="dd-padder">

				<div class="dd-live-talk">

					<h3>Talk Live</h3>

					<div class="dd-live-talk-location">
						<div class="dd-live-talk-image"><img src="/wp-content/uploads/2017/07/location-icon-london-1.svg" /></div>
						<div class="dd-live-talk-info">
							<span class="city">London</span>
							<span class="number"><a href="tel:+448455310005">+44 (0) 845 531 000 5</a></span>
						</div>
					</div>
					<div class="dd-live-talk-location">
						<div class="dd-live-talk-image"><img src="/wp-content/uploads/2017/07/location-icon-sanfrancisco-1.svg" /></div>
						<div class="dd-live-talk-info">
							<span class="city">San Francisco</span>
							<span class="number"><a href="tel:+16504340998">+1 650 434 0998</a></span>
						</div>
					</div>
					<div class="dd-live-talk-location">
						<div class="dd-live-talk-image"><img src="/wp-content/uploads/2017/07/location-icon-reykjavik-1.svg" style="width: 45px; height: 45px;" /></div>
						<div class="dd-live-talk-info">
							<span class="city">Reykjavik</span>
							<span class="number"><a href="tel:+3545253535">+354 525 3535</a></span>
						</div>
					</div>

				</div>

				<div class="dd-inqueries">

					<h3>Company Inquiries</h3>

					<div class="dd-block">
						<h4>Public Relations</h4>
						<a href="mailto:pr@datadwell.com">pr@datadwell.com</a>
					</div>

					<div class="dd-block">
						<h4>Investment</h4>
						<a href="mailto:invest@datadwell.com">invest@datadwell.com</a>
					</div>

					<div class="dd-block" style="clear: left;">
						<h4>Careers</h4>
						<a href="mailto:careers@datadwell.com">careers@datadwell.com</a>
					</div>

				</div>
			</div>

		</div>

	</div>

</section>
