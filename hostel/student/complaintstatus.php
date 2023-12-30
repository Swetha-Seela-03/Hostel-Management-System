<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
    <meta charset="utf-8">
    <title>leave status</title>

<?php       session_start(); ?>
<?php

  $regno = $_SESSION['regno']; 
  require('../dbConnect.php'); 
  $sql="SELECT  *FROM complaints WHERE regno='$regno';";
  $query=mysqli_query($conn,$sql);
?>
<style media="screen">
table {
    border-collapse:separate;
    border:solid black 1px;
    border-radius:6px;
    margin-left: 30%;
    margin-top: 15px;

}

td, th {
    border-left:solid black 1px;
    border-top:solid black 1px;
        padding: 10px;
}

th {
    background-color: #292929;
    border-top: none;
    color: white;
}

td:first-child, th:first-child {
     border-left: none;
}
</style>
</head>

  <body>
    <script type="text/javascript">
      function back(){
        window.location.href ="studentdashboard.php";
      }
    </script>
<?php include 'header2.php';?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<div class="tablediv">
<table align="center" >

<tr>
		<th colspan="8"><h2>complaint status</h2></th>
		</tr>
			  <th> NAME</th>
			  <th> REGNO </th>
			  <th> BLOCK </th>
			  <th> ROOMNO </th>
                          <th> REASON </th>
                          <th> STATUS </th>

		</tr>

<?php while($rows=mysqli_fetch_assoc($query))
		{
		?>
		<tr> <td><?php echo $rows['name']; ?></td>
		<td><?php echo $rows['regno']; ?></td>
		<td><?php echo $rows['block']; ?></td>
		<td><?php echo $rows['roomno']; ?></td>
        <td><?php echo $rows['reason']; ?></td>
      	<td><?php echo $rows['status']; ?></td>
		</tr>
	<?php
               }
          ?>

</div>


</table>

</body>
<button type="button" name="button" class="NavBtnLink" onclick="back()" style="margin:20px 650px" >BACK</button>
</html>
