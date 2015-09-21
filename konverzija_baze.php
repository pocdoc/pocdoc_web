<?php
ini_set('max_execution_time', 0);
	$servername = "localhost";
$username = "root";
$password = "";
$db = "pd";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$sql = "SELECT * FROM simptomi";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["ID"]. " - Simptom: " . $row["simptom"]. " Podrucje" . $row["podrucje"]. "<br>";
        $podrucja = explode(", ", $row["podrucje"] );
        $id = $row["ID"];

        foreach( $podrucja as $podrucje){
        	$sql = "INSERT INTO simptomi_podrucje (simptom_id, podrucje_id) VALUES ('$id', '$podrucje')";
        	$conn->query($sql);
        }
        

    }
} else {
    echo "0 results";
}
$conn->close();