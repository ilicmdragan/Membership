<?php
include "dbh.php";
//$conn = mysqli_connect("localhost", "root", "", "webdb");

$ID = "";
$Ime = "";
$Prezime = "";
$MobilniTelefon = "";
$Email = "";
$MestoIPostanskiBroj = "";
$Opstina = "";
$Adresa = "";
$DatumAzuriranjaPodataka = "";
$BrojClanskeKarte = "";
$DatumOdstampaneClanskeKarte = "";
$DatumOdstampanogImenovanja = "";
$PodrskaZaOsnivanjeStranke = "";
$Status = "";
$UcesceuPokretu = "";
$OdbornikPoslanik = "";
$Kontrolor = "";
$MarketingInternet = "";
$PoverenikOpstine = "";
$Pomoc = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $ID = $_GET["ID"];

    // read each row of the selected client from database table
    $sql = "SELECT * FROM tbl_Clanstvo WHERE ID=$ID";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:lista.php");
        exit;
    }

    $Ime = $row["Ime"];
    $Prezime = $row["Prezime"];
    $MobilniTelefon = $row["MobilniTelefon"];
    $Email = $row["Email"];
    $MestoIPostanskiBroj = $row["MestoIPostanskiBroj"];
    $Opstina = $row["Opstina"];
    $Adresa = $row["Adresa"];
    $DatumAzuriranjaPodataka = $row["DatumAzuriranjaPodataka"];
    $BrojClanskeKarte = $row["BrojClanskeKarte"];
    $DatumOdstampaneClanskeKarte = $row["DatumOdstampaneClanskeKarte"];
    $DatumOdstampanogImenovanja = $row["DatumOdstampanogImenovanja"];
    $PodrskaZaOsnivanjeStranke = $row["PodrskaZaOsnivanjeStranke"];
    $Status = $row["Status"];
    $UcesceuPokretu = $row["UcesceuPokretu"];
    $OdbornikPoslanik = $row["OdbornikPoslanik"];
    $Kontrolor = $row["Kontrolor"];
    $MarketingInternet = $row["MarketingInternet"];
    $PoverenikOpstine = $row["PoverenikOpstine"];
    $Pomoc = $row["Pomoc"];
} else {

    //POST method: Update the data of the client

    $ID = $_POST["ID"];
    $Ime = $_POST["Ime"];
    $Prezime = $_POST["Prezime"];
    $MobilniTelefon = $_POST["MobilniTelefon"];
    $Email = $_POST["Email"];
    $MestoIPostanskiBroj = $_POST["MestoIPostanskiBroj"];
    $Opstina = $_POST["Opstina"];
    $Adresa = $_POST["Adresa"];
    $DatumAzuriranjaPodataka = $_POST["DatumAzuriranjaPodataka"];
    $BrojClanskeKarte = $_POST["BrojClanskeKarte"];
    $DatumOdstampaneClanskeKarte = $_POST["DatumOdstampaneClanskeKarte"];
    $DatumOdstampanogImenovanja = $_POST["DatumOdstampanogImenovanja"];
    $PodrskaZaOsnivanjeStranke = $_POST["PodrskaZaOsnivanjeStranke"];
    $Status = $_POST["Status"];
    $UcesceuPokretu = $_POST["UcesceuPokretu"];
    $OdbornikPoslanik = $_POST["OdbornikPoslanik"];
    $Kontrolor = $_POST["Kontrolor"];
    $MarketingInternet = $_POST["MarketingInternet"];
    $PoverenikOpstine = $_POST["PoverenikOpstine"];
    $Pomoc = $_POST["Pomoc"];


    do {
        if (empty($ID) || empty($Ime) || empty($MobilniTelefon) || empty($Opstina) || empty($DatumAzuriranjaPodataka)) {
            $errorMessage = "All fields are required";
            break;
        }

        // izmeni podatke za clana
        $sql = "UPDATE tbl_Clanstvo SET 
                    Ime='$Ime',
                    Prezime='$Prezime',
                    MobilniTelefon='$MobilniTelefon',
                    Email='$Email',
                    MestoIPostanskiBroj='$MestoIPostanskiBroj',
                    Opstina='$Opstina', 
                    Adresa='$Adresa',
                    DatumAzuriranjaPodataka='$DatumAzuriranjaPodataka',
                    BrojClanskeKarte='$BrojClanskeKarte',
                    DatumOdstampaneClanskeKarte='$DatumOdstampaneClanskeKarte',
                    DatumOdstampanogImenovanja='$DatumOdstampanogImenovanja',
                    PodrskaZaOsnivanjeStranke='$PodrskaZaOsnivanjeStranke',
                    Status='$Status',
                    UcesceuPokretu ='$UcesceuPokretu',
                    OdbornikPoslanik ='$OdbornikPoslanik',
				    Kontrolor ='$Kontrolor',
				    MarketingInternet ='$MarketingInternet',
                    PoverenikOpstine ='$PoverenikOpstine',
                    Pomoc='$Pomoc'
                    
              WHERE ID=$ID";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $successMessage = "Izmena uspešno izvršena.";

        header("location:lista.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon type" href="slike_ikone/logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

    <title>
        Update
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

</head>

<body>
    <!-- Include the navbar -->
    <div id="navbar-container">
        <!-- Use server-side includes, PHP, or other templating methods to include the navbar -->
        <!-- Example using PHP include: -->
        <?php include 'navbar.html'; ?>
    </div>

    <div class="container">

        <div class="row">

            <!--<h2>Ažuriraj podatke za <?php echo $Ime . ' ' . $Prezime; ?></h2><br>-->

            <!-- Prva kolona -->
            <div class="col-md-3">

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
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <br>
                    <div class="form-group">
                        <label for="Ime"><b>First Name</b></label>
                        <input type="text" class="form-control" name="Ime" value="<?php echo $Ime; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Prezime"><b>Last name</b></label>
                        <input type="text" class="form-control" name="Prezime" value="<?php echo $Prezime; ?>">
                    </div>


                    <div class="form-group">
                        <label for="MobilniTelefon"> <b>Mobile phone</b></label>
                        <input type="text" class="form-control" name="MobilniTelefon" value="<?php echo $MobilniTelefon; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Email"><b>Email</b></label>
                        <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                    </div>

                    <div class="form-group">
                        <label><b>Address</b></label>
                        <input type="text" class="form-control" name="Adresa" value="<?php echo $Adresa; ?>">
                    </div>

                    <div class="form-group">
                        <label><b>City & Postal code</b></label>
                        <input type="text" class="form-control" name="MestoIPostanskiBroj" value="<?php echo $MestoIPostanskiBroj; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Opstina"><b>Municipality</b></label>
                        <select id="Opstina" class="form-control" name="Opstina">

                            <?php
                            // Connect to the database
                            //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                            include "dbh.php";

                            //--Query the tbl_Opstina table-->
                            $result = mysqli_query($conn, "SELECT id, naziv_opstine FROM tbl_Opstina");

                            //--Iterate through the result and create an option element for each row-->
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['naziv_opstine'] . '">' . $row['naziv_opstine'] . '</option>';
                            }

                            // Check if the form has been submitted
                            if (isset($_POST['submit'])) {

                                // Get the selected option from the dropdown
                                $selected_option = mysqli_real_escape_string($conn, $_POST['Opstina']);

                                // Update the field in the tbl_Clanstvo table
                                mysqli_query($conn, "UPDATE tbl_Clanstvo SET Opstina='$selected_option' WHERE id=$ID");
                            }

                            // Query the database to get the current value of the Opstina field
                            $result = mysqli_query($conn, "SELECT Opstina FROM tbl_Clanstvo WHERE id=$ID");
                            $row = mysqli_fetch_assoc($result);
                            $current_value = $row['Opstina'];

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><b>Date</b></label>
                        <input type="date" class="form-control" name="DatumAzuriranjaPodataka" value="<?php echo $DatumAzuriranjaPodataka; ?>">

                    </div>

                    <div class="form-group">
                        <label><b>Membership card number</b></label>
                        <input type="number" class="form-control" name="BrojClanskeKarte" value="<?php echo $BrojClanskeKarte; ?>">
                    </div>


                    <div class="form-group">
                        <label><b>Date of printing membership card</b></label>
                        <input type="date" class="form-control" name="DatumOdstampaneClanskeKarte" value="<?php echo $DatumOdstampaneClanskeKarte; ?>">
                    </div>

                    <div class="form-group">
                        <label><b>Date of printing reports</b></label>
                        <input type="date" class="form-control" name="DatumOdstampanogImenovanja" value="<?php echo $DatumOdstampanogImenovanja; ?>">
                    </div>



                    <?php
                    // Connect to the database
                    //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                    include "dbh.php";

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['PodrskaZaOsnivanjeStranke']);


                        // Update the field in the tbl_Clanstvo table
                        mysqli_query($conn, "UPDATE tbl_Clanstvo SET PodrskaZaOsnivanjeStranke='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the PodrskaZaStranku field
                    $result = mysqli_query($conn, "SELECT PodrskaZaOsnivanjeStranke FROM tbl_Clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['PodrskaZaOsnivanjeStranke'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
            </div>



            <!-- Druga kolona -->

            <div class="col-md-3 border-right">
                <div class="form-group"><br>
                    <label for="PodrskaZaOsnivanjeStranke"><b>Support for founding the club</b></label>
                    <select id="PodrskaZaOsnivanjeStranke" class="form-control" name="PodrskaZaOsnivanjeStranke">
                        <option value="">Choose...</option>
                        <option value="Yes" <?php if ($current_value == "Yes") echo "selected"; ?>>Yes</option>
                        <option value="No" <?php if ($current_value == "No") echo "selected"; ?>>No</option>
                        <option value="Has no opinion" <?php if ($current_value == "Has no opinion") echo "selected"; ?>>Has no opinion</option>
                    </select>

                </div>

                <?php
                // Connect to the database
                //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                include "dbh.php";

                // Check if the form has been submitted
                if (isset($_POST['submit'])) {
                    // Get the selected option from the dropdown
                    $selected_option = mysqli_real_escape_string($conn, $_POST['Status']);

                    // Update the field in the tbl_Clanstvo table
                    mysqli_query($conn, "UPDATE tbl_Clanstvo SET Status='$selected_option' WHERE id=$ID");
                }

                // Query the database to get the current value of the Status field
                $result = mysqli_query($conn, "SELECT Status FROM tbl_Clanstvo where id=$ID");
                $row = mysqli_fetch_assoc($result);
                $current_value = $row['Status'];

                // Close the database connection
                mysqli_close($conn);
                ?>
                <div class="form-group">
                    <label for="Status"><b>Status</b></label>
                    <select id="Status" class="form-control" name="Status">
                        <option value="">Choose...</option>
                        <option value="Commissioner" <?php if ($current_value == "Commissioner") echo "selected"; ?>>Commissioner</option>
                        <option value="Member" <?php if ($current_value == "Member") echo "selected"; ?>>Member</option>
                        <option value="Sympathizer" <?php if ($current_value == "Sympathizer") echo "selected"; ?>>Sympathizer</option>
                    </select>
                </div>


                <?php
                // Connect to the database
                //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                include "dbh.php";

                // Check if the form has been submitted
                if (isset($_POST['submit'])) {
                    // Get the selected option from the dropdown
                    $selected_option = mysqli_real_escape_string($conn, $_POST['UcesceuPokretu']);

                    // Update the field in the tbl_Clanstvo table
                    mysqli_query($conn, "UPDATE tbl_Clanstvo SET UcesceuPokretu='$selected_option' WHERE id=$ID");
                }

                // Query the database to get the current value of the Ucesce u pokretu field
                $result = mysqli_query($conn, "SELECT UcesceuPokretu FROM tbl_Clanstvo where id=$ID");
                $row = mysqli_fetch_assoc($result);
                $current_value = $row['UcesceuPokretu'];

                // Close the database connection
                mysqli_close($conn);
                ?>
                <div class="form-group">
                    <label for="UcesceuPokretu"><b>To actively participate in the Movement</b></label>
                    <select id="UcesceuPokretu" class="form-control" name="UcesceuPokretu">
                        <option value="">Choose...</option>
                        <option value="Yes" <?php if ($current_value == "Yes") echo "selected"; ?>>Yes</option>
                        <option value="No" <?php if ($current_value == "No") echo "selected"; ?>>No</option>
                        <option value="Has no opinion" <?php if ($current_value == "Has no opinion") echo "selected"; ?>>Has no opinion</option>
                    </select><br>
                </div>

                <?php
                // Connect to the database
                //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                include "dbh.php";

                // Check if the form has been submitted
                if (isset($_POST['submit'])) {
                    // Get the selected option from the dropdown
                    $selected_option = mysqli_real_escape_string($conn, $_POST['OdbornikPoslanik']);

                    // Update the field in the tbl_Clanstvo table
                    mysqli_query($conn, "UPDATE tbl_Clanstvo SET OdbornikPoslanik='$selected_option' WHERE id=$ID");
                }

                // Query the database to get the current value of the OdbornikPoslanik field
                $result = mysqli_query($conn, "SELECT OdbornikPoslanik FROM tbl_Clanstvo where id=$ID");
                $row = mysqli_fetch_assoc($result);
                $current_value = $row['OdbornikPoslanik'];

                // Close the database connection
                mysqli_close($conn);
                ?>

                <div class="form-group">
                    <label for="OdbornikPoslanik"><b>To be a Councilor or a Member of Parliament</b></label>
                    <select id="OdbornikPoslanik" class="form-control" name="OdbornikPoslanik">
                        <option value="">Choose...</option>
                        <option value="Yes" <?php if ($current_value == "Yes") echo "selected"; ?>>Yes</option>
                        <option value="No" <?php if ($current_value == "No") echo "selected"; ?>>No</option>
                        <option value="Has no opinion" <?php if ($current_value == "Has no opinion") echo "selected"; ?>>Has no opinion</option>
                    </select>

                </div><br>

                <?php
                // Connect to the database
                //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                include "dbh.php";

                // Check if the form has been submitted
                if (isset($_POST['submit'])) {
                    // Get the selected option from the dropdown
                    $selected_option = mysqli_real_escape_string($conn, $_POST['Kontrolor']);

                    // Update the field in the tbl_Clanstvo table
                    mysqli_query($conn, "UPDATE tbl_Clanstvo SET Kontrolor='$selected_option' WHERE id=$ID");
                }

                // Query the database to get the current value of the Kontrolor field
                $result = mysqli_query($conn, "SELECT Kontrolor FROM tbl_Clanstvo where id=$ID");
                $row = mysqli_fetch_assoc($result);
                $current_value = $row['Kontrolor'];

                // Close the database connection
                mysqli_close($conn);
                ?>

                <div class="form-group">
                    <label for="Kontrolor"><b>To be a controller in the elections</b></label>
                    <select id="Kontrolor" class="form-control" name="Kontrolor">
                        <option value="">Choose...</option>
                        <option value="Yes" <?php if ($current_value == "Yes") echo "selected"; ?>>Yes</option>
                        <option value="No" <?php if ($current_value == "No") echo "selected"; ?>>No</option>
                        <option value="Has no opinion" <?php if ($current_value == "Has no opinion") echo "selected"; ?>>Has no opinion</option>
                    </select>
                </div><br>

                <?php
                // Connect to the database
                //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                include "dbh.php";

                // Check if the form has been submitted
                if (isset($_POST['submit'])) {
                    // Get the selected option from the dropdown
                    $selected_option = mysqli_real_escape_string($conn, $_POST['MarketingInternet']);

                    // Update the field in the tbl_Clanstvo table
                    mysqli_query($conn, "UPDATE tbl_Clanstvo SET MarketingInternet='$selected_option' WHERE id=$ID");
                }

                // Query the database to get the current value of the MarketingInternet field
                $result = mysqli_query($conn, "SELECT MarketingInternet FROM tbl_Clanstvo where id=$ID");
                $row = mysqli_fetch_assoc($result);
                $current_value = $row['MarketingInternet'];

                // Close the database connection
                mysqli_close($conn);
                ?>

                <div class="form-group">
                    <label for="MarketingInternet"><b>Do you want to work in Marketing or the Internet?</b></label>
                    <select id="MarketingInternet" class="form-control" name="MarketingInternet">
                        <option value="">Choose...</option>
                        <option value="Yes" <?php if ($current_value == "Yes") echo "selected"; ?>>Yes</option>
                        <option value="No" <?php if ($current_value == "No") echo "selected"; ?>>No</option>
                        <option value="Has no opinion" <?php if ($current_value == "Has no opinion") echo "selected"; ?>>Has no opinion</option>
                    </select>

                </div><br>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-outline-primary" href="lista.php" role="button">Cancel</a>
                </div>

            </div>


            <!-- Treća kolona -->
            <div class="col-md-6">
                <?php
                include "dbh.php";

                $ID = $_GET["ID"];

                // Provera konekcije
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // SQL upit za dobijanje podataka iz tbl_Pozivi za odabrani clanstvoid
                $sql_pozivi = "SELECT PozivID, ClanstvoID, datumrazgovora, sadrzajrazgovora, agent FROM tbl_Pozivi WHERE ClanstvoID=$ID";
                $result_pozivi = $conn->query($sql_pozivi);

                // Provera rezultata upita
                if ($result_pozivi->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead>
                        <tr>
                        <th>Date of the call</th>
                        <th>Content of the conversation</th>
                        <th>Callers name</th>
                        </tr>
                            </thead>";

                    echo "<tbody>";

                    // Prikazivanje podataka iz tbl_poziv u tabeli
                    while ($row_poziv = $result_pozivi->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>{$row_poziv['datumrazgovora']}</td>";
                        echo "<td>{$row_poziv['sadrzajrazgovora']}</td>";
                        echo "<td>{$row_poziv['agent']}</td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                }

                // Zatvaranje konekcije
                $conn->close();
                ?>

                <br><br><br>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid content-end">
                        <a type="button" class="btn btn-primary" href='poziv.php?ClanstvoID=<?= $ID ?>'>New Call</a>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>




    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">

    <!-- Bootstrap Multiselect CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Multiselect JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>



</body>

</html>