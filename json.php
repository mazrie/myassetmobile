<?php

/* This is just a dummy file for generating example JSON. */

/* Emulate slow queries when asked. */
if ($_GET["sleep"]) {
    sleep(1);
}

header("Access-Control-Allow-Origin: *");

$response[""] = "--";

if (isset($_GET["series"]) && isset($_GET["model"])) {

  $response[""] = "--";

  if (in_array($_GET["series"], array("series-1", "series-3", "a3", "a4"))) {
      $response["25-petrol"] = "2.5 petrol";
  }

  if (in_array($_GET["series"], array("series-3", "series-5", "series-6", "series-7", "a3", "a4", "a5"))) {
      $response["30-petrol"] = "3.0 petrol";
  }

  if (in_array($_GET["series"], array("series-7", "a5"))) {
      $response["30-diesel"] = "3.0 diesel";
  }

  if ("series-3" == $_GET["series"] && "sedan" == $_GET["model"]) {
      $response["30-diesel"] = "3.0 diesel";
  }

  if ("series-5" == $_GET["series"] && "sedan" == $_GET["model"]) {
      $response["30-diesel"] = "3.0 diesel";
  }

}
// harta modal > category
else if (isset($_GET["asset"])) {
    if ("1" == $_GET["asset"]) {
        $response[""] = "--";
        $response["series-1"] = "001 - MESIN PEJABAT";
        $response["series-2"] = "002 - PERALATAN PEJABAT";
        $response["series-3"] = "003 - PERALATAN RANGKAIAN";
        $response["series-4"] = "004 - PDA/PALMTOP";
        $response["series-5"] = "005 - PENCETAK (PRINTER)";
        $response["series-6"] = "006 - PERALATAN STORAN";
        $response["series-7"] = "007 - PEGIMBAS (SCANNER)";
        $response["series-8"] = "008 - PERISIAN";
        $response["series-9"] = "009 - PERANTI KOMPUTER";
        $response["series-10"] = "010 - RAK PERALATAN ICT";


    };

    if ("2" == $_GET["asset"]) {
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
    };

        if ("3" == $_GET["asset"]) {
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
        };

}
// harta modal > category > sub
else if (isset($_GET["series"])) {
    if ("series-1" == $_GET["series"]) {
        $response[""] = "--";
        $response["3-doors"] = "3 doors";
        $response["5-doors"] = "5 doors";
        $response["coupe"]   = "Coupe";
        $response["cabrio"]  = "Cabrio";
        $response["selected"] = "coupe";
    };

    if ("series-3" == $_GET["series"]) {
        $response[""] = "--";
        $response["coupe"]   = "Coupe";
        $response["cabrio"]  = "Cabrio";
        $response["sedan"]   = "Sedan";
        $response["touring"] = "Touring";
    };

    if ("series-5" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]   = "Sedan";
        $response["touring"] = "Touring";
        $response["gran-tourismo"] = "Gran Tourismo";
    };

    if ("series-6" == $_GET["series"]) {
        $response[""] = "--";
        $response["coupe"]   = "Coupe";
        $response["cabrio"]  = "Cabrio";
    };

    if ("series-7" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]   = "Sedan";
    };

    if ("a1" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]   = "Sedan";
    };

    if ("a3" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["sportback"] = "Sportback";
        $response["cabriolet"] = "Cabriolet";
    };

    if ("s3" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["sportback"] = "Sportback";
    };

    if ("a4" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["avant"]     = "Avant";
        $response["allroad"]   = "Allroad";
    };

    if ("s4" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
    };

    if ("a5" == $_GET["series"]) {
        $response[""] = "--";
        $response["sportback"] = "Sportback";
        $response["cabriolet"] = "Cabriolet";
        $response["coupe"]     = "Coupe";
    };

    if ("s5" == $_GET["series"]) {
        $response[""] = "--";
        $response["sportback"] = "Sportback";
        $response["cabriolet"] = "Cabriolet";
        $response["coupe"]     = "Coupe";
    };

    if ("a6" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["avant"]     = "Avant";
        $response["allroad"]   = "Allroad";
    };

    if ("s6" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["avant"]     = "Avant";
    };

    if ("rs6" == $_GET["series"]) {
        $response[""] = "--";
        $response["sedan"]     = "Sedan";
        $response["avant"]     = "Avant";
    };

};


print json_encode($response);

?>