<?php

include '../../header.php';
include '../../auth.php';
 ?>
 <div id="message" class="message alert alert-danger">
    <p></p>
 </div>

 <div id="heading">
   <?php include '../../terug.php' ?>
   <div class="heading-bg"></div>
   <div class="container">
     <div class="row">
       <div class="col-xs-4 col-xs-push-1">
         <img src="/img/foto-gids.jpg" class="img-responsive" alt="">
       </div>
       <div class="col-xs-7">
         <h5>Teun Diermen</h5>
         <span class="online"></span>
       </div>
     </div>
   </div>
 </div>

  <div id="body-betalen">
    <div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
          <h5 class="text-center">Tarief €7,- per uur</h5>
          <div class="betalen">

            <div class="form-group" style="margin-top: 10px">
                     <input onChange="dateChange()" type='text' placeholder="Datum en Tijd" class="form-control rd-input" id='date' />
                </div>
            <div class="form-group">
              <select name="" class="selectpicker" id="duur">
                <option value="">1 uur</option>
                <option value="">2 uur</option>
                <option value="">3 uur</option>
                <option value="">4 uur</option>
                <option value="">5 uur</option>
                <option value="">6 uur</option>
              </select>
            </div>
            <div class="form-group">
              <select class="selectpicker" id="betaalM">
                <option disabled selected>Betaalmethode</option>
                <option value="Paypal">Paypal</option>
                <option value="Ideal">Ideal</option>
                <option value="American Express">American Express</option>
                <option value="Bitcoin">Bitcoin</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<button id="betalen" class="btn-100 btn-big">Betalen</button>


 <?php
 include '../../scripts.php';
  ?>


  <script type="text/javascript">
              $(function () {
                  $('#date').datetimepicker({

                  });
              });

              $('#date').datetimepicker().on('dp.change',function(e){
                    console.log(e)
                })
              $('#betalen').click(function(){

              var date = $('#date').data('date');  console.log(date);
                var duur = $( "#duur option:selected" ).text();
                var betaalM = $( "#betaalM option:selected" ).text();
                var error  = false;
                var message = "";
                if (date === undefined) {
                  error = true
                  message = "Datum niet ingevult";
                }else if (betaalM  === "Betaalmethode") {
                  error = true
                  message = "Geen geldig betaalmethode";
                }else{
                  error = false;
                  // proceed
                }
                if (error) {
                  $('#message').animate({marginTop: "0px"}, 700).html(message);
                  setTimeout(function(){
                    $('#message').animate({marginTop: "-100px"}, 700)
                  }, 2000);
                  console.log(date);
                  console.log(duur);
                  console.log(betaalM);
                }else{
                  console.log(date);
                  console.log(duur);
                  console.log(betaalM);
                  window.location.href = 'wachten.html'
                }
                })

              $(".message").swipe( {
                swipeUp:function(event, direction, distance, duration) {
                  $('.message').animate({marginTop: "-100px"}, 700);
                },
                click:function(event, target) {
                },
                threshold:20,
              });
          </script>

 <?php
 include '../../footer.php';
  ?>
