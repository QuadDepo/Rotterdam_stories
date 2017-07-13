<?php
$title = 'Registreer';
include '../header.php';

 ?>
 <script type="text/javascript">

   if (localStorage.getItem('token') !== null) {
     window.location.href = "/user";
   }
 </script>
 <div id="message" class="message alert-danger">
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
        <input type="email" placeholder="Email" class="form-control rd-input" id="email">
      </div>
    </div>
    <div class="bottom">
    <button id="opvragen" class="btn-big btn-green">Opvragen</button>
    </div>


  </div>
</div>
</div>
<?php include '../scripts.php' ?>
<script type="text/javascript">
  var message = $('#message');
  $('#opvragen').click(function() {
    if ($('#email').val() !== '')  {
      if (message.hasClass('alert-danger')) {
        message.removeClass('alert-danger');
        message.addClass('alert-success');
      }
      $('#message').animate({marginTop: "0px"}, 700).html('Wachtwoord verstuurd');
      setTimeout(function(){
        $('#message').animate({marginTop: "-100px"}, 700)
      }, 2000);
    }else{
      if (message.hasClass('alert-success')) {
        message.removeClass('alert-success');
        message.addClass('alert-danger');
      }
      $('#message').animate({marginTop: "0px"}, 700).html('Geen email ingevult');
      setTimeout(function(){
        $('#message').animate({marginTop: "-100px"}, 700)
      }, 2000);
    }

  })
</script>

<?php include '../footer.php'; ?>
>
