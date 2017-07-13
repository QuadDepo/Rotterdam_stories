<?php

include '../../header.php';
include '../../auth.php';
 ?>

<div id="wachten_header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center">
De tour is afgelopen
        </h5>
      </div>
    </div>
  </div>
</div>


  <div class="container text-center" id="punten-body">
    <div class="row first">
      <div class="col-xs-12">
        <h5>Totalen punten:</h5>
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
          <img src="/img/pizza.jpg" class="img-responsive img-circle" alt="">
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
          <img src="/img/ijs.jpg" class="img-responsive img-circle" alt="">
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
          <img src="/img/smullers.jpg" class="img-responsive img-circle" alt="">
        </div>
        <div class="col-xs-9 text-left">
          <h5>Smullers Rotterdam2</h5>
          <p>Gratis drinken bij voordeel menu</p>
        </div>
      </div>
    </a>
    </div>
  </div>



  <button id="verder" class="btn-100 btn-big">Verder</button>


 <?php
 include '../../scripts.php';
  ?>

<script type="text/javascript">
  lstore = JSON.parse(localStorage.getItem('account'));
  $('.punten span').html(lstore.punten);
  $('#verder').click(function(){
    window.location.href = '/';
  })
</script>

 <?php
 include '../../footer.php';
  ?>
