<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\css\studentdashboard.css">
    	<style>
	body {
   width: 100vw;
   background-color: black;
   margin: 0;
   font-family: helvetica;
}

.wrapper {
   width: 100vw;
   margin: 0 auto;
   height: 400px;
   background-color: black;
   display: flex;
   justify-content: center;
   align-items: center;
   position: relative;
   transition: all 0.3s ease;
}
.card {
   width: 100%;
   max-width: 300px;
   min-width: 200px;
   height: 250px;
   background-color: purple;
   margin: 10px;
   border-radius: 10px;
   box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.24);
   border: 2px solid rgba(7, 7, 7, 0.12);
   font-size: 16px;
   transition: all 0.3s ease;
   position: relative;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-direction: column;
   cursor: pointer;
   transition: all 0.3s ease;
}

</style>

    <script type="text/javascript">
      function leavestatus(){
        window.location.href ="leavestatus.php";
      }
      function applyleave(){
        window.location.href ="applyleave.php";
      }
      function roomdetails(){
        window.location.href ="studentroomdetails.php";

      }
      function searchroommates(){
        window.location.href ="roommatesearch.php";

      }
       function compliants(){
        window.location.href ="studentcompliants.php";

      }
       function complaintstatus(){
        window.location.href ="complaintstatus.php";

      }
    </script>
    
<?php       session_start(); ?>

<?php

  $regno = $_SESSION['regno']; 
  require('../dbConnect.php'); 
  $sql="SELECT  *FROM leaverequests WHERE regno='$regno';";
  $query=mysqli_query($conn,$sql);
?>
  </head>
  <body>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- about -->

<?php include 'header2.php';?>


<!-- end about -->
<div class="wrapper">

   <div class="content">
      <!-- card -->
      <div class="card" onclick="searchroommates()">

            <div class="icon"><i class="material-icons md-36">?</i></div>
            <p class="title">Find Roommates</p>
            <p class="text">Know your roommates.</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="roomdetails()">

            <div class="icon"><i class="material-icons md-36">@</i></div>
            <p class="title">My Room Details</p>
            <p class="text">Check your room details.</p>

      </div>
      <!-- end card -->


      <!-- card -->
      <div class="card"  onclick="applyleave()">

            <div class="icon"><i class="material-icons md-36">+</i></div>
            <p class="title">Apply Leave</p>
            <p class="text">Apply for leave.</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card"  onclick="compliants()">

            <div class="icon"><i class="material-icons md-36">!</i></div>
            <p class="title">any compliants </p>
            <p class="text">issues</p>

      </div>
      <!-- end card -->
      <div class="card"  onclick="leavestatus()">

            <div class="icon"><i class="material-icons md-36">?</i></div>
            <p class="title">Leave Status</p>
            <p class="text">Apply for leave.</p>

      </div>
      
        <div class="card"  onclick="complaintstatus()">

            <div class="icon"><i class="material-icons md-36">?</i></div>
            <p class="title">complaint Status</p>
            <p class="text">status of complaints</p>

      </div>
      

   </div>

</div>



  </body>
</html>
