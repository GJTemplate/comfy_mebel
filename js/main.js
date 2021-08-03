jQuery(document).ready(function(){

	jQuery('#jform_com_fields_imya').change(function(){
		value = jQuery(this).val();
		jQuery('#jform_title').val(value).attr('value', value);
	});
	jQuery(".about_slider").owlCarousel({
		navigation : true,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		
		responsive:{
			0:{
				items:1,
				loop:true,
				nav:true
			},
			768:{
				items:3,
				loop:true,
				nav:true
			},
			1230:{
				items:3,
				nav:true,
				loop:true
			}
		}
	});
	
	jQuery('.selectpicker').selectpicker();
	
	jQuery(".brand_slider").owlCarousel({

		navigation : true,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		
		responsive:{
			0:{
				items:2,
				loop:true,
				nav:true
			},
			768:{
				items:4,
				loop:true,
				nav:true
			},
			1230:{
				items:6,
				nav:true,
				loop:true
			}
		}

	});	
	
	jQuery(".video_slider").owlCarousel({

		navigation : true,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		
		responsive:{
			0:{
				items:1,
				loop:true,
				nav:true
			},
			768:{
				items:1,
				loop:true,
				nav:true
			},
			1230:{
				items:2,
				nav:true,
				loop:true
			}
		}

	});
	
	jQuery('.filter-field-char-multi h3').click(function(){
		jQuery(this).parent().toggleClass('openFilter');
	});	
	
	jQuery('.cat_name').click(function(){
		jQuery(this).closest('.cat_menu').toggleClass('openFilterCat');
	});
	
	jQuery('.filter_btn').click(function(){
		jQuery('.left_sidebar').addClass('openSidebar');
	});
	
	jQuery('.close_filter').click(function(){
		jQuery('.left_sidebar').removeClass('openSidebar');
	});	
		

	/*Записываем в форму заказа url страницы*/
	jQuery('.zakaz_btn').click(function(){
		text = document.location.href
		jQuery('#zakaz_link').attr('value', text);
	});

	jQuery('.more_link').click(function(){
        jQuery('html').animate({ 
				scrollTop: jQuery('.description_left').offset().top
			}, 500 
        );
	});
	
	jQuery("#top-bottom").click(function() {
		jQuery("body,html").animate({
				scrollTop: 0
		}, 500);
	});
	if (jQuery(window).scrollTop() > 100) {
		jQuery("#top-bottom").fadeIn();
	} else {
		jQuery("#top-bottom").fadeOut();
	}
	jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() > 100) {
			jQuery("#top-bottom").fadeIn();
		} else {
			jQuery("#top-bottom").fadeOut();
		}
	});
	
	/*jQuery(window).resize(function(){
		resize();
	});
	resize();
	function resize(){
		height = jQuery('.header').height();
		jQuery('.page').css('padding-top', height+'px');
	}
	
	
	/*Мини меню*/
	/*jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() > 10) {
			jQuery("body").addClass('header_small');
			height = 100+parseInt(jQuery('.header').height());
			jQuery('.page').css('padding-top', height+'px');
		} else {
			jQuery("body").removeClass('header_small');
			jQuery("body").removeClass('open_menu');
			height = jQuery('.header').height();
			jQuery('.page').css('padding-top', height+'px');
			jQuery('#toggle').removeClass('on');
			
		}
	});*/
	
	jQuery(document).scroll(function() {
		//menuManager()
	});
	jQuery(window).resize(function(){
		resize();
	});
	function resize(){
		menuManager();
	}
	h_header = jQuery('.header').height();
	function menuManager() {
		var offset = jQuery(window).scrollTop();
		h_height = jQuery('.header').height();
		//jQuery('.wrap').css('padding-top', h_height+'px');
		
		/*Header adjust */
		
		/*if (offset > 300) {
			jQuery('body').addClass('header_small');
			jQuery('.page').css('paddingTop', h_header+'px');
			setTimeout(function() {
				jQuery('.header').addClass('down');
			}, 100);
		} else {
			jQuery('body').removeClass('header_small');
			jQuery('.page').css('paddingTop', '0');
			jQuery('.header').removeClass('down');
			h_header = jQuery('.header').height();
		}*/
	}
	menuManager();
	resize();
	
	jQuery('#toggle').click(function(){
	   toggleClass(this, 'on');
	   jQuery('body').toggleClass('open_menu');
	   return false;
	});
	var theToggle = document.getElementById('toggle');
	function hasClass(elem, className) {
		return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
	}
	function addClass(elem, className) {
		if (!hasClass(elem, className)) {
			elem.className += ' ' + className;
		}
	}
	function removeClass(elem, className) {
		var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
		if (hasClass(elem, className)) {
			while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
				newClass = newClass.replace(' ' + className + ' ', ' ');
			}
			elem.className = newClass.replace(/^\s+|\s+$/g, '');
		}
	}
	function toggleClass(elem, className) {
		var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
		if (hasClass(elem, className)) {
			while (newClass.indexOf(" " + className + " ") >= 0 ) {
				newClass = newClass.replace( " " + className + " " , " " );
			}
			elem.className = newClass.replace(/^\s+|\s+$/g, '');
		} else {
			elem.className += ' ' + className;
		}
	}
	
	/*Всплывающие фото*/
	jQuery('.fancybox').fancybox();
	
	/*input file*/
	jQuery('.inputfile').change(function(e){
		name_file = jQuery(this).attr('name');
		fileName = e.target.value.split( '\\' ).pop();
		jQuery('label[for="'+name_file+'"] span').text(fileName);
	});
	
	/*Отзывы*/
	jQuery('.question_show').click(function(){
		jQuery(this).parent().toggleClass('open_reviews');
	});
	
	/*Предпросмотр фото*/
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				if(input.files[0]){
					jQuery('.input_photo').html('<img src="'+e.target.result+'">');
				}
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	jQuery("#testi_pic").change(function(){
		readURL(this);
	});
});








































