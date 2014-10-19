<?php


include 'config.php';

$response[""] = "--";

$sql = "
		SELECT
		asset_type.aty_id, asset_type.aty_name

		FROM
		asset_type WHERE asset_type.act_id=:id AND asset_type.aty_status=1";





try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("id", $_GET[sub]);
	$stmt->execute();
	$message = $stmt->fetchAll();
	$dbh = null;
	echo json_encode($message);

} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}



/* This is just a dummy file for generating example JSON.

$response[""] = "--";

// starting subCategory
if (isset($_GET["sub"])) {

    if ("121" == $_GET["sub"]) {
        $response[""] = "--";
        $response["0000001336"] = "001 - KERETA SEDAN";
        $response["0000001337"]   = "002 - KERETA EKSEKUTIF";
        $response["0000001338"]  = "003 - MPV";
        $response["0000001339"]  = "004 - VAN";
        $response["0000001340"]  = "005 - PACUAN 4 RODA";
        $response["0000001341"]  = "006 - AMBULAN";
        $response["0000001342"]  = "007 - CARAVAN";
        $response["selected"] = "--";
    };

    if ("122" == $_GET["sub"]) {
        $response[""] = "--";
        $response["0000001336"] = "001 - KERETA SEDAN";
        $response["0000001337"]   = "002 - KERETA EKSEKUTIF";
        $response["0000001338"]  = "003 - MPV";
        $response["0000001339"]  = "004 - VAN";
        $response["0000001340"]  = "005 - PACUAN 4 RODA";
        $response["0000001341"]  = "006 - AMBULAN";
        $response["0000001342"]  = "007 - CARAVAN";
        $response["selected"] = "--";
    };

    if ("123" == $_GET["sub"]) {
        $response[""] = "--";
        $response["0000001336"] = "001 - KERETA SEDAN";
        $response["0000001337"]   = "002 - KERETA EKSEKUTIF";
        $response["0000001338"]  = "003 - MPV";
        $response["0000001339"]  = "004 - VAN";
        $response["0000001340"]  = "005 - PACUAN 4 RODA";
        $response["0000001341"]  = "006 - AMBULAN";
        $response["0000001342"]  = "007 - CARAVAN";
        $response["selected"] = "--";
    };

    if ("124" == $_GET["sub"]) {
        $response[""] = "--";
        $response["0000001336"] = "001 - KERETA SEDAN";
        $response["0000001337"]   = "002 - KERETA EKSEKUTIF";
        $response["0000001338"]  = "003 - MPV";
        $response["0000001339"]  = "004 - VAN";
        $response["0000001340"]  = "005 - PACUAN 4 RODA";
        $response["0000001341"]  = "006 - AMBULAN";
        $response["0000001342"]  = "007 - CARAVAN";
        $response["selected"] = "--";
    };

}



print json_encode($response);

*/