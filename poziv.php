<?php
include "dbh.php";

$ClanstvoID = isset($_GET['ClanstvoID']) ? $_GET['ClanstvoID'] : null;
$DatumRazgovora = "";
$SadrzajRazgovora = "";
$Agent = "";
$DatumZakazanogRazgovora = "";

// Provera konekcije
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching FirstName and LastName from tbl_clanstvo based on ClanstvoID
$Ime = "";
$Prezime = "";
$Ime_Prezime = "";

if ($ClanstvoID !== null) {
    $sql_clanstvo = "SELECT Ime, Prezime FROM tbl_clanstvo WHERE ID = $ClanstvoID";
    $result_clanstvo = $conn->query($sql_clanstvo);

    if ($result_clanstvo->num_rows > 0) {
        $row_clanstvo = $result_clanstvo->fetch_assoc();
        $Ime = $row_clanstvo['Ime'];
        $Prezime = $row_clanstvo['Prezime'];
        $Ime_Prezime = $Ime . ' ' . $Prezime;
    }
}

// Continue with your existing code
// For example, you can use $FirstName, $LastName, and $FullName in your HTML or further processing


//echo "<h4>Novi razgovor sa $Ime_Prezime</h4>";
echo "<div class='container text-center my-3'>";
echo "<h4>New call to $Ime_Prezime</h4>";
echo "</div>";

// Zatvaranje konekcije
//$conn->close();

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ClanstvoID = $_POST["ClanstvoID"];
    $DatumRazgovora = $_POST["DatumRazgovora"];
    $SadrzajRazgovora = $_POST["SadrzajRazgovora"];
    $Agent = $_POST["Agent"];
    $DatumZakazanogRazgovora = $_POST["DatumZakazanogRazgovora"];

    do {
        if (empty($DatumRazgovora) || empty($SadrzajRazgovora) || empty($Agent)) {
            $errorMessage = "Sva polja su obavezna";
            break;
        }

        // dodaj novog člana
        $sql = "insert into tbl_Pozivi (ClanstvoID, DatumRazgovora, SadrzajRazgovora, Agent, DatumZakazanogRazgovora)" .
            "values ('$ClanstvoID','$DatumRazgovora','$SadrzajRazgovora','$Agent','$DatumZakazanogRazgovora')";
        $result = $conn->query($sql);

        if (!$result) {

            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $ClanstvoID = "";
        $DatumRazgovora = "";
        $SadrzajRazgovora = "";
        $Agent = "";
        $DatumZakazanogRazgovora = "";


        $successMessage = "Uspešno dodat novi poziv.";

        header("location: lista.php");
        exit;
    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Link the external CSS file -->
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon type" href="slike_ikone/logo.png" />
    <title>Call to</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-3">

        <?php
        if (!empty($errorMessage)) {

            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Zatvori'></button>            
            </div>
            ";
        }

        ?>
        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ClanstvoID" value="<?php echo $ClanstvoID; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of the call</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="DatumRazgovora" value="<?php echo $DatumRazgovora; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Content of the conversation</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="5" name="SadrzajRazgovora"><?php echo $SadrzajRazgovora; ?></textarea>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="Agent">Callers name</label>
                <div class="col-sm-6">
                    <select id="Agent" class="form-control" name="Agent">
                        <?php
                        // Connect to the database
                        $conn = mysqli_connect('localhost', 'root', "", 'webdb');

                        //--Query the tbl_zaposleni table-->
                        $result = mysqli_query($conn, "SELECT ZaposleniID, Agent FROM tbl_zaposleni");

                        //--Iterate through the result and create an option element for each row-->
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['Agent'] . '">' . $row['Agent'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Scheduled date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="DatumZakazanogRazgovora" value="<?php echo $DatumZakazanogRazgovora; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Zatvori'></button> 
                                </div>
                            </div>
                        </div>
                        ";
            }

            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="lista.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>