<?php

session_start();
$proceed = false;

include('func.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $proceed = true;
  $password = $_POST['password'];
  $username = $_POST['username'];
}



//db connetion data
$link = mysqli_connect('localhost', 'root', '', 'waterbills');
$tabname = 'super_user';


if ($proceed == true) {
  if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']) && passwordValidate($password) && !usernameValidate($username, $link, $tabname)) {
    $proceed = true;
  } else {
    $proceed = false;
  }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Super User</title>
  <style>
    @import url('https://rsms.me/inter/inter-ui.css');

    body {
      background: #2D2F36;
      font-size: 16px;
      font-family: monospace;

    }

    .heading {
      color: wheat;
    }

    .container {
      box-sizing: border-box;
      border: 1px solid black;
      /* Specified a solid border for better visibility */
      position: absolute;
      height: 300px;
      width: 700px;
      background-color: beige;
      margin-left: 300px;
      margin-top: 60px;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;

    }

    .formcls {
      position: absolute;
      margin-right: 230px;
      margin-top: 70px;


    }

    .rate_container {
      margin-top: 20px;
    }

    .rate {
      margin-bottom: 20px;
    }


    .selectbtn {
      position: absolute;
      z-index: 10;
      width: 168px;
      height: 28px;
      border: 1px solid #000;
      border-radius: 5px;
      margin-left: 20px;
    }


    .rate {
      margin-top: 25px;
      position: absolute;
      z-index: 10;
      width: 168px;
      height: 34px;
      border: 1px solid #000;
      border-radius: 5px;

    }

    .btnsub {
      margin-top: 15px;
      height: 30px;
      width: 100px;
      background-color: lightgray;
      border: #000;
      border-radius: 5px;
      box-sizing: border-box;
      border: 1px solid black;
    }


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


  <h2 class="heading">Super User Account</h2>
</head>

<body>
  <div class="container">
    <h3>Select The Range From the DropDown</h3>

    <form class="formcls" action="ratechangeValidate.php" method="post">
      <label for=""> Please Select Range which you need to change :</label>
      <select class="selectbtn" name="option">
        <option value="0"> Please Select -- </option>
        <option value="1"> 0- 60 </option>
        <option value="2"> 61- 90 </option>
        <option value="3"> 91- 120 </option>
        <option value="4"> 121- 180 </option>
        <option value="5"> Over 180 </option>
      </select>
      <br>
      <div class="rate_container">
        <label for=""> Enter New Rate: </label>
        <input class="newrate" type="number" name="newRate">
      </div>
      <div>
        <button class="btnsub" name="submit">SUBMIT</button>
      </div>

    </form>

  </div>






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
    <h3 style="margin-left: 600px; margin-top: 500px; color:wheat">Rates Table</h3>
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








</body>

</html>