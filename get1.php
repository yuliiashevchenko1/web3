<?php
	include('connect.php');

	$clientID = $_GET['client_id'];

	try {
		$stmt = $dbh->prepare("SELECT * FROM seanse WHERE fid_client=?");
		$stmt->execute(array($clientID));
		$res = $stmt->fetchAll();

		echo "<table border='1'>";
		echo "<thead><tr><th>ID сеанса</th><th>Время начала</th><th>Время окончания</th><th>Входящий трафик</th><th>Исходящий трафик</th><th>ID клиента</th></tr></thead>";
		echo "<tbody>";

		foreach($res as $row)
		{
			echo "<tr><td>".$row['id_seanse']."</td><td>".$row['start']."</td><td>".$row['stop']."</td><td>".$row['in_traffic']."</td><td>".$row['out_traffic']."</td><td>".$row['fid_client']."</td></tr>";
		}

		echo "</tbody>";
		echo "</table>";
	}
	catch(PDOException $ex) {
		echo $ex->getMessage();
	}

	$dbh = null;
?>
