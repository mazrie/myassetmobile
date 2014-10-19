<?php
include 'config.php';

$sql = "
		SELECT 
		asset_class.acl_name, asset_category.act_name, asset_type.aty_name

		FROM 
		asset_class, asset_category, asset_type

		WHERE
		asset_category.act_id=:sub AND
		asset_type.aty_id=:type AND
		asset_type.aty_status=1 ";
		
	

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("sub", $_GET[sub]);
    $stmt->bindParam("type", $_GET[type]);
	$stmt->execute();
	$message = $stmt->fetchObject();
	$dbh = null;
	echo '{"item":'. json_encode($message) .'}';
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>