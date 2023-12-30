<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript">
    function goback() {
      window.location.href = "studentdashboard.php";
    }
  </script>
  <link rel="stylesheet" href="../css/applyleave.css">
  <?php session_start(); ?>
  <?php
    $regno = $_SESSION['regno'];
    require_once('../dbConnect.php');
    $sql = "SELECT name, block, roomno FROM users WHERE regno='$regno';";
    $query1 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query1);
    $name = $row['name'];
    $block = $row['block'];
    $roomno = $row['roomno'];
    $errmsg = "";
    $sucmsg = "";
  ?>
</head>
<body>
  <div class="container">
    <div class="title">Complaint Form</div>
    <div class="content">
      <form action="studentcompliants.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" pattern="[a-zA-Z ]*" value="<?php echo $name; ?>" required disabled>
          </div>
          <div class="input-box">
            <span class="details">Reg No</span>
            <input type="text" placeholder="Enter your regno" pattern="[0-9]{4}" value="<?php echo $regno; ?>" disabled required>
          </div>
          <div class="input-box">
            <span class="details">Block Name</span>
            <input type="text" placeholder="Enter your block name" value="<?php echo $block; ?>" disabled required>
          </div>
          <div class="input-box">
            <span class="details">Room no</span>
            <input type="text" placeholder="Enter your room" value="<?php echo $roomno; ?>" disabled required>
          </div>
          <div class="input-box">
            <span class="details">Reason</span>
            <textarea name="reason" id="reason" placeholder="Reason" required></textarea>
          </div>
        </div>
        <div class="button">
          <input type="button" value="Go Back" onclick="goback()">
          <input type="submit" name="submit" style="margin-left: 85px;">
        </div>
      </form>
      <span style="color: red;"><?php echo $errmsg; ?></span>
      <span style="color: green;"><?php echo $sucmsg; ?></span>
    </div>
  </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['reason'])) {
$reason = $_POST['reason'];
$sql = "SELECT * FROM complaints WHERE regno='$regno' AND status='Pending'";
if ($result=mysqli_query($conn,$sql)) {
    $count=mysqli_num_rows($result);

}
  if($count>=1){
  $errmsg="*You already had a one complain";
  }
  else{

   require_once('../dbConnect.php');
 $sql="INSERT INTO `complaints` (`name`,`regno`,`block`,`roomno`,`reason`,`status`)VALUES ('$name','$regno','$block','$roomno','$reason','Pending')";
 $query=mysqli_query($conn,$sql);
 if($query){
   $sucmsg= '*Entry successful';
 }
 else{
   $errmsg= "*Error occoured";
 }
}
}
 }
 




?>

