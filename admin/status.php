<?php
include '../config.php';

$sel = "SELECT Bloodname, SUM(unit) AS totalUnits FROM bloodgroup GROUP BY Bloodname";
$rs = $con->query($sel);

if (!$rs) {
    echo "Error executing query: " . $con->error;
}

// Handle increment and decrement actions
// Inside status.php
if (isset($_GET['action']) && isset($_GET['bloodgroup'])) {
    $action = $_GET['action'];
    $bloodgroup = $_GET['bloodgroup'];

    if ($action === 'increment') {
        // Update total units available and increment action
        $updateQuery = "UPDATE bloodgroup SET unit = unit + 1 WHERE Bloodname = '$bloodgroup'";
        mysqli_query($con, $updateQuery);
    } elseif ($action === 'decrement') {
        // Update total units available and decrement action
        $updateQuery = "UPDATE bloodgroup SET unit = GREATEST(unit - 1, 0) WHERE Bloodname = '$bloodgroup'";
        mysqli_query($con, $updateQuery);
    }

    // Redirect to refresh the page after updating database
    header("Location: status.php");
    exit();
}

// Automatic decrement based on status
if (isset($_GET['status']) && $_GET['status'] === 'yes' && !isset($_GET['decremented'])) {
    echo "Executing decrement query!";
    // ... (your query and redirection code)
    $decrementQuery = "UPDATE bloodgroup SET unit = GREATEST(unit - 1, 0)";
    mysqli_query($con, $decrementQuery);
    header("Location: status.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Blood Available</title>
</head>
<body>
    <section class="listings">
        <div class="wrapper">
            <h2 style="text-align: center;">Blood Units Availability</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Blood Group</th>
                        <th>Total Units Available</th>
                        <th>Increase +</th>
                        <th>Decrease -</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rws = $rs->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $rws['Bloodname']; ?></td>
                            <td><?php echo $rws['totalUnits']; ?></td>
                            <td><a href="status.php?action=increment&bloodgroup=<?php echo $rws['Bloodname']; ?>"><button>+1</button></a></td>
                            <td><a href="status.php?action=decrement&bloodgroup=<?php echo $rws['Bloodname']; ?>"><button>-1</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <center>
                <a href="bloodupdate.php">Go Back</a>
            </center>
        </div>
    </section> <!-- end listing section -->
</body>
</html>
