<?php

session_start();

include('func.php');


$username = $_SESSION['username'];

$proceed = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['submitYes'])) {
    $proceed = true;
  }
}



//accessing data as a table
$link = mysqli_connect('localhost', 'root', '', 'waterbills');

if (!$link) {
  die('Database connection error: ' . mysqli_connect_error());
}

$stmt = $link->prepare('SELECT username, month, year, units, amount FROM usageinfo  WHERE username=?;');


if (!$stmt) {
  die('Prepare error: ' . $link->error);
}

$stmt->bind_param('s', $username);

$stmt->execute();

//getting result
$result = $stmt->get_result();




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usage Amount</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

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


    body {
      background-color: #DCDCF5;
      font-family: "Roboto", helvetica, arial, sans-serif;
      font-size: 16px;
      font-weight: 400;
      text-rendering: optimizeLegibility;
    }

    div.table-title {
      display: block;
      margin-top: 70px;
      margin-left: 550px;
      max-width: 600px;
      padding-bottom: 5px;
      width: 100%;
    }

    .table-title h3 {
      color: #1b1e24;
      font-size: 30px;
      font-weight: 400;
      font-style: normal;
      font-family: "Roboto", helvetica, arial, sans-serif;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      /*text-transform:uppercase;*/
    }


    /*** Table Styles **/

    .table-fill {
      background: white;
      border-radius: 3px;
      border-collapse: collapse;
      height: 300px;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
      margin-bottom: 100px;
    }

    th {
      color: #D5DDE5;
      ;
      background: #1b1e24;
      border-bottom: 4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size: 18px;
      font-weight: 300;
      padding: 24px;
      text-align: left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align: middle;
    }

    th:first-child {
      border-top-left-radius: 3px;
    }

    th:last-child {
      border-top-right-radius: 3px;
      border-right: none;
    }

    tr {
      border-top: 1px solid #C1C3D1;
      border-bottom: 1px solid #C1C3D1;
      /* some happen*/
      color: #666B85;
      font-size: 16px;
      font-weight: normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }

    tr:hover td {
      background: #4E5066;
      color: #FFFFFF;
      border-top: 1px solid #22262e;
    }

    tr:first-child {
      border-top: none;
    }

    tr:last-child {
      border-bottom: none;
    }

    tr:nth-child(odd) td {
      background: #EBEBEB;
    }

    tr:nth-child(odd):hover td {
      background: #4E5066;
    }

    tr:last-child td:first-child {
      border-bottom-left-radius: 3px;
    }

    tr:last-child td:last-child {
      border-bottom-right-radius: 3px;
    }

    td {
      background: #FFFFFF;
      padding: 20px;
      text-align: left;
      vertical-align: middle;
      font-weight: 300;
      font-size: 14px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }

    td:last-child {
      border-right: 0px;
    }

    th.text-left {
      text-align: left;
    }

    th.text-center {
      text-align: center;
    }

    th.text-right {
      text-align: right;
    }

    td.text-left {
      text-align: left;
    }

    td.text-center {
      text-align: center;
    }

    td.text-right {
      text-align: right;
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
      <a href="superLogin.php" class="w3-bar-item w3-button w3-padding-large">Super User</a>
      <a href="payable.php" class="w3-bar-item w3-button w3-padding-large">Monthly Bill</a>
      <a href="History.php" class="w3-bar-item w3-button w3-padding-large">Usage History</a>
    </div>
  </div>


  <div class="table-title">
    <h3>Your Usage Amount</h3>
  </div>
  <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">Username</th>
        <th class="text-left">Year</th>
        <th class="text-left">Month</th>
        <th class="text-left">Unit</th>
        <th class="text-left">Amount</th>
      </tr>
    </thead>
    <tbody class="table-hover">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-left"><?php echo $row['username'] ?></td>
          <td class="text-left"><?php echo $row['year'] ?></td>
          <td class="text-left"><?php echo $row['month'] ?></td>
          <td class="text-left"><?php echo $row['units'] ?></td>
          <td class="text-left"><?php echo $row['amount'] ?></td>

        </tr>
      <?php
      }
      ?>

    </tbody>
  </table>
  <?php

  $stmt->close();


  ?>

  <?php
  //accessing rates as a table
  $newlink = mysqli_connect('localhost', 'root', '', 'waterbills');
  if (!$newlink) {
    die('Database connection error: ' . mysqli_connect_error());
  }


  $query = $newlink->prepare('SELECT consumption_per_month_kWh, energy_charge_lkr_kWh, fixed_charge_LKR_month FROM water_bill_units;');
  if (!$query) {
    die('Prepare error: ' . $newlink->error);
  }



  $query->execute();
  //getting result
  $result = $query->get_result();
  ?>



  <div class="table-title">
    <h3 style="margin-left: 50px;">Rates Table</h3>
  </div>
  <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">Consumption Per Month</th>
        <th class="text-left">Energy Charge (LKR/KWh)</th>
        <th class="text-left">Fixed Charge For Month (LKR)</th>

      </tr>
    </thead>
    <tbody class="table-hover">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-left"><?php echo $row['consumption_per_month_kWh'] ?></td>
          <td class="text-left"><?php echo $row['energy_charge_lkr_kWh'] ?></td>
          <td class="text-left"><?php echo $row['fixed_charge_LKR_month'] ?></td>
        </tr>
      <?php
      }
      ?>

    </tbody>
  </table>
  <?php

  $query->close();
  $newlink->close();

  ?>

  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
  </div>




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