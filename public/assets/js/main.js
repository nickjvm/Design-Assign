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
			if(self.SlideCount) {
				$(self.ControlsMarkup).appendTo(".jumbotron");
			}

		}
	};

	$(".magnific").magnificPopup({
		type: 'ajax',
		overflowY: 'scroll',
		mainClass:"white-popup-block"
	});

	$(document).on("click",".close-mfp",function(e){
		e.preventDefault();
		$.magnificPopup.close();
	});
	slideshow.Init();
});

