<?php
include 'config.php';
session_start();
if (isset($_POST['request'])) {
  # code...


$fullname=$_POST['fullname'];
$Address=$_POST['Address'];
$bloodgroup=$_POST['bloodgroup'];
$phno=$_POST['phno'];
$unit=$_POST['unit'];
$time=$_POST['bloodtime'];


$query = "INSERT INTO `requestblood`(`id`, `user`, `Address`, `bloodgroup`, `phno`, `unit`, `time-for-flood`) VALUES ('','$fullname','$Address','$bloodgroup','$phno','$unit','$time')";
  $result = $con->query($query); 
  
  
  if($result === TRUE){
    echo 'Request has Successfully been Approved';
  ?>
    <meta content="4; blooddetails.php" http-equiv="refresh" />
  <?php
  }
}
?>
  
        <html>
     <head>
            <link rel="stylesheet" type="text/css" href="css/main.css">

  <title>Request Blood</title>
   </head>
           <body>
   

  <h2 style="background-color: blue; color: white">Send Blood Request</h2>

                      <?php 
                              $id=$_SESSION['user'];
                            $ret=mysqli_query($con,"select * from login where user='$id'");
              
                while($row=mysqli_fetch_array($ret))

                {?> 
                    <hr>
                    <form action="" style="margin-right: 500px; margin-left: 500px; " method="post">                   
                    <label>Enter Your Full Name<span>*</span></label><br>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $row['user']; ?>">
                    <div class="required"></div>
                    <br>
                    
                    <!--Last Name-->
                    <label>Your Address<span>*</span></label><br>
                    <input type="text" name="Address" id="Address">
                    <div class="required"></div>
                    <br>
                    <!--Nickname-->
                    <label for="bloodgroup">Blood Group You Want</label><br>
                    <select id="bloodgroup" name="bloodgroup">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <div class="required"></div>
                    <br>
                    <label>Your Contact Number<span>*</span></label><br>
                    <input type="tel" name="phno" id="phno"><br>

                    <label for="unit">Unit<span>*</span></label><br>
                    <input type="number" name="unit" id="unit" step="1" min="0" pattern="\d+" required>
                    <div class="required"></div>
                    <br>

                    <label for="bloodtime">Time Of Blood Need<span>*</span></label><br>
                    <input type="datetime-local" name="bloodtime" id="bloodtime" required>
                    <div class="required"></div>

                    <br>
                    <input style="background-color: blue; color: white" type="submit" value="Request" name="request">
                </form>
                <?php 
                  }
                  ?>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>

                    
      

     


    </body>
    </html>