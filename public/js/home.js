var eventos=[];
var calendarEl, calendar
window.onload = function() {
  getBanners();
  getCalendario()
  getEventos();
  contadorDocentes();
  contadorProspectos();
};

var puigins={
  	swiper:$( ".swiper-slider" ),
}

function getCalendario(){
  calendarEl = document.getElementById('calendar');
  calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: "UTC",
    locale: "es",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,dayGridWeek,dayGridDay,listWeek",
    },
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true,
    weekNumbers: false,
    dayMaxEvents: true, // allow "more" link when too many events
    events: eventos,
    editable: false,
    eventClick: function (calEvent, jsEvent, view) {
      showInfoEvento(calEvent.event.id);
    },
      });
      calendar.render();

}

function getBanners(){
  var url = "/bannerVigent";
  $.ajax({
      type: "POST",
      url: url,
      data: {},
      contentType: false,
      processData: false,
      success: function(data){
        var banners = JSON.parse(data);
        if(banners.length >  0){
          var index = 0;
          for (var i = 0; i < banners.length; i++) {
            var banner = `
            <div class="swiper-slide" data-slide-bg="./${banners[i].ruta}" >
            <div class="swiper-caption swiper-parallax">
                <div class="swiper-slide-caption">
                  <div class="container">
                    <div class="row justify-content-xl-center">
                      <div class="col-xl-12">
                        <h1><span class="big text-uppercase" data-caption-animate="fadeIn" data-caption-delay="700">${banners[i].nombre}</span></h1>
                      </div>
                      <div class="col-xl-10 offset-top-30">
                        <h4 class="d-none d-lg-block text-light offset-bottom-0" data-caption-animate="fadeIn" data-caption-delay="900">
                          ${banners[i].descripcion}
                        </h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            `;
            index++;
            $('#banners').append(banner);
            if(i == (banners.length -1) ){
              inicializeBanner();
            }
          }

        }
      }
    });
}

function contadorDocentes(){
  var url = "/countDocentes";
  $.ajax({
      type: "POST",
      url: url,
      data: {},
      contentType: false,
      processData: false,
      success: function(data){
        $('#totalDocentes').append(data-1)
      }
    });
}

function contadorProspectos(){
  var url = "/countProspectos";
  $.ajax({
      type: "POST",
      url: url,
      data: {},
      contentType: false,
      processData: false,
      success: function(data){
        console.log(data);
        $('#totalProspeto').append(data)
      }
    });
}

function getEventos(){
  var url = "/getEventos";
  $.ajax({
      type: "POST",
      url: url,
      data: {},
      contentType: false,
      processData: false,
      success: function(data){
        eventos=JSON.parse(data);
        getCalendario();
        var today = new Date();
        var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth()+1, 0);
        eventos.find(element =>{
          var day = element.start.split('T');
          var eveIni = new Date(day[0]);
          if(eveIni.getTime() > lastDayOfMonth.getTime()){
            $('#proxEvent').append(`<span  role="button" onClick="showInfoEvento(${element.id})"><b>${day[0]} - ${day[1]}</b> ${element.title}<br/></span>`)
          }
        });


      }
    });
}

function showInfoEvento(id){
  var evento = eventos.find(element => element.id == id);

  var imagen='';
  if(Boolean(evento.adjunto) != false ){
    imagen = `<img src='./${evento.adjunto}' style="width: 250px; align: center"  loading="lazy">`;
  }
  Swal.fire({
      title: `<strong> <u>${evento.title}</u></strong>`,
      html:
        `${imagen} <br/>
        <b>Descripcion:</b> ${evento.descripcion}<br/>
        <b>Link:</b> <a href="${evento.link}" target="_blank">${evento.link}</a><br/>
        `,
      showCloseButton: true,
      focusConfirm: true,
      confirmButtonText:
        '<i class="fa fa-thumbs-up"></i> ',
    })
}



function inicializeBanner(){
  if (plugins.swiper.length) {
		plugins.swiper.each(function () {
			var slider = $(this),
				pag      = slider.find(".swiper-pagination"),
				next     = slider.find(".swiper-button-next"),
				prev     = slider.find(".swiper-button-prev"),
				bar      = slider.find(".swiper-scrollbar"),
				parallax = slider.parents('.rd-parallax').length;

			slider.find(".swiper-slide")
				.each( function () {
					var $this = $(this), url;
					if ( url = $this.attr("data-slide-bg") ) {

						$this.css({
							"background-image": "url(" + url + ")",
							"background-size": "cover"
						})
					}

				})
				.end()
				.find("[data-caption-animate]")
				.addClass("not-animated")
				.end()
				.swiper({
					autoplay:                 !isNoviBuilder && $.isNumeric( slider.attr( 'data-autoplay' ) ) ? slider.attr( 'data-autoplay' ) : false,
					direction:                slider.attr('data-direction') || "horizontal",
					effect:                   slider.attr('data-slide-effect') || "slide",
					speed:                    slider.attr('data-slide-speed') || 600,
					keyboardControl:          !isNoviBuilder ? slider.attr('data-keyboard') === "true" : false,
					mousewheelControl:        !isNoviBuilder ? slider.attr('data-mousewheel') === "true" : false,
					mousewheelReleaseOnEdges: slider.attr('data-mousewheel-release') === "true",
					nextButton:               next.length ? next.get(0) : null,
					prevButton:               prev.length ? prev.get(0) : null,
					pagination:               pag.length ? pag.get(0) : null,
					simulateTouch:            false,
					paginationClickable:      pag.length ? pag.attr("data-clickable") !== "false" : false,
					paginationBulletRender:   pag.length ? pag.attr("data-index-bullet") === "true" ? function ( index, className ) {
						return '<span class="'+ className +'">'+ (index + 1) +'</span>';
					} : null : null,
					scrollbar:                bar.length ? bar.get(0) : null,
					scrollbarDraggable:       bar.length ? bar.attr("data-draggable") !== "false" : true,
					scrollbarHide:            bar.length ? bar.attr("data-draggable") === "false" : false,
					loop:                     !isNoviBuilder ? slider.attr('data-loop') !== "false" : false,
					loopAdditionalSlides:     0,
					loopedSlides:             0,
					onTransitionStart: function ( swiper ) {
						if( !isNoviBuilder ) toggleSwiperInnerVideos( swiper );
					},
					onTransitionEnd: function ( swiper ) {
						if( !isNoviBuilder ) toggleSwiperCaptionAnimation( swiper );
						$(window).trigger("resize");
					},

					onInit: function ( swiper ) {
						if( !isNoviBuilder ) toggleSwiperInnerVideos( swiper );
						if( !isNoviBuilder ) toggleSwiperCaptionAnimation( swiper );

						// Create parallax effect on swiper caption
						slider.find(".swiper-parallax")
							.each( function () {
								var $this = $(this), speed;

								if ( parallax && !isIE && !isMobile ) {
									if ( speed = $this.attr("data-speed") ) {
										makeParallax( $this, speed, slider, false );
									}
								}
							});
						$(window).on('resize', function () {
							swiper.update(true);
						})
					},
					onSlideChangeStart: function (swiper) {
						if ( isNoviBuilder ) return;

						var activeSlideIndex = swiper.activeIndex,
							slidesCount = swiper.slides.not(".swiper-slide-duplicate").length,
							thumbsToShow = 3;

						//If there is not enough slides
						if ( slidesCount < thumbsToShow ) return false;

						//Fix index count
						if ( activeSlideIndex === slidesCount + 1 ) activeSlideIndex = 1;
						else if ( activeSlideIndex === 0 ) activeSlideIndex = slidesCount;

						//Lopp that adds background to thumbs
						for (var i = -thumbsToShow; i < thumbsToShow + 1; i++) {
							if ( i === 0 ) continue;

							//Previous btn thumbs
							if ( i < 0 ) {
								//If there is no slides before current
								if ( ( activeSlideIndex + i - 1) < 0 ) {
									$(swiper.container).find( '.swiper-button-prev .preview__img-'+ Math.abs(i) )
										.css("background-image", "url(" + swiper.slides[slidesCount + i + 1].getAttribute("data-preview-bg") + ")");
								} else {
									$(swiper.container).find( '.swiper-button-prev .preview__img-'+ Math.abs(i) )
										.css("background-image", "url(" + swiper.slides[activeSlideIndex + i].getAttribute("data-preview-bg") + ")");
								}

								//Next btn thumbs
							} else {
								//If there is no slides after current
								if ( activeSlideIndex + i - 1 > slidesCount ) {
									$(swiper.container).find('.swiper-button-next .preview__img-' + i)
										.css("background-image", "url(" + swiper.slides[i].getAttribute("data-preview-bg") + ")");
								} else {
									$(swiper.container).find('.swiper-button-next .preview__img-' + i)
										.css("background-image", "url(" + swiper.slides[activeSlideIndex + i].getAttribute("data-preview-bg") + ")");
								}
							}
						}
					},
				});

			$(document)
				.ready(function () {
					slider.find("video").each(function () {
						if (!$(this).parents(".swiper-slide-active").length) {
							this.pause();
						}
					});
				})
				.trigger("resize");
		});
	}
}
