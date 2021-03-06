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

	var verticalScroll = function(param){
		$(param).jScrollPane({showArrows: true});
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
			var _this = $(this);
			var url = _this.attr("href");
			var img_container = _this.parents(".columns.five").siblings(".nine");
			console.log(img_container);

			_this.parents(".mb20").addClass("active");
			$(".mb20:not(.active)").fadeOut(200).slideUp(300);
			_this.children("span").html("- ");
			_this.parent("p").siblings("p.hide").fadeIn(500).parents(".sidebar").addClass("expand");
			
			$.ajax({
			  url: url,
			  dataType : 'html',
			  beforeSend : function() {
			  	img_container.append('<div class="img-extend">Loading... </div>');		
			  },
			  success : function(data){
			  	$(".img-extend").html(data);
			  
				// call colorbox
				cboxImage(".cboxElement");
			  }
			});

		}, function(){
			var _this = $(this);
			var url = _this.attr("href");
			var img_container = _this.parents(".columns.five").siblings(".nine");
			console.log(img_container);

			_this.parents(".mb20").removeClass("active");
			$(this).parent("p").siblings("p.hide").fadeOut(200);
			_this.parents(".sidebar").removeClass("expand");
			$(".img-extend").slideUp(200,function(){
				$(this).remove();
			});
			$(".mb20").fadeIn(200).slideDown(300);
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
						},500);
					});
					return false;
				});

			return false;
		});
	}

	var about_detail = function(param){
		
		// $(param).toggle(function(){
		// 	var _this = $(this);
		// 	var _close = _this.find(".close");

		// 	$(".active").find(".detail-bio").fadeOut();
		// 	$(".active").removeClass("active")
		// 	$(".overlay").remove();

		// 	_this.siblings(".item").append('<div class="overlay"></div>');
		// 	_this.addClass("active");
		// 	_this.find(".detail-bio").fadeIn(500);

		// 	// run vertical scroll
		// 	verticalScroll(".detail-bio .desc");
		// }, function(){
		// 	var _this = $(this);
			
		// 	_this.find(".detail-bio").fadeOut(500);
		// 	$(".overlay").fadeOut(500);
		// 	setTimeout(function(){
		// 		_this.removeClass("active");
		// 		$(".overlay").remove();
		// 	},800);
		// });

		$(param).click(function(){
			var _this = $(this);
			var _close = _this.find(".close");

			if(_this.hasClass("active")){
				_this.find(".detail-bio").fadeOut(500);
				$(".overlay").fadeOut(500);
				setTimeout(function(){
					_this.removeClass("active");
					$(".overlay").remove();
				},800);
			}else{
				$(".active").find(".detail-bio").fadeOut();
				$(".active").removeClass("active")
				$(".overlay").remove();

				_this.siblings(".item").append('<div class="overlay"></div>');
				_this.addClass("active");
				_this.find(".detail-bio").fadeIn(500);

				// run vertical scroll
				verticalScroll(".detail-bio .desc");	
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

			validate_register("#register-form");
			validate_login("#log-in-form");
			validate_forgot("#fg-pass-form");

			$(".forgot-pass").click(function(){
				$("#forgot-pass").addClass("active");
				close_member_area(".close");

				return false;
			});

			return false;
		});
	}

	var cboxImage = function(param){
		$(param).colorbox({rel: param});
	}

	var cboxImageClick = function(param){
		$(param).click(function(){
			var group = $(this).attr("id");
			$.colorbox({rel : group})
		});
	}

	var cboxDetail = function(param) {
		$(param).click(function(){
			var _this = $(this);

			var _title = "<h5>"+ _this.parents(".columns.sixteen").find("h5").html() + "</h5>";
			var _content = ""; 

			$(".columns.sixteen .article").each(function(index, value){
				_content += "<div>"+ $(this).html() +"</div>";
			});

			var _html = _title + _content;
			
			$.colorbox({
				transition : 'fade',
				width : '800px',
				height: '650px',
				reposition: true,
				html : _html
			})

			console.log(_title, _content);

		})
	}

	var DIS_R_CLICK = function(param){
		NEW_URL = param.indexOf("localhost");
		console.log(param, NEW_URL)
		if(NEW_URL == (-1)){

			document.onmousedown=disableclick;
			status="Right Click Disabled";
			function disableclick(e){
			  if(event.button==2)
			   {
			    document.addEventListener("contextmenu", function(e){
				    e.preventDefault();
				}, false);
			     return false;    
			   }
			}
		}

	}

	var validate_forgot = function(param){
		$(param).validate({
			rules: {
				"email": {
					required: true,
					email: true
				}
			},
			submitHandler: function(form) {
				$(param).find(".submit").addClass("loading");
				$(param + " .submit").find("input").attr("disabled","");
				$(form).ajaxSubmit({
					type: "POST",
					success: function(data){
						if(data.success == 0){
					 		$(param).siblings(".alert-box").fadeIn();
					 		$(param).siblings(".alert-box").find("p").append(data.error[0]);
					 		$(param + " .submit").find("input").attr("disabled",false);
					 		$(param).find(".submit").removeClass("loading");
					 	}else{
					 		$(param + " .submit").find("input").attr("disabled",false);
					 		$(param).find(".submit").removeClass("loading");
					 		$(param).siblings(".alert-box").removeClass("error");
					 		$(param).siblings(".alert-box").find("p").append("Forgot password berhasil, silahkan cek email anda untuk reset passowrd!");
					 	}
					}
				});
			}
		});
	}

	var validate_login = function(param){
		$(param).validate({
			rules: {
				"email": {
					required: true,
					email: true
				},
				"password": {
					required: true
				}
			},
			submitHandler: function(form) {
				$(param).find(".submit").addClass("loading");
				$(param + " .submit").find("input").attr("disabled","");
				$(form).ajaxSubmit({
					type: "POST",
					success: function(data){
						if(data.success == 0){
					 		$(param).siblings(".alert-box").fadeIn();
					 		$(param).siblings(".alert-box").find("p").append(data.error[0]);
					 		$(param + " .submit").find("input").attr("disabled",false);
					 		$(param).find(".submit").removeClass("loading");
					 	}else{
					 		$(param + " .submit").find("input").attr("disabled",false);
					 		$(param).find(".submit").removeClass("loading");
					 		$(param).siblings(".alert-box").removeClass("error");
					 		$(param).siblings(".alert-box").find("p").append("Anda Berhasil Login!");
					 		setTimeout(function(){
					 			window.location.reload();
					 		}, 1500);
					 	}
					}
				});
			}
		});
	}

	var validate_register = function(param){
		$(param).validate({
			rules: {
				"first_name": {
					required: true
				},
				"last_name": {
					required: true
				},
				"address": {
					required: true
				},
				"city": {
					required: true
				},
				"postal_code": {
					required: true,
					number: true
				},
				"email": {
					required : true,
					email    : true
				},
				"password": {
					required: true
				},
				"re_password": {
					required: true,
					equalTo: '.pass'
				},
				"phone": {
					required: true,
					number: true,
					minlength: 5,
					maxlength: 15
				}
				,
				"mobile_phone": {
					required: true,
					number: true,
					minlength: 5,
					maxlength: 15
				}
			},
			submitHandler: function(form) {
				$("#register").find(".submit").addClass("loading");
				$("#register .submit").find("input").attr("disabled","");
				$(form).ajaxSubmit({
					type: "POST",
					success: function(data){
						console.log(data);

						if(data.success == 0){
					 		$("#register").find(".alert-box").fadeIn();
					 		$("#register").find(".alert-box p").append(data.error[0]);
					 		$("#register .submit").find("input").attr("disabled",false);
					 		$("#register").find(".submit").removeClass("loading");
					 	}else{
					 		$("#register .submit").find("input").attr("disabled",false);
					 		$("#register").find(".submit").removeClass("loading");
					 		$("#register").find(".alert-box").removeClass("error");
					 		$("#register").find(".alert-box p").append("Anda Berhasil Registrasi, silahkan Login!");
					 		setTimeout(function(){
					 			window.location.reload();
					 		}, 1500);
					 	}
					}
				});
			}
		});
	}

	var finder_select = function(param){
		$(param).change(function(){
			var option = $(this).find("option:selected").val();
			if(option != ""){
				$("#finder-form").find(".default, .active, .category-type").fadeOut();
				$("#finder-form .active").removeClass("active");
				$("#finder-form .submit").fadeOut();
				setTimeout(function(){
					$("#finder-form").find("." + option).addClass("active").fadeIn();
					$("#finder-form .submit").fadeIn();
				}, 500);
			}else{
				$("#finder-form .submit").fadeOut().fadeIn(500);
				$("#finder-form").find(".active").fadeOut();
				$("#finder-form").find(".default").fadeIn();
			}
		});
	}

	var select_disable = function(param){
		$(param).click(function(){
			alert("Please Choose Type Property First");
		})
	}

	// make schedule to the sales

	var schedule = function(param){
		var dateToday = new Date();

		$(param).datepicker({
			beforeShow: function(input, inst){
			    inst.dpDiv.css({marginTop: '-100px', marginLeft: '-220px', 'height' : '360px', 'top' : '0px'});
			},
			minDate			  : dateToday,
			dateFormat        : 'yy-mm-dd',
			showOn            : 'button', 
			buttonImage       : BASE_URL +'/assets/images/icon/calendar.png', 
			buttonImageOnly   : true,
			showOtherMonths   : true,
			selectOtherMonths : true,
      		onSelect: function(){
      			// alert($(".schedule").val());
      			var choose_date = $(".schedule").val();
      			
      			
      			if(member_id != 0){
      				url = BASE_URL + 'project/set_calendar?marketing_id=' + marketing_id + '&member_id=' + member_id + '&property_id=' + property_id + '&date=' + choose_date;
      				// URL -> ../project/set_calendar?marketing_id= &member_id= &property_id= &date=
      				$.ajax({
					  url: url,
					  dataType : 'json',
					  beforeSend : function() {
					  	$("#carousel li.contact").addClass("loading");
					  },
					  success : function(data){
					  	if(data.success == 1){
					  		$("#carousel li.contact").removeClass("loading");
					  		alert("Perimintaan jadwal anda sedang diproses, tunggu konfirmasinya lewat email");
					  	}else{
					  		$("#carousel li.contact").removeClass("loading");
					  		alert(data.message);
					  	}
					  }
					});
      			}else{
      				alert("Please register / login to make an appointment");
      			}
      		}
		});
	}

	var PM_search = function(param){
		$(param).click(function(){
			var _this = $(this);
			var _target = _this.attr("id");
			
			$("option.secondary").removeClass("hide");	

			console.log(_target);

			if(!_this.hasClass("active")) {
				_this.addClass("active").siblings("a").removeClass("active");

			    var select = $('#method');
			    var option_to_select = $('option[class="' + _target + '"]', select);
			    select.val(option_to_select.val()).change();
			    if(_target == "primary"){
			    	$("option.secondary").addClass("hide");	
			    	$(".category-method").val(_target);
			    } else {
			    	$(".category-method").val(_target);
			    	$("option.secondary").removeClass("hide");	
			    }
				// $("option."+ _target).removeClass("hide").siblings("option").addClass("hide");
				// $("option."+ _target).siblings("option").addClass("hide");
			}

			return false;
		});
	}

	var category_toggle = function(param, target){
		$(param).click(function(){
			var _this = $(this),
				list = _this.attr("data-target");

			if(!_this.parents(target).hasClass("active")){
				$(target).removeClass("active");
				_this.parents(target).addClass("active");

				$(".list-property").find("li").fadeOut(500, function(){
					setTimeout(function(){
						$(".list-property").find("." + list).fadeIn(500);	
					}, 500);
				});
			}

		});
	}

	function INIT(){
		//initial(".sidebar", "nav.fix");
		//window_resize(".sidebar","nav.fix");
		scrolling('.scroll-content', '.scroll-container', '.list-career a');
		scrolling('.scroll-content', '.scroll-container', '.list-contact a');
		//view_isotope("#isotope-container");

		klik_detail(".more-detail");

		finder("#finder");

		about_detail(".item");

		member_area(".member a.register, .member a.login");

		acordion_menu(".acordion span");

		cboxImageClick(".cboxElement");

		cboxDetail(".button-detail-project");

		verticalScroll(".container-article");

		finder_select("#type-property");

		select_disable("select.disabled");

		schedule(".schedule");

		PM_search(".method");

		//DIS_R_CLICK(BASE_URL);

		category_toggle(".sub-head", ".category-property");
	}

	INIT();

	$('#slider').tinycarousel();

	$('#carousel').carousel();


	$(".video").click(function(){
		$(this).children(".video-content").fadeIn("slow");
	})

});
