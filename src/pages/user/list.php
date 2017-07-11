     <?php
$title = 'Home';
$active = 'list';
include '../../header.php';
include '../../auth.php';
include '../../nav.php'; ?>
    <div id="content">
        <div id="search">
            <div class="container">
                <div class="col-xs-10">
                    <div class="form-group">
                        <input id="searchInput" type="text" class="form-control" placeholder="Zoek uw gids">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <div class="col-xs-2 filter">
                    <i class="fa fa-sliders"></i>
                </div>
            </div>
            <div class="container">
                <div class="row" id="lijstGidsen">

                </div>
            </div>
        </div>
    </div>

    <div id="filterscreen">
      <div id="heading">
        <div class="container">
          <div class="row">
            <div id="close" class="text-right col-xs-12">
                <i class="fa fa-times"></i>
            </div>
            <div class="col-xs-12 marginTopBig">
              <h3>Weten wat je wilt?</h3>
              <p>Filter de gidsen op jou voorkeur</p>
            </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 marginTopSmall">
              <h5>Intresseses</h5>
            </div>
            <div class="col-xs-4">
              <div class="checkbox">
                      <input id="Architectuur" type="checkbox" checked>
                      <label for="Architectuur">
                          Architectuur
                      </label>
                  </div>
            </div>
            <div class="col-xs-4">
              <div class="checkbox">
                      <input id="Geschiedenis" type="checkbox" checked>
                      <label for="Geschiedenis">
                          Geschiedenis
                      </label>
                  </div>
            </div>
            <div class="col-xs-4">
              <div class="checkbox">
                      <input id="Sport" type="checkbox" checked>
                      <label for="Sport">
                          Sport
                      </label>
                  </div>
            </div>
            <div class="col-xs-4">
              <div class="checkbox">
                      <input id="Haven" type="checkbox" checked>
                      <label for="Haven">
                          Haven/Boten
                      </label>
                  </div>
            </div>
            <div class="col-xs-4">
              <div class="checkbox">
                      <input id="Cultuur" type="checkbox" checked>
                      <label for="Cultuur">
                          Cultuur
                      </label>
                  </div>
            </div>
          </div>
        </div>
        <button id="filterBtn" type="button" name="button" class="btn-green btn-big">Filter</button>
    </div>



    <?php

  include '../../scripts.php';


 ?>

        <script type="text/javascript">


            $('.filter').click(function(){
              $('#top_menu').fadeOut();
              $('#filterscreen').fadeIn();
            })
            $('#close').click(function(){
              $('#top_menu').fadeIn();
              $('#filterscreen').fadeOut();
            })


              var gidsenArray = [
                {
                  name: 'Teun Diermen',
                  intr: 'Cultuur, Sport',
                  show: true,
                  online: true
                },
                {
                  name: 'Moad Mijnals',
                  intr: 'Haven/Boten, Sport',
                  show: true,
                  online: true
                },
                {
                  name: 'Piter Werkman',
                  intr: 'Geschiedenis, Architectuur',
                  show: true,
                  online: true
                },
                {
                  name: 'Junaid Koemans',
                  intr: 'Architectuur, Sport',
                  show: true,
                  online: true
                },
                {
                  name: 'Chantelle Kole',
                  intr: 'Sport, Haven/Boten',
                  show: true,
                  online: true
                },
                {
                  name: 'Herman de Kreek',
                  intr: 'Cultuur, Haven/Boten',
                  show: true,
                  online: true
                },
                {
                  name: 'Juliënne Gerritzen',
                  intr: 'Sport, Haven/Boten',
                  show: true,
                  online: true
                },
                {
                  name: 'Nikie Nelis',
                  intr: 'Sport, Haven/Boten',
                  show: true,
                  online: false
                },
                {
                  name: 'Lid de Giessen',
                  intr: 'Sport, Haven/Boten',
                  show: true,
                  online: false
                },
                {
                  name: 'Medy Leusden',
                  intr: 'Architectuur',
                  show: true,
                  online: true
                }
              ]
              function makeList(){
                $('#lijstGidsen').empty();
              for (var i = 0; i < gidsenArray.length; i++) {
                if (gidsenArray[i].show) {
                  $('#lijstGidsen').append(`

                    <div class="col-xs-12 gistList-info">
                    <a href="/gidsen">
                        <div class="col-xs-3">
                            <img src="/img/pf-img.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="col-xs-9">
                            <h5>${gidsenArray[i].name}</h5><span style="background-color: ${gidsenArray[i].online ? 'green' : 'red'}"></span>
                            <p class="intr">${gidsenArray[i].intr}</p>
                        </div>
                        </a>
                    </div>

                    `)
                }
              }
            }
            makeList();
            $('#searchInput').on('keyup',function(){
              var allCheckboxes=$('[type=checkbox]');
              $.each(allCheckboxes, function(index, value){
                var id = '#' + $(this).attr('id');
                $(id).prop('checked', true);
              })
              console.log($('#searchInput').val());
              for (var i = 0; i < gidsenArray.length; i++) {
                if (gidsenArray[i].name.indexOf($('#searchInput').val()) != -1) {
                  console.log(gidsenArray[i].name + ' ' + $('#searchInput').val());
                  gidsenArray[i].show = true;
                  makeList();
                }else{
                  gidsenArray[i].show = false;
                  makeList();
                }
              }
            })
            $('#filterBtn').click(function(){
              var allCheckboxes=$('[type=checkbox]');
              var checked = [];
              $.each(allCheckboxes, function(index, value){
                var id = '#' + $(this).attr('id');
                if ($(id).is(':checked')) {
                  console.log(id + '   checked');
                  checked.push(id.substring(1));
                }

              })

              console.log(checked);

              for (var i = 0; i < gidsenArray.length; i++) {
                var zichtbaar;
                    for (var j = 0; j < checked.length; j++) {
                      // console.log(gidsenArray[i].intr.indexOf(checked[i]) + ' ' + gidsenArray[i].name );
                      if (gidsenArray[i].intr.indexOf(checked[j]) >= 0) {
                          zichtbaar = true;
                      }
                      console.log(zichtbaar);
                  }
                    if (!zichtbaar) {
                      gidsenArray[i].show = false;
                      makeList();
                    }else{
                      gidsenArray[i].show = true;
                      console.log(gidsenArray);
                      makeList();
                    }
                    zichtbaar = false;
              }

              $('#top_menu').fadeIn();
              $('#filterscreen').fadeOut();

            });





            $('#logout').click(function() {
                localStorage.removeItem('token');
                window.location.href = "/";
            });
            $('#cam').click(function() {
                $('.hidden-input').click();
            });
            $('.hidden-input').change(function() {
                $('body, html').css('overflow', 'hidden');
                $('#content, #top_menu, #bottom_nav').fadeOut(300);
                $('#foto-previeuw').fadeIn(300);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#foto-previeuw img')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('.yes').click(function() {
                var bannerImage = $('#foto-previeuw img').attr('src');
                // console.log(bannerImage);
                var lstore = JSON.parse(localStorage.getItem('stories'));
                if (lstore === null) {
                  lstore = [];
                  var newFoto = {
                    img: bannerImage
                  }
                    lstore.push(newFoto);
                  localStorage.setItem("stories", JSON.stringify(lstore));
                  console.log(JSON.parse(localStorage.getItem('stories')));
                }else{
                  var newFoto = {
                    img: bannerImage
                  }
                    lstore.push(newFoto);
                  localStorage.setItem("stories", JSON.stringify(lstore));
                  console.log(JSON.parse(localStorage.getItem('stories')));
                }

                $('.hidden-input').val('');
                $('body, html').css('overflow', 'scroll');
                $('#content, #top_menu, #bottom_nav').fadeIn(300);
                $('#foto-previeuw').fadeOut(300);
                window.location.href = "/stories";
            })
            $('.no').click(function(){
                $('.hidden-input').val('');
                $('body, html').css('overflow', 'scroll');
                $('#content, #top_menu, #bottom_nav').fadeIn(300);
                $('#foto-previeuw').fadeOut(300);
            })
        </script>

        <?php

 include '../../footer.php';

  ?>
