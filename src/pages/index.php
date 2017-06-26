<?php
$title = 'Home';
include '../header.php';
 ?>
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
  var account = {
    email: 'ryan@qdds.nl',
    wachtwoord: '123test123'
  };
  account = JSON.stringify(account);
  localStorage.setItem('account', account);
  lstore = JSON.parse(localStorage.getItem('account'));
  console.log('login btn click');
  console.log(lstore.email);
  if ($('#email').val() === '' || $('#wachtwoord').val() === '') {
    console.log('something is empty');
  }else{
  }
});
</script>


<?php
  include '../footer.php';
?>
