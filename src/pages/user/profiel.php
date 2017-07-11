<?php
$title = 'Profiel';
$active = 'user';
include '../../header.php';
include '../../auth.php';
include '../../nav.php'; ?>

<div id="message" class="message alert alert-danger">
   <p></p>
</div>
<input style="position: absolute"  onchange="changePF(this);" class="hidden-input-img" type="file" accept="video/*capture=camcorder"></input>
    <div id="content">



      <div id="profiel">
        <div class="heading">
        <div class="container">
        <div class="col-xs-4">
          <img id="pf-img" class="img-responsive" alt="">
        </div>
        <div class="col-xs-8">
          <div class="info-heading">
            <h5 class="naam"></h5>
            <p class="punten"></p>
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
            <div id="newFoto" class="newFoto">
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
            <button id="logout" class="btn-big btn-green">Uitloggen</button>
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

        function validateEmail(email) {
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }


        $('#newFoto').click(function() {
            $('.hidden-input-img').click();
            console.log('newfoto is about to be taken');
        });
        $('.hidden-input-img').change(function() {
            // $('body, html').css('overflow', 'hidden');
            // $('#content, #top_menu, #bottom_nav').fadeOut(300);
            // $('#foto-previeuw').fadeIn(300);
            // console.log();
            console.log($('#pf-img').attr('src'));

        });

        function changePF(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#pf-img').attr('src', e.target.result)
                  localStorage.setItem('PF', e.target.result)
                    // $('#foto-previeuw img')
                        // .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }





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
            $('.punten').html(user.punten + ' Punten');
            $('#pf-img').attr("src", localStorage.getItem('PF'))
            gb.val(user.gb);
            email.val(user.email);
            var error = false;
            var empty = false;
            var message = ' ';
            // click on save button
            $('#opslaan').click(function(){
              var user = JSON.parse(localStorage.getItem('account'));
              if (naam.val() == '' || email.val() == '') {
                error = true;
                empty = true;
                if (naam.val() == '') {
                  message += 'Naam niet ingevult </br>';
                }else if (email.val() == '') {
                  message += 'Email niet ingevult </br>';
                }
              }else{

                if (naam.val() !== user.naam) {
                  message += 'Naam veranderd </br>';
                  user.naam = naam.val();
                  empty = true;
                }if (email.val() !== user.email) {
                  if (validateEmail(email.val())) {
                    user.email = email.val();
                    empty = true;
                    message += 'Email veranderd </br>';
                  }else{
                    empty = true;
                    error = true;
                    message += 'Email niet geldig </br>';
                  }

                }
            }
            if ($('#oud_ww').val() != '') {
              empty = true;
                if ($('#oud_ww').val() == user.wachtwoord) {
                  if ($('#nieuw_ww').val() !== '' && $('#nieuw_ww2').val() !== '' ) {
                    if ($('#nieuw_ww').val() == $('#nieuw_ww2').val()) {
                      user.wachtwoord = $('#nieuw_ww').val();
                      console.log(user.wachtwoord);
                      $('#nieuw_ww2').val('');
                      $('#nieuw_ww').val('');
                      $('#oud_ww').val('');
                      // console.log('nieuw wactyhwoord is ' + $('#nieuw_ww').val() );
                      // error = true;
                      message += 'Wachtwoord veranderd </br>';
                    }else{
                      // console.log('ww niet het zelfde');
                      error = true;
                      message += 'Wachtwoord niet het zelfde </br>';
                    }
                  }else{
                    error = true;
                    // console.log('niks ingevult');
                    message += 'Nieuw wachtwoord niet ingevult </br>';
                  }
                }else{
                    error = true;
                  // console.log('ww niet het zelfde');
                  message += 'Wachtwoord niet het zelfde </br>';
                }
              }else {
                // console.log('no new password');
                // message += 'Wachtwoord niet het zelfde';
              }
              console.log(error);
              console.log(message);
              if (empty) {
                if (error) {
                  if (!$('#message').hasClass('alert-danger')) {
                    $('#message').removeClass('alert-success')
                    $('#message').addClass('alert-danger')

                  }
                }else{
                  if (!$('#message').hasClass('alert-success')) {
                    $('#message').removeClass('alert-danger')
                    $('#message').addClass('alert-success')
                  }
                }
                console.log('empty' + empty);
                $('#top_menu').fadeOut();
                $('#message').animate({marginTop: "0px"}, 700).html(message);
                // console.log(empty);
                setTimeout(function(){
                  $('#message').animate({marginTop: "-100px"}, 700)
                  $('#top_menu').fadeIn();
                }, 2000);

              }

              if (!error) {
                localStorage.setItem('account', JSON.stringify(user));
                localStorage.getItem('account');
              }

            });



            $('input').focus(function(){
              // console.log(this);
              // console.log($(this).css('border-color'));
              if ($(this).css('border-color') === 'rgb(255, 0, 0)') {
                $(this).css('border-color', '#188B43');
                console.log(this);
              }else {
                return;
              }
            });

            $(".message").swipe( {
              swipeUp:function(event, direction, distance, duration) {
                $('.message').animate({marginTop: "-100px"}, 700);
                  $('#top_menu').fadeIn();
              },
              click:function(event, target) {
              },
              threshold:20,
            });










            $('#logout').click(function() {
                localStorage.removeItem('token');
                localStorage.removeItem('storyInt');
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
