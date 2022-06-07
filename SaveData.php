<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UnityBackenddb";

//Input variables
$usernameInput = $_POST["usernameInput"];

//Game Variables
$PlayerLevel = $_POST["PlayerLevel"];
$CurrentXP = $_POST["CurrentXP"];
$TotalXP = $_POST["TotalXP"];
$PowerGenerated = $_POST["PowerGenerated"];
$Cash = $_POST["Cash"];
$BiomassLevel = $_POST["BiomassLevel"];
$BiomassUpgLevel = $_POST["BiomassUpgLevel"];
$CoalLevel = $_POST["CoalLevel"];
$CoalUpgLevel = $_POST["CoalUpgLevel"];
$WaterLevel = $_POST["WaterLevel"];
$WaterUpgLevel = $_POST["WaterUpgLevel"];
$WindLevel = $_POST["WindLevel"];
$WindUpgLevel = $_POST["WindUpgLevel"];
$SolarLevel = $_POST["SolarLevel"];
$SolarUpgLevel = $_POST["SolarUpgLevel"];
$NuclearLevel = $_POST["NuclearLevel"];
$NuclearUpgLevel = $_POST["NuclearUpgLevel"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT PlayerID FROM playeruser WHERE username = '" . $usernameInput . "'";
$result = $conn->query($sql);
$playerID = mysqli_fetch_array($result);
echo "PlayeID Result = " . $playerID[0];

if ($result->num_rows > 0) 
  {
    //Resulat > 0 = PlayerID found
    $sql_search_player_data = "SELECT playerdataid FROM playerdata WHERE playerid = '" . $playerID[0] . "'";
    $result2 = $conn->query($sql_search_player_data);
  }
  else {
    echo "Could not find existing save. Creating new";
  }
    //If password matches user
      if ($result2->num_rows > 0)
      {
      $sql_update_player_data = "UPDATE playerdata SET PlayerLevel = '" . $PlayerLevel . "',
      CurrentXP = '" . $CurrentXP . "', TotalXP = '" . $TotalXP . "', PowerGenerated = '" . $PowerGenerated . "', Cash = '" . $Cash . "', 
      BiomassLevel = '" . $BiomassLevel . "', BiomassUpgLevel = '" . $BiomassUpgLevel . "', CoalLevel = '" . $CoalLevel . "', WaterLevel = '" . $WaterLevel . "',
      WaterUpgLevel = '" . $WaterUpgLevel . "', WindLevel = '" . $WindLevel . "', WindUpgLevel = '" . $WindUpgLevel . "', SolarLevel = '" . $SolarLevel . "',
      SolarUpgLevel = '" . $SolarUpgLevel . "', NuclearLevel = '" . $NuclearLevel . "', NuclearUpgLevel = '" . $NuclearUpgLevel . "' WHERE playerid = '" . $playerID[0] . "'";
      echo "Update Player Data Query: " . $sql_update_player_data;
      $conn->query($sql_update_player_data);
      echo "Databackup Complete!";
      }
      
    if ($result2->num_rows < 1) 
    {
      $sql_insert_player_data = "INSERT INTO playerdata (PlayerID, PlayerLevel, CurrentXP, TotalXP, PowerGenerated, Cash, 
      BiomassLevel, BiomassUpgLevel, CoalLevel, WaterLevel,
      WaterUpgLevel, WindLevel, WindUpgLevel, SolarLevel, SolarUpgLevel, NuclearLevel, NuclearUpgLevel) 
      VALUES ('" . $playerID[0] . "', '" . $PlayerLevel . "','" . $CurrentXP . "','" . $TotalXP . "',
      '" . $PowerGenerated . "','" . $Cash . "','" . $BiomassLevel . "','" . $BiomassUpgLevel . "',
      '" . $CoalLevel . "','" . $WaterLevel . "','" . $WaterUpgLevel . "','" . $WindLevel . "',
      '" . $WindUpgLevel . "','" . $SolarLevel . "','" . $SolarUpgLevel . "','" . $NuclearLevel . "',
      '" . $NuclearUpgLevel . "')";
      echo "The Insert Query: " . $sql_insert_player_data;
      $conn->query($sql_insert_player_data);
      echo "Databackup Complete!";
    }
    else 
      {
      echo "Could Not Back Up! Error:  . $conn->error";
      } 

      



$conn->close();
?>