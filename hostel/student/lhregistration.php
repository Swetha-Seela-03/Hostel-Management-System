<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title></title>
  <link rel="stylesheet" href="..\css\mhreg.css">

  </head>
  <body>
<?php       session_start(); ?>

  <?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){

    $regno = $_SESSION['regno'];
    require_once('../dbConnect.php');

if(isset($_POST["ablock"])){
  $blockname="Ablock";
  $rowSQL = mysqli_query($conn, "SELECT MAX( roomno ) AS max FROM `users` WHERE block='$blockname' AND gender='female';" );
  $row = mysqli_fetch_array( $rowSQL );
  $largestNumber = $row['max'];
  if($largestNumber==0){
    $largestNumber=1;
  }
  $result=mysqli_query($conn,"SELECT count($largestNumber) as total from users where block='$blockname' AND gender='female';");
$data=mysqli_fetch_assoc($result);
$count= $data['total'];
if($count % 3 == 0){
  $roomno=$largestNumber+1;
}
else{
    $roomno=$largestNumber;
}
}
if(isset($_POST["bblock"])){
  $blockname="Bblock";
  $rowSQL = mysqli_query($conn, "SELECT MAX( roomno ) AS max FROM `users` WHERE block='$blockname' AND gender='female';" );
  $row = mysqli_fetch_array( $rowSQL );
  $largestNumber = $row['max'];
  if($largestNumber==0){
    $largestNumber=1;
  }
  $result=mysqli_query($conn,"SELECT count($largestNumber) as total from users where block='$blockname' AND gender='female';");
$data=mysqli_fetch_assoc($result);
$count= $data['total'];
if($count % 3 == 0){
  $roomno=$largestNumber+1;
}
else{
    $roomno=$largestNumber;
}
}



$sql="UPDATE `users` SET `block`='$blockname' where regno='$regno'";
$query=mysqli_query($conn,$sql);
$sql="UPDATE `users` SET `roomno`='$roomno' where regno='$regno'";
$query1=mysqli_query($conn,$sql);
if($query && $query1){
  echo 'Entry successful';
  header('Location: studentdashboard.php');
}
else{
  echo "error occoured";
}
}
   ?>

<form class="" action="lhregistration.php" method="post">

<h1 style="background-color:#158977; color:#E3E4FA;padding:20px;" align="center"><marquee>WOMEN HOSTEL BLOCKS</marquee></h1>
    <section class="cards">



<article class="card card--2" style="margin-left:150px;">

  <div class="card__img"></div>
  <a href="#" class="card_link">
     <div class="card__img--hover"></div>
   </a>
  <div class="card__info">
    <span class="card__category">Girls Hostel1</span>
    <h3 class="card__title">A block</h3>
        <input type="submit" name="ablock" id="ablock" class="card__by" value="submit">
  </div>
</article>

<article class="card card--3"  style="margin-left:50px;">

  <div class="card__img"></div>
  <a href="#" class="card_link">
     <div class="card__img--hover"></div>
   </a>
  <div class="card__info">
    <span class="card__category">Girls Hostel2</span>
    <h3 class="card__title">B block</h3>
      <input type="submit" name="bblock" id="bblock" class="card__by" value="submit">
  </div>
</article>


  </section>
</form>

  </body>
</html>

