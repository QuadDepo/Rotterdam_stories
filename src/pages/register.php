<?php
$title = 'Registreer';
include '../header.php';

 ?>
 <script type="text/javascript">

   if (localStorage.getItem('token') !== null) {
     window.location.href = "/user";
   }
 </script>
 <div id="message" class="message alert alert-danger">
    <p></p>
 </div>


<div id="register">
  <?php include '../terug.php'; ?>
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
        <input type="text" class="form-control rd-input" readonly placeholder="Geboortedatum" id="datepicker">
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

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}



$("#registreer").click(function(){
  var naam = $("#naam"), email = $("#email"), gb = $("#datepicker"), wp = $("#wp"), wp2 = $("#wp2");
  var empty = false;

  var message;

  if (naam.val() === '') {
    naam.css('border-color', 'red');
    empty = true;
    message = 'vul in alle velden';
  }
  if (email.val() === '') {
    email.css('border-color', 'red');
    empty = true;
    message = 'vul in alle velden';
  }
  if (gb.val() === '') {
    gb.css('border-color', 'red');
    empty = true;
    message = 'vul in alle velden';
  }
  if (wp.val() === '') {
    wp.css('border-color', 'red');
    empty = true;
    message = 'vul in alle velden';
  }
  if (wp2.val() === '') {
    wp2.css('border-color', 'red');
    empty = true;
    message = 'vul in alle velden';
  }
  if (wp.val() !== wp2.val()) {
    wp.css('border-color', 'red');
    wp2.css('border-color', 'red');
    empty = true;
    message = 'wachtwoorden zijn niet het zelfde';
  }
  if (empty) {
    $('#message').animate({marginTop: "0px"}, 700).html(message);
    console.log(empty);
    setTimeout(function(){
      $('#message').animate({marginTop: "-100px"}, 700)
    }, 2000);
    empty = false;
  }else {
    if (validateEmail(email.val())) {
      console.log('succesfull');
      var account = {
        naam: naam.val(),
        gb: gb.val(),
        email: email.val(),
        wachtwoord: wp.val(),
        punten: 0
      };
      localStorage.setItem('account', JSON.stringify(account))
      localStorage.setItem('PF', '/img/pf-img.jpg')
      console.log(localStorage.getItem('account'));
      window.location.href = "/login.html";
    }
  }


});
$('input').focus(function(){
  // console.log(this);
  // console.log($(this).css('border-color'));
  if ($(this).css('border-color') === 'rgb(255, 0, 0)') {
    $(this).css('border-color', '#188B43');
    console.log(this);
  }else {
    return;
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



		$(function(){
			$('#datepicker').datepicker({
				inline: true,
				nextText: '&rarr;',
				prevText: '&larr;',
				showOtherMonths: true,
				dateFormat: 'dd-mm-yy',
				dayNamesMin: ['Z', 'M', 'D', 'W', 'D', 'V', 'S'],

			});
		});

</script>
<?php include '../footer.php'; ?>
