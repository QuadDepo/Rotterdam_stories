<?php
$title = 'Home';
$message_sort= 'danger';
$message= 'Oeps Wrong password';
include '../header.php';
include '../message.php';
 ?>
<div id="register">
  <div class="terug green"><a href="/"><i class="fa fa-arrow-left"></i> Terug</a></div>
  <div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <div class="logo">
        <img src="http://23100.tk/container2/files/Projects/Project%20Rotterdam/logo.svg" alt="">
      </div>
    </div>
    <div id="form" class="col-xs-10 col-xs-offset-1">
      <div class="form-group">
        <input type="text" placeholder="Naam" class="form-control rd-input" id="naam">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Email" class="form-control rd-input" id="email">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Geboortedatum" class="form-control rd-input" id="gb">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Wachtwoord" class="form-control rd-input" id="wp">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Wachtwoord overnieuw" class="form-control rd-input" id="wp2">
      </div>

    </div>
    <div class="bottom">
    <button id="registreer" class="btn-big btn-green">Registreer</button>
    </div>


  </div>
</div>
</div>
<?php include '../scripts.php' ?>
<script>
$("#registreer").click(function(){
  var naam = $("#naam"), email = $("#email"), gb = $("#gb"), wp = $("#wp"), wp2 = $("#wp2");


  if (naam.value.length || email.value.length || gb.value.length || wp.value.length || wp2.value.length) {


  }


});


$(".message").swipe( {
  swipeUp:function(event, direction, distance, duration) {
    $('.message').animate({marginTop: "-100px"}, 700);
  },
  click:function(event, target) {
  },
  threshold:20,
});
</script>
<?php include '../footer.php'; ?>
