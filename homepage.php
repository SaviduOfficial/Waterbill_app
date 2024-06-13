<?php

session_start();
$username = $_SESSION['username'];

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // Redirect to login page if not logged in
  header("Location: login.php");
  exit();
}

// User is logged in
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Water Bill App</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Lato", sans-serif
    }

    .w3-bar,
    h1,
    button {
      font-family: "Montserrat", sans-serif
    }

    .fa-anchor,
    .fa-coffee {
      font-size: 200px
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Logout</a>
      <a href="homepage.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
      <a href="superLogin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Super User</a>
      <a href="payable.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Monthly Bill</a>
      <a href="History.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Usage History</a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="homepage.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
      <a href="superLogin.php" class="w3-bar-item w3-button w3-padding-large">Superuser</a>
      <a href="payable.php" class="w3-bar-item w3-button w3-padding-large">Monthly Bill</a>
      <a href="History.php" class="w3-bar-item w3-button w3-padding-large">Usage History</a>
    </div>
  </div>

  <!-- Header -->
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">WATER BILLS</h1>
    <p class="w3-xlarge">Hello! <?php echo $_SESSION['username']; ?> </p>
    <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top"><a href="payable.php"> BILL CALCULATOR </a> </button>
    <br>

  </header>

  <!-- First Grid -->
  <div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-twothird">

        <h1>Monthly Bill Calculator</h1>
        <h5 class="w3-padding-32"> The Monthly Bill tab and Bill calculator Button </h5>

        <p class="w3-text-grey">This web application is designed to measure and manage the water usage of each logged-in user.
          It features a "Monthly Bill" tab or a bill calculator button that directs users to a page where they can enter their username, the number of units consumed for a particular month, as well as the month and year.
          Upon submission, the application calculates the monthly payable amount and displays it on the next page. Users can then choose to confirm the amount or go back to make changes.
          If the user confirms, the application saves the data into the database. This streamlined process ensures users can easily track and manage their water usage and expenses accurately and efficiently.</p>
      </div>

      <div class="w3-third w3-center">
        <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
      </div>
    </div>
  </div>

  <!-- Second Grid -->
  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-third w3-center">
        <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
      </div>

      <div class="w3-twothird">
        <h1>Usage History</h1>
        <h5 class="w3-padding-32">Usage History tab.</h5>

        <p class="w3-text-grey">The "Usage History" tab in this web application directs logged-in users to a detailed record of their total water usage history.
          This feature provides users with a comprehensive overview of their past consumption, displaying data such as the number of units consumed,
          the month, the year, and the corresponding amount payable for each period. Additionally,
          the usage history page includes a table that outlines the rates per unit range,
          offering clear information on how the charges are calculated based on different levels of consumption. By accessing their usage history,
          users can track their water consumption patterns over time, identify trends,
          and make informed decisions about their water usage.
          This feature enhances the user experience by offering transparency and insights into their
          water consumption habits and the associated costs.</p>
      </div>
    </div>
  </div>

  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity">
    <div class="w3-xlarge w3-padding-32">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by E2240458</p>
  </footer>

  <script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

</body>

</html>