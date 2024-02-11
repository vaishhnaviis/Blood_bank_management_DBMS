<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'blood_bank');

$user = $_POST['user'];
$password = $_POST['pass'];
$useremail = $_POST['useremail'];
$bloodgroup = $_POST['bloodgroup'];
$gender = $_POST['gender'];

$errors = array();

// Check if any required fields are empty
if (empty($user) || empty($password) || empty($useremail) || empty($bloodgroup) || empty($gender)) {
    $errors[] = "Please fill in all the details.";
}

// Validate username
if (!preg_match("/^[a-zA-Z0-9]*[_@]+[a-zA-Z0-9]*$/", $user)) {
   $errors[] = "Username must contain at least one underscore (_) or at symbol (@).";
}


// Validate password strength (minimum 8 characters, at least 1 uppercase letter, 1 lowercase letter, and 1 number)
if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
    $errors[] = "Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
}

// Validate email format
if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (!empty($errors)) {
   echo "<!DOCTYPE html>
         <html>
         <head>
             <title>Error</title>
             <link rel='stylesheet' type='text/css' href='popup.css'>
         </head>
         <body>
             <div class='popup-container'>";
   foreach ($errors as $error) {
       echo "<p class='popup-message'>$error</p>";
   }
   echo "<button class='popup-ok-button' onclick=\"window.location = 'signup.php';\">OK</button>
             </div>
         </body>
         </html>";
   exit();
}

$s = "SELECT * FROM login WHERE user = '$user'";
$result = mysqli_query($con, $s);
$num = mysqli_fetch_row($result);

if ($num) {
    echo "<script>alert('Username Taken');</script>";
} else {
    $reg = "INSERT INTO login (user, pass, useremail, bloodgroup, gender) VALUES ('$user', '$password', '$useremail', '$bloodgroup', '$gender')";
    mysqli_query($con, $reg);
    echo "<script>alert('Registration successful. Sign in with your Username.');</script>";
    header("location: successfull.html");
    exit();
}
?>
