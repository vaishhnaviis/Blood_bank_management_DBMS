<?php
include '../config.php';

if (isset($_POST['signup'])) {
    $option = $_POST['option'];
    $bloodgroup = $_POST['bloodgroup'];

    if ($option === "available") {
        // Update message and redirect to status.php with decrement action
        $query = "UPDATE `requestblood` SET `message`='Yes, available!' WHERE `id`='".$_GET['uid']."'";
        $result = $con->query($query);

        if ($result === TRUE) {
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

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <section class="bg-primary">
        <article class="py-5 text-center text-dark">
            <div>
                <!-- ... rest of your HTML code ... -->

                <div class="register">
                    <form name="registration" method="POST" action="" enctype="multipart/form-data">
                        <p>Select an option:</p>
                        <select name="option" required>
                            <option value="available">Yes, available!</option>
                            <option value="sorry">No, we are sorry.</option>
                        </select>
                        <?php
                        $bloodgroup = isset($_GET['bloodgroup']) ? $_GET['bloodgroup'] : '';
                        ?>
                        <input type="hidden" name="bloodgroup" value="<?php echo $bloodgroup; ?>">

                        <div class="sign-up">
                            <input type="submit" name="signup" value="Send">
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
    <!-- Rest of your HTML content -->
</body>
</html>
