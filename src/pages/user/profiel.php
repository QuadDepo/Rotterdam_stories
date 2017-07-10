<?php
$title = 'Profiel';
$active = 'user';
include '../../header.php';
include '../../auth.php';
include '../../nav.php'; ?>
    <div id="content">



      <div id="profiel">
        <div class="heading">
        <div class="container">
        <div class="col-xs-4">
          <img src="/img/pf-img.jpg" class="img-responsive" alt="">
        </div>
        <div class="col-xs-8">
          <div class="info-heading">
            <h5 class="naam"></h5>
            <p>Toerist</p>
            <p class="punten">2000 punten</p>
          </div>
        </div>
        </div>
        </div>
        <div class="container">
          <div class="col-xs-12">
            <div class="info">
              <h5>Verander gegevens</h5>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <input type="text" placeholder="Naam" class="form-control rd-input" id="user_naam">
            </div>
            <div class="form-group">
              <input type="text" disabled placeholder="Geboorte datum" class="form-control rd-input" id="user_gb">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control rd-input" id="user_email">
            </div>
          </div>
          <div class="col-xs-12">
            <div class="newFoto">
              <p>Profiel foto</p>
              <i class="fa fa-camera"></i>
            </div>
          </div>
          <div class="col-xs-12 newWW">
            <h5>Verander wachtwoord</h5>
            <div class="form-group">
              <input type="text" placeholder="Oud wachtwoord" class="form-control rd-input" id="oud_ww">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Nieuw Wachtwoord" class="form-control rd-input" id="nieuw_ww">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Nieuw wachtwoord" class="form-control rd-input" id="nieuw_ww2">
            </div>
          </div>
          <div class="col-xs-12 buttons">
            <button id="opslaan" class="btn-big btn-green">Opslaan</button>
            <button id="gids" class="btn-big btn-green">Gids worden</button>
            <button id="kortingen" class="btn-big btn-green">Kortingen</button>
          </div>
        </div>

      </div>



















    </div>



    <?php

  include '../../scripts.php';


 ?>




// TODO: Opslaan button js
// TODO: gidworden button js
// TODO: Kortingen button js




        <script type="text/javascript">
            var firstname;
            var user = JSON.parse(localStorage.getItem('account'));
              if (user.naam.trim().split(" ").length < 2) {
                firstname = user.naam;
              }else{
                firstname = user.naam.split(" ").slice(0, -1).join(" ");
              }
              console.log(firstname);
            console.log(user);

            var naam = $('#user_naam'), gb = $('#user_gb'), email = $('#user_email');
            console.log(user.naam);
            naam.val(user.naam);

            $('.naam').html(firstname);
            gb.val(user.gb);
            email.val(user.email);
            var error = false;
            var message;
            $('#opslaan').click(function(){
              if (naam.val() == '' || email.val() == '') {
                error = true;
                if (naam.val() == '') {
                  message += 'Naam niet ingevult';
                }else if (email.val() == '') {
                  message += 'Email niet ingevult';
                }
                if ($('#oud_ww').val() != '') {
                  if ($('#oud_ww').val() == user.wachtwoord) {
                    if ($('#nieuw_ww').val() == $('#nieuw_ww2').val()) {
                      user.wachtwoord = $('#nieuw_ww').val();
                      console.log(user.wachtwoord);
                      console.log('nieuw wactyhwoord is ' + $('#nieuw_ww').val() );
                    }else{
                      console.log('ww niet het zelfde');
                    }
                  }else{
                    console.log('ww niet het zelfde');
                  }
                }
              }else{
                if (naam !== user.naam) {
                  user.naam = naam;
                }else if (email !== user.email) {
                  user.email = email;
                }else if ($('#oud_ww').val() !== '') {
                  if ($('#oud_ww').val() === user.wachtwoord) {
                    if ($('#nieuw_ww').val() === $('#nieuw_ww2').val()) {
                      user.wachtwoord = $('#nieuw_ww').val();
                      console.log(user.wachtwoord);
                      console.log('nieuw wactyhwoord is ' + $('#nieuw_ww').val() );
                    }
                  }
                }
            }
            })
















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
