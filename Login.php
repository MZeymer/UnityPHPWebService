<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
$userLogin = $_POST["userLogin"];
$passLogin = $_POST["passLogin"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM playeruser WHERE username = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("s", $userLogin);
$statement->execute();


$result = $statement->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["password"] == $passLogin){
      echo "Logged in. Welcome " . $userLogin;
      echo "Array Echo:";
      $str = print_r($row, true);
      echo $str;

    }
    else{
      echo "Could not log in user. Wrong username or password";
    }
  }
} else {
  echo "That user doesn't exist";
  echo "<br>" . $sql;
}
$conn->close();
?>