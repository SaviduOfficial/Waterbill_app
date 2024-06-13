<?php

session_start();

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payable</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500');

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



    * {
      margin: 0;
      box-sizing: border-box;

    }

    html {
      --card-color: #cacaca;
      --text-color: #e1e1e1;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: #DCDCF5;
    }



    .container {
      position: absolute;
      display: flex;
      flex-direction: row;
      align-items: center;
      margin: auto;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      width: 680px;

      .col1 {
        perspective: 1000;
        transform-style: preserve-3d;

        .card {
          position: relative;
          width: 420px;
          height: 250px;
          margin-bottom: 85px;
          margin-right: 10px;
          border-radius: 17px;
          box-shadow: 0 5px 20px -5px rgba(0, 0, 0, 0.1);
          transition: all 1s;
          transform-style: preserve-3d;
          background-image: url("WaterMeterArt.jpg");

          .front {
            position: absolute;
            background: var(--card-color);
            border-radius: 17px;
            padding: 50px;
            width: 100%;
            height: 100%;
            transform: translateZ(1px);
            -webkit-transform: translateZ(1px);
            transition: background 0.3s;
            z-index: 50;
            background-image: repeating-linear-gradient(45deg, rgba(255, 255, 255, 0) 1px, rgba(255, 255, 255, 0.03) 2px, rgba(255, 255, 255, 0.04) 3px, rgba(255, 255, 255, 0.05) 4px), -webkit-linear-gradient(-245deg, rgba(255, 255, 255, 0) 40%, rgba(255, 255, 255, 0.2) 70%, rgba(255, 255, 255, 0) 90%);
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;

            .type {
              position: absolute;
              width: 75px;
              height: 45px;
              top: 20px;
              right: 20px;

              img {
                width: 100%;
                float: right;
              }
            }

          }
        }
      }
    }


    .col2 {
      input {
        display: block;
        width: 260px;
        height: 30px;
        padding-left: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        margin: 7px;
        font-size: 17px;
        border-radius: 20px;
        background: rgba(0, 0, 0, 0.05);
        border: none;
        transition: background 0.5s;

        &:focus {
          outline-width: 0;
          background: rgba(31, 134, 252, 0.15);
          transition: background 0.5s;
        }
      }

      label {
        padding-left: 8px;
        font-size: 15px;
        color: darkslategray;
        font-weight: bold;
      }


      .btnSubmit {
        width: 260px;
        height: 50px;
        position: relative;
        display: block;
        margin: 20px auto;
        border-radius: 10px;
        border: none;
        background: #42C2DF;
        color: white;
        font-size: 20px;
        transition: background 0.4s;
        cursor: pointer;

        i {
          font-size: 20px;
        }

        &:hover {
          background: #3594A9;
          transition: background 0.4s;
        }
      }
    }

    .bimage {
      width: 100%;
      height: 102%;
      border-radius: 20px;
    }

    h4 {
      padding-top: 80px;
      text-align: center;
      font-weight: bold;
    }

    form {
      padding-bottom: 400px;
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
      <a href="superLogin.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
      <a href="superLogin.php" class="w3-bar-item w3-button w3-padding-large">Your Profile</a>
      <a href="payable.php" class="w3-bar-item w3-button w3-padding-large">Monthly Bill</a>
      <a href="History.php" class="w3-bar-item w3-button w3-padding-large">Energy Charge</a>
    </div>
  </div>


  <div class="form">

    <!-- FORM START -->
    <form action="AmountConfirm.php" method="POST">
      <div>
        <h4 class="h4"> Fill following details to calculate your payable</h4>
      </div>

      <div class="container">
        <div class="col1">
          <div class="card">
            <img class="bimage" src="WaterMeterArt.jpg" alt="Water Meter">
          </div>
        </div>
        <div class="col2">
          <label>Year</label>
          <input class="inputname" type="number" name="year" placeholder="YYYY" maxlength="4" minlength="4">
          <label>Month</label>
          <input class="inputname" type="number" name="month" placeholder="MM" maxlength="2" minlength="1">
          <label>Username</label>
          <input type="text" name="username" placeholder="<?php echo $username; ?>" />
          <label>Number of Units</label>
          <input type="text" name="units" placeholder="units" maxlength="6">
          <button class="btnSubmit" name="chkbtn">Check Payable</button>
        </div>
      </div>

    </form>


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