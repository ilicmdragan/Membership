<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/icon type" href="slike_ikone/logo.png" />
	<title>Membership</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">



</head>

<body>
	<!-- Include the navbar -->
	<div id="navbar-container">
		<!-- Use server-side includes, PHP, or other templating methods to include the navbar -->
		<!-- Example using PHP include: -->
		<?php include "navbar.html"; ?>
		<br><br>
		<div class="container">
			<style>
				h1 {
					text-align: center;
				}
			</style>
			<h1>List of commisioners, members and sympathizers</h1>
			<!--<a class="btn btn-primary" href="create.php" role="button">Dodaj novog člana</a>-->

			<br><br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Mobile phone</th>
						<th>Email</th>
						<th>City & Postal code</th>
						<th>Municipality</th>
						<th>Address</th>
						<th>Date</th>
						<th>Status</th>

					</tr>
				</thead>
				<tbody>
					<?php
					include "dbh.php";

					$ID = "";

					// read all rows from database table
					$sql = "SELECT * FROM tbl_Clanstvo";
					$result = $conn->query($sql);

					if (!$result) {
						die("Invalid query: " . $conn->error);
					}

					//read data of each row
					while ($row = $result->fetch_assoc()) {
						echo "
					<tr>
						<td>$row[ID]</td>
						<td>$row[Ime]</td>	
						<td>$row[Prezime]</td>
						<td>$row[MobilniTelefon]</td>
						<td>$row[Email]</td>
						<td>$row[MestoIPostanskiBroj]</td>
						<td>$row[Opstina]</td>
						<td>$row[Adresa]</td>
						<td>$row[DatumAzuriranjaPodataka]</td>
						<td>$row[Status]</td>
						<td>
						<a class='btn btn-primary btn-sm' href='edit.php?ID=$row[ID]'>Izmeni</a>
						</td>
						          				
					</tr>
						";
					}
					?>

				</tbody>
			</table>


		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>