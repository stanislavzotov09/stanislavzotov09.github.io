/* global $, AOS, ga */
(function($) {})(window.jQuery);

// Retina
var retina = window.devicePixelRatio > 1;
if (retina) {
    $("img[data-2x]").each(function() {
        $(this).attr("src", $(this).data("2x"));
    });
}

//Remove toggled class from menu on 1200 viewport size
$(window).resize(function() {
    if ($(window).width() > 1200) {
        $("#site-navigation").removeClass("toggled");
    }
});

var scrollTopLast = 0;

$(document).ready(function() {

    AOS.init();

    if ($("body").hasClass("admin-bar")) {
        $(".site-header").addClass("logged");
    } else {
        $(".site-header").removeClass("logged");
    }

    // Sticky nav
    // var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var threshold = 100;
    var header = $('header');

    $(window).scroll(function(event) {
        var scroll = $(this).scrollTop();
        if (scroll == 0) {
            header.removeClass('header-fixed');
            header.removeClass('header-inview');
            header.css('margin-top', 0);
        } else if((!header.hasClass('header-fixed') || header.css('margin-top') != 0) && scroll > 100 && scroll - lastScrollTop < 0) {
            header.addClass('header-fixed');
            header.addClass('header-inview');
            header.css('margin-top', 0);
        } else if(header.hasClass('header-fixed') && scroll - lastScrollTop > 0) {
            var change = Math.round((scroll - lastScrollTop) + Math.abs(parseInt(header.css('margin-top').replace(/px/, ''), 10)));
            if(change > 100) {
                header.removeClass('header-fixed');
                header.removeClass('header-inview');
                header.css('margin-top', 0);
            } else {
                header.css('margin-top', (0-change) + 'px');
            }
        }
        lastScrollTop = scroll;
    });
    $(window).resize(function() {
        if($(window).width() < 1200) {
            $("#primary-menu li:last").removeClass('btn');
        } else {
            $("#primary-menu li:last").addClass('btn');
        }
    }).resize();
    if($(window).scrollTop() > 100) {
        header.addClass('header-fixed');
        header.addClass('header-inview');
    }
    $(window).resize(function(e) {
        var window_height = $(this).height();
        if($('.section_landing-page-100').length > 0) {
            var section_height = window_height;
        } else {
            var section_height = Math.round(0.9*window_height);
            if(section_height < 600) {
                section_height = 600;
            }
        }
       $('.section_landing-page').height(section_height);
    }).resize();

    if($('.contact-us-form').length > 0) {
        $('.contact-us-form').submit(function(e) {
            e.preventDefault();
            console.log(this.name.value);
			$('.inboundnow-form-contact input[name=wpleads_last_name]').val(this.name.value);
			$('.inboundnow-form-contact input[name=wpleads_email_address]').val(this.email.value).keydown().keyup();
			$('.inboundnow-form-contact input[name=wpleads_company_name]').val(this.company.value);
			$('.inboundnow-form-contact input[name=wpleads_job_title]').val(this.title.value);
			$('.inboundnow-form-contact textarea[name=wpleads_message]').val(this.message.value);
			$('.inboundnow-form-contact form button[type=submit]').click();
			$('#free-trial-modal').hide();
			$('#thank-you-modal').show();
			ga('set', 'page', '/contact-thanks');
            ga('send', 'pageview');
        });
    }

    if($('.free-trial-form').length > 0) {
        $('.free-trial-form').submit(function(e) {
            e.preventDefault();
			$('.inboundnow-form-trial input[name=wpleads_users]').val(this.users.value);
			$('.inboundnow-form-trial input[name=wpleads_email_address]').val(this.email.value).keydown().keyup();
			$('.inboundnow-form-trial form button[type=submit]').click();
			$('#free-trial-modal').hide();
			$('#thank-you-modal').show();
			ga('set', 'page', '/free-trial-thanks');
            ga('send', 'pageview');
        });
        $('#free-trial-modal input[type=button]').click(function(e) {
            e.preventDefault();
            $('#free-trial-modal .form-1').hide();
            $('#free-trial-modal .form-2').show();
        });
        $('.dd-modal .close').click(function(e) {
            e.preventDefault();
            $(this).closest('.dd-modal').hide();
        });
        $('a[href="/markaccel/free-trial"],a[href="/sales-athlete/free-trial"]').click(function(e) {
            e.preventDefault();
            $('#free-trial-modal').show();
            $('#free-trial-modal .form-1').show();
            $('#free-trial-modal .form-2').hide();
            var href = $(this).attr('href');
            var product = 'Sales Athlete';
            if(href.indexOf('markaccel') !== -1) {
                product = 'MarkAccel';
            }
            $('.inboundnow-form-trial input[name=wpleads_product]').val(product);

        });
        // $('#free-trial-modal').click(function(e) {
        //     e.preventDefault();
        //     $(this).hide();
        // });
    }

    // setInterval(function() {
    //     if (didScroll) {
    //         hasScrolled();
    //         didScroll = false;
    //     }
    // }, 100);

    // function hasScrolled() {
    //     $(".main-navigation ul ul").removeClass("sub-menu--open");
    //     $(".main-navigation ul li").removeClass("sub-menu-li--open");
    //     var st = $(this).scrollTop();
    //     if (Math.abs(lastScrollTop - st) <= delta)
    //         return;
    //     if (st > lastScrollTop && st > threshold){
    //     	header.addClass('header-fixed').removeClass('header-inview');

	   // } else {
	   //     if(st + $(window).height() < $(document).height()) {
	   //         header.addClass('header-inview');
	   //     }
	   // }

    //     lastScrollTop = st;
    // }

	// submenu on click
// 	$(".menu-main-menu-container > ul > li a, .menu-secondary-menu-container > ul > li a").click(function(event){
// 		// Hide other menus
// 			$(".menu-main-menu-container .sub-menu, .menu-secondary-menu-container .sub-menu").removeClass("sub-menu--open");
// 			$(".menu-main-menu-container ul li, .menu-secondary-menu-container ul li").removeClass("sub-menu-li--open");
// 			// Show the menu
// 			$menu_li = $(this).parents("li");
// 			$menu = $(this).parents("li").eq(0).find("ul");
// 			if ($menu.length) {
// 				if ($menu.hasClass("sub-menu--open")) {
// 					$menu.removeClass("sub-menu--open");
// 					$menu_li.removeClass("sub-menu-li--open");
// 				} else {
// 					$menu.addClass("sub-menu--open");
// 					$menu_li.addClass("sub-menu-li--open");
// 				}
// 				event.preventDefault();
// 				event.stopPropagation();
// 				// Hide on click out side
// 				$("body").click(function(){
// 					$(".menu-main-menu-container ul ul, .menu-secondary-menu-container ul ul").removeClass("sub-menu--open");
// 					$(".menu-main-menu-container ul li, .menu-secondary-menu-container ul li").removeClass("sub-menu-li--open");
// 				});
// 			}
// 	});


    /*
     * Replace all SVG images with inline SVG
     */
    $('img.svg').each(function() {
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');
    });

    $('.main-carousel').flickity({
        // options
      cellAlign: 'left',
      contain: true,
      wrapAround: false,
      resize: true,
      pageDots: false,
      groupCells: true,
      arrowShape: {
          x0: 10,
          x1: 60, y1: 50,
          x2: 70, y2: 40,
          x3: 30
      },
      draggable: false
    });

    $( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});

    $("body.home .section-card-double .aos-init").addClass("first-load-animate");

    $(".section-card.section-card-double article .section-card-block:first-child").hover(
        function() {
            var icon = $($(this).find(".icon-markaccel"));
            icon.attr("src", "/wp-content/themes/basic-child/_/img/animate-icon-markaccel.gif");
        }, function() {
            var icon = $($(this).find(".icon-markaccel"));
            icon.attr("src", "/wp-content/themes/basic-child/_/img/icon-markaccel.gif");
        }
    );

    $(".section-card.section-card-double article .section-card-block:last-child").hover(
        function() {
            var icon = $($(this).find(".icon-salesathlete"));
            icon.attr("src", "/wp-content/themes/basic-child/_/img/animate-icon-salesathlete.gif");
        }, function() {
            var icon = $($(this).find(".icon-salesathlete"));
            icon.attr("src", "/wp-content/themes/basic-child/_/img/icon-salesathlete.gif");
        }
    );

});

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-43538053-1', 'auto');
ga('send', 'pageview');