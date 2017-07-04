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
                        <input type="text" class="form-control" placeholder="Zoek uw gids">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <div class="col-xs-2">
                    <i class="fa fa-sliders"></i>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-3">
                            <img src="" alt="">
                        </div>
                        <div class="col-xs-9">
                            <h5>John Doe</h5>
                        </div>
                    </div>
                </div>
            </div>
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

            function getBase64Image(img) {
                var canvas = document.createElement("canvas");
                canvas.width = img.width;
                canvas.height = img.height;

                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);

                var dataURL = canvas.toDataURL("image/png");

                return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
            }

            $('.yes').click(function() {
                bannerImage = $('#foto-previeuw img');
                imgData = getBase64Image(bannerImage);
                localStorage.setItem("imgData", imgData);
            })
        </script>

        <?php

 include '../../footer.php';

  ?>
