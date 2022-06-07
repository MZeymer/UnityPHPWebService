<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
// $playerCountInput = $_POST["playerCountInput"];
// $sortingKeyword = $_POST["sortingKeyboard"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $sql_get_players = "SELECT PlayerID, UserName FROM PlayerUser";
// // $sql_get_playerid = "SELECT PlayerID FROM playeruser WHERE username = 'MZT'";
// $resultPlayers = $conn->query($sql_get_players);
// $players = mysqli_fetch_array($resultPlayers);

// $sql_get_playerdata = "SELECT PlayerLevel, CurrentXP, TotalXP, PowerGenerated, Cash, BiomassLevel, BiomassUpgLevel, CoalLevel, WaterLevel,
// WaterUpgLevel, WindLevel, WindUpgLevel, SolarLevel,SolarUpgLevel, NuclearLevel, NuclearUpgLevel FROM playerdata";

// $resultPlayerdata = $conn->query($sql_get_playerdata);
// $playerdata = mysqli_fetch_array($resultPlayerdata);
// echo "playercount : " . count($players);
// echo "\n";

$sql = "SELECT * FROM playeruser INNER JOIN playerdata on playeruser.playerid=playerdata.playerid";
$sql_new = $conn->query($sql);


if($sql_new->num_rows > 0)
{
  $rows = array();
  while($row = $sql_new->fetch_assoc()){
    
    $rows[] = $row;
  }
  echo json_encode($rows);
}
  
else 
{
    echo "Could not fetch players data" . $conn->error;
}

$conn->close();
?>