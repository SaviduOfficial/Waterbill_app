<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WaterBill App</title>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #092756;
      background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
      background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
      background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
      background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
      background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
    }

    .wrapper {

      position: relative;
      max-width: 430px;
      width: 100%;
      background: #fff;
      padding: 34px;
      border-radius: 6px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .wrapper h2 {
      position: relative;
      font-size: 22px;
      font-weight: 600;
      color: #333;
    }

    .wrapper h2::before {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 28px;
      border-radius: 12px;
      background: #4070f4;
    }

    .wrapper form {
      margin-top: 30px;
    }

    .wrapper form .input-box {
      height: 52px;
      margin: 18px 0;
    }

    form .input-box input {
      height: 100%;
      width: 100%;
      outline: none;
      padding: 0 15px;
      font-size: 17px;
      font-weight: 400;
      color: #333;
      border: 1.5px solid #C7BEBE;
      border-bottom-width: 2.5px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .input-box input:focus,
    .input-box input:valid {
      border-color: #4070f4;
    }

    form .policy {
      display: fix;
      align-items: center;
    }

    form h3 {
      color: #707070;
      font-size: 14px;
      font-weight: 500;
      margin-left: 10px;
    }

    .input-box.button input {
      color: #fff;
      letter-spacing: 1px;
      border: none;
      background: #4070f4;
      cursor: pointer;
    }

    .input-box.button input:hover {
      background: #0e4bf1;
    }

    form .text h3 {
      color: #333;
      width: 100%;
      text-align: center;
    }

    form .text h3 a {
      color: #4070f4;
      text-decoration: none;
    }

    form .text h3 a:hover {
      text-decoration: underline;
    }


    .button-container {
      position: absolute;
      top: 10px;
      right: 15px;
      background-color: lightgrey;
      padding: 10px;
      border-radius: 20px;
    }


    .top-right-button {
      background-color: beige;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 5px 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!DOCTYPE html>

  <body>

    <div class="wrapper">
      <h2>Registration</h2>
      <form action="validate.php" method="POST"> <!-- Form Starts Here-->
        <div class="input-box">
          <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <input type="text" name="address" placeholder="Enter your address" required>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <input type="number" name="wtrbillnum" maxlength="6" placeholder="Enter your water bill number" required>
        </div>
        <div class="input-box">
          <input type="text" name="username" placeholder="Enter Prefered username" required>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Create password" required>


        </div>

        <div class="policy">
          <input name="chkbox" type="checkbox">
          <h3>I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
          <input name="regNow" type="Submit" value="Register Now">
        </div>
        <div class="text">
          <h3>Already have an account? <a href="login.php">Login now</a></h3>


        </div>
      </form>
    </div>
    <div class="button-container">
      <button class="top-right-button"><a href="superLogin.php">Login As a Super User</a></button>
    </div>
  </body>

</html>
</body>

</html>