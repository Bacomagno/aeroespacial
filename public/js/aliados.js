var ruta = window.location.pathname
ruta = ruta.split('/');
window.onload = function() {
  $('#aliados').addClass('active')
  if(ruta[1] == 'aliado'){
    getAliado();
  }else{
    getAllAliados();
  }
};

function getAliado(){
  var id = ruta[2];
  var url = "/getMoreAliado";
  $.ajax({
      type: "POST",
      url: url,
      data: {
        id: id
      },
      success: function(data){
        data = JSON.parse(data);
        if(data.ESTADO == 'OK'){
          var info = data.DATA.ALIADO;
          $('#perfil').append(`<img class="rounded-circle"  src="${window.location.protocol}//${window.location.hostname}/${info.aliado_foto}" alt="" style="max-width: 300px">`)
          $('#Nombre').append(info.aliado_nombres+' '+info.aliado_apellidos);
          $('#Titulo').append(info.aliado_titulo);

          if(Boolean(info.aliado_facebook)!=false){
            $('#facebook').attr('href',`${info.aliado_facebook}`);
            $('#facebook').attr('target',`blank`);
          }
          if(Boolean(info.aliado_instagram)!=false){
            $('#instagram').attr('href',`${info.aliado_instagram}`);
            $('#instagram').attr('target',`blank`);
          }
          if(Boolean(info.aliado_youtube)!=false){
            $('#youtube').attr('href',`${info.aliado_youtube}`);
            $('#youtube').attr('target',`blank`);
          }
          if(Boolean(info.aliado_linkedin)!=false){
            $('#linkedin').attr('href',`${info.aliado_linkedin}`);
            $('#linkedin').attr('target',`blank`);
          }
          if(Boolean(info.aliado_twitter)!=false){
            $('#twitter').attr('href',`${info.aliado_twitter}`);
            $('#twitter').attr('target','blank');
          }
          if(Boolean(info.aliado_email)!=false){
            $('#Email').html(info.aliado_email);
          }
          info.aliado_descripcion=info.aliado_descripcion.replace(/(?:\\[rn])+/g, "<br/>");
          $('#descripcion').append(info.aliado_descripcion);

        }else{
          location.href="/";
        }
      }
    });
  }


  /**
  * Funcion para consultar y pintar todos los profesores
  * create BY
  */
  function getAllAliados(){
    var url = "/getAliados";
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        contentType: false,
        processData: false,
        success: function(data){
          var aliados = JSON.parse(data);
          if(aliados.ESTADO == 'OK'){
            for (var i = 0;   i < aliados.DATA.length; i++) {
                //Se adiciona script para generar cards con representación de imagenes ABNG
                html = `<li class="list-inline-item" data-owl-item="${i}">                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card" style="width:250px; height: 373px;">
                                        <div class="id-img-card card h-100 card-border align-items-center">
                                            <img src="./${aliados.DATA[i].perfil}" class="card-img-top" alt="...">
                                            <a id="${aliados.DATA[i].consec}" class="btn-view" onclick="redirect(${aliados.DATA[i].consec})" href="aliado/${aliados.DATA[i].consec}" target="_blank"><b class="pointer btn btn-outline-light" style="text-decoration: underline">Mas Información</b></a>                                                
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                        </li>`;

                // var perfil =`
                //   <li class="list-inline-item owl-dot-custom rounded-circle img-bordered-white" data-owl-item="${i}"><img class="rounded-circle" width="90" height="90" src="./${aliados.DATA[i].perfil}" alt=""></li>
                // `;
                var descripcion =`
                <div>
                  <blockquote class="quote quote-custom-image offset-top-0 offset-md-top-24"><img class="rounded-circle img-bordered-white img-fluid d-block mx-auto d-md-none" width="90" height="90" src="./${aliados.DATA[i].perfil}" alt="">
                    <p class="quote-body offset-top-34">
                      ${aliados.DATA[i].descripcion} <a href="aliado/${aliados.DATA[i].consec}" target="_blank">. <b class="pointer btn btn-outline-light" style="text-decoration: underline">Mas Información</b></a>
                    </p>
                    <div class="offset-top-41">
                      <h3 class="font-accent" >${aliados.DATA[i].nombres}</h3>
                    </div>
                    <p class="text-uppercase font-weight-bold text-spacing-120 offset-top-10">
                      <span class="small " >
                        ${aliados.DATA[i].titulo}
                      </span>
                    </p>
                  </blockquote>
                </div>
                `;
                $('#picturesTeach').append(html);
                $('#aliadoDesc').append(descripcion);
                if(i == (aliados.DATA.length -1) ){
                  initializeAliados()
                }
            }
          }
          }

      });
  }

  function redirect(id){    
    window.location.href = $('#'+id).attr('href')
  }

  function initializeAliados(){
    if ( plugins.owl.length ) {
      for ( var n = 0; n < plugins.owl.length; n++ ) {
        var carousel = $(plugins.owl[n]),
          responsive = {},
          aliaces = ["-xs-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
          values = [0, 480, 768, 992, 1200, 1600];

        for ( var i = 0; i < values.length; i++ ) {
          responsive[values[i]] = {};
          for ( var j = i; j >= -1; j-- ) {
            if (!responsive[values[i]]["items"] && carousel.attr("data" + aliaces[j] + "items")) {
              responsive[values[i]]["items"] = j < 0 ? 1 : parseInt(carousel.attr("data" + aliaces[j] + "items"));
            }
            if (!responsive[values[i]]["stagePadding"] && responsive[values[i]]["stagePadding"] !== 0 && carousel.attr("data" + aliaces[j] + "stage-padding")) {
              responsive[values[i]]["stagePadding"] = j < 0 ? 0 : parseInt(carousel.attr("data" + aliaces[j] + "stage-padding"));
            }
            if (!responsive[values[i]]["margin"] && responsive[values[i]]["margin"] !== 0 && carousel.attr("data" + aliaces[j] + "margin")) {
              responsive[values[i]]["margin"] = j < 0 ? 30 : parseInt(carousel.attr("data" + aliaces[j] + "margin"));
            }
            if (!responsive[values[i]]["dotsEach"] && responsive[values[i]]["dotsEach"] !== 0 && carousel.attr("data" + aliaces[j] + "dots-each")) {
              responsive[values[i]]["dotsEach"] = j < 0 ? false : parseInt(carousel.attr("data" + aliaces[j] + "dots-each"));
            }
          }
        }

        // Create custom Pagination
        if (carousel.attr('data-dots-custom')) {
          carousel.on("initialized.owl.carousel", function (event) {
            var carousel = $(event.currentTarget),
              customPag = $(carousel.attr("data-dots-custom")),
              active = 0;

            if (carousel.attr('data-active')) {
              active = parseInt(carousel.attr('data-active'));
            }

            carousel.trigger('to.owl.carousel', [active, 300, true]);
            customPag.find("[data-owl-item='" + active + "']").addClass("active");

            customPag.find("[data-owl-item]").on('click', function (e) {
              e.preventDefault();
              carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item")), 300, true]);
            });

            carousel.on("translate.owl.carousel", function (event) {
              customPag.find(".active").removeClass("active");
              customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
            });
          });
        }

        // Create custom Navigation
        if (carousel.attr('data-nav-custom')) {
          carousel.on("initialized.owl.carousel", function (event) {
            var carousel = $(event.currentTarget),
              customNav = $(carousel.attr("data-nav-custom"));

            customNav.find("[data-owl-prev]").on('click', function (e) {
              e.preventDefault();
              carousel.trigger('prev.owl.carousel', [300]);
            });

            customNav.find("[data-owl-next]").on('click', function (e) {
              e.preventDefault();
              carousel.trigger('next.owl.carousel', [300]);
            });
          });
        }
        $('.play').on('click',function(){
            carousel.trigger('play.owl.autoplay',[3000])
        })
        $('.stop').on('click',function(){
            carousel.trigger('stop.owl.autoplay')
        })
        carousel.owlCarousel({
          autoplay: true,
          loop:  false,
          items: 1,
          autoplaySpeed: 600,
          autoplayTimeout: 5000,
          dotsContainer: carousel.attr("data-pagination-class") || false,
          navContainer: carousel.attr("data-navigation-class") || false,
          mouseDrag: !isNoviBuilder ? carousel.attr("data-mouse-drag") === "true" : false,
          nav: carousel.attr("data-nav") === "true",
          dots: carousel.attr("data-dots") === "true",
          dotsEach: carousel.attr("data-dots-each") ? parseInt(carousel.attr("data-dots-each")) : false,
          responsive: responsive,
          animateOut: carousel.attr("data-animation-out") || false,
          navText: carousel.attr("data-nav-text") ? $.parseJSON( carousel.attr("data-nav-text") ) : [],
          navClass: carousel.attr("data-nav-class") ? $.parseJSON( carousel.attr("data-nav-class") ) : ['owl-prev', 'owl-next']
          });
      }
    }
  }
