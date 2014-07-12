<?php
include 'config.php';

$sql = "
		SELECT 
		asset_type.aty_id, asset_type.aty_name		
		FROM 
		asset_type WHERE asset_type.acl_id=:id";
		
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	$assetselected = $stmt->fetchObject();  
	$dbh = null;
	echo '{"item":'. json_encode($assetselected) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>