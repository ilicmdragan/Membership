<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Checkbox Value</title>
</head>

<body>
    <?php
    // Assuming you have a record ID passed through GET, adjust as needed
    $id = $_GET['id'];
    ?>

    <form action="checkbox.php" method="post">
        <input type="hidden" name="Novac" value="<?php echo $Novac; ?>">
        <label>
            <input type="checkbox" name="Novac" value="3"> Checked
        </label>
        <button type="submit">Update</button>
    </form>
</body>

</html>
<?php
// Include your database connection file (dbh.php or similar)
include 'dbh.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get values from the form
    $id = $_POST['id'];
    $is_checked = isset($_POST['Novac']) ? 1 : 0; // Checkbox value (1 if checked, 0 if unchecked)

    // Update the database
    $sql = "UPDATE tbl_clanstvo SET Novac = ? WHERE id = $id?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $is_checked, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>