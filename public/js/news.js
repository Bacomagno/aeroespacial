$( document ).ready(function() {
      $('#news').addClass('active');
      getNews(0)
});
function getNews(id){
  var url = "/getNews";
  $.ajax({
      type: "POST",
      url: url,
      data: {
        row: id
      },
      success: function(data){
        data = JSON.parse(data);
        console.log(data);
        console.log(Math.ceil(data.TODO/5));
        var paginas= Math.ceil(data.TODO/5);
        var row = 0;
        $('#paginador').html('');
        $('#viewNews').html('');
        for (var i = 0; i < paginas; i++) {
          $('#paginador').append(`
              <button type="button" class="btn btn-dark" onClick="getNews(${row})">${i+1}</button>
            `);
            row = row+5;
        }
        var a = 0;
        for (var i = 0; i < data.DATA.length; i++) {
          var adjunto = '';
          if (Boolean(data.DATA[i].noticia_video) !=false) {
            adjunto = `
            <div class="embed-responsive embed-custom-16by9">
              <iframe width="560" height="315"
                src="${data.DATA[i].noticia_video}?controls=0"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            `;
          }else{
            adjunto = `
            <div class="">
              <img width="100%"
                src="./${data.DATA[i].noticia_adjunto}"/>
            </div>
            `;
          }
          if (a == 0) {
            $('#viewNews').append(`

                <section class="section novi-background section-98 section-md-110">
                  <div class="container">
                    <div class="row text-xl-left justify-content-center">
                      <div class="col-md-8 col-xl-6">
                        <div class="inset-xl-right-20">
                          <h3>${data.DATA[i].noticia_titulo}</h3>
                          <h6>${data.DATA[i].fecha}</h6>
                          <hr class="divider hr-xl-left-0 bg-blue-gray">
                          ${data.DATA[i].noticia_contenido}
                        </div>
                      </div>
                      <div class="col-md-8 col-xl-6 offset-top-30 offset-xl-top-0">
                        <div class="shadow-drop-xl">

                            ${adjunto}

                        </div>
                      </div>
                    </div>
                  </div>
                </section>

              `);
              a++;
          }else{
            $('#viewNews').append(`

                <section class="section novi-background section-98 section-md-110">
                  <div class="container">
                    <div class="row text-xl-left justify-content-center">
                      <div class="col-md-8 col-xl-6 offset-top-30 offset-xl-top-0">
                        <div class="shadow-drop-xl">

                            ${adjunto}
                          
                        </div>
                      </div>
                      <div class="col-md-8 col-xl-6">
                        <div class="inset-xl-right-20">
                          <h3>${data.DATA[i].noticia_titulo}</h3>
                          <h6>${data.DATA[i].fecha}</h6>
                          <hr class="divider hr-xl-left-0 bg-blue-gray">
                          ${data.DATA[i].noticia_contenido}
                        </div>
                      </div>

                    </div>
                  </div>
                </section>
              `);
              a = 0;
          }
        }

      }
    });
  }
