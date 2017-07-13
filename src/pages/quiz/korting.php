<?php

include '../../header.php';
include '../../auth.php';
include '../../terug.php';

 ?>
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
      <div class="col-xs-8">
        <h5>Pizzaria Portofino</h5>
        <p>10% korting op 1 pizza</p>
      </div>
      </div>
    </div>
    <div id="kortinginfo" class="row">
      <div class="col-xs-12">
          <p>Kortingscode: <br>
            R2A5SF
          </p>
      </div>
      <div class="col-xs-8 col-xs-offset-2">
        <img src="/img/barcode.png" class="img-responsive" alt="">
      </div>
    </div>

  </div>
</div>
<button id="verderKorting" class="btn-big btn-100">Gebruik code</button>



 <?php
 include '../../scripts.php';
  ?>

<script type="text/javascript">
  $('#verderKorting').click(function(){
    lstore = JSON.parse(localStorage.getItem('account'));
    lstore.punten = 0;
    localStorage.setItem('account', JSON.stringify(lstore));
    window.location.href = '/'
  })
</script>


 <?php
 include '../../footer.php';
  ?>
