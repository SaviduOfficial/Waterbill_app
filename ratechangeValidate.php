<?php


session_start();
$proceed = false;

include('func.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proceed = true;
}

if ($proceed == true) {
    if (isset($_POST['submit']) && !empty($_POST['option']) && !empty($_POST['newRate'])) {
        $proceed = true;
        $range = $_POST['option'];
        $charge = $_POST['newRate'];
    } else {
        $proceed = false;
    }
}

if ($proceed == true) {
    try {
        $proceed = changeCharge($range, $charge);

        if ($proceed == true) {
            $_SERVER['rate_change'] = "Rate changed to $charge";

            header('location: superuser.php');
        } else {
            $proceed = false;
        }
    } catch (Exception $e) {
        echo '<h3> Error : ' . $e->getMessage() . '</h3>';
        $proceed = false;
    }
}
