$(document).ready(function(){

	"use strict";

	$('.open-search').on('click', function(){
		$(this).toggleClass('active');
		$(this).parent().toggleClass('active')
	});
	$("header").on("click",function(e){
	    e.stopPropagation();
	});

	$('.login-btn').on('click', function(){
		$('.account-popup-sec').fadeIn('fast').addClass('active-login');
		//$('html').addClass('no-scroll');
	});

	$('.close-popup').on('click', function(){
		$(this).parent().parent().fadeOut('fast').removeClass('active-login');
		$('html').removeClass('no-scroll');
	});

	$('.register-btn').on('click', function(){
		$('.account-popup-sec').fadeIn('fast').addClass('active-register');
		$('html').addClass('no-scroll');
	});

	$('.close-popup').on('click', function(){
		$(this).parent().parent().fadeOut('fast').removeClass('active-register');
		$('html').removeClass('no-scroll');
	});

    $('.close-popup-error').on('click', function(){
    	$(".account-popup-sec-error").toggle();
    });

	$('.open-filter').on('click', function(){
		$('.side-search-form').fadeIn('fast');
		$('.open-filter').fadeOut('fast');
	});
	$('.close-filter').on('click', function(){
		$('.side-search-form').fadeOut('fast');
		$('.open-filter').fadeIn('fast');
	});

	// Get Header Height //
	var stick = $('header.dark').height();
	$('.theme-layout').css({
	    "padding-top": stick
	});

	$('.toggle-box > h5').on('click', function(){
		$(this).next().slideToggle();
		$(this).parent().toggleClass('active');
	});

	$('.tab-sec li a').on("click", function(){
	    var tab_id = $(this).attr('data-tab');
	    $('.tab-sec li a').removeClass('current');
	    $('.tab-content').removeClass('current');
	    $(this).addClass('current');
	    $("#"+tab_id).addClass('current');
	});

	$('.close-cart').on('click', function(){
		$(this).parent().parent().fadeOut();
	});

	$('.open-responsive-btn').on('click', function(){
		$('.responive-header').toggleClass('active');
		$(this).toggleClass('active');
	});

	$('.responisve-menu > ul > li.menu-item-has-children:first').addClass('active');
	$('.responisve-menu > ul > li.menu-item-has-children:first > ul').slideDown();
	$('.responisve-menu > ul > li.menu-item-has-children').on('click', function(){
		$('.responisve-menu > ul > li.menu-item-has-children > ul').slideUp();
		$(this).addClass('active');
		$(this).find('ul').slideDown();
	});

	$('.close-reposive').on('click', function(){
		$('.responive-header').removeClass('active');
		$('.open-responsive-btn').removeClass('active');
	});


	$('.arrow-down, .link-bars a, .scrow a').on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
	});

	/*** FIXED Menu APPEARS ON SCROLL DOWN ***/
	$(window).on('scroll', function(){
		var scroll = $(window).scrollTop();
		if (scroll >= 750) {
		$(".link-bars").addClass("sticky");
		$(".scrow").addClass("sticky");
		}
		else{
		$(".link-bars").removeClass("sticky");
		$(".scrow").removeClass("sticky");
		}
	});

	$('.upload-gallery-pictures i').on('click', function(){
		$(this).parent().fadeOut();
	});







});


$(window).on('load', function(){
	"use strict";

	$('.page-loading').fadeOut();


	$(".field-form input").val("");
	$(".field-form input").focusout(function(){
		if($(this).val() != ""){
			$(this).addClass("has-content");
		}else{
			$(this).removeClass("has-content");
		}
	});

});
