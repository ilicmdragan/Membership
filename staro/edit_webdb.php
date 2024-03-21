<?php

//include "dbh.php";
$conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");


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
$Pomoc = "";
$UcesceuPokretu = "";


$errorMessage = "";
$successMessage = "";



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client
    //echo $isset($_GET["ID"]);
    //if ($isset($_GET["ID"])) {
    //header("location: dropdownbox.html");
    //exit;
    //}


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
    $Pomoc = $row["Pomoc"];
    $UcesceuPokretu = $row["UcesceuPokretu"];
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
    $Pomoc = $_POST["Pomoc"];
    $UcesceuPokretu = $_POST["UcesceuPokretu"];


    do {
        if (empty($ID) || empty($Ime) || empty($MobilniTelefon) || empty($Opstina) || empty($DatumAzuriranjaPodataka)) {
            $errorMessage = "Sva polja su obavezna";
            break;
        }

        // izmeni podatke za clana
        $sql = "UPDATE tbl_Clanstvo SET 
                ime='$Ime',
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
                Pomoc ='$Pomoc',
                UcesceuPokretu ='$UcesceuPokretu'
                
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
    <title>
        Ažuriranje
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">




</head>

<body>

    <div class="container-fluid">

        <h2>Ažuriraj podatke za člana </h2><br>

        <div class="row">

            <div class="col-sm-6 bg-light">

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


                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Ime</b></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="Ime" value="<?php echo $Ime; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Prezime</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="Prezime" value="<?php echo $Prezime; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Mobilni telefon</b></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="MobilniTelefon" value="<?php echo $MobilniTelefon; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>E-pošta</b></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Adresa</b></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="Adresa" value="<?php echo $Adresa; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Poštanski broj i mesto</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="MestoIPostanskiBroj" value="<?php echo $MestoIPostanskiBroj; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label" for="Opstina"><b>Opština</b></label>
                        <div class="col-sm-3">
                            <select id="Opstina" class="form-control" name="Opstina">

                                <?php
                                // Connect to the database
                                $conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");

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

                                    // Update the field in the tbl_clanstvo table
                                    mysqli_query($conn, "UPDATE tbl_clanstvo SET Opstina='$selected_option' WHERE id=$ID");
                                }

                                // Query the database to get the current value of the Opstina field
                                $result = mysqli_query($conn, "SELECT Opstina FROM tbl_clanstvo WHERE id=$ID");
                                $row = mysqli_fetch_assoc($result);
                                $current_value = $row['Opstina'];




                                // Check if the form has been submitted
                                if (isset($_POST['submit'])) {
                                    // Get the selected option from the dropdown
                                    $selected_option = mysqli_real_escape_string($conn, $_POST['PodrskaZaOsnivanjeStranke']);


                                    // Update the field in the tbl_clanstvo table
                                    mysqli_query($conn, "UPDATE tbl_clanstvo SET PodrskaZaOsnivanjeStranke='$selected_option' WHERE id=$ID");
                                }

                                // Query the database to get the current value of the PodrskaZaStranku field
                                $result = mysqli_query($conn, "SELECT PodrskaZaOsnivanjeStranke FROM tbl_clanstvo where id=$ID");
                                $row = mysqli_fetch_assoc($result);
                                $current_value = $row['PodrskaZaOsnivanjeStranke'];

                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Datum ažuriranja podataka</b></label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="DatumAzuriranjaPodataka" value="<?php echo $DatumAzuriranjaPodataka; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Broj članske karte</b></label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="BrojClanskeKarte" value="<?php echo $BrojClanskeKarte; ?>">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Datum odštampane članske karte</b></label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="DatumOdstampaneClanskeKarte" value="<?php echo $DatumOdstampaneClanskeKarte; ?>">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label"><b>Datum odštampanog Imenovanja</b></label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="DatumOdstampanogImenovanja" value="<?php echo $DatumOdstampanogImenovanja; ?>">
                        </div>
                    </div>
                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['PodrskaZaOsnivanjeStranke']);


                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET PodrskaZaOsnivanjeStranke='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the PodrskaZaStranku field
                    $result = mysqli_query($conn, "SELECT PodrskaZaOsnivanjeStranke FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['PodrskaZaOsnivanjeStranke'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label" for="PodrskaZaOsnivanjeStranke"><b>Podrška za osnivanje stranke</b></label>
                        <div class="col-sm-3">
                            <select id="PodrskaZaOsnivanjeStranke" class="form-control" name="PodrskaZaOsnivanjeStranke">
                                <option value="">Izaberi...</option>
                                <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                                <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                                <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
                            </select>
                        </div>
                    </div>

                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['Status']);

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET Status='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT Status FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['Status'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label" for="Status"><b>Status</b></label>
                        <div class="col-sm-3">
                            <select id="Status" class="form-control" name="Status">
                                <option value="">Izaberi...</option>
                                <option value="Poverenik" <?php if ($current_value == "Poverenik") echo "selected"; ?>>Poverenik</option>
                                <option value="Član" <?php if ($current_value == "Član") echo "selected"; ?>>Član</option>
                                <option value="Simpatizer" <?php if ($current_value == "Simpatizer") echo "selected"; ?>>Simpatizer</option>
                            </select>
                        </div>
                    </div><br>

                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['Pomoc']);

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET Pomoc='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT Pomoc FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['Pomoc'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label" for="Pomoc"><b>Na koji način bi ste mogli da pomognete</b></label>
                        <div class="col-sm-3">
                            <select id="Pomoc" class="form-control" name="Pomoc">
                                <option value="">Izaberi...</option>
                                <option value="Prostorije za kancelarije" <?php if ($current_value == "Prostorije za kancelarije") echo "selected"; ?>>Prostorije za kancelarije</option>
                                <option value="Novac" <?php if ($current_value == "Novac") echo "selected"; ?>>Novac</option>
                                <option value="Vozilo" <?php if ($current_value == "Vozilo") echo "selected"; ?>>Vozilo</option>
                                <option value="Gorivo" <?php if ($current_value == "Gorivo") echo "selected"; ?>>Gorivo</option>
                                <option value="Kancelarijski materijal" <?php if ($current_value == "Kancelarijski materijal") echo "selected"; ?>>Kancelarijski materijal</option>
                            </select>
                        </div>
                    </div><br>

                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "dba", "G#Zi2ts6rAjzk_9p", "webdb");

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['UcesceuPokretu']);

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET UcesceuPokretu='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT UcesceuPokretu FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['UcesceuPokretu'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="row mb-1">
                        <label class="col-sm-3 col-form-label" for="UcesceuPokretu"><b>Da aktivno učestvujem u radu Pokreta</b></label>
                        <div class="col-sm-3">
                            <select id="UcesceuPokretu" class="form-control" name="UcesceuPokretu">
                                <option value="">Izaberi...</option>
                                <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                                <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                                <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
                            </select>
                        </div>
                    </div><br>





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
                    <div class=" row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Ažuriraj</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="lista.php" role="button">Otkaži</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-3  bg-white">



            </div>

            <div class="col-sm-3  bg-light">



            </div>
        </div>
    </div>

</body>

</html>