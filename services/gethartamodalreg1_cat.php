<?php


include 'config.php';

$response[""] = "--";

$sql = "
		SELECT
		asset_category.act_id, asset_category.act_name

		FROM
		asset_category WHERE asset_category.acl_id=:id AND asset_category.act_status=1";





try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam("id", $_GET[cat]);
	$stmt->execute();
		$message = $stmt->fetchAll();
    //	$messages = $stmt->fetchAll();

	$dbh = null;
	echo json_encode($message);

} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}





/* This is just a dummy file for generating example JSON.



// Kenderaan
if (isset($_GET["cat"])) {
    if ("13" == $_GET["cat"]) {
        $response[""] = "--";
        $response["121"] = "KERETA";
        $response["122"] = "BAS";
        $response["123"] = "MOTOSIKAL";
        $response["124"] = "LORI/TRAK";
        $response["125"] = "KENDERAAN AIR";
        $response["126"] = "PESAWAT";
        $response["127"] = "TIDAK BERMOTOR";
    };

//Loji / Jentera Berat
    if ("14" == $_GET["cat"]) {
        $response[""] = "--";
        $response["a1"]  = "A1";
        $response["a3"]  = "A3";
        $response["s3"]  = "S3";
        $response["a4"]  = "A4";
        $response["s4"]  = "S4";
        $response["a5"]  = "A5";
        $response["s5"]  = "S5";
        $response["a6"]  = "A6";
        $response["s6"]  = "S6";
        $response["rs6"] = "RS6";
        $response["a8"]  = "A8";
        $response["selected"]  = "s6";
    };

//Peralatan & Kelengkapan Pejabat

        if ("2" == $_GET["cat"]) {
            $response[""] = "--";
            $response["a1"]  = "A1";
            $response["a3"]  = "A3";
            $response["s3"]  = "S3";
            $response["a4"]  = "A4";
            $response["s4"]  = "S4";
            $response["a5"]  = "A5";
            $response["s5"]  = "S5";
            $response["a6"]  = "A6";
            $response["s6"]  = "S6";
            $response["rs6"] = "RS6";
            $response["a8"]  = "A8";
            $response["selected"]  = "s6";
        };
}


print json_encode($response);

*/