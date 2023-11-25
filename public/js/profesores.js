var ruta = window.location.pathname
ruta = ruta.split('/');
window.onload = function () {
    $('#docentes').addClass('active')
    if (ruta[1] == 'profesor') {
        console.log(ruta);
        getProfesores();
    } else {
        getAllProfesores();
    }
};

function getProfesores() {
    var id = ruta[2];
    var url = "/getMoreProf";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.ESTADO == 'OK') {
                var info = data.DATA.PROFESOR;
                var cursos = data.DATA.CURSOS;
                $('#perfil').append(`<img class="rounded-circle"  src="${window.location.protocol}//${window.location.hostname}/${info.profesor_foto}" alt="" style="max-width: 300px">`)
                $('#Nombre').append(info.profesor_nombres + ' ' + info.profesor_apellidos);
                $('#Titulo').append(info.profesor_titulo + '-' + info.profesor_puestoactual);

                if (Boolean(info.profesor_facebook) != false) {
                    $('#facebook').attr('href', `${info.profesor_facebook}`);
                    $('#facebook').attr('target', `blank`);
                }
                if (Boolean(info.profesor_instagram) != false) {
                    $('#instagram').attr('href', `${info.profesor_instagram}`);
                    $('#instagram').attr('target', `blank`);
                }
                if (Boolean(info.profesor_youtube) != false) {
                    $('#youtube').attr('href', `${info.profesor_youtube}`);
                    $('#youtube').attr('target', `blank`);
                }
                if (Boolean(info.profesor_linkedin) != false) {
                    $('#linkedin').attr('href', `${info.profesor_linkedin}`);
                    $('#linkedin').attr('target', `blank`);
                }
                if (Boolean(info.profesor_twitter) != false) {
                    $('#twitter').attr('href', `${info.profesor_twitter}`);
                    $('#twitter').attr('target', 'blank');
                }
                if (Boolean(info.profesor_email) != false) {
                    $('#Email').html(info.profesor_email);
                }
                info.profesor_descripcion = info.profesor_descripcion.replace(/(?:\\[rn])+/g, "<br/>");
                $('#descripcion').append('Profesor titulado como: ' + info.profesor_educacion + ', ' + info.profesor_descripcion);

                for (var i = 0; i < cursos.length; i++) {
                    var curso = `<li><span>${cursos[i].curso_nombre}</span>
                            Del ${cursos[i].curso_finicio} al ${cursos[i].curso_fin}. </li>`;
                    $('#curso').append(curso);
                }
            } else {
                location.href = "/";
            }
        }
    });
}


/**
* Funcion para consultar y pintar todos los profesores
* create BY
*/
function getAllProfesores() {
    var url = "/getProfesores";
    $.ajax({
        type: "POST",
        url: url,
        data: {},
        contentType: false,
        processData: false,
        success: function (data) {
            var profesores = JSON.parse(data);
            if (profesores.ESTADO == 'OK') {
                let html = '';
                for (var i = 0; i < profesores.DATA.length; i++) {
                    //Se adiciona script para generar cards con representación de imagenes ABNG
                    html = `<li class="list-inline-item" data-owl-item="${i}">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card" style="width:250px; height: 373px;">
                                            <div class="id-img-card card h-100 card-border align-items-center">
                                                <img src="./${profesores.DATA[i].perfil}" class="card-img-top" alt="...">                                                
                                                <a id="${profesores.DATA[i].consec}" class="btn-view" onclick="redirect(${profesores.DATA[i].consec})" href="profesor/${profesores.DATA[i].consec}" target="_blank"><b class="pointer btn btn-outline-light" style="text-decoration: underline">Mas Información</b></a>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </li>`;

                    //     var perfil = `
                    //   <li class="list-inline-item owl-dot-custom rounded-circle img-bordered-white" data-owl-item="${i}"><img class="rounded-circle" width="90" height="90" src="./${profesores.DATA[i].perfil}" alt=""></li>
                    // `;
                    var descripcion = `
                <div>
                  <blockquote class="quote quote-custom-image offset-top-0 offset-md-top-24"><img class="rounded-circle img-bordered-white img-fluid d-block mx-auto d-md-none" width="90" height="90" src="./${profesores.DATA[i].perfil}" alt="">
                    <p class="quote-body offset-top-34">
                      ${profesores.DATA[i].descripcion} <a href="profesor/${profesores.DATA[i].consec}" target="_blank">. <b class="pointer btn btn-outline-light" style="text-decoration: underline">Mas Información</b></a>
                    </p>
                    <div class="offset-top-41">
                      <h3 class="font-accent" >${profesores.DATA[i].nombres}</h3>
                    </div>
                    <p class="text-uppercase font-weight-bold text-spacing-120 offset-top-10">
                      <span class="small " >
                        ${profesores.DATA[i].titulo}
                      </span>
                    </p>
                  </blockquote>
                </div>
                `;
                    $('#picturesTeach').append(html);
                    $('#profesoresDesc').append(descripcion);
                    if (i == (profesores.DATA.length - 1)) {
                        initializeProfesores()
                    }
                }
            }
        }

    });
}

function redirect(id) {
    window.location.href = $('#' + id).attr('href')
}
function initializeProfesores() {
    if (plugins.owl.length) {
        for (var n = 0; n < plugins.owl.length; n++) {
            var carousel = $(plugins.owl[n]),
                responsive = {},
                aliaces = ["-xs-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
                values = [0, 480, 768, 992, 1200, 1600];

            for (var i = 0; i < values.length; i++) {
                responsive[values[i]] = {};
                for (var j = i; j >= -1; j--) {
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
            $('.play').on('click', function () {
                carousel.trigger('play.owl.autoplay', [3000])
            })
            $('.stop').on('click', function () {
                carousel.trigger('stop.owl.autoplay')
            })
            carousel.owlCarousel({
                autoplay: true,
                loop: false,
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
                navText: carousel.attr("data-nav-text") ? $.parseJSON(carousel.attr("data-nav-text")) : [],
                navClass: carousel.attr("data-nav-class") ? $.parseJSON(carousel.attr("data-nav-class")) : ['owl-prev', 'owl-next']
            });
        }
    }
}
// function getAllProfesores(){
//
//   var url = "/getProfesores";
//   $.ajax({
//       type: "POST",
//       url: url,
//       data: {},
//       success: function(data){
//         data = JSON.parse(data);
//         if(data.ESTADO == 'OK'){
//           for (var i = 0; i < data.DATA.length; i++) {
//             var info=`
//             <div class=" row col-md-8 col-xl-6 row mb-4">
//               <div class="col-md-3 col-xl-3">
//                 <div class="inset-xl-right-20">
//                 <img class="rounded-circle" width="100px" height="100px" src="${window.location.protocol}//${window.location.hostname}/${data.DATA[i].perfil}" alt="">
//                 </div>
//               </div>
//               <div class="col-md-9 col-xl-9 offset-top-30 offset-xl-top-0">
//                 <div class="shadow-drop-xl">
//                   <h6 class="mb-0">${data.DATA[i].nombres}-${data.DATA[i].titulo}</h6>
//                   <hr class="divider hr-xl-left-0 mt-0 mb-2 bg-blue-gray">
//                   <p>${data.DATA[i].descripcion}</p>
//                   <p> <a href="profesor/${data.DATA[i].consec}">Mas Información</a></p>
//                 </div>
//               </div>
//             </div>
//             `;
//             $('#informacionDoentes').append(info)
//           }
//
//         }else{
//
//         }
//       }
//     });
//   }
