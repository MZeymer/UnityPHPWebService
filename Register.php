<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
$userRegister = $_POST["userRegister"];
$passRegister = $_POST["passRegister"];
$displayRegister = $_POST["displayRegister"];
$emailRegister = $_POST["emailRegister"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM playeruser WHERE username = '" . $userRegister . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  //Resulat > 0 = Name already taken
  echo "Username already taken!";

} else {
  echo "Username accepted. Creating user";
  //Create the user
  $sql_insert_user = "INSERT INTO playeruser (username, email, displayname, password)
  VALUES ('" . $userRegister . "', '" . $emailRegister . "','" . $displayRegister . "','" . $passRegister . "')";
  
  if ($conn->query($sql_insert_user) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
  }


}
$conn->close();
?>