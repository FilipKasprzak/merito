<?php
	require_once 'db_connect.php';

	$selectUser = null;

	$sql = "SELECT * FROM `users`;";
	$result = $mysqli->query($sql);

	function calculateAge($birthDate){
		$today = new DateTime();
		$dob = new DateTime($birthDate);
		$age = $today->diff($dob)->y;
		return $age;
	}

	if (isset($_GET['user_id'])) {
		$id = (int) $_GET['user'];
		$stmt = $mysqli->preapare("SELECT * FROM users WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$selectedUser = $stmt->get_result()->fetch_object();
		$stmt->close();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h2>Lista użytkowników</h2>
	<table>
		<tr>
			<th>ID</th><th>ID</th><th>ID</th><th>ID</th><th>ID</th><th>ID</th><th>ID</th><th>ID</th><th>ID</th>
		</tr>
		<?php while($row = $result->fetch_object()): ?>
		<tr>
			<td><?= $row->id ?></td>
			<td><?= htmlspecialchars($row->name) ?></td>
			<td><?= htmlspecialchars($row->email) ?></td>
			<td><?= $row->birth_date ?> </td>
			<td><?= $row->gender ?> </td>
			<td><?= calculateAge($row->birth_date) ?></td>
			<td><?= nl2br(htmlspecialchars($row->description)) ?></td>
			<td><?= $row->created_at ?></td>
			<td><a class="detail-link" href="?user_id=<? $row->row?>"> Szczegóły</a></td>
		</tr>	
		<?php endwhile; ?>
	</table>
	<?php if ($selectedUser): ?>
		<div class="details">
		<h3>Szczegóły użytkownika: <?= htmlspecialchars($selectedUser->name) ?></h3>
		<p>Email: <?= $selectedUser->birth_date?></p>
		<p>Data urodzenia: <?= $selectedUser-> birth_date ?></p>
		<p>Wiek: <?=calculateAge($selectedUser->birth_date) ?></p>
		<p>Opis: <?=nl2br(htmlspecialchars($selectedUser)) ?></p>
		<p>
		</div>
	<?php endif ?>
</body>
</html>