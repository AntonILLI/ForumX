<?php 

require_once "scripts/database.php";

$sql = "SELECT * FROM xadmin";
$result = mysqli_query($conn, $sql);
$maxpower = 0;
$maxid = 0;

while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];

    include_once "scripts/gain_power.php";
    $fullpower = gain_power($id);

    if ($maxpower < $fullpower){
        $maxpower = $fullpower;
        $maxid = $id;
    }
    
}

if ($maxpower >= 1000){

    header("Location: winner.php?winnerID=".$maxid);

}
     require "home.php";

?>