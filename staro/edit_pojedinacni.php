<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_novi.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <h1>Ažurirajte podatke za člana <i>___ime___ ___prezime___</i></h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3  bg-light">
                    <label for="timestamp"><i class="fa fa-user"></i> Timestamp</label>
                    <input type="text" id="timestamp" name="Timestamp"><br>

                    <label for="ime"><i class="fa fa-envelope"></i> Ime</label>
                    <input type="text" id="ime" name="ime"><br>

                    <label for="prezime"><i class="fa fa-address-card-o"></i> Prezime</label>
                    <input type="text" id="prezime" name="prezime"><br>

                    <label for="mobilnitelefon"><i class="fa fa-institution"></i> Mobilni telefon</label>
                    <input type="text" id="mobilnitelefon" name="mobilnitelefon"><br>

                    <label for="eposta"><i class="fa fa-envelope"></i> E-pošta</label>
                    <input type="text" id="eposta" name="eposta"><br>

                    <label for="adresa"><i class="fa fa-address-card-o"></i> Adresa</label>
                    <input type="text" id="adresa" name="adresa"><br>

                    <label for="postanskibrojimesto"><i class="fa fa-institution"></i> Poštanski broj i mesto</label>
                    <input type="text" id="postanskibrojimesto" name="postanskibrojimesto"><br>

                    <div class="form-group">
                        <label for="opstina">Opština:</label>
                        <select class="form-control" id="opstina">

                            <!-- Retrieve data from the tbl_Opstina table and populate the dropdown options -->
                            <?php
                            include "dbh.php";
                            $sql = "SELECT id, naziv_opstine FROM tbl_Opstina";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['naziv_opstine'] . ")</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="myFunction()">Unesi broj članske karte</button>

                    <script>
                        function myFunction() {
                            document.getElementById("brojclanskekarte").style.color = "red";
                        }
                    </script>

                    <label for="brojclanskekarte"><i class="fa fa-institution"></i> Broj članske karte</label>
                    <input type="text" id="brojclanskekarte" name="brojclanskekarte" placeholder="Klikom na dugme automatski se unosi poslednji broj članske karte"><br>

                    <label for="datumodstampaneclanskekarte"><i class="fa fa-institution"></i> Datum odštampane članske
                        karte</label>
                    <input type="date" id="datumodstampaneclanskekarte" name="datumodstampaneclanskekarte"><br>

                    <label for="datumplacanjaclanarine"><i class="fa fa-institution"></i> Datum plaćanja članarine</label>
                    <input type="date" id="datumplacanjaclanarine" name="datumplacanjaclanarine"><br>

                    <label for="datumodstampanogimenovanja"><i class="fa fa-institution"></i> Datum odštampanog imenovanja</label>
                    <input type="date" id="datumodstampanogimenovanja" name="datumodstampanogimenovanja"><br>
                </div>

                <div class="col-sm-3 bg-light">

                    <div class="form-group">
                        <label for="osnivanjestranke">Podrška za osnivanje
                            stranke</label>
                        <select class="form-control" id="osnivanjestranke">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="da">Da</option>
                            <option value="ne">Ne</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pomoc">Na koji način bi ste mogli da pomognete</label>
                        <select class="form-control" id="pomoc">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="da">Da</option>
                            <option value="ne">Ne</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="opstinaSelect">Poverenik za opštine:</label>
                        <select multiple class="custom-dropdown" id="opstinaSelect">
                            <?php
                            //Connect to the database
                            include "dbh.php";

                            //--Query the tbl_Opstina table--
                            $result = mysqli_query($conn, 'SELECT OpstinaID, naziv_opstine FROM tbl_Opstina');

                            //--Iterate through the result and create an option element for each row-->
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['naziv_opstine'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="radupokretu">Da aktivno učestvujem u radu Pokreta</label>
                        <select class="form-control" id="radupokretu">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="da">Da</option>
                            <option value="ne">Ne</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="odbornikposlanik">Da budem Odbornik/Poslanik</label>
                        <select class="form-control" id="odbornikposlanik">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="da">Da</option>
                            <option value="ne">Ne</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kontrolor">Da budem kontrolor na izborima</label>
                        <select class="form-control" id="kontrolor">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="da">Da</option>
                            <option value="ne">Ne</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>
                    <label for="imeosobekojameuputila"><i class="fa fa-envelope"></i> Ime osobe koja me uputila na anketu:</label>
                    <input type="text" id="imeosobekojameuputila" name="imeosobekojameuputila"><br>

                    <label for="zanimanje"><i class="fa fa-address-card-o"></i> Zanimanje</label>
                    <input type="text" id="adr" name="address" placeholder="Pravnik, Ekonomista, Inženjer, Vozač, Tehničar,..."><br>

                    <div class="form-group">
                        <label for="pol">Pol</label>
                        <select class="form-control" id="pol">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="zenski">Ženski</option>
                            <option value="muski">Muški</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="marketinginternet">Da li želite da radite u Marketing ili Internet timu:</label>
                        <select class="form-control" id="marketinginternet">
                            <option value="" disabled selected>Izaberi...</option>
                            <option value="marketing">Marketing</option>
                            <option value="internet">Internet</option>
                            <option value="nezelimdaodgovorim">Ne želim da odgovorim</option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-3  bg-white">
                    <label for="DatumRazgovora">Datum razgovora</label>
                    <input type="datetime-local" id="datrazg" name="datrazg"><br><br>
                    <label for="SadrzajRazgovora">Sadržaj razgovora</label-->
                        <input type="text" id="sadrazg" name="sadrazg">
                        <label for="sadraz">Sadržaj razgovora</label>
                        <textarea id="sadrazg" name="sadraz" rows="10" cols="47"></textarea><br><br>
                        <label for="osorazg">Osoba koja vodi razgovor</label>
                        <input type="text" id="osorazg" name="osorazg">
                        <label for="datzakrazg">Datum zakazanog razgovora</label>
                        <input type="datetime-local" id="datzakrazg" name="datzakrazg">
                </div>
                <div class="col-sm-3  bg-light">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Datum razgovora</th>
                                <th scope="col">Sadržaj razgovora</th>
                                <th scope="col">Osoba koja vodi razgovor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Date of conversation</td>
                                <td>Content of conversation</td>
                                <td>Person conducting conversation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>