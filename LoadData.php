<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
$usernameInput = $_POST["usernameInput"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql_get_playerid = "SELECT PlayerID FROM playeruser WHERE username = '" . $usernameInput . "'";
// $sql_get_playerid = "SELECT PlayerID FROM playeruser WHERE username = 'MZT'";
$result_playerid = $conn->query($sql_get_playerid);
$playerID = mysqli_fetch_array($result_playerid);

$sql = "SELECT PlayerLevel, CurrentXP, TotalXP, PowerGenerated, Cash, BiomassLevel, BiomassUpgLevel, CoalLevel, WaterLevel,
WaterUpgLevel, WindLevel, WindUpgLevel, SolarLevel,SolarUpgLevel, NuclearLevel, NuclearUpgLevel FROM playerdata WHERE playerid = '" . $playerID[0] . "'";
$result = $conn->query($sql);
$playerdata = mysqli_fetch_array($result);

if ($result->num_rows > 0) 
  {
    echo json_encode($playerdata);

  }
  else 
  {
    echo "Could not find save" . $conn->error;
  }

      



$conn->close();
?>