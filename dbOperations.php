<?php

//inserting new data
function insertdata($link, $data)
{

    $arraydata = array();
    foreach ($data as $x => $y) {
        if ($x == 'name' || $x == 'address' || $x == 'email' || $x == 'wtrbillnum' || $x == 'username' || $x == 'password') {
            $arraydata[] = $y;
        }
    }

    try {

        //  Prepare the SQL statement
        $query = $link->prepare("INSERT INTO userinfo (name, address, email, wtrbillnum, username, passwords) VALUES (?,?,?,?,?,?);");

        // Check if preparation was successful
        if ($query === false) {
            die("Prepare failed: " . $link->error);
        }

        $query->bind_param("sssiss", $arraydata[0], $arraydata[1], $arraydata[2], $arraydata[3], $arraydata[4], $arraydata[5]);

        if ($query->execute()) {
            echo "New record created successfully";
            $query->close();
            $link->close();
            header('location: login.php');
        } else {
            echo "Error: " . $query->error;
        }

        // Close the connection
        $query->close();
        $link->close();
    } catch (Exception $e) {
        echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";
    }
}


// useage data insert
/*
function insertusagedata($username, $month, $year, $units, $amount){
    $link = mysqli_connect('localhost', 'root', '', 'waterbills');

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    try{
        $query = $link->prepare('INSERT INTO usageinfo (username, month, year, units, amount) VALUES (?, ?, ?, ?, ?);');
    
        // Assuming $year, $units, and $amount are integers and $username, $month are strings
        $query->bind_param('sssid', $username, $month, $year, $units, $amount);
        
        $query->execute();
        $query->close();
        $link->close();

    } catch (Exception $e) {
        echo "<br> <h3> Error: " . $e->getMessage() . " </h3>";    
    }
}*/
