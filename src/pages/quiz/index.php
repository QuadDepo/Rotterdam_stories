<?php

include '../../header.php';
include '../../auth.php';
 ?>

 <script type="text/javascript">
    lstore = JSON.parse(localStorage.getItem('account'));
   if (lstore.punten > 300) {
    //  lstore.punten = 0;
     localStorage.setItem('account', JSON.stringify(lstore))
     window.location.href = "recensie.html";
   }
 </script>
<input onchange="readURL(this);" class="hidden-input story" type="file" accept="video/*capture=camcorder"></input>
<input onchange="window.location.href = 'vragen.html'" class="hidden-input qr" type="file" accept="video/*capture=camcorder"></input>
 <div id="foto-previeuw">
     <img src="#" alt="">
     <div id="foto-knoppen">
         <div class="container-fluid">
             <div class="col-xs-6 no"><i class="fa fa-times"></i></div>
             <div class="col-xs-6 yes"><i class="fa fa-check"></i></div>

         </div>
     </div>
 </div>


<div id="wachten_header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center">
          Totale punten
        </h5>
        <p  class="text-center">
          <span class="punten"></span>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container" id="opties">
  <div class="row">
    <div class="opties">
    <div class="optie" id="cam">
      <i class="fa fa-camera"></i>
    </div>
    <div class="optie" id="qrcode">
      <i class="fa fa-qrcode"></i>
    </div>
    </div>

    <button id="bekijkStories" style="width: 80%;margin: 0 auto;" class="btn-100 btn-big">Bekijk stories</button>
    <button id="end">Stop de tour</button>
  </div>
</div>





 <?php
 include '../../scripts.php';
  ?>

<script type="text/javascript">

  // qr scanner
  $('#qrcode').click(function(){

      $('.qr').click();






  });

  // camara

  $('#cam').click(function(){
      $('.story').click();
  });



  $('.story').change(function() {
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


lstore = JSON.parse(localStorage.getItem('account'));
  $('.punten').html(lstore.punten + ' punten');

  // Stories
  $('#bekijkStories').click(function(){
window.location.href = "/stories";
  })

  // stop tour
  $('#end').click(function(){
    window.location.href = 'recensie.html';
  })


</script>


 <?php
 include '../../footer.php';
  ?>
