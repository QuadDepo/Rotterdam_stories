<!-- bannerImage = document.getElementById('bannerImg');
imgData = getBase64Image(bannerImage);
localStorage.setItem("imgData", imgData); -->

<?php
$title = 'stories';
include '../../header.php';
include '../../auth.php';


  include '../../scripts.php';


 ?>
    <div id="instructies">
      <div class="instrucie">
        <div class="inner">
          <h2>Live Events</h2>
          <p>Door heel rotterdam</p>

        </div>
        <i class="fa fa-arrow-right"></i>
      </div>
      <div class="instrucie">
        <div class="inner"><h2>Bekijk waar iets leuks is</h2>
        <p>Door heel rotterdam</p>

      </div>
      <i class="fa fa-arrow-right"></i>
      </div>
      <div class="instrucie">
        <div class="inner">3</div>
      </div>
    </div>
    <div id="stories">

    </div>



        <script type="text/javascript">
                var lstore = JSON.parse(localStorage.getItem('stories'));
                console.log(lstore.length + '00%');
                var imgWidth = 100 / lstore.length;
                imgWidth = parseInt(imgWidth);

                $('#stories').css({
                  width: lstore.length + '00%'
                });


                console.log(lstore);
                for (var i = 0; i < lstore.length; i++) {
                  console.log(lstore[i]);
                  $('#stories').append(`

                    <img src=${lstore[i].img} class="story" />

                    `)
                }

                $('.story').css({
                    width: imgWidth +'%'
                });

                function pos_to_neg(num)
                    {
                    return -Math.abs(num);
                    }


                $('i').click(function(){
                  var instructiesMargin = $('#instructies').css('margin-left');
                  bodywidth = pos_to_neg($('body').width());
                  var maxLength = 3 * $('body').width();
                  var instructiesMargin = (parseInt(instructiesMargin) + bodywidth);
                  if (instructiesMargin + maxLength === 0) {

                  }else{
                    $('#instructies').animate({
                      marginLeft: instructiesMargin
                    })
                  }

                });

                $('img').click(function(){
                    var fotos = JSON.parse(localStorage.getItem('stories'));
                    marginL = $('#stories').css('margin-left');
                    marginL = parseInt(marginL, 10);
                    fotos = fotos.length;
                    var maxLength = fotos * $('body').width() - $('body').width();
                    console.log(marginL + maxLength);
                    if (marginL + maxLength === 0) {
                      window.location.href = "/";
                      console.log('laaste foto');
                    }else{
                      bodywidth = pos_to_neg($('body').width());
                      console.log(bodywidth);
                      marginL = (parseInt(marginL) + bodywidth);
                      console.log(marginL);
                      $('#stories').animate({
                        marginLeft: marginL
                      })
                    }
                })
        </script>

        <?php

 include '../../footer.php';

  ?>
