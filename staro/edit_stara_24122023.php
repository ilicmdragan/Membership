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
    $DatumRazgovora = "";
    $SadrzajRazgovora = "";
    $Agent = "";
    $DatumZakazanogRazgovora = "";
    $Novac = "";
    $OstalaPomoc = "";


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
        //$Datumrazgovora = $row["Datumrazgovora"];
        //$Sadrzajrazgovora = $row["Sadrzajrazgovora"];
        //$Osobakojavodirazgovor = $row["Osobakojavodirazgovor"];
        //$Datumzakazakonrazgovora = $row["Datumzakazanograzgovora"];
        $Novac = $row["Novac"];
        $OstalaPomoc = $row["OstalaPomoc"];
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
        //$Datumrazgovora = $POST["Datumrazgovora"];
        //$Sadrzajrazgovora = $POST["Sadrzajrazgovora"];
        //$Osobakojavodirazgovor = $POST["Osobakojavodirazgovor"];
        //$Datumzakazakonrazgovora = $POST["Datumzakazanograzgovora"];
        $Novac = $_POST["Novac"];
        $OstalaPomoc = $_POST["OstalaPomoc"];


        do {
            if (empty($ID) || empty($Ime) || empty($MobilniTelefon) || empty($Opstina) || empty($DatumAzuriranjaPodataka)) {
                $errorMessage = "Sva polja su obavezna";
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
                    Novac='$Novac',
                    OstalaPomoc='$OstalaPomoc'
                    
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
        <title>
            Ažuriranje
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
                <diV class="col-md-3">


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
                            <label for="Ime"><b>Ime</b></label>
                            <input type="text" class="form-control" name="Ime" value="<?php echo $Ime; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Prezime"><b>Prezime</b></label>
                            <input type="text" class="form-control" name="Prezime" value="<?php echo $Prezime; ?>">
                        </div>


                        <div class="form-group">
                            <label for="MobilniTelefon"> <b>Mobilni telefon</b></label>
                            <input type="text" class="form-control" name="MobilniTelefon" value="<?php echo $MobilniTelefon; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Email"><b>E-pošta</b></label>
                            <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                        </div>

                        <div class="form-group">
                            <label><b>Adresa</b></label>
                            <input type="text" class="form-control" name="Adresa" value="<?php echo $Adresa; ?>">
                        </div>

                        <div class="form-group">
                            <label><b>Poštanski broj i mesto</b></label>
                            <input type="text" class="form-control" name="MestoIPostanskiBroj" value="<?php echo $MestoIPostanskiBroj; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Opstina"><b>Opština</b></label>

                            <select id="Opstina" class="form-control" name="Opstina">

                                <?php
                                // Connect to the database
                                $conn = mysqli_connect('localhost', 'root', "", 'webdb');

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

                                ?>
                            </select>



                        </div>
                        <div class="form-group">
                            <label><b>Datum ažuriranja podataka</b></label>
                            <input type="date" class="form-control" name="DatumAzuriranjaPodataka" value="<?php echo $DatumAzuriranjaPodataka; ?>">

                        </div>

                        <div class="form-group">
                            <label><b>Broj članske karte</b></label>
                            <input type="number" class="form-control" name="BrojClanskeKarte" value="<?php echo $BrojClanskeKarte; ?>">
                        </div>


                        <div class="form-group">
                            <label><b>Datum odštampane članske karte</b></label>
                            <input type="date" class="form-control" name="DatumOdstampaneClanskeKarte" value="<?php echo $DatumOdstampaneClanskeKarte; ?>">
                        </div>

                        <div class="form-group">
                            <label><b>Datum odštampanog Imenovanja</b></label>
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
                </div>


                <!-- Druga kolona -->

                <div class="col-md-3">
                    <div class="form-group"><br>
                        <label for="PodrskaZaOsnivanjeStranke"><b>Podrška za osnivanje stranke</b></label>
                        <select id="PodrskaZaOsnivanjeStranke" class="form-control" name="PodrskaZaOsnivanjeStranke">
                            <option value="">Izaberi...</option>
                            <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                            <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                            <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
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

                    <div class="form-group">
                        <label for="Status"><b>Status</b></label>
                        <select id="Status" class="form-control" name="Status">
                            <option value="">Izaberi...</option>
                            <option value="Poverenik" <?php if ($current_value == "Poverenik") echo "selected"; ?>>Poverenik</option>
                            <option value="Član" <?php if ($current_value == "Član") echo "selected"; ?>>Član</option>
                            <option value="Simpatizer" <?php if ($current_value == "Simpatizer") echo "selected"; ?>>Simpatizer</option>
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

                    <label for="UcesceuPokretu"><b>Da aktivno učestvujem u radu Pokreta</b></label>
                    <select id="UcesceuPokretu" class="form-control" name="UcesceuPokretu">
                        <option value="">Izaberi...</option>
                        <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                        <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                        <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
                    </select><br>

                    <?php
                    // Connect to the database
                    //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                    include "dbh.php";

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $selected_option = mysqli_real_escape_string($conn, $_POST['OdbornikPoslanik']);

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET OdbornikPoslanik='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT OdbornikPoslanik FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['OdbornikPoslanik'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="form-group">
                        <label for="OdbornikPoslanik"><b>Da budem Odbornik ili Poslanik</b></label>
                        <select id="OdbornikPoslanik" class="form-control" name="OdbornikPoslanik">
                            <option value="">Izaberi...</option>
                            <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                            <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                            <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
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

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET Kontrolor='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT Kontrolor FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['Kontrolor'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="form-group">
                        <label for="Kontrolor"><b>Da budem kontrolor na izborima</b></label>
                        <select id="Kontrolor" class="form-control" name="Kontrolor">
                            <option value="">Izaberi...</option>
                            <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                            <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                            <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
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

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET MarketingInternet='$selected_option' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT MarketingInternet FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['MarketingInternet'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>

                    <div class="form-group">
                        <label for="MarketingInternet"><b>Da radite u Marketingu ili Internetu?</b></label>
                        <select id="MarketingInternet" class="form-control" name="MarketingInternet">
                            <option value="">Izaberi...</option>
                            <option value="Da" <?php if ($current_value == "Da") echo "selected"; ?>>Da</option>
                            <option value="Ne" <?php if ($current_value == "Ne") echo "selected"; ?>>Ne</option>
                            <option value="Ne želim da odgovorim" <?php if ($current_value == "Ne želim da odgovorim") echo "selected"; ?>>Ne želim da odgovorim</option>
                        </select>

                    </div><br>
                    <?php
                    // Connect to the database
                    //$conn = mysqli_connect('localhost', 'root', "", 'webdb');
                    include "dbh.php";

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the selected option from the dropdown
                        $is_checked = mysqli_real_escape_string($conn, $_POST['Novac']);

                        // Update the field in the tbl_clanstvo table
                        mysqli_query($conn, "UPDATE tbl_clanstvo SET Novac='1' WHERE id=$ID");
                    }

                    // Query the database to get the current value of the Status field
                    $result = mysqli_query($conn, "SELECT Novac FROM tbl_clanstvo where id=$ID");
                    $row = mysqli_fetch_assoc($result);
                    $current_value = $row['Novac'];

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                    <div class="form-group">
                        <label for="Novac"><b>Novac</b></label>
                        <input type="checkbox" class="custom-checkbox" name="Novac" value="1">
                    </div>
                    <div class="form-group">
                        <label for="OstalaPomoc"><b>Ostala pomoć</b></label>
                        <input type="text" class="form-control" name="OstalaPomoc" value="<?php echo $OstalaPomoc; ?>">
                    </div>


                    <div class=" row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Ažuriraj</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="lista.php" role="button">Otkaži</a>
                        </div>
                    </div>

                </div>
                <!-- Treća kolona -->

                <?php
                // Include your database connection file (dbh.php or similar)
                include 'dbh.php';
                $ClanstvoID = "";
                $DatumRazgovora = "";
                $SadrzajRazgovora = "";
                $Agent = "";
                $Datumzakazakonrazgovora = "";

                // Check if form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    // Get values from the form
                    $ClanstvoID = $_POST['ClanstvoID'];
                    $DatumRrazgovora = $_POST['DatumRazgovora'];
                    $SadrzajRazgovora = $_POST['SadrzajRazgovora'];
                    $Agent = $_POST['Agent'];
                    $DatumZakazanogRazgovora = $_POST['DatumZakazanogRazgovora'];

                    // dodaj novog člana
                    $sql = "INSERT INTO tbl_Clanstvo (ClanstvoID, DatumRazgovora, SadrzajRazgovora, Agent, DatumZakazanogRazgovora) " .
                        "VALUES ('$ID', '$DatumRazgovora', '$SadrzajRazgovora', '$Agent', '$DatumZakazanogRazgovora')";

                    $result = $conn->query($sql);

                    if (!$result) {

                        $errorMessage = "Invalid query:" . $conn->error;
                    }

                    $conn->close();
                    header("location: lista.php");
                    exit;
                }
                ?>

                <div class="col-md-3"><br>

                    <div class="form-group">
                        <label><b>Datum razgovora</b></label>
                        <input type="date" class="form-control" name="DatumRazgovora" value="<?php echo $DatumRazgovora; ?>">
                    </div>
                    <div class="form-group">
                        <label for="SadrzajRazgovora">Sadržaj razgovora</label>
                        <input type="text" class="form-control" name="SadrzajRazgovora" value="<?php echo $SadrzajRazgovora; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Agent">Osoba koja vodi razgovora</label>
                        <input type="text" class="form-control" name="Agent" value="<?php echo $Agent; ?>">
                    </div>
                    <div class="form-group">
                        <label for="DatumZakazanogRazgovora">Datum zakazanog razgovora</label>
                        <input type="text" class="form-control" name="DatumZakazanogRazgovora" value="<?php echo $DatumZakazanogRazgovora; ?>">
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

                    <div class=" row mb-3"><br>
                        <button type="submit" class="btn btn-primary">Novi poziv</button><br>
                        <a class="btn btn-outline-primary" href="lista.php" role="button">Otkaži</a>
                    </div>
                </div>

                <!-- Četvrta kolona -->
                <div class="col-md-3">
                    <h5>Tabela poziva</h5>

                    <!-- Popunite tabelu sa podacima iz tbl_poziv za odabranog člana -->
                    <?php
                    include "dbh.php";
                    $ID = $_GET["ID"];
                    // Provera konekcije
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // SQL upit za dobijanje podataka iz tbl_poziv za odabrani clanstvoid
                    $sql_pozivi = "SELECT PozivID, ClanstvoID, datumrazgovora, sadrzajrazgovora FROM tbl_pozivi WHERE ClanstvoID=$ID";
                    $result_pozivi = $conn->query($sql_pozivi);

                    // Provera rezultata upita
                    if ($result_pozivi->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<thead>
                                <tr>
                                <th>Datum razgovora</th>
                                <th>Sadržaj razgovora</th>
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Prikazivanje podataka iz tbl_poziv u tabeli
                        while ($row_poziv = $result_pozivi->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row_poziv['datumrazgovora']}</td>";
                            echo "<td>{$row_poziv['sadrzajrazgovora']}</td>";
                            echo "</tr>";
                        }

                        echo "</tbody>
                        </table>";
                    }

                    // Zatvaranje konekcije
                    $conn->close();
                    ?>

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>