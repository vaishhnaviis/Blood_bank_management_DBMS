
 <?php 
require 'functions/functions.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
$user = $_SESSION['user'];
session_destroy();
session_start();
$_SESSION['user'] = $user;
ob_start(); 
$conn = connect();
?>

<html>
<head> <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <title>Blood Bank Management</title>
         <link rel = "icon" href =  
"images/logo.png" 
        type = "image/x-icon"> 

<style>
     body
     {

        background-color: skyblue;
     }
	.btn-danger:hover{
		border-radius:3px;
		border:1px solid #E11818;
		background-color:#E11818;
		color:#ff0000;
		
	}
	
	#submit-btn{
		border-radius:3px;
		border:none;
		background-color:#dd0000;
		color:#ffffff;
	}
	
	#submit-btn:hover{
		border-radius:3px;
		border:1px solid #ff0000;
		background-color:#ffffff;
		color:#ff0000;
	}
	.tf{
		border-radius:3px;
		border:1px solid #808080;
	}

  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  
section {
    width:1400px;
	
    float:left;
    padding:10px;	 	 
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    width: 400px;
    height: 250px;
    background-color: green;
}

.flex-item {
    background-color: cornflowerblue;
    width: 100px;
    height: 100px;
    margin: 10px;
}
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 50%;
      margin: auto;
  }
  img.p
  {
  margin-top:2px;
  }
  #header {
    background-color:blue;
    color:red;
    text-align:center;
    padding:5px;
	}
	#nav 
	{
    line-height:30px;
    background-color:white;
    height:300px;
    width:400px;
    float:left;
    padding:5px;
	 margin-left: 50px;
    }
	
	#footer {
    background-color:maroon;
    color:red;
    clear:both;
    text-align:center;
    padding:20px;	 	 
}
H2{
	COLOR:MAROON;
}

.modal-content{
    background-color: blue;
}
  </style>
<title>Blood Bank</title>
<link rel="shortcut icon" href="icon.png">
</head>
<body>

 <script>
/*jQuery(document).ready(function ($) {
    $("#lal").submit(function () {
        $.ajax({
            type: "POST",
            url: "don.php",
            data: $('form.contact').serialize(),
            success: function () {
   
                $("#myModal").modal('hide');
				$("#stack2").modal('show');
            },
            error: function () {
                alert("failure");
            }
        });
        return false;
    });
});*/
 </script>


</div>


<nav class="navbar navbar-inverse" style="background-color: blue; color: white">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="background-color: blue; color: white" class="navbar-brand" href="#">Welcome <?php echo($_SESSION['user']);?></a>
    </div>
    <div >
      <ul class="nav navbar-nav" >
       
        <li><a data-toggle="modal" style="background-color: blue; color: white" href="#myModal">Donate Now</a></li>
        <li class="active" ><a href="home.php" style="background-color: green; color: white; text-decoration: underline;">Back to Home</a></li>
         <li class="active"><a style="background-color: green; color: white; text-decoration: underline;" href="prostatus.php">Status</a></li>
        <li class="active"><a style="background-color: green; color: white; text-decoration: underline;" href="logout.php">Logout</a></li>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Donate Blood</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="don.php" method='post' id="lal">
       <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="fullname" required>
    </div>
    <div class="form-group">
      <label for="email">Age</label>
      <input type="number" class="form-control" placeholder="Enter your age" name="age" required>
    </div>
    <div class="form-group">
    <label for="bloodgroup">Bloodgroup Ready To Donate</label>
    <select class="form-control" name="bloodgroup" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
</div>
  <div class="form-group">
      <label for="gender">city</label>
      <input type="text" class="form-control" placeholder="Your City" name="city" required>
    </div>
  <div class="form-group">
      <label for="weight">Your Contact Number</label>
      <input type="tel" class="form-control" placeholder="Enter Your Active Number" name="phno" required>
    </div>
    <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
</div>

    <button type="submit" class="btn btn-default">Submit</button>
	<button type="reset" class="btn btn-default">Reset</button>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="stack2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Thank you for your kindness.Further information will be sent via Email</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
      </ul>
    </div>
 
</nav>
<div align=right><b>

</b>
</div>
<section style="float:left; ">
<div style="float:left;margin-left:50px;"><br>
<b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEARCH FOR A DONOR NEARBY IF AVAILABLE</i></b>
<br><br><br><br>
<form action="bbms.php" method="post" style>
<label>Blood Group:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name="search" class="tf" placeholder='Enter Blood Group' style="width:200px;height:30px;" required><br><br><br>
<label>&nbsp;&nbsp;&nbsp;City:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name="search2" class="tf" placeholder='Enter City' style="width:200px;height:30px;" required><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="submit-btn" class="btn btn-info" type='submit' align='right' value='Submit'><br>

</form></div>

</section>
</div>

  

</html>
