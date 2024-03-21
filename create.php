<?php
include "dbh.php";
$ClanstvoID = "";
$Ime = "";
$Prezime = "";
$MobilniTelefon = "";
$MestoIPostanskiBroj = "";
$Opstina = "";
$Adresa = "";
$SifraOpstine = "";
$DatumAzuriranjaPodataka = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ClanstvoID = $_POST["ClanstvoID"];
    $Ime = $_POST["Ime"];
    $Prezime = $_POST["Prezime"];
    $MobilniTelefon = $_POST["MobilniTelefon"];
    $MestoIPostanskiBroj = $_POST["MestoIPostanskiBroj"];
    $Opstina = $_POST["Opstina"];
    $Adresa = $_POST["Adresa"];
    $SifraOpstine = $_POST["SifraOpstine"];
    $DatumAzuriranjaPodataka = $_POST["DatumAzuriranjaPodataka"];


    do {
        if (empty($Ime) || empty($Prezime) || empty($MobilniTelefon) || empty($MestoIPostanskiBroj) || empty($Opstina) || empty($Adresa) || empty($SifraOpstine) || empty($DatumAzuriranjaPodataka)) {
            $errorMessage = "Sva polja su obavezna";
            break;
        }

        // dodaj novog člana
        $sql = "insert into tbl_Clanstvo (Ime, Prezime, MobilniTelefon, MestoIPostanskiBroj, Opstina, Adresa, SifraOpstine, DatumAzuriranjaPodataka)" .
            "values ('$Ime','$Prezime','$MobilniTelefon','$MestoIPostanskiBroj','$Opstina','$Adresa','$SifraOpstine','$DatumAzuriranjaPodataka')";
        $result = $conn->query($sql);

        if (!$result) {

            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $ClanstvoID = "";
        $Ime = "";
        $Prezime = "";
        $MobilniTelefon = "";
        $MestoIPostanskiBroj = "";
        $Opstina = "";
        $Adresa = "";
        $SifraOpstine = "";
        $DatumAzuriranjaPodataka = "";


        $successMessage = "Uspešno dodat novi član.";

        header("location: lista.php");
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
    <title>Add New Member</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-3">
        <h2>Add New Member</h2>

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
                <label class="col-sm-3 col-form-label">First name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Ime" value="<?php echo $Ime; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Prezime" value="<?php echo $Prezime; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mobile phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="MobilniTelefon" value="<?php echo $MobilniTelefon; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">City & Postal code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="MestoIPostanskiBroj" value="<?php echo $MestoIPostanskiBroj; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Municipality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Opstina" value="<?php echo $Opstina; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Adresa" value="<?php echo $Adresa; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Municipality code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="SifraOpstine" value="<?php echo $SifraOpstine; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="DatumAzuriranjaPodataka" value="<?php echo $DatumAzuriranjaPodataka; ?>">
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
                    <button type="submit" class="btn btn-primary">Add New Member</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="lista.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>