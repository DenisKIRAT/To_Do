<?php
	
require_once 'app/init.php';

if(isset($_GET['item'])) {
	$item=$_GET['item'];

	$deleteQuery = $db->prepare("DELETE FROM items WHERE id = :item AND user = :user");

	$deleteQuery->execute(['item'=>$item, 'user'=>$_SESSION['user_id']]);
}

header('Location: index.php');

?>