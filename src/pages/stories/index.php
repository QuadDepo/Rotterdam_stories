<!-- bannerImage = document.getElementById('bannerImg');
imgData = getBase64Image(bannerImage);
localStorage.setItem("imgData", imgData); -->

<?php
$title = 'stories';
include '../../header.php';
include '../../auth.php';


  include '../../scripts.php';


 ?>
 <div class="swipe">
   <div class="left">

   </div>
   <div class="right">

   </div>
 </div>

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
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
    <div id="stories">


    </div>



        <script type="text/javascript">

                var lstore = JSON.parse(localStorage.getItem('stories'));
                var ani = true;

                for (var i = 0; i < lstore.length; i++) {
                  if (lstore[i].img === '#') {
                  console.log(lstore.splice([i], 1));
                  }

                }
                $('#stories').css({
                  width: lstore.length + '00%'
                });

                console.log(lstore.length + '00%');
                var imgWidth = 100 / lstore.length;
                console.log(imgWidth);

                // Set width of stories


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


                if (localStorage.getItem('storyInts')) {
                  $('#instructies').css('display', 'none');


                }else{
                  $('.swipe').css('display', 'none');
                  $('#stories').css('display', 'none');
                }

                $('i').click(function(){
                  var instructiesMargin = $('#instructies').css('margin-left');
                  bodywidth = pos_to_neg($('body').width());
                  var maxLength = 3 * $('body').width();
                  var instructiesMargin = (parseInt(instructiesMargin) + bodywidth);

                  console.log(instructiesMargin + maxLength);
                  if (instructiesMargin + maxLength === 0) {
                    $('#instructies').fadeOut();
                    $('#stories').fadeIn();
                    $('.swipe').css('display', 'block');
                    localStorage.setItem('storyInts', true);
                  }else{
                    $('#instructies').animate({
                      marginLeft: instructiesMargin
                    })
                  }

                });
                $(".left, .right").swipe( {
                  swipeUp:function(event, direction, distance, duration) {
                      window.location.href = "/";
                  },
                  threshold:100,
                });
                $('.right').click(function(){

                  var fotos = lstore;
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
                    console.log(marginL + maxLength );
                    marginL = (parseInt(marginL) + bodywidth);
                    console.log(marginL);
                    console.log(ani);
                    if (ani) {
                      ani = false
                      $('#stories').animate({
                        marginLeft: marginL
                      }, function(){
                        ani = true;
                      })
                    }else{

                    }

                  }
                });
                $('.left').click(function(){
                  var fotos = JSON.parse(localStorage.getItem('stories'));
                  marginL = $('#stories').css('margin-left');
                  marginL = parseInt(marginL, 10);
                  console.log(parseInt(marginL, 10));
                  fotos = fotos.length;
                  // console.log(marginL + maxLength);
                  var maxRight = marginL + $('body').width();
                  if (marginL === 0) {
                  }else{
                    bodywidth = $('body').width();
                    // console.log(bodywidth);
                    marginL = (parseInt(marginL) + bodywidth);
                    // console.log(marginL);
                    if (ani) {
                      ani = false
                    $('#stories').animate({
                      marginLeft: marginL
                    }, function(){
                      ani = true
                    })
                  }
                  }
                });
        </script>

        <?php

 include '../../footer.php';

  ?>
