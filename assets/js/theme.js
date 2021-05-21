window.Project = (function (window, document, $, undefined) {
	'use strict';

	var app = {
		initialize: function () {
			console.log('working');
			$(window).on('resize', app.hoverable_dropdown);
			app.hoverable_dropdown();

			app.cloneMainMenu();
			$('#menu li').on('click', app.mobileDropDown);
			app.initVideoSoundOnOff();
			app.initSinglePageNave();
			app.initStickyMenu();
			app.gallerySliderOnMobile();
			app.normalGalleryDesign();
			app.initFooterMoveUpBtn();
			app.portfolioGalleryDesign();

			app.copyElementsOnSelectMenu();

			$('.tr_menu_select').on('change', app.optionOnClickTab );


		},
		optionOnClickTab:function(){

			var selectedStyle = $('.tr_menu_select :selected').attr('value');
			var allStyle = $('#myTabs').children('li');
			$.each( allStyle, function(){
				var currentItem = $(this).children('a').attr('href');
				if(currentItem === selectedStyle ){
					$(this).siblings().removeClass('active');
					$(this).addClass('active');
				}
			});

			var itemsToggle = $('.tab-content').children('.tab-pane');

			$.each( itemsToggle, function(){
				var currentItem = $(this).attr('tabcontent');
				if( currentItem === selectedStyle ){
					$(this).siblings().removeClass('in active');
					$(this).addClass('in active');
				}
			});
		},
		copyElementsOnSelectMenu:function(){
			var items = $('#myTabs').children('li').children('a');
			var lists = '';
			$.each(items, function(key, option){
				var value = $(option).attr('href');
                var text = $(option).text();
                lists += '<option value=' + value + ' class="aaa">' + text + '</option>';
			});

			$('.tr_menu_select').html(lists);
		},
		portfolioGalleryDesign:function(){
			var gallery = $('#gallery');
			var boxes = $('.revGallery-anchor');
			var gallery_design = $('#gallery').attr('data-design');
			boxes.hide();

			gallery.imagesLoaded({background: true}, function () {

				boxes.fadeIn();

				gallery.isotope({
					sortBy: 'original-order',
					layoutMode: gallery_design,
					itemSelector: '.portfolio-grid-item',
					stagger: 30
				});
			});

			$('button').on('click', function () {
				var filterValue = $(this).attr('data-filter');
				$('#gallery').isotope({filter: filterValue});
				gallery.data('lightGallery').destroy(true);
				gallery.lightGallery({
					selector: filterValue.replace('*', '')
				});
			});

			$('#gallery').lightGallery({});

			$('.portfolio-button').click(function () {
				$('.portfolio-button').removeClass('is-checked');
				$(this).addClass('is-checked');
			});
		},
		initFooterMoveUpBtn: function () {
			var btn = $('#back-to-top');
			$(window).scroll(function () {
				if ($(window).scrollTop() > 300) {
					btn.addClass('show');
				} else {
					btn.removeClass('show');
				}
			});
			btn.on('click', function (e) {
				e.preventDefault();
				$('html, body').animate({scrollTop: 0}, '300');
			});

		},

		initVideoSoundOnOff: function () {
			$('.videosoundon').click(function () {
				if ($(this).hasClass('videosoundon--ison')) {
					$(this).removeClass('videosoundon--ison');

				} else {
					$('.videosoundon.videosoundon--ison').removeClass('videosoundon--ison');
					$(this).addClass('videosoundon--ison');
				}
			});
		},
		normalGalleryDesign: function () {

			var gallery = $('#tr_gallery');
			var boxes = $('.revGallery-anchor');
			// var gallery_design = $('#tr_gallery').attr('data-design');
			var gallery_design = $('.tr_gallery_wrapper').attr('isotope-option');

			boxes.hide();

			gallery.imagesLoaded({background: true}, function () {

				boxes.fadeIn();

				gallery.isotope({
					sortBy: 'original-order',
					layoutMode: gallery_design,
					itemSelector: '.portfolio-grid-item',
					stagger: 30
				});
			});

			$('button').on('click', function () {
				var filterValue = $(this).attr('data-filter');
				$('#tr_gallery').isotope({filter: filterValue});
				gallery.data('lightGallery').destroy(true);
				gallery.lightGallery({
					selector: filterValue.replace('*', '')
				});
			});

			$('#tr_gallery').lightGallery({});

			$('.portfolio-button').click(function () {
				$('.portfolio-button').removeClass('is-checked');
				$(this).addClass('is-checked');
			});

		},
		gallerySliderOnMobile: function () {

			if ($(window).width() < 768) {

				if ($('.tr_gallery_wrapper').hasClass('tr_gl_slider')) {
					// $('#gallery_all_imgs').addClass('owl-carousel');
					$('.normal_gallery').addClass('owl-carousel');
					$('.normal_gallery').removeAttr('id');
				}

				var autoplay = $('.tr_gallery_wrapper').attr('autoplays');
				var option = '';

				if (autoplay === 'on') {
					option = true;
				} else {
					option = false;
				}

				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					nav: true,
					autoplay: option,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 1
						}
					}
				});
			}

		},
		initStickyMenu: function () {
			$(window).scroll(function () {
				var scrollTop = 120;
				if ($(window).scrollTop() >= scrollTop) {
					$('.sticky-header').addClass('sticky-header-show');
				}
				if ($(window).scrollTop() < scrollTop) {
					$('.sticky-header').removeClass('sticky-header-show');
				}
			});
		},
		initSinglePageNave: function () {

			$('.sp_nav a[href*=#]:not([href=#]),.header-banner-columns .icon_box a[href*=#]:not([href=#])').click(function () {

				if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					console.log(target);
					console.log(target.length);
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top - 120
						}, 1000);
						return false;
					}
				}

				// var homepage = $(this).attr('href');
				// if (homepage === '#homearea') {
				// 	location.reload();
				// }

			});

			/*$('body').scrollspy({
				target: '#masthead',
				offset: 110
			});*/

		},
		hoverable_dropdown: function () {
			if ($(window).width() < 768) {
				$('.dropdown-toggle').attr('data-toggle', 'dropdown');
			} else {
				$('.dropdown-toggle').removeAttr('data-toggle dropdown');
			}
		},
		cloneMainMenu: function () {
			var mainmenu = $('#site-main-menu').children('li').clone();
			$.each(mainmenu, function (key, html) {
				$('#menu').append(html);
			});
		},
		mobileDropDown: function (e) {
			if ($(this).children('ul').hasClass('sub-menu')) {
				e.preventDefault();
				$(this).children('ul').toggleClass('display-block');
			}
		}
	};
	$(document).ready(app.initialize);

	return app;
})(window, document, jQuery);
