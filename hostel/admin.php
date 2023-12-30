<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title></title>
  <link rel="stylesheet" href="css\mhreg.css">

  </head>
  <body>
    <script type="text/javascript">
    function admin(){
      window.location.href ="admin/adminlogin.php";
    }
    function user(){
      window.location.href ="signin.php";
    }
    </script>


<?php       session_start(); ?>

<?php include 'header1.php';?>
<form class="" action="mhregistration.php" method="post">
 <section class="cards">
<article class="card card--2" style="margin-right:50px;margin-left:100px;padding-right:100px;">

  <div class="card__img"></div>
  <a href="#" class="card_link">
     <div class="card__img--hover"></div>
   </a>
  <div class="card__info">
    <span class="card__category"></span>
    <h3 class="card__title"></h3>
<button type="button" name="button" class="NavBtnLink"  onclick="admin()" style="margin-left:80px;">admin</button>
  </div>
</article>

<article class="card card--3" style="margin-right:100px;margin-left:50px;padding-right:100px;">

  <div class="card__img"></div>
  <a href="#" class="card_link">
     <div class="card__img--hover"></div>
   </a>
  <div class="card__info">
    <span class="card__category"></span>
    <h3 class="card__title"></h3>
 <button type="button" name="button" class="NavBtnLink"  onclick="user()" style="margin-left:80px;">student</button>
  </div>
</article>
  </section>
</form>
 </body>
</html>
