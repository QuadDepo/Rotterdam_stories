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
      <div class="form-group" style="margin-top: 10px">
              <div class='input-group date' id='datetimepicker1'>
                  <input placeholder="Datum" type='text' class="form-control rd-input" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
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
  var naam = $("#naam"), email = $("#email"), gb = $("#datetimepicker1"), wp = $("#wp"), wp2 = $("#wp2");
  var empty = false;
  console.log(gb.data('date'));
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
  if (gb.data('date') === '') {
    console.log('intput leeg');
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
        gb: gb.data('date'),
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
$(function () {
var bindDatePicker = function() {
$(".date").datetimepicker({
format:'YYYY-MM-DD',
icons: {
time: "fa fa-clock-o",
date: "fa fa-calendar",
up: "fa fa-arrow-up",
down: "fa fa-arrow-down"
}
}).find('input:first').on("blur",function () {
// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
// update the format if it's yyyy-mm-dd
var date = parseDate($(this).val());

if (! isValidDate(date)) {
//create date based on momentjs (we have that)
date = moment().format('YYYY-MM-DD');
}

$(this).val(date);
});
}

var isValidDate = function(value, format) {
format = format || false;
// lets parse the date to the best of our knowledge
if (format) {
value = parseDate(value);
}

var timestamp = Date.parse(value);

return isNaN(timestamp) == false;
}

var parseDate = function(value) {
var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
if (m)
value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

return value;
}

bindDatePicker();
});
</script>
<?php include '../footer.php'; ?>
>
