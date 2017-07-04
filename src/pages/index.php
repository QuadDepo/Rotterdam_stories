<?php
$title = 'Home';
include '../header.php';
 ?>

<?php
  include '../scripts.php';
 ?>

<script type="text/javascript">
  $(window).load(function(){
    console.log(localStorage.getItem('token'));
    if (localStorage.getItem('token') !== null) {
      window.location.href = "/user";
    }else {
      window.location.href = "login.html";
    }
  })
</script>


<?php
  include '../footer.php';
?>
