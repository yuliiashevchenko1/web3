<!DOCTYPE html>
<html>
<head>
	<title>ЛР3 Шевченко КІУКІ-19-7</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		form {
			display: flex;
			flex-direction: column;
			margin: 20px 0;
		}
		label {
			font-weight: bold;
			margin-bottom: 10px;
		}
		select, input[type="text"], input[type="submit"] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
		}
		select {
			width: 200px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<!-- Форма для запроса сеансов работы в сети для выбранного клиента -->
	<form action="get1.php" method="get">
		<label for="client_id">Выберите клиента:</label>
		<select name="client_id" id="client_id">
			<?php
				include('connect.php');
				try {
					$stmt = $dbh->query("SELECT id_client, name FROM client");
					$res = $stmt->fetchAll();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}

				$dbh = null;
			?>
		</select>
		<input type="submit" value="Получить сеансы работы">
	</form>
	<!-- Форма для запроса сеансов работы в сети за указанный промежуток времени -->
	<form action="get2.php" method="get">
		<label for="start_time">Начальное время:</label>
		<input type="text" placeholder="09:00:00" name="start_time" id="start_time">
		<label for="end_time">Конечное время:</label>
		<input type="text" placeholder="21:00:00" name="end_time" id="end_time">
		<input type="submit" value="Получить сеансы работы">
	</form>
	<!-- Форма для запроса списка клиентов с отрицательным балансом -->
	<form action="get3.php" method="get">
		<input type="submit" value="Получить список клиентов с отрицательным балансом">
	</form>
</body>
</html>
