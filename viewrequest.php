<?php
session_start();
include 'config.php';

// for deleting user
// Inside viewrequest.php
if (isset($_POST['signup'])) {
  $option = $_POST['option'];
  $bloodgroup = $_POST['bloodgroup'];

  if ($option === "available") {
      // Update message and delete the corresponding message
      $query = "UPDATE `requestblood` SET `message`='Yes, available!' WHERE `id`='".$_GET['uid']."'";
      $result = $con->query($query);

      // Delete the message from requestblood table
      $deleteQuery = "DELETE FROM requestblood WHERE id='" . $_GET['uid'] . "'";
      $deleteResult = $con->query($deleteQuery);

      if ($result === TRUE && $deleteResult === TRUE) {
          // Redirect to decrement blood units
          header("Location: status.php?action=decrement&bloodgroup=$bloodgroup");
          exit();
      }
  } else {
      // Update message without decrementing and redirect to status.php
      $query = "UPDATE `requestblood` SET `message`='We are sorry.' WHERE `id`='".$_GET['uid']."'";
      $result = $con->query($query);

      if ($result === TRUE) {
          // Redirect without decrement
          header("Location: status.php");
          exit();
      }
  }
}

?>
<!DOCTYPE>
<html>
<head>

<title>Blood Request</title>
       <link rel = "icon" href =  
"images/logo.png" 
        type = "image/x-icon"> 
  <style type="text/css">
  body{
     background-color: skyblue;
  }
  /* Add this in your <style> section or external stylesheet */
.table th {
    color: black;
}

/* <!--  body{

  	color:black;
    background-image:url("seamless.jpg");
    text-align: center;
    font-size:10px;
    
  	}




div
{
	position:relative;
	left:7cm;

}

table, td, th {  
  border: 5px solid black;
  text-align: center;
  font-size:20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th{
	
	font-size: 24px;
	color:blue;
	font-style: bold;
} 
td {
  padding: 20px;
}
h1{

	color:black;
	font-size:30px;
}
*/ --></style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body style="background-color: skyblue;">
<p style="text-align:center;font-size:60px;font-family:cursive;color:black;border-radius:0.5px; background-color: blue;color: white;">Blood Bank Management System</p>
 <center><section id="main-content">
    <section class="wrapper">
				<div class="row">     
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                              <th style="color: black;">Id</th>
                                <th style="color: black;">First Name</th>
                                <th style="color: black;">Address</th>
                                <th style="color: black;">Bloodgroup</th>
                                <th style="color: black;">Contact no.</th>
                                <th style="color: black;">unit</th>
                                <th style="color: black;">What date & time</th>
                                <th style="color: black;">Time</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              
                              $ret=mysqli_query($con,"select * from requestblood");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['user'];?></td>
                                  <td><?php echo $row['Address'];?></td>
                                  <td><?php echo $row['bloodgroup'];?></td>
                                  <td><?php echo $row['phno'];?></td>
                                  <td><?php echo $row['unit'];?></td> 
                                  <td><?php echo $row['time-for-flood'];?></td>
                                  <td><?php echo $row['time'];?></td>  
                                  <td>
                                     
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
	</div>
</div>
	<footer class="footer-distributed">
 <center>
 	<br>
 	<br>
 	 <h3 style="color:black;font-size: 20px">Blood Blood Management System</h3>
                <a href="home.php"style="color:black;font-size: 20px">Back to home</a>
                <br>
                <br>
 </center>
            
               
               



               

</body>
</html>
