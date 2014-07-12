<?php
include 'config.php';

$sql = "
		SELECT 
		user_messages.um_id, user_messages.um_user, 
		user_messages.um_subject, user_messages.um_message,
		user_messages.um_status, user_messages.um_lastup 
		
		FROM 
		user_messages WHERE user_messages.um_status=1 ";
		
	

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->query($sql);  
	$messages = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($messages) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>