<?php

// Prevent caching.
//header('Cache-Control: no-cache, must-revalidate');

include 'config.php';


			
// Get username
//$username = $_POST['username'];
$username = 'mack';

// Get password
//$password = md5($_POST['password']); 
$password = 'mack';

// run the mother load
$sql = "
			SELECT 
			user_login.ulg_un, user_login.ulg_un, user_login.ulg_status
			FROM 
			user_login WHERE user_login.ulg_un=\"$username\" AND user_login.ulg_pw=\"$password\" AND user_login.ulg_status=1";


try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	//$stmt->bindParam("id", $_GET[id]);
	$stmt->execute();
	
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
	$category = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	
	// the if's

foreach($row as $rows){
  print $rows->id;
}

	//
	echo 'user :', $sql, '<br>';
	echo 'user :', $username, '<br>';
	echo 'password :', $password, '<br>';
	echo 'row :' . $rows, '<br>';
	echo '{"items":'. json_encode($category) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}




?>