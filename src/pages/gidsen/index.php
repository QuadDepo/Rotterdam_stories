<?php

include '../../header.php';
include '../../auth.php';
 ?>


<div id="heading">
  <?php include '../../terug.php' ?>
  <div class="heading-bg"></div>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-xs-push-1">
        <img src="/img/foto-gids.jpg" class="img-responsive" alt="">
      </div>
      <div class="col-xs-7">
        <h5>Teun Diermen</h5>
        <span class="online"></span>
      </div>
    </div>
  </div>
</div>

<div id="gids-body">
  <div class="container">
    <div class="row menu">
      <div class="col-xs-6 info-gids"><i class="fa fa-info"></i></div>
      <div class="col-xs-6 comments-gids"><i class="fa fa-comment-o"></i></div>
    </div>
  </div>
  <div class="info">
    <div class="info-inner">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h5 class="green">Over mij</h5>
            <p>Mijn is Teun Dierman. Ik woon al mijn hele leven in Rotterdam. Ik zelf vind Rotterdam een speciale stad en zou u graag meer laten zien waar ik dat vind.</p>
            <img src="/img/foto-gids2.jpg" class="img-responsive" alt="">
            <h5 class="green">Mijn Tour</h5>
            <p>Zelf weet ik veel over de geschiedenis, voetbal en culturen van/in Rotterdam. Zelf heb ik al een route uitgezet, maar wees vrij om dit aan te vullen of te veranderen.</p>
            <img src="/img/winkels.jpg" class="img-responsive" alt="">
            <p>In mijn tour lopen wij ook langs alle leuke winkels van Rotterdam waar u gerust mag shoppen en wat kan eten</p>
          </div>
        </div>
      </div>
    </div>
    <div class="info-inner">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 comment">
            <h5>Iemand</h5><span><i class="fa fa-thumbs-up"></i></span>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<button id="bestelGids" class="btn-100 btn-big">Bestel een gids</button>


 <?php
 include '../../scripts.php';
  ?>

<script type="text/javascript">

    $('.comments-gids').click(function(){
      console.log($('.info').css('margin-left'));
      if($('.info').css('margin-left') == '0px'){
        $('.info').animate({
          marginLeft: "-" + $('.info').width() / 2
        })
      }

    })
    $('.info-gids').click(function(){
      console.log($('.info').css('margin-left'));
      if($('.info').css('margin-left') == '-375px'){
        $('.info').animate({
          marginLeft: 0
        })
      }

    })
    $('#bestelGids').click(function(){
        window.location.href = "betalen.html";
    });
</script>


 <?php
 include '../../footer.php';
  ?>
