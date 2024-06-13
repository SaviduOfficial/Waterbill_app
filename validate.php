<?php

use Hamcrest\Core\HasToString;

session_start();

include('dbOperations.php');
include('func.php');
$tabname = "userinfo";

$link = mysqli_connect('localhost', 'root', '', 'waterbills');
$proceed = false;

if (
    isset($_POST['regNow']) && !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['wtrbillnum'])
    && !empty($_POST['username']) && !empty($_POST['password'])
) {
    if (isset($_POST['chkbox'])) {
        $proceed = true;
    }
}

// Validation of fields

// Validation of email
if ($proceed == true) {
    $proceed = emailvalidate($_POST['email']);
}

// Validation of password
if ($proceed == true) {
    $proceed = passwordValidate($_POST['password']);
} else {
    echo "<br>email format error";
    exit();
}

// Validation of Water Bill Number
if ($proceed == true) {
    $proceed = waterbillnumValidate($_POST['wtrbillnum']);
} else {
    echo "<br>password format error";
    exit();
}


//Username validation procees become false when username is already exsist in the database
if ($proceed == true) {
    $proceed = usernameValidate($_POST['username'], $link, $tabname);
} else {
    echo "<br>Please Check the Water Bill Number Again";
    exit();
}

if ($proceed != true) {
    echo "<br>Username is already taken!, Try different username";
    exit();
}


//Assigning data to the database;
if ($proceed == true) {


    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    //register process inser data to the table userinfo:
    insertdata($link, $_POST);
    // save data to a database
    // create data tables  
}
