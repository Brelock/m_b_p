let status = "JS - OK!";

let site = null;
// =================
// @@include('frames/globalFunctions.js')
// ===============
document.addEventListener("DOMContentLoaded", function(event) { 
    if (  !document.getElementsByTagName("body")) {console.log('js error')} 
    
	// console.log('document ready')
	// if (document.documentElement.clientWidth > 991 ) {}
	
	// =================Include Modules==============================

	  /*@@include('frames/modal.js')*/
	  

	site = (function() {

		const win = window,
			  dom = document,
			  body = document.body,
			  app = {},
			  $navList = $(".nav_menu"),
				$item = $navList.find(".upper_link")

		const fn = {

			handlerActivedHumburger() {
				$('.hamburger').on('click', function() {
					$(this).toggleClass('is-active');
					$(".mainHeader").toggleClass('active_mobile_menu');
					$('.wrap_list').toggleClass('active');
				})
			},

			addMobileClass() {
				$item.removeClass("item_desktop")
				$item.addClass("item_mobile")
			},

			addDesktopClass() {
				$item.addClass("item_desktop")
				$item.removeClass("item_mobile")
			},

			handlerShowDropdowdMenu() {
				$(".upper_link").unbind('mouseenter mouseleave');
				$(".upper_link").unbind();
				$(".nav_item_link").unbind('mouseenter mouseleave');
				$(".nav_item_link").unbind();
				$(".toggle_link").unbind('mouseenter mouseleave');
				$(".toggle_link").unbind();
				
				if ($(".upper_link").hasClass("item_desktop")){
					$('.item_desktop').each(function(){
						$(this).find(".dropdown-menu").slideUp(300)
						$(".upper_link").removeClass('active_js');
						$(".upper_link").find('.icon-down-arrow').removeClass('up-arrow');
								var t = null;
						var li = $(this)
						li.hover(function(){
							t = setTimeout(function(){

								// li.addClass('active');
								li.find(".dropdown-menu").slideDown(300);
								// li.find(".dropdown-menu").css("opacity", '1');
								t = null;
							}, 100);
						}, function(){
							if (t){
								clearTimeout(t);
								t = null;
							}
							else
							// li.removeClass('active');
								li.find(".dropdown-menu").slideUp(300);
								// li.find(".dropdown-menu").css("opacity", '0');
						});
					});
				} else if ($(".upper_link").hasClass("item_mobile")) {
					
					$(".toggle_link > .icon-plus").on('click', function() {
							$(".upper_link").unbind('mouseenter mouseleave');
							$(".upper_link").unbind();
							$(".nav_item_link").unbind('mouseenter mouseleave');
							$(".nav_item_link").unbind();
							$(".toggle_link").unbind('mouseenter mouseleave');
							$(".toggle_link").unbind();

							if ($(this).hasClass("event-pr")) return;
							$(this).toggleClass('active_icon');
							$(this).closest('.upper_link').toggleClass('active_drop')
							$(this).closest('.upper_link').find(".dropdown-menu").toggle(200)
						}); 
				}
			},


			scrollingTop() {
				$('.sctoll_top').on('click', function () {
					$('html, body').animate({
						scrollTop: $('body').offset().top
					}, 500);
				})
			},

      visibleViewportContent() {
				const $visivleChecked = $('.visible-viewportchecker')
				// $visivleChecked.each(function() {
					$visivleChecked.viewportChecker({

								classToAdd: 'visible animated bounceInLeft',
								classToRemove: 'hidden',
								offset: 30,
						//     repeat: true,
							// });
				}); 

				// const $visivleChecked = $('.visible-viewportchecker')
				// $visivleChecked.each( function(k, v) {
				//     var el = this;
				//     setTimeout(function () {
				//         $(el).viewportChecker({
				//             classToAdd: 'visible animated bounceInLeft',
				//             offset: 30,
				//         });
				//     }, k*300);
				// });
			},

			handlerVisibilitySection() {
				const $hiddenBlocks = $('.handler_visible_content');
				$(".btn_lare_la_suite").on("click", function() {
					$(this).toggleClass("active")

					if (!$('.handler_visible_content').hasClass('actived_visible_content')) {
						$hiddenBlocks.addClass('actived_visible_content');
					} else {
						$hiddenBlocks.removeClass('actived_visible_content');
					}
				});
			},

			handlerVisibleHover() {
				
				$('.inaguration > a').on("mouseover", function() {
					$(".inaguration").toggleClass("hovered")
				})
				$('.inaguration > a').on("mouseout", function() {
					$(".inaguration").toggleClass("hovered")
				})

				},
				
				domReady() {
					fn.scrollingTop();
					fn.visibleViewportContent();
					fn.handlerActivedHumburger();
					// fn.handlerActivedHumburger()

					if ($('.btn_lare_la_suite').length ) 
					fn.handlerVisibilitySection();
					
					if ($(".inaguration").length ) 
					fn.handlerVisibleHover();
					
					
				}
		}
			
		dom.addEventListener("DOMContentLoaded", fn.domReady()) ;
	
		return fn;
	
	  })();

});


window.addEventListener("resize", function() {
	if (document.documentElement.clientWidth > 980) {
		site.addDesktopClass()
		site.handlerShowDropdowdMenu()
	} else { 
		site.addMobileClass()
		site.handlerShowDropdowdMenu()
	} 
});

window.onload = function() {

	if (document.documentElement.clientWidth > 980) {
		site.addDesktopClass()
		site.handlerShowDropdowdMenu()
	} else {
		site.addMobileClass()
		site.handlerShowDropdowdMenu()
	}

	// var supportsES6 = (function () {
  //   try {
  //     new Function("(a = 0) => a");
  //     return true;
  //   } catch (err) {
  //     return false;
  //   }
  // })();

	// var StickyHeader = (function (window, document) {
	// 	// version 3.2 - MJF @ websemantics.uk 2019

	// 	"use strict";
	// 	if (!supportsES6) return false;

	// 	const config = {
	// 		stickyID: "sticky_header",
	// 		hiddenClass: "sticky_header-hidden",
	// 		downTolerance: 8, // Amount of downward movement before header is hidden
	// 	};

	// 	const header = document.getElementById(config.stickyID);
	// 	if (!header) return false;

	// 	let hasScrolled = false;
	// 	let lastScrollTop = 0;

	// 	const _redraw = (_) => {
	// 		const pageY = window.scrollY;

	// 		if (pageY > lastScrollTop + config.downTolerance) {
	// 			header.classList.add(config.hiddenClass);
	// 		}

	// 		if (pageY < lastScrollTop || pageY <= 0) {
	// 			header.classList.remove(config.hiddenClass);
	// 		}

	// 		lastScrollTop = pageY;
	// 		hasScrolled = false;
	// 	};

	// 	const _onScroll = (_) => {
	// 		if (!hasScrolled) {
	// 			window.requestAnimationFrame(_redraw);
	// 		}
	// 		hasScrolled = true;
	// 		window.requestAnimationFrame(_onScroll);
	// 	};

	// 	_onScroll();
	// })(window, document);

}
