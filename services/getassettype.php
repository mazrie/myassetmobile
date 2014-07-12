<?php
include 'config.php';

$sql = "
			SELECT 
			asset_type.aty_id, asset_type.aty_name, asset_type.aty_count, asset_type.aty_status
			FROM 
			asset_type WHERE asset_type.act_id=:id AND asset_type.aty_status=1";
		
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	$type = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($type) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>