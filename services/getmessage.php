<?php
include 'config.php';

$sql = "
		SELECT 
		user_messages.um_id, user_messages.um_subject, user_messages.um_message
		
		FROM 
		user_messages WHERE user_messages.um_id=:id";
		
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	$message = $stmt->fetchObject();  
	$dbh = null;
	echo '{"item":'. json_encode($message) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>