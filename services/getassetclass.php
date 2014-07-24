<?php
include 'config.php';

$sql = "
		SELECT 
		asset_class.acl_id, asset_class.acl_name
		FROM 
		asset_class WHERE asset_class.acl_type=:id AND asset_class.acl_status=1 ";

/* Emulate slow queries when asked. */
if ($_GET["sleep"]) {
    sleep(1);
}


try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	$class = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"asset":'. json_encode($class) .'}';
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}


?>
