<?php

	require_once 'app/init.php';
	global $db;

	$itemsQuery = $db->query("SELECT * FROM items");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">

</head>
<body>
	<div class="list">
		<h1 class="header">To Do List.</h1>

		<?php 
		if($itemsQuery->rowCount()<1) {
			?>
			<p><i>You haven't added any items yet.</i></p>
			<?php 
		}
		else {
			while ($items = $itemsQuery->fetch()) {
				?>
			
				<ul class="items">
					<li>
						<span class="item<?php echo $items['done'] ? '-done' : ''?>"><?php echo $items[1] ?></span>
						<?php if(!$items['done']) { 
							?>
							<a href="mark.php?as=done&item=<?php echo $items['id']; ?>" class="done-button">Tâche effectué</a>
						<?php }
						?>
						<a href="delete.php?item=<?php echo $items['id']; ?>" class="delete-button">&Theta;</a>
					</li>
				</ul>

				<?php 
			}
		}
		?>
	</div>

	<div class="adder">
		<form class="item-add" action="add.php" method="post">
			<input type="text" name="name" style="width: 220px" placeholder="Insérer une nouvelle tâche." class="input" autocomplete="off" required>
			<input type="submit" value="Ajouter" class="submit">
		</form>

	</div>

</body>
</html>