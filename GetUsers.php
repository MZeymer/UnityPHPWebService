<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully! <br> <br>";
echo "Here is a list of the users: <br>";

$sql = "SELECT UserName, DisplayName, Email FROM PlayerUser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["UserName"]. " - Display Name: " . $row["DisplayName"]. " - Email: " . $row["Email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>