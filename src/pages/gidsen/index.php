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
            asdf
          </div>
        </div>
      </div>
    </div>
    <div class="info-inner">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            asfdasdfasdf
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
</script>


 <?php
 include '../../footer.php';
  ?>
