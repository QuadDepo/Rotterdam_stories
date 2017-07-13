<?php

include '../../header.php';
include '../../auth.php';
include '../../terug.php';
 ?>

<style media="screen">
  .terug{
    color: white;
  }
</style>
<div id="wachten_header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center">
Jou kortingen
        </h5>
      </div>
    </div>
  </div>
</div>


  <div class="container text-center" id="punten-body">
    <div class="row first">
      <div class="col-xs-12">
        <h5>Totaal punten:</h5>
        <p class="punten"><span></span> Punten</p>
      </div>
    </div>
    <div class="row" id="lijst">
      <div class="col-xs-12 text-left">
        <div class="col-xs-12">
            <h5>kortingen</h5>
        </div>

      </div>
      <a href="korting.html">
      <div class="col-xs-12">
        <div class="col-xs-3">
          <img src="/img/pf1.jpg" class="img-responsive img-circle" alt="">
        </div>
        <div class="col-xs-9 text-left">
          <h5>Pizzaria Portofino</h5>
          <p>10% korting op 1 pizza</p>
        </div>
      </div>
    </a>
      <a href="korting.html">
      <div class="col-xs-12">
        <div class="col-xs-3">
          <img src="/img/pf1.jpg" class="img-responsive img-circle" alt="">
        </div>
        <div class="col-xs-9 text-left">
          <h5>Ijssalon Vivaldi</h5>
          <p>2de bolletje gratis</p>
        </div>
      </div>
    </a>
      <a href="korting.html">
      <div class="col-xs-12">
        <div class="col-xs-3">
          <img src="/img/pf1.jpg" class="img-responsive img-circle" alt="">
        </div>
        <div class="col-xs-9 text-left">
          <h5>Smullers Rotterdam2</h5>
          <p>Gratis drinken bij voordeel menu</p>
        </div>
      </div>
    </a>
    </div>
  </div>





 <?php
 include '../../scripts.php';
  ?>

  <script type="text/javascript">
    lstore = JSON.parse(localStorage.getItem('account'));
    $('.punten span').html(lstore.punten);
    if (lstore.punten === 0) {
      $('#lijst').html(`
        <div class="container">
        <div class="row">
        <div class="col-xs-12">
        <h5>U heeft geen punten om te kunnen gebruiken</h5>
        </div>
        </div>
        </div>

       `)
    }
  </script>

 <?php
 include '../../footer.php';
  ?>
