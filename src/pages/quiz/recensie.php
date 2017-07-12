<?php

include '../../header.php';
include '../../auth.php';
 ?>
 <div id="message" class="message alert alert-danger">
    <p></p>
 </div>
<div id="vraag-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center">
          Recensie toevoegen
        </h5>
      </div>
    </div>
  </div>
</div>

<div id="rec-body">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <textarea name="name" ></textarea>
      </div>
    </div>
    <div class="row text-center gf">
      <div class="col-xs-6">
        <i class="fa fa-thumbs-up"></i>
      </div>
      <div class="col-xs-6">
        <i class="fa fa-thumbs-down"></i>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <h4>Delen op socialmedia</h4>
        <div class="socials">
          <i class="fa fa-whatsapp"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-envelope-o"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom">


<a href="/" class="skip">
  Sla over
</a>
<button id="eindetour" class="btn-100 btn-big">Tour eindigen</button>
</div>






 <?php
 include '../../scripts.php';
  ?>

<!-- JS -->

<script type="text/javascript">

var error = false;
var message = "";
  $('#eindetour').click(function(){
    console.log('click');
    // console.log($('textarea').val());
    console.log($('.gf i').hasClass('active'));
    if ($('textarea').val() === '') {
      error = true;
      message = "Textarea niet ingevult";
      console.log('textarea is empty');
    }
    else if ($('.gf i').hasClass('active')) {

    }else{
      console.log('no class active');
      console.log('////////////////////////');
      console.log($('.gf i').hasClass('active'));
      console.log('////////////////////////');
      error = true;
      message = "Geen like of dislike gekozen";
    }
    console.log(error);
    if (error) {
      console.log($('.gf i').hasClass('active') === false);
      console.log('message down');
      $('#message').animate({marginTop: "0px"}, 700).html(message);
      setTimeout(function(){
        $('#message').animate({marginTop: "-100px"}, 700)
      }, 2000);
      error = false;
      message = '';
    }else{
      window.location.href = "/";

    }
  });


  $('.fa-thumbs-up').click(function(){
    if (!$('.fa-thumbs-up').hasClass('active')) {
          $('.fa-thumbs-up').addClass('active');
    }
    if (  $('.fa-thumbs-down').hasClass('active')) {
        $('.fa-thumbs-up').addClass('active');
        $('.fa-thumbs-down').removeClass('active');
    }
  });
  $('.fa-thumbs-down').click(function(){
    if (!$('.fa-thumbs-down').hasClass('active')) {
          $('.fa-thumbs-down').addClass('active');
    }
    if ($('.fa-thumbs-up').hasClass('active')) {
      $('.fa-thumbs-down').addClass('active');
        $('.fa-thumbs-up').removeClass('active');
    }
  });

  $(".message").swipe( {
    swipeUp:function(event, direction, distance, duration) {
      $('.message').animate({marginTop: "-100px"}, 700);
    },
    click:function(event, target) {
    },
    threshold:20,
  })


</script>


 <?php
 include '../../footer.php';
  ?>
