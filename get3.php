<?php
include('connect.php');

try {
    $sqlSelect = "SELECT id_client, name, balance FROM client WHERE balance < 0";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->execute();
    $res = $stmt->fetchAll();

    echo "<table border='1'>";
    echo "<thead><tr><th>id_client</th><th>name</th><th>balance</th></tr></thead>";
    echo "<tbody>";

    foreach($res as $row)
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>
