<?php
include 'config.php';

$sql = "
		SELECT 
		lookup_list.lkl_id, lookup_list.lkl_name

		FROM 
		lookup_list

		WHERE
		lookup_list.lkt_id=:unit
		";
		
	

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("unit", $_GET[unit]);
	$stmt->execute();
	$message = $stmt->fetchAll();
	$dbh = null;
	echo '{"items":'. json_encode($message) .'}';
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>