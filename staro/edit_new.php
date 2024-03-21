<?php
//session_start();

//$ID = 1; // Replace with the actual ID value
$ID = 3;

// Established a database connection
$conn = mysqli_connect("localhost", "root", "", "webdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the database to get the current value of the 'Pomoc1' field
$result = mysqli_query($conn, "SELECT Pomoc FROM tbl_clanstvo WHERE id=$ID");
$row = mysqli_fetch_assoc($result);
$currentValues = explode(', ', $row['Pomoc']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the selected values as an array
    $selectedValues = isset($_POST['Pomoc1']) ? $_POST['Pomoc1'] : array();

    // Sanitize and process selected values as needed
    $selectedValues = array_map('mysqli_real_escape_string', array_fill(0, count($selectedValues), $conn), $selectedValues);

    // Merge the selected values with the current values
    $updatedValues = array_merge($currentValues, $selectedValues);

    // Deduplicate the values to ensure uniqueness
    $updatedValues = array_unique($updatedValues);

    // Convert the array of selected values into a comma-separated string
    $updatedValuesString = implode(', ', $updatedValues);

    // Update the 'Pomoc1' field in the 'tbl_clanstvo' table
    $updateQuery = "UPDATE tbl_clanstvo SET Pomoc='$updatedValuesString' WHERE id=$ID";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Database updated successfully";
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }

    // Refresh the current values after the update
    $currentValues = $updatedValues;
}

// Close the database connection
mysqli_close($conn);
?>

<!-- Your HTML form code -->
<form method="post" action="">
    <label for="Pomoc1">Na koji način biste mogli da pomognete</label>
    <select id="Pomoc1" name="Pomoc1[]" multiple>
        <option value="">Poništi...</option>
        <option value="money" <?php if (in_array('money', $currentValues)) echo "selected"; ?>>Novac</option>
        <option value="car" <?php if (in_array('car', $currentValues)) echo "selected"; ?>>Vozilo</option>
        <option value="office" <?php if (in_array('office', $currentValues)) echo "selected"; ?>>Prostorije za kancelarije</option>
    </select>

    <button type="submit" name="submit">Submit</button>
</form>