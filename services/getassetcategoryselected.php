<?php
include 'config.php';

$sql = "
		SELECT 
		asset_class.acl_id, asset_class.acl_name, asset_category.act_id, asset_category.act_name	
		FROM 
		asset_class, asset_category WHERE asset_class.acl_id=asset_category.acl_id AND asset_category.act_id=:id";
		
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