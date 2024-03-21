<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Region Of Serbia</title>

  <!-- Include the navbar -->
  <div id="navbar-container">
    <!-- Use server-side includes, PHP, or other templating methods to include the navbar -->
    <!-- Example using PHP include: -->
    <?php include "navbar.html"; ?>
  </div>


  <style>
    body {
      margin: 0;
      /* Remove default margin */
      padding: 0;
      /* Remove default padding */
    }

    img {
      width: 50%;
      /* Set the width to 50% of the parent container */
      height: auto;
      /* Maintain the aspect ratio */
      display: flex;
      /* Remove extra space below inline images */

      align-items: center;
    }

    h1 {
      text-align: center;
      /* Center text within the h1 element */
    }
  </style>
</head>

<body>
  <!-- Your page content goes here -->
  <br>
  <h1> Regions Of Serbia</h1>
  <br>

  <div class="container">

    <div class="row">
      <!-- Prva kolona -->
      <div class="col-md-10">

        <img src="slike_ikone/Regioni Srbije png.png">


      </div>
      <!-- Druga kolona -->
      <div class="col-md-2">
        <div class="weather-widget" id="weather-widget">
          Weather data will be inserted here
        </div>
      </div>

    </div>
  </div>


  <script src="script.js"></script>
  <!-- Bootstrap JS and Popper.js required for dropdown functionality -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>


</body>

</html>