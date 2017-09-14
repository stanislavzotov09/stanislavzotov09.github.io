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
			<div class="col-mb-12 col-tb-8 footer-menu">
				<div class="col-content">
					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				</div>

			</div>
			<div class="col-mb-12 col-tb-4 footer-social">
				<div class="col-content">
					<p><strong><a href="mailto:datadwell@datadwell.com">datadwell@datadwell.com</a></strong></p>
					<p><a href="tel:+448455310005">+44 (0) 845 531 000 5</a></p>
					<p><a href="/contact-us">Contact</a></p>
					<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
				</div>

			</div>
		</div>
	</div>
</footer>
<div class="sub-footer">
	<div class="container">
		<div class="col-group">
			<div class="col-mb-12 col-tb-8">
				<div class="col-content">
					DATA DWELL 2016 © ALL RIGHTS RESERVED
				</div>

			</div>
		</div>
	</div>


</div>

<?php wp_footer(); ?>
<script type="text/javascript">
    window._chatlio = window._chatlio||[];
    !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.1");
       n.setAttribute('data-widget-id','d0d8d733-05d0-48d6-5455-cf29b9b6a39c');
       c.parentNode.insertBefore(n,c);
    }();
</script>
</body>
</html>
