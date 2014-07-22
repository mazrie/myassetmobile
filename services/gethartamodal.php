<?php
include 'config.php';

$sql = "
		SELECT 
		asset_class.acl_id, asset_class.acl_name, asset_class.act_count, asset_class.acl_status, asset_class.acl_type
		FROM 
		asset_class WHERE asset_class.acl_status=1 AND asset_class.acl_type=1 ";
		
	

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->query($sql);  
	$class = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($class) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>