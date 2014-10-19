<?php
include 'config.php';

$sql = "
		SELECT DISTINCT
		user_info.uin_firstname, user_info.uin_lastname, user_login.ulg_id

		FROM
		user_info, user_status, user_login, asset_license

		WHERE

		user_info.uin_company=:lic AND
		user_info.uin_ul=user_login.ulg_id AND
		user_login.ulg_status=1 AND
		user_login.ust_id=2 AND
		asset_license.al_status=1
		";
		
	

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("lic", $license_id);
	$stmt->execute();
	$message = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($message) .'}';
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}


?>