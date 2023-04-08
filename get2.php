<?php
include('connect.php');

$start_time = $_GET['start_time'];
$end_time = $_GET['end_time'];

try {
    $sqlSelect = "SELECT * FROM seanse WHERE start >= TIME(?) AND stop <= TIME(?)";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->bindValue(1, $start_time);
    $stmt->bindValue(2, $end_time);
    $stmt->execute();
    $res = $stmt->fetchAll();

    echo "<table border='1'>";
    echo "<thead><tr><th>id_seanse</th><th>start</th><th>stop</th><th>in_traffic</th><th>out_traffic</th><th>fid_client</th></tr></thead>";
    echo "<tbody>";

    foreach($res as $row)
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>
