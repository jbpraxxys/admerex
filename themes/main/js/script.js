$(document).ready(function() {
	app.init();
});

var app = {

	init: function() {
		var setup = this.setup;

		switch(pageID) {
			case 'HomePage':
				setup.homepage();
				break;
			case 'ContactPage':
				setup.contactpage();
				break;
			case 'JourneyPage':
				setup.journeypage();
				break;
			case 'SolutionPage':
				setup.solutionpage();
				break;
			case 'Career':
				setup.career();
				break;
			case 'SearchPage':
				setup.searchpage();
				break;
		}

		setup.menu();
	},

	setup: {

		menu: function() {

			$('.hdr-frame .header__menu-cntnr .bar-hldr i').click(function(){
				$('.m-menu-hldr').css('transform', 'translateY(0)');
				$('body').css('overflow-y', 'hidden');
			});

			$('.m-menu-hldr .m-exit').click(function(){
				$('.m-menu-hldr').css('transform', 'translateX(110%)');
				$('body').css('overflow-y', 'unset');
			});


			
			//Calls the function on load to switch layout
			segragateContent();

			//Calls the function on resize to switch layout
			window.addEventListener("resize", segragateContent);
			function segragateContent(){
				var width = $(window).width(); 
				if (width <= 1024){
					$('#pursuit').addClass('mobile');
					$('#contact').addClass('mobile');

				} else {
					$('#pursuit').removeClass('mobile');
					$('#contact').removeClass('mobile');
				}
			};

			$('#pursuit.mobile p').on('click', function(event){
				if ($(this).hasClass("active")){
					$(this).removeClass('active');
					$('#pursuittog').slideUp();
					$('.ftr-frame .pursuit .pursuit-title i').removeClass('open');
				} else {
					$(this).addClass('active');
					$('#pursuittog').slideDown();
					$('.ftr-frame .pursuit .pursuit-title i').addClass('open');
				}
			});

			$('#contact.mobile p').on('click', function(event){
				if ($(this).hasClass("active")){
					$(this).removeClass('active');
					$('#contact-tog').slideUp();
					$('#contact p i').removeClass('open');
				} else {
					$(this).addClass('active');
					$('#contact-tog').slideDown();
					$('#contact p i').addClass('open');
				}
			});
			

		},

		homepage: function() {

			$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				if (scroll >= 100) {
					$(".header").addClass("header-scroll");
				} else {
					$(".header").removeClass("header-scroll");
				}
			});

			$('.hm_frame1-bg').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				fade: true,
				dots: false,
			});

			$('.frame1-slider').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				dots: false,
				arrows: false,
				speed: 1000,
				adaptiveHeight: true,
				asNavFor: '.hm_frame1-bg'
			});

			//ticking machine
			var percentTime;
			var tick;
			var time = .1;
			var progressBarIndex = 0;

			$('.progressBarContainer .progressBar').each(function(index) {
				var progress = "<div class='inProgress inProgress" + index + "'></div>";
				$(this).html(progress);
			});

			function startProgressbar() {
				resetProgressbar();
				percentTime = 0;
				tick = setInterval(interval, 10);
			}

			function interval() {
				if (($('.slider-hldr[data-slick-index="' + progressBarIndex + '"]').attr("aria-hidden")) === "true") {
					progressBarIndex = $('.slider-hldr[aria-hidden="false"]').data("slickIndex");
					startProgressbar();
				} else {
					percentTime += 1 / (time + 5);
					$('.inProgress' + progressBarIndex).css({
						width: percentTime + "%"
					});
					if (percentTime >= 100) {
						$('.frame1-slider').slick('slickNext');
						progressBarIndex++;
						if (progressBarIndex > 2) {
							progressBarIndex = 0;
						}
						startProgressbar();
					}
				}
			}

			function resetProgressbar() {
				$('.inProgress').css({
					width: 0 + '%'
				});
				clearInterval(tick);
			}
			startProgressbar();
			// End ticking machine

			$('.item').click(function () {
				clearInterval(tick);
				var goToThisIndex = $(this).find("span").data("slickIndex");
				$('.frame1-slider').slick('slickGoTo', goToThisIndex, false);
				startProgressbar();
			});

			$('.affiliate-slider').slick({
			 	infinite: true,
				slidesToShow: 5,
				slidesToScroll:1,
				// autoplay: true,
				centerMode: true,
				speed: 500,
				arrows: true,
				dots: false,
				// prevArrow: $('.prev-arrow'),
				// nextArrow: $('.next-arrow'),
				responsive: [
					{
					  breakpoint: 1100,
					  settings: "unslick"
					}
				]
			});

			$('.tabbing[data-target=' + 1 + ']').addClass('active').slideDown(300);
			$('.image-hldr .img[data-target=' + 1 + ']').addClass('active').slideDown(300);

			$('.tabbing-hldr .tab-cntnr').on('click', function(){

				if ($(this).hasClass("active")){

				} else {
					$('.tabbing-hldr .tab-cntnr').removeClass('active');
					$('.tabbing').removeClass('active').slideUp(300);
					$('.image-hldr .img').removeClass('active').slideUp(300);


					var target = $(this).data('id');
					$(this).addClass('active');

					setTimeout(function(){
						$('.tabbing[data-target=' + target + ']').addClass('active').slideDown(300);
						$('.image-hldr .img[data-target=' + target + ']').addClass('active').slideDown(300);
					}, 300);
				}

			})

			// new Vue({
			// 	el: '#tabs',
			// 	data: { activetab: 1 },
			// });

			$('.solution-slider').slick({
			 	infinite: true,
				slidesToShow: 3,
				slidesToScroll: 3,
				// autoplay: true,
				speed: 1000,
				dots: true,
				arrows: false,
				adaptiveHeight: true,
				responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 1,
						slidesPerRow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});

			$('.f8-image-slider').slick({
				infinite: true,
				slidesToShow: 3,
				slidesToScroll:1,
				// autoplay: true,
				speed: 1000,
				// dots: true,
				arrows: false,
				centerMode: true,
				asNavFor: '.year-slider',
				swipe: false,
				swipeToSlide: false,
				touchMove: false
			});

			$('.f8-image-slider-inside').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				speed: 1000,
				dots: true,
				arrows: false,
			});

			$('.year-slider').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				// autoplay: true,
				speed: 1000,
				// dots: true,
				arrows: true,
				focusOnSelect: true,
				centerMode: true,
				asNavFor: '.f8-image-slider',
				responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 1,
						slidesPerRow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});
			$('.slick-prev').html('<i class="ion-chevron-left"></i>');
			$('.slick-next').html('<i class="ion-chevron-right"></i');

			$('.year-slider .year-hldr').click(function(){
				$('.year-slider .year-hldr').removeClass('active');
				$(this).addClass('active');
			});


			$('.location-cntnr').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				// autoplay: true,
				speed: 1000,
				// dots: true,
				arrows: false,
				responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 1,
						slidesPerRow: 1,
						slidesToScroll: 1
					  }
					}
				]
			});
		},

		solutionpage: function() {

		},

		journeypage: function() {

			$('.upper-news__slider').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				fade: true,
  				cssEase: 'linear',
  				dots: true
				// autoplay: true,
			});

			$('.jrny-cont-slider').slick({
			 	infinite: true,
				slidesToShow: 1,
				slidesToScroll:1,
				// autoplay: true,
				speed: 1000,
				arrows: true,
				dots: false,
				adaptiveHeight: true,
				asNavFor: '.jrny-img-slider',
			});

			$('.jrny-img-slider').slick({
				infinite: true,
				slidesToShow: 3,
				slidesToScroll:1,
				// autoplay: true,
				centerMode: true,
				speed: 1000,
				arrows: false,
				dots: false,
				focusOnSelect: true,
				// prevArrow: $('.prev-arrow'),
				// nextArrow: $('.next-arrow'),
				asNavFor: '.jrny-cont-slider',
				responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 1,
						slidesPerRow: 1,
						slidesToScroll: 1,
						centerMode: false
					  }
					}
				]

			});
			// $('.slick-prev').html('<i class="ion-chevron-left"></i>');
		 	// $('.slick-next').html('<i class="ion-chevron-right"></i');

			$('.pagination-slider').slick({
			 	infinite: true,
				slidesToShow: 4,
				slidesToScroll:1,
				// autoplay: true,
				speed: 1000,
				arrows: true,
				dots: false,
			});


			//Calls the function on load to switch layout
			segragateContent();

			//Calls the function on resize to switch layout
			window.addEventListener("resize", segragateContent);
			function segragateContent(){
				var width = $(window).width(); 
				if (width <= 1024){
					//Moves containers based on position
					// $('.jrny_frame2 .frm-cntnr .journey-cntnr:nth-child(2n)').addClass("flex");
				} else {
					$('.jrny_frame2 .frm-cntnr .journey-cntnr:nth-child(2n)').addClass("flex");
				}
			};

		},

		contactpage: function() {
			app.form.init($('#contactForm'), $('#contactBtn'), 'form/contact/send', false);
			app.form.init($('#contactForm2'), $('#contactBtn2'), 'form/client/send', false);

			$(document).ready(function() {
				$("#lightgallery").lightGallery();
			});

			$("#AIbutton").click(function() {
					$("#CIbutton").removeClass("active");
					$(this).addClass("active");
					$("#CIform").hide();
					$("#AIform").fadeIn();
			});

			$("#CIbutton").click(function() {
					$("#AIbutton").removeClass("active");
					$(this).addClass("active");
					$("#AIform").hide();
					$("#CIform").fadeIn();
			});
		},

		career: function() {
			app.form.init($('#contactForm'), $('#contactBtn'), 'form/contact/send', false);

			// $('.input-attached label').each(function() {
			// 	$(this).fileupload({
			//         url: baseHref + 'form/contact/upload',
			//         dataType: 'json',
			// 		submit: function(e, data) {},
			// 		done: function(e, data) {
			// 			switch(data.result.response) {
			// 				case 0: break;
			// 				case 1:

			// 					$('#file-image').val(data.result.message);
			// 					$('#maskfile-image').val(data.result.message);
			// 					$('#file-selected').html(data.result.filename);

			// 				break;
			// 			}
			// 		}
			//     });
			// });

			$('.modal__careers-form').each(function() {
				var id = $(this).data('id');

				$(this).fileupload({
			        url: baseHref + 'form/contact/upload',
			        dataType: 'json',
					submit: function(e, data) {},
					done: function(e, data) {
						switch(data.result.response) {
							case 0: break;																
							case 1:

								$('#file-image' + id).val(data.result.message);
								$('#maskfile-image').val(data.result.message);
								$('#file-selected' + id).html(data.result.filename);

							break;
						}
					}
			    });
			});
		}
	},

	form: {
		/**
		* SENDING FORM
		* - Identify the form name, button name, the url (controller route), and if you want to 'refresh' the page.	
		**/
		init: function(formName, btnName, routeVal, boolean) {
			var form = formName,
				btn = btnName,
				route = routeVal,
				bool = boolean;

			form.validate({
				submitHandler: function(form) {
					swal({
						title: 'Sending ...',
						text: '',
						timer: 2000,
						onOpen: function () {
							swal.showLoading()
						}
					})
					var vars = $(form).serialize();
					$.post(baseHref + route, vars, function(data) {
						switch(data.status) {
							case 0:
								setMessage(false,data.message);
							break;
							case 1: 
								setMessage(true,data.message);
								$(form).trigger('reset');
								if(bool == true) {
									
									window.location.reload(1);
									
								}

							break;
						}

					}, 'json');
				}
			});

			$(btn).on('click', function(e) {
				e.preventDefault();
				form.submit();

				//label error -- for mobile
				if($(window).width() < 900) {
					$('label.error').empty();
					$('label.error').text("*");
				}
			});

			function setMessage(status, msg) {
				if(status) {
					swal('',msg,'success')
				} else {
					swal('',msg,'error')
				}
			}
		},

		/**
		* SENDING FORM W/ ATTACHMENTS
		* - Bind the uploaded file first, before sending.
		* - Identify where the file should be uploaded, button name, and the url (controller route).	
		* - Requirements: 
					Javascript:
						  jquery.fileupload.js
						  jquery.iframe-transport.js
						  jquery.ui.widget.js
					Composer:
						  "gargron/fileupload": "~1.4.0"
					Silverstripe:
							Controller: Create UploadController
							ModelAdmin: Create an admin manager for back up purposes (list of emails received)
							Assets: Create folder inside, depends on what you declared
							Template Syntax: 
									<label id="file-selected-permit" for="fileupload-permit" class="custom-file-upload">Business/Mayor Permit <i class="ion-paperclip"></i></label>
								<input type="file" id="fileupload-permit" name="file" style="display: none;">
								<input type="hidden" id="file-image-permit" name="permit" value="">

		**/
		bindUploadField: function(fileUpload, fileImg, fileSelected, formBtn, url) {
			var $file_upload = fileUpload,
				$file_img = fileImg,
				$file_selected = fileSelected,
				$form_btn = formBtn,
				$url = url;

			$file_upload.fileupload({
				url: baseHref + $url,
				dataType: 'json',
				submit: function(e, data) {},
				done: function(e, data) {
					switch(data.result.status) {
						case 0: break;
						case 1: 
							
							$file_img.val(data.result.message);
							$file_selected.html(data.result.filename);
							$form_btn.fadeIn(); 

						break;
					}
				}
			});
		}
	},
};
