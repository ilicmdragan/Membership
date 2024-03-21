<?php
// Database connection
include "dbh.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve all rows from tbl_opstina
$sql = "SELECT * FROM tbl_opstina";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Municipality</title>
</head>

<body>
    <?php include 'navbar.html'; ?>
    <a href="home.php">Back</a>


    <div class="container mt-5">
        <h2>List of Municipalities in Serbia</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Municipality Name</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display results in a table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["naziv_opstine"] . "</td>";
                    // Add more cells for additional columns
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js required for dropdown functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>