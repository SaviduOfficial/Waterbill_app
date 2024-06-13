<?php

$proceed = false;

$year = $_SESSION['year'];
$month = $_SESSION['month'];
$username = $_SESSION['username'];
$Fixedcharge = $_SERVER['FixedCharge'];

$units = $_SERVER['Funits'];
$totalAmount =$_SERVER['Famount'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $proceed = true;

}

if($proceed == true){  
      if(isset($_POST['submitYes'])){
         $proceed = true;
      }else{
        $proceed == false;
    }
     
  }
  
  
  
  
      // inserting data into database
  if($proceed == true){
      try{
          $link = mysqli_connect('localhost', 'root', '' , 'waterbills');
  
          $query = $link->prepare('INSERT INTO usageinfo(username, month, year, units, amount) VALUES(?,?,?,?,?);');
      
          $query->bind_param('sssid',$username, $month, $year, $units, $totalAmount);
          $query->execute();
          $query->close();
          $link->close();
    
  
      }catch(Exception $e){
       echo "<br> <h3> Error: " . $e->getMessage() . " <h3/>";    
      }
  
  }
  
  


?>