jQuery(function($){

var NICDARKFRAMEWORK = window.NICDARKFRAMEWORK || {};


//start nicdark_intro_effect
NICDARKFRAMEWORK.nicdark_intro_effect = function(){
	
	$(document).ready(function(){
		
		
		//disable on mobile
		var windowWidth = $(window).width(); 
		
		if (windowWidth < 400){
			
			$('.fade-left, .fade-up, .fade-down, .fade-right, .bounce-in, .rotate-In-Down-Left, .rotate-In-Down-Right').css('opacity','1');
				
		}else{
			
			$('.fade-up').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInUp'); } });
			$('.fade-down').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInDown'); } });
			$('.fade-left').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInLeft'); } });
			$('.fade-right').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInRight'); } });
			$('.bounce-in').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated bounceIn'); } });
			$('.rotate-In-Down-Left').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated rotateInDownLeft'); } });
			$('.rotate-In-Down-Right').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated rotateInDownRight'); } });	

		}

		//progressbar
		$('.animate_progressbar').bind('inview', function(event, visible) { if (visible == true) { $(this).removeClass('animate_progressbar'); } });

	});
	
}
//end nicdark_intro_effect


//NIKALERTS
NICDARKFRAMEWORK.nicdark_alerts = function(){

	jQuery(document).ready(function() {

		$('.nicdark_alerts').click(function(event){
			$(this).css({
				'display': 'none',
			});
		});	  

	});
	
}
//end NIKALERTS



//nicdark_menu
NICDARKFRAMEWORK.nicdark_menu = function(){
	
	
	//menu settings
	jQuery(document).ready(function($){				
		
		//menu	
		$('.nicdark_menu').superfish({});	

		//megamenu
		$('.nicdark_megamenu ul a').removeClass('sf-with-ul');
		$($('.nicdark_megamenu ul li').find('ul').get().reverse()).each(function(){
		  $(this).replaceWith($('<ol>'+$(this).html()+'</ol>'))
		})

		//responsive
		$('.nicdark_menu').tinyNav({
			active: 'selected',
			header: 'MENU'
		});

	});


	//fixed menu
	jQuery(window).scroll(function(){
		add_class_scroll();
	});
	
	add_class_scroll();
	function add_class_scroll() {
		if(jQuery(window).scrollTop() > 100) {
			jQuery('.nicdark_navigation').addClass('slowup');
			jQuery('.nicdark_navigation').removeClass('slowdown');
		} else {
			jQuery('.nicdark_navigation').addClass('slowdown');
			jQuery('.nicdark_navigation').removeClass('slowup');
		}
	}
	
}
//nicdark_menu



//NIKDARKSLIDERRANGE
NICDARKFRAMEWORK.nicdark_slider_range = function(){

	jQuery(document).ready(function() {

		$( ".nicdark_slider_range" ).slider({
			range: true,
			min: 0,
			max: 1000,
			values: [ 200, 700 ],
			slide: function( event, ui ) {
				$( ".nicdark_slider_amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
			}
		});

    	$( ".nicdark_slider_amount" ).val( "$ " + $( ".nicdark_slider_range" ).slider( "values", 0 ) + " - $ " + $( ".nicdark_slider_range" ).slider( "values", 1 ) );	 

	});
	
}
//end NIKDARKSLIDERRANGE



//NIKACCORDION
NICDARKFRAMEWORK.nicdark_accordion = function(){

	jQuery(document).ready(function() {

		$( '.nicdark_accordion' ).accordion({
			heightStyle: "content"
		});  

	});
	
}
//end NIKACCORDION


//NIKTOOGLE
NICDARKFRAMEWORK.nicdark_toogle = function(){

	jQuery(document).ready(function() {

		$( '.nicdark_toogle' ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});  

	});
	
}
//end NIKTOOGLE


//NIKTABS
NICDARKFRAMEWORK.nicdark_tabs = function(){

	jQuery(document).ready(function() {

		$('.nicdark_tab').tabs({show: 'fade', hide: 'fade'});

	});
	
}
//end NIKTABS



//NIKTOOLTIP
NICDARKFRAMEWORK.nicdark_tooltip = function(){

	jQuery(document).ready(function() {

	    $( '.nicdark_tooltip' ).tooltip({ 


	    	position: {
        my: "center top",
        at: "center+0 top-50"
      }

	    });

	});
	
}
//end NIKTOOLTIP



//NIKCALENDAR
NICDARKFRAMEWORK.nicdark_calendar = function(){

	jQuery(document).ready(function() {

	    $( '.nicdark_calendar' ).datepicker({ });

	});
	
}
//end NIKCALENDAR




//START NIKIMGPARALLAX
NICDARKFRAMEWORK.nicdark_imgparallax = function(){

	jQuery(document).ready(function() {
		//$('.nicdark_imgparallax').parallax("50%", 0.3);
	});
	
}
//END NIKIMGPARALLAX



//Scroll navigation
NICDARKFRAMEWORK.nicdark_internal_link = function(){
	
	$('.nicdark_internal_link').click(function(event){

		event.preventDefault();
		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;
	
		$('html,body').animate({scrollTop:target_top -13}, 900);
	
	});
}
//End Scroll navigation


//nicdark_counter
NICDARKFRAMEWORK.nicdark_counter = function(){
	
	$('.nicdark_counter').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}
	});

	// start all the timers
	$('.nicdark_counter').bind('inview', function(event, visible) {
		if (visible == true) {
			$('.nicdark_counter').each(count);
		} 
	});
      
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
}
//nicdark_counter



//nicdark_masonry
NICDARKFRAMEWORK.nicdark_masonry = function(){

	$( window ).load(function() {
		
		$('.nicdark_masonry_btns div a').click( function() {
			filterValue = $( this ).attr('data-filter');
			$container.isotope({ filter: filterValue });
		});
		  
		var $container = $('.nicdark_masonry_container').isotope({
			itemSelector: '.nicdark_masonry_item'
		});

		$( '.nicdark_simulate_click' ).trigger( "click" );
	
	});

}
//nicdark_masonry


//nicdark_nicescrool
NICDARKFRAMEWORK.nicdark_nicescrool = function(){
	
	$(".nicdark_nicescrool").niceScroll({
		touchbehavior:true,
		cursoropacitymax:1,
		cursorwidth:0,
		autohidemode:false,
		cursorborder:0
	});


}
//nicdark_nicescrool


//start left menu
NICDARKFRAMEWORK.nicdark_left_right_sidebar = function(){
	
	jQuery(document).ready(function($){
			
		//left sidebar OPEN		
		$('.nicdark_left_sidebar_btn_open').click(function(event){
			$('.nicdark_left_sidebar').css({
				'left': '0px',
			});
			$('.nicdark_site, .nicdark_navigation').css({
				'margin-left': '300px',
			});
			$('.nicdark_overlay').addClass('nicdark_overlay_on');
		});
		//left sidebar CLOSE	
		$('.nicdark_left_sidebar_btn_close, .nicdark_overlay').click(function(event){
			$('.nicdark_left_sidebar').css({
				'left': '-300px'
			});
			$('.nicdark_site, .nicdark_navigation').css({
				'margin-left': '0px'
			});
			$('.nicdark_overlay').removeClass('nicdark_overlay_on');
		});



		//right sidebar OPEN		
		$('.nicdark_right_sidebar_btn_open').click(function(event){
			$('.nicdark_right_sidebar').css({
				'right': '0px',
			});
			$('.nicdark_site, .nicdark_navigation').css({
				'margin-left': '-300px',
			});
			$('.nicdark_overlay').addClass('nicdark_overlay_on');
		});
		//right sidebar CLOSE	
		$('.nicdark_right_sidebar_btn_close, .nicdark_overlay').click(function(event){
			$('.nicdark_right_sidebar').css({
				'right': '-300px'
			});
			$('.nicdark_site, .nicdark_navigation').css({
				'margin-left': '0px'
			});
			$('.nicdark_overlay').removeClass('nicdark_overlay_on');
		});
		
		
	});
	
}
//end left menu




//nicdark_mpopup
NICDARKFRAMEWORK.nicdark_mpopup = function(){

	//nicdark_mpopup_gallery
	$('.nicdark_mpopup_gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});

	//nicdark_mpopup_iframe
	$(document).ready(function() {
		$('.nicdark_mpopup_iframe').magnificPopup({
			disableOn: 200,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,

			fixedContentPos: false
		});
	});

	//nicdark_mpopup_window
	$('.nicdark_mpopup_window').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	//nicdark_mpopup_ajax
	$('.nicdark_mpopup_ajax').magnificPopup({
		type: 'ajax',
		alignTop: false,
		overflowY: 'scroll'
	});

}
//nicdark_mpopup




//init
NICDARKFRAMEWORK.nicdark_intro_effect();
NICDARKFRAMEWORK.nicdark_internal_link();
NICDARKFRAMEWORK.nicdark_alerts();
NICDARKFRAMEWORK.nicdark_nicescrool();
NICDARKFRAMEWORK.nicdark_menu();
NICDARKFRAMEWORK.nicdark_slider_range();
NICDARKFRAMEWORK.nicdark_accordion();
NICDARKFRAMEWORK.nicdark_toogle();
NICDARKFRAMEWORK.nicdark_tabs();
NICDARKFRAMEWORK.nicdark_tooltip();
NICDARKFRAMEWORK.nicdark_left_right_sidebar();
NICDARKFRAMEWORK.nicdark_calendar();
NICDARKFRAMEWORK.nicdark_imgparallax();
NICDARKFRAMEWORK.nicdark_counter();
NICDARKFRAMEWORK.nicdark_masonry();
NICDARKFRAMEWORK.nicdark_mpopup();
//end init

});