<?php
$title = 'Home';
$active = 'home';
include '../../header.php';
include '../../auth.php';
include '../../nav.php'; ?>


    <div id="content">
        <div id="intro_home">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <h3>Weten waar <br/> iets leuks is?</h3>
                        <p>Bekijk stories en vind jou volgende sturen</p>
                        <button onclick="window.location.href = '/stories'" class="btn-100 btn-line"><h5>Bekijk stories</h5></button>

                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="display: inline-block" id="middle_home">
            <div class="row">
                <div class="col-xs-12">
                    <h5>Beschikbare Gidsen</h5>
                    <a>
                        <p>Alle gidsen</p>
                    </a>
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
                <div class="col-xs-4">
                    <img src="/img/login_bg.png" class="rounded" alt="">
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br> asfasdfs
        </div>
    </div>



    <?php

  include '../../scripts.php';


 ?>

        <script type="text/javascript">
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
