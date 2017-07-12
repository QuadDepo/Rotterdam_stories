<?php

include '../../header.php';
include '../../auth.php';
 ?>


<div id="vraag-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5>
          De Kruiskade na de oorlog een bruisend uitgaanscentrum, er waren medere bioscopen. Hoeveel waren dat?
        </h5>
      </div>
    </div>
  </div>
</div>
<div id="vraag">
  <h3></h3>
  <p></p>
</div>
<div id="vragen">
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 vraag fout"><h4>3</h4></div>
      <div class="col-xs-10 col-xs-offset-1 vraag fout"><h4>6</h4></div>
      <div class="col-xs-10 col-xs-offset-1 vraag fout"><h4>2</h4></div>
      <div class="col-xs-10 col-xs-offset-1 vraag goed"><h4>4</h4></div>
    </div>
  </div>
</div>
<div id="goed">
  <div class="icon"><i class="fa fa-check"></i></div>
</div>
<div id="fout">
  <div class="icon"><i class="fa fa-times"></i></div>
</div>






 <?php
 include '../../scripts.php';
  ?>

  <script type="text/javascript">
    $('.fout').click(function(){
      $('#fout').fadeIn();
      setTimeout(function(){
        $('body').fadeOut(function(){
          window.location.href = '/quiz';
        });
      }, 2000)
    })
    $('.goed').click(function(){
      $('#goed').fadeIn();
      pointAcc = JSON.parse(localStorage.getItem('account'));
      pointAcc.punten += 200;
      console.log(pointAcc.punten);
      localStorage.setItem('account', JSON.stringify(pointAcc));

      setTimeout(function(){
        $('body').fadeOut(function(){
          window.location.href = '/quiz';
        });
      }, 1500)
    })
  </script>


 <?php
 include '../../footer.php';
  ?>
