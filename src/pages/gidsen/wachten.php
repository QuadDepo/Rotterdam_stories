<?php

include '../../header.php';
include '../../auth.php';
 ?>


<div id="wachten_header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h3>
          De gids <br>
          is onderweg
        </h3>
        <p>geschattetijd is +- 9 minuten</p>
      </div>
    </div>
  </div>
</div>
<div id="map-outer">
  <div class="map">
    <img src="/img/map.png" style="width: 100%" alt="">
  </div>
  <div class="container">
    <div class="row" id="info-wachten">
      <div class="col-xs-12">
      <div class="col-xs-4">
        <img src="/img/foto-gids.jpg" class="img-circle img-responsive" alt="">
      </div>
      <div class="col-xs-7">
        <h5>Teun Diermen</h5>
        <p><i class="fa fa-phone"></i>+31 6 83 56 41 58</p>
      </div>
      </div>
    </div>
  </div>
</div>
<a href="/quiz" id="start" class="btn-big btn-100">Start de tour</a>



 <?php
 include '../../scripts.php';
  ?>




 <?php
 include '../../footer.php';
  ?>
