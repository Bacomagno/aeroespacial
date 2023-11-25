
<link href='<?php echo IP_SERVER ?>public/js/lib/main.css' rel='stylesheet' />
      <!--Swiper-->
      <div class="swiper-container swiper-slider" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
          <div class="swiper-wrapper text-center" id="banners">

          </div>
          <div class="swiper-button swiper-button-prev swiper-parallax">
              <div class="preview">
              </div>
          </div>
          <div class="swiper-button swiper-button-next swiper-parallax">
              <div class="preview">
              </div>
          </div>
          <div class="swiper-pagination"></div>
      </div>
      <!-- Welcome-->
      <section class="section parallax-container novi-background section-50 section-sm-top-110 section-sm-bottom-98 section-mock-up text-white" id="home-section-welcome" style="background-image: url('<?php echo IP_SERVER ?>public/images/backgrounds/galaxia.png');"> <!--Se adiciona la clase text-white y bg-dark ABNG-->
          <div class="container">
              <div class="row justify-content-sm-center">
                  <div class="col-lg-10">
                      <h3>
                          <!-- Text Rotator-->
                          <span class="text-rotator" data-text-class=" text-mantis text-ubold" data-enable="1200" data-words="Nuestro propósito" data-rotate-interval="3000" data-rotate-animation="fadeInUp, fadeOutUp"><span class="rotate-area"></span></span>&nbsp;
                      </h3>
                      <p>Nuestro propósito es convertirnos en el faro de la generaciones que darán forma a la vida interplanetaria y a la 5ta Revolución Industrial e impulsar en América Latina la formación para jóvenes que vivirán lo que nuestros padres solo veían en películas de ciencia ficción.</p>
                  </div>
              </div>
          </div>
      </section>

      <!-- Mock Up-->
      <section class="row section novi-background section-66 mt-0 pt-0 justify-content-center parallax-container" style="background-image: url('<?php echo IP_SERVER ?>public/images/backgrounds/galaxia.png');">
          <div class="col-12 row">
              <div class="col-md-8  justify-content-center">
                  <div class="col-12" id="calendar">

                  </div>
              </div>
              <div class="col-md-4 text-white"><!--Se adiciona la clase text-white y bg-dark ABNG-->
                  <h4>PROXIMOS EVENTOS</h4>
                  <div class=" col-12 overflow-auto" height="200px" id="proxEvent" style="max-height: 200px">

                  </div>

              </div>
          </div>
      </section>

      <section class="section parallax-container" style="background-image: url('<?php echo IP_SERVER ?>public/images/backgrounds/galaxia.png');"><!--Se adiciona la clase bg-dark ABNG-->
          <!--class="section parallax-container" data-parallax-img="./public/images/backgrounds/contadores.jpg"--><!--se comenta línea completa ABNG-->
          <div class="parallax-content context-dark">
              <div class="container">
                  <div class="row justify-content-sm-center section-top-124 section-bottom-110">
                      <div class="col-sm-10 col-md-11 col-xl-12">
                          <div class="row justify-content-sm-center">
                              <div class="col-md-6 col-xl-4">
                                  <span class="pt-2 fas fa-book-reader icon-circle icon-bordered icon-outlined icon-malibu-filled mdi mdi-cube-outline"><i class=""></i> </span>
                                  <div>
                                      <h4 class="text-uppercase offset-top-30 font-weight-bold">TOTAL CURSOS</h4>
                                      <h5 class="inset-left-7p inset-right-7p" id="totalCursos">
                                          </5>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xl-4 offset-top-66 offset-md-top-0">
                                  <span class="fas fa-chalkboard-teacher pt-2 icon-circle icon-bordered icon-outlined icon-malibu-filled mdi mdi-cube-outline"></span>
                                  <div>
                                      <h4 class="text-uppercase offset-top-30 font-weight-bold">TOTAL DOCENTES</h4>
                                      <h5 class="inset-left-7p inset-right-7p" id="totalDocentes">
                                          </5>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xl-4 offset-top-66 offset-xl-top-0">
                                  <span class="fas fa-users pt-2 icon-circle icon-bordered icon-outlined icon-malibu-filled mdi mdi-cube-outline"></span>
                                  <div>
                                      <h4 class="text-uppercase offset-top-30 font-weight-bold">TOTAL ESTUDIANTES</h4>
                                      <h5 class="inset-left-7p inset-right-7p" id="totalProspeto">
                                          </5>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>





      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="<?php echo IP_SERVER ?>public/js/lib/main.js"></script>
      <script src='<?php echo IP_SERVER ?>public/js/lib/locales/es.js'></script>
      <script src="<?php echo IP_SERVER ?>public/js/home.js?v=6"></script>