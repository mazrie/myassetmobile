<?php

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');

include 'config.php';

// Get username
$username = $_POST['username'];
// Get password
$password = $_POST['password'];

//echo 'lahabau:', $username, '   ', $password;


// run the mother load
$sql = "
			SELECT 
			user_login.ulg_status, user_login.ulg_lastlogin, asset_license.al_company, user_status.ust_role
			FROM 
			user_login, user_info, asset_license, user_status
			WHERE
			user_info.uin_ul = user_login.ulg_id
			AND user_login.ust_id = user_status.ust_id
			AND user_info.uin_company = asset_license.al_id
			AND user_login.ulg_un=\"$username\"
			AND user_login.ulg_pw=\"$password\" AND user_login.ulg_status=1";


try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	//$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	
	$row = $stmt->fetch(PDO::FETCH_ASSOC);


	$getdata = $stmt->fetchAll(PDO::FETCH_OBJ);
	$actualdata = var_dump($getdata);
	echo $actualdata[ulg_session];
	$dbh = null;
	
	// the if's

foreach($row as $rows){
  print $rows->id;
}

if($rows != NULL){
	$output = array(
    		'status' => true,
    		'message' => 'Login',
    		'username' => $username,
    		'active' => $getdata['ulg_status'],
    		'lastlogin' => $username,
    		'company' => $username,
    		'role' => $username
    		);
	}
	else
		{
		$output = array(
		'status' => false,
		'message' => 'No Login',
		'username' => $username,
		'active' => $password,
		'lastlogin' => $username,
		'company' => $username,
		'role' => $username
		);
		}
		echo json_encode($output); 
	}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			}




?>