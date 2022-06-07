<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
$emailPassChange = $_POST["emailPassChange"];
$oldPassPassChange = $_POST["oldPassPassChange"];
$newPassPassChange = $_POST["newPassPassChange"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM playeruser WHERE email = '" . $emailPassChange . "'";
$result = $conn->query($sql);


if ($result->num_rows > 0) 
  {
    //Resulat > 0 = Email found
    $sql_current_pass = "SELECT password FROM playeruser WHERE email = '" . $emailPassChange . "' AND password = '" . $oldPassPassChange . "'";
    $result2 = $conn->query($sql_current_pass);
  }
    //If password matches user
      if ($result2->num_rows > 0)
      {
      $sql_insert_new_pass = "UPDATE playeruser SET password = '" . $newPassPassChange . "' WHERE email = '" . $emailPassChange . "'";
      $conn->query($sql_insert_new_pass);
      echo $sql_insert_new_pass;
      echo "Password The Changed!";
      }
      else 
      {
      echo "Wrong Password!";
      } 
  {
    echo "Error: " . $conn->error;
  }



$conn->close();
?>