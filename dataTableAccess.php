<?php
   
   $serverName = "localhost";
   $userName = "root";
   $passWord = "";
   $dbName = "xxxdb";
 

//-------------------------------------------------------
function getData(){
    global $serverName, $userName, $passWord, $dbName ;
    // Create connection
  $vCon = new mysqli($serverName, $userName, $passWord, $dbName);
  // Check connection
  if ($vCon->connect_error) {
    die("Connection failed: " . $vCon->connect_error);
  }
  
  $vSql = "SELECT intVal1 FROM xx_tbl order by id ASC limit 1" ;
  if ($result = $vCon->query($vSql)) {
    return $result->fetch_assoc();
  }
  else {
    return false;
      }
  }
  
  //----------------------------------------------------------------
  function insertData(){
    global $serverName, $userName, $passWord, $dbName ;
    // Create connection
  // Create connection
$vCon = mysqli_connect($serverName, $userName, $passWord, $dbName);
// Check connection
if (!$vCon) {
  die("Connection failed: " . mysqli_connect_error());
}

$vSql = "UPDATE xx_tbl SET lastname='Doe' WHERE id=1";

if (mysqli_query($vCon, $vSql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($vCon);
}

mysqli_close($vCon);
//------------------------------------------------------------------------
  }    

  function updateOutput($val) {
    global $serverName, $userName, $passWord, $dbName;

    // Create connection
   $vCon = new mysqli($serverName, $userName, $passWord, $dbName);
    // Check connection
    if ($vCon->connect_error) {
        die("Connection failed: " .$vCon->connect_error);
    }

   // $sql = "UPDATE xx_Tbl SET intVal1='" . $val . "' WHERE id='". $id .  "'";
   $sql = "UPDATE xx_Tbl SET intVal1='" . $val . "' WHERE id=1";


   if ($vCon->query($sql) === TRUE) {
        return "Output state updated successfully";
        
    }
    else {
        return "Error: " . $sql . "<br>" .$vCon->error;
    }
   $vCon->close();
}
?>