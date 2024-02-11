<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($con, 'blood_bank');

$Bloodname = isset($_POST['Blood_Type']) ? $_POST['Blood_Type'] : '';
$availability = isset($_POST['Availibility']) ? $_POST['Availibility'] : '';
$unit = isset($_POST['unit']) ? $_POST['unit'] : '';
$hos = isset($_POST['hospital']) ? $_POST['hospital'] : '';

// Validate input
if (empty($unit) || empty($Bloodname)) {
    echo "Please fill all the fields.";
} else {
    $s = "SELECT * FROM bloodgroup WHERE Bloodname = '$Bloodname'";
    $result = mysqli_query($con, $s);
    $num = mysqli_fetch_row($result);

    if ($num == true) {
        $alertMessage = "This type of blood entry is already done";
    } else {
        // Insert new blood entry
        $reg = "INSERT INTO bloodgroup (Bloodname, Availibility, unit, hospital) VALUES ('$Bloodname', '$availability', '$unit', '$hos')";
        if (mysqli_query($con, $reg)) {
            $alertMessage = "Entry is Successful";
            header("location:../../bloodupdate.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Blood Details</title>
    <script>
        window.onload = function() {
            <?php if (isset($alertMessage)) { ?>
            alert('<?php echo $alertMessage; ?>');
            <?php } ?>
            window.location.href = '../../bloodupdate.php';
        }
    </script>
</head>
<body>
</body>
</html>
