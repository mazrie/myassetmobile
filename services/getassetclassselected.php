<?php
include 'config.php';

$sql = "
		SELECT 
		asset_class.acl_id, asset_class.acl_name		
		FROM 
		asset_class WHERE asset_class.acl_id=:id";
		
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