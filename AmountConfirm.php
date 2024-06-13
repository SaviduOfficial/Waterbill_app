<?php

use LDAP\Result;

session_start();
//ob_start();



include('func.php');
$username = $_SESSION['username'];
$proceed = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  if (
    isset($_POST['chkbtn']) &&
    !empty($_POST['year']) &&
    !empty($_POST['month']) &&
    !empty($_POST['username']) &&
    !empty($_POST['units'])
  ) {
    $proceed = true;
  } else {
    $proceed = false;
  }
}

if ($proceed == true) {
  if (yearValidate($_POST['year']) == true && monthValidate($_POST['month']) == true && unitValidate($_POST['units']) == true) {
    if ($username == $_POST['username']) {
      $proceed = true;
      $year = $_POST['year'];
      $month = $_POST['month'];
      $units = $_POST['units'];
    } else {
      $proceed = false;
      echo '<script type ="text/JavaScript">';
      echo 'alert("Invalid Username!")';
      echo '</script>';
    }
  } else {
    $proceed = false;
    echo '<script type ="text/JavaScript">';
    echo 'alert("Somehing went wrong please Check the fields Again!")';
    echo '</script>';
  }
}



// assigning data to Session variables
if ($proceed == true) {
 


  $units = $_POST['units'];
  //calculating amount
  $amount = unitUsage($units);

  $year = $_POST['year'];
  $month = $_POST['month'];

  $_SESSION['year'] = $year;

  $_SESSION['month'] = $month;

  $_SESSION['units'] = $units;

  $_SESSION['amount'] = $amount;

  //UnitUsage function also create a Session variable and assign the fix-charge to it

} else {
  echo '<script type ="text/JavaScript">';
  echo 'alert("it worked")';
  echo '</script>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>


  <style>
    body {
      background-color: darkslategray;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      margin: auto;
      margin-top: 50px;
      box-sizing: border-box;
      background-color: black;
      align-items: center;
      padding: 30px 30px;
      border-radius: 0.5rem;
      width: 450px;
      height: 300px;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    .container h4 {
      margin: 0;
      padding: 0;
      color: white;
      font-weight: 400;
      font-size: 18px;
    }

    .container p {
      color: white;
      font-weight: 400;
      font-size: 18px;
    }

    .btn1 {
      margin: 10px;
      margin-top: 50px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn2 {
      margin: 30px;
      margin-top: 50px;
      padding: 10px 22px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 12px;
    }

    .btn1 {
      background-color: green;
      color: white;
    }

    .btn2 {
      background-color: green;
      color: white;
      font-family: Arial, Helvetica, sans-serif;
      text-decoration: none;
      line-height: 50px;
      font-size: 22px;
      /* Center the text vertically */
    }


    div.table-title {
      display: block;
      margin-top: 70px;
      margin-left: 600px;
      max-width: 600px;
      padding-bottom: 5px;
      width: 100%;
    }

    .table-title h3 {
      color: white;
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


    .rates_table {
      box-sizing: border-box;
      margin-left: 200px;
      margin-top: 200px;
      background-color: white;
      padding: 500px, 400px;

    }
  </style>
</head>

<body>
  <br><br>
  

  <?php

  //ob_clean();

  $year = $_SESSION['year'];
  $month = $_SESSION['month'];
  $units = $_SESSION['units'];
  $amount = $_SESSION['amount'];
  $username = $_SESSION['username'];



  //UnitUsage function also create a Session variable and assign the fix charge to it
  $FixedCharge = $_SESSION['FixedCharge'];

  $vat = 0.18;
  //amount with vat
  $amountwithVat = (($amount + $FixedCharge) * $vat);

  //final values

  $Funits = $units;
  $Famount = $amount + $FixedCharge + $amountwithVat;

 


?>

  <div class="container">
  <h4>
    <?php echo "Your Amount Payable is : Rs. " . $Famount; ?>
  </h4>
  <p>
    

  </p>
  <div class=" btn1">
 
    <a href="payable.php" class="btn2">Continue</a>
  </div>
</div>


<?php
  // inserting data into database
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($proceed == true) {
      try {

        $link = mysqli_connect('localhost', 'root', '', 'waterbills');

        $query = $link->prepare('INSERT INTO usageinfo(username, month, year, units, amount) VALUES(?,?,?,?,?);');

        $query->bind_param('sssid', $username, $month, $year, $Funits, $Famount);
        $query->execute();

        $query->close();

        $link->close();

      } catch (Exception $e) {
        echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";
      }

      //header('location: History.php');
    }
  }
  

  // assinging unit usages and amount usages
  
  $myarray = array();
  $amountArray = array();
  $count = 0;

  while ($units > 0) {

    $myarray[$count] = usageAssign($units);
    $amountArray[$count] = ammountAssign($units);
    $units = $_SESSION['units'];
    

    $count++;
  }



  //accessing rates as a table
  $newlink = mysqli_connect('localhost', 'root', '', 'waterbills');
  if (!$newlink) {
    die('Database connection error: ' . mysqli_connect_error());
  }


  $stmt = $newlink->prepare('SELECT consumption_per_month_kWh, energy_charge_lkr_kWh, fixed_charge_LKR_month FROM water_bill_units;');
  if (!$stmt) {
    die('Prepare error: ' . $newlink->error);
  }



  $stmt->execute();
  //getting result
  $result = $stmt->get_result();

  ?>



  <div class="table-title">
    <h3>Rates Table</h3>
  </div>
  <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">Consumption Per Month</th>
        <th class="text-left">Energy Charge (LKR/KWh)</th>
        <th class="text-left">Consumption of the Customer (KWh)</th>
        <th class="text-left">Charge (LKR)</th>


      </tr>
    </thead>
    <tbody class="table-hover">
      <?php

      while ($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-left"><?php echo $row['consumption_per_month_kWh'] ?></td>
          <td class="text-left"><?php echo $row['energy_charge_lkr_kWh'] ?></td>
          <td class="text-left"><?php echo $myarray[$count - 1] ?></td>
          <td class="text-left"><?php echo $amountArray[$count - 1] ?></td>
        <?php
        $count -= 1;
        if ($count == 0) {
          break;
        }
      }

        ?>
        </tr>

        <tr>
          <td colspan="3" style="text-align: center;">The monthly charge for <?php echo $Funits ?> units</td>
          <td><?php echo $amount ?></td>
        <tr>
        <tr></tr>

        <tr>
          <td colspan="3" style="text-align: center;">The monthly charge for <?php echo $Funits ?> units with Fixed Charge</td>
          <td><?php echo $Famount + $FixedCharge ?></td>
        </tr>

        <tr>
          <td colspan="3" style="text-align: center;"> VAT(18%) </td>
          <td><?php echo $amountwithVat ?></td>
        <tr>
        <tr></tr>
        <tr>
          <td colspan="3" style="text-align: center;">Final Bill</td>
          <td><?php echo $Famount  ?></td>
        </tr>


    </tbody>
  </table>
  <?php
  /*
  $stmt->close();
  $newlink->close();
*/
  ?>

</body>

</html>