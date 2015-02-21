var $ = jQuery;
$(document).ready(function() {
	$(window).on("scroll",function() {
		$(".jumbotron").css({
			"-webkit-transform":"translateY("+($(window).scrollTop()/2.2)+"px)"
		})
/*		if($(window).scrollTop() > 385) {
			$("header").addClass("small");
		} else {
			$("header").removeClass("small");
		}*/
	});
	window.slideshow = new function() {
		var self = this;
		self.Slides = $(".jumbotron .slide");
		self.ActiveSlide = 0;
		self.SlideCount = self.Slides.length;
		

		self.Init = function() {
			self.SetActive();
			self.Controls();
			self.AttachHandlers();
			self.Start();
		}

		self.Start = function() {
			$.doTimeout("changeSlide",10000,function() {
				self.ChangeSlide("next");
				return true;
			})
		}
		self.SetActive = function(slideNumber) {
			if(!slideNumber) { slideNumber = 0;}
			$(self.Slides).eq(slideNumber).addClass('active');
		}
		self.ChangeSlide = function(direction,reset) {
			$(self.Slides).eq(self.ActiveSlide).removeClass("active");
			if(direction == "next") {
				self.ActiveSlide = self.ActiveSlide + 1 < self.SlideCount ? self.ActiveSlide + 1 : 0;
			} else {
				self.ActiveSlide = self.ActiveSlide -1 < 0 ? self.SlideCount-1 : self.ActiveSlide -1;
			}
			self.SetActive(self.ActiveSlide);
				$.doTimeout("changeSlide");
				$.doTimeout( 'reAutoStart' );
				$.doTimeout( 'reAutoStart', 10000, function(){
				    $.doTimeout( 'changeSlide', 10000, function(){
				        self.ChangeSlide( "next" );
				        return true;
				    } );
				} );
			self.Start();
		}
		self.AttachHandlers = function() {
			$(".jumbotron").on("click",".next",function(){
				self.ChangeSlide("next",true);
			});

			$(".jumbotron").on("click",".prev",function(){
				self.ChangeSlide("prev",true);
			});
		}
		self.ControlsMarkup = "\
			<ul class='slideshow-controls'>\
				<li class='next'><i class='fa fa-3x fa-chevron-circle-right'></i></li>\
				<li class='prev'><i class='fa fa-3x fa-chevron-circle-left'></i></li>\
			</ul>";

		self.Controls = function() {

			if(self.Slides.length == 1) {
				return;
			}
			if(self.SlideCount) {
				$(self.ControlsMarkup).appendTo(".jumbotron");
			}

		}
	};

	var bindMagnificLinks = function() {
		$("#login_value").focus();
		$.each($(".magnific"),function() {
			$(this).on("click",function(e) {
				e.preventDefault();
			})
			if(!$(this).data("magnificPopup")) {
				$(this).magnificPopup({
					type: 'ajax',
					overflowY: 'scroll',
					mainClass:"white-popup-block",
					callbacks: {
						ajaxContentAdded:bindMagnificLinks
					}

				});
				
			}
		})
		$(".mfp-cancel",".mfp-content").on("click",function(e) {
			e.preventDefault();
			$.magnificPopup.close();
		});

		
	};

	$(document).on("submit",".container-ajax form",function(e) {
		e.preventDefault();
		var self = $(this);
		var formData = $(this).serializeArray();

		formData.push({name:'submit',value:'ajax'});
		$.ajax({
			data:formData,
			type:"POST",
			url:self.attr("action"),

		}).done(function(data) {
			try {
				json = $.parseJSON(data);
				if(json.dest) {
					window.location = json.dest;
				}
			} catch(e) {
				var mfp = $.magnificPopup.instance

				mfp.items[0] = {
					src:data,
					type:"inline"
				};

				mfp.updateItemHTML();
				bindMagnificLinks();
			}
		})
	})
	bindMagnificLinks();

	$(document).on("click",".social",function(e) {
		e.preventDefault();
		window.open($(this).attr("href"), "popupWindow", "width=600,height=215,scrollbars=no");
	});
	
	$(document).on("click",".close-mfp",function(e){
		e.preventDefault();
		$.magnificPopup.close();
	});

	$("select.select-or-other").on("change",function() {
		var $this = $(this),
			$toggledElement = $(".extra:visible",$this.parent());
		if($toggledElement.length) {
			$toggledElement.addClass("hidden").find("input")[0].value = ""
		}
		
		if($this.val().toLowerCase() == "other" || $this.val().toLowerCase() == $this.data("specify")) {
			if($this.val().toLowerCase() == $this.data("specify")) {
				$toggledElement = $("." + $this.data('specify'),$this.parent());
			} else {
				$toggledElement = $this.next();
			}
			$toggledElement.removeClass("hidden");
			$toggledElement.find("input")[0].value = $toggledElement.find("input")[0].defaultValue;
		}

	}).trigger("change");

	var user_category = $("input[name=category][type=radio]").length ? $("input[name=category]:checked").val() : $("input[name=category][type=hidden]").val();

	$("input[name=category][type=radio]").change(function() {
		user_category = $("input[name=category]:checked").length ? $("input[name=category]:checked").val() : user_category;
		check_category(user_category);
	});
	

	$("input[name=category]").trigger("change");
	slideshow.Init();
	check_category(user_category);


});

function check_category(val) {
	console.log(val);
	if(val == "non-profit") {
		$('.nonprofit.extra').show();
		$('.designer.extra').hide();
	} else if(val =='creative') {
		$('.nonprofit.extra').hide();
		$('.designer.extra').show();
	} else {
		$('.designer.extra').hide();
		$('.nonprofit.extra').hide();
	}
}