// $(function(){

// });

$(document).ready(function(){
	$('.flexslider').flexslider({
		animation: "slide",
		easing: "jswing",
		slideshow: true,          
		slideshowSpeed: 7000,     
		animationSpeed: 1000,      
		initDelay: 0,
		controlNav: false 
	});

	var scrolling = function(param, target, list){
		var item_total = $(".scroll-container .bgwhite").length;
		var item_width = $(param).find(".bgwhite").width();
		$(target).animate({'width': item_total*(item_width+15)},10, function(){
			var pane = $(param);

			//$(param).jScrollPane();	

			pane.jScrollPane(
				{
					showArrows: true,
					animateScroll: true
				}
			);
			var api = pane.data('jsp');

			$(list).bind('click',
				function(){
					// Note, there is also scrollToX and scrollToY methods if you only
					// want to scroll in one dimension
					var id = $(this).attr("href");
					var data_id = $(this).attr("data-id");
					var data_width = $(id).width();
					var container = $(".jspPane")
					
					//api.scrollTo(parseInt(data_id*data_width), parseInt(0));
					container.animate({left: parseInt((-data_id*data_width) - (data_id * 10))});
					return false;
				}
			);

			fix_height('.career .sidebar', '.scroll-content');
		});
	}

	var initial = function(param, target){
		if($(param).length > 0){
			var _W_slider = $(param).width()+40;
			$(target).css({'width': _W_slider});
		}
	}

	var fix_height = function(param, target){
		if($(param).length > 0){
			var _height = $(target).height();
			$(param).css({'height' : _height});
		}
	}
	
	var window_resize = function(param, target){
		if($(param).length > 0){
			$(window).resize(function(){
				var _W_window = $(window).width();
				var _W_slider = $(param).width()+40;
				$(target).css({'width': _W_slider, 'margin-left' : parseInt(-_W_window/2) });
				console.log(_W_window);
			});
		}
	}

	var view_isotope = function(param){
		if($(param).length > 0){
			$(param).isotope({
			  // options
			  	itemSelector : ".item",
				// masonry : {
			 //        columnWidth : 190,
			 //        columnHeight : 190,
			 //        gutterWidth: 5
			 //     }
    			
			});
		}
		
	}

	var acordion_menu = function(param){
		$(param).toggle(function(){
			var _this = $(this);
			_this.addClass("active");
			_this.siblings("ol").slideDown()
		}, function(){
			var _this = $(this);
			_this.removeClass("active");
			_this.siblings("ol").slideUp()
		});
	}

	var klik_detail = function(param){
		$(param).toggle(function(){
			// $(".expand").children("p.hide").fadeOut(20);
			
			// var _this = $(this);

			// setTimeout(function(){
			// 	$(".expand").removeClass("expand");
			// 	_this.children("span").html("- ");
			// 	_this.parent("p").siblings("p.hide").fadeIn().parents(".sidebar").addClass("expand");	
			// },40);
			var _this = $(this);
			_this.parents(".mb20").addClass("active");
			$(".mb20:not(.active)").slideUp();
			_this.children("span").html("- ");
			_this.parent("p").siblings("p.hide").fadeIn().parents(".sidebar").addClass("expand");
			

		}, function(){
			// var _this = $(this);

			// $(this).children("span").html("+ ");
			// $(this).parent("p").siblings("p.hide").fadeOut();
			// setTimeout(function(){
			// 	_this.parents(".sidebar").removeClass("expand");
			// },500)

			var _this = $(this);
			_this.parents(".mb20").removeClass("active");
			$(".mb20").slideDown();
			_this.parents(".sidebar").removeClass("expand");
			$(this).parent("p").siblings("p.hide").fadeOut();
			_this.children("span").html("+ ");
			
		});
	}

	var finder = function(param, target){
		$(param).click(function(){
			var _this = $(this);
				_this.slideUp();

				$('html, body').animate({scrollTop: '0px'}, 800);

				$("#finder-container").animate({"left" : 0}, 100);
				$("#finder-container .close").click(function(){
					$("#finder-container").animate({"left" : -360}, 100, function(){
						setTimeout(function(){	
							_this.slideDown();
						},2000);
					});
					return false;
				});

			return false;
		});
	}

	var about_detail = function(param){
		$(param).click(function(){
			var _this = $(this).parents(".item");
			var _close = _this.find(".close");

			if(_this.hasClass("active") == false){
				_this.siblings(".item").append('<div class="overlay"></div>');
				_this.addClass("active");
				_this.find(".detail-bio").fadeIn(500);
				_close.click(function(){
					$(this).parents(".detail-bio").fadeOut(500);
					$(".overlay").fadeOut(500);
					setTimeout(function(){
						_this.removeClass("active");
						$(".overlay").remove();
					},800);
				});
			}
		});
	}

	var close_member_area = function(param){
		$(param).click(function(){
			$(this).parents(".active").removeClass("active");

			return false;
		});
	}

	var member_area = function(param){
		$(param).click(function(){
			var _this = $(this);
			var get_id = _this.attr("class");

			$("#" + get_id).addClass("active");
			close_member_area(".close");

			$(".forgot-pass").click(function(){
				$("#forgot-pass").addClass("active");
				close_member_area(".close");

				return false;
			});

			return false;
		});
	}

	function INIT(){
		initial(".sidebar", "nav.fix");
		//window_resize(".sidebar","nav.fix");
		scrolling('.scroll-content', '.scroll-container', '.list-career a');
		scrolling('.scroll-content', '.scroll-container', '.list-contact a');
		//view_isotope("#isotope-container");

		klik_detail(".more-detail");

		finder("#finder");

		about_detail(".item .row");

		member_area(".member a");

		acordion_menu(".acordion span");

	}

	INIT();

	$('#slider').tinycarousel({ display: 3 });

	$('#carousel').carousel();


	$(".video").click(function(){
		$(this).children(".video-content").fadeIn("slow");
	})

});
