<?php
$title = 'Home';
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

<div id="login">
  <div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <div class="logo">
        <img src="http://23100.tk/container2/files/Projects/Project%20Rotterdam/logo.svg" alt="">
      </div>
    </div>
    <div class="col-xs-10 col-xs-offset-1">
      <div class="form-group">
        <input type="text" placeholder="Email" class="form-control rd-input" id="email">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Wachtwoord" class="form-control rd-input" id="wachtwoord">
      </div>
      <p>Wachtwoord vergeten? <a href="#">Klik hier</a></p>
    </div>
    <div class="bottom">
      <p class="text-center">Geen account? <a href="register.php">registeer hier</a></p>
    <button id="login-btn" class="btn-big btn-green">Login</button>
    </div>
  </div>
</div>
</div>
<?php
  include '../scripts.php';
 ?>

<script type="text/javascript">
$('#login-btn').click(function(){
  lstore = JSON.parse(localStorage.getItem('account'));
  // console.log('login btn click');
  // console.log(lstore.email);
  if ($('#email').val() === '' || $('#wachtwoord').val() === '') {
    var empty = true;
    var message = 'vul in alle velden';
    if ($('#email').val() === '') {
      $('#email').css('border-color', 'red');
    }if ($('#wachtwoord').val() === '') {
      $('#wachtwoord').css('border-color', 'red');
    }if (empty) {
      $('#message').animate({marginTop: "0px"}, 700).html(message);
      console.log(empty);
      setTimeout(function(){
        $('#message').animate({marginTop: "-100px"}, 700)
      }, 2000);
      empty = false;
    }
  }else{
    if ($('#email').val() == lstore.email && $('#wachtwoord').val() === lstore.wachtwoord) {
      var token = guid();

      localStorage.setItem('token', token);
      window.location.href = "/user";
    }else {
      $('#message').animate({marginTop: "0px"}, 700).html('account niet gevonden');
      console.log(empty);
      setTimeout(function(){
        $('#message').animate({marginTop: "-100px"}, 700)
      }, 2000);
    }
  }
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
});
$(".message").swipe( {
  swipeUp:function(event, direction, distance, duration) {
    $('.message').animate({marginTop: "-100px"}, 700);
  },
  click:function(event, target) {
  },
  threshold:20,
});
function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}
</script>


<?php
  include '../footer.php';
?>
