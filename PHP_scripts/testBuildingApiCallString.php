<?php

    $apiCallRootSection = "http://ergast.com/api/f1/";
    $driverStringFilter = "drivers";
    $construstorStringFilter = "constructors";
    $resultsStringFilter = "results";
    $jsonString = ".json";
    $slash = "/";

    $year = "2019";
    $constructor = "ferrari";
    $driverName = "vettel";
    
    $apiCallString = $apiCallRootSection . $year . $slash . $driverStringFilter . $slash . $driverName . $slash . $construstorStringFilter . $slash . $constructor . $slash . $resultsStringFilter . $jsonString;
    echo $apiCallString;

    $response = file_get_contents($apiCallString);
    $response = json_decode($response, true);
    print_r($response);

    //  http://ergast.com/api/f1/2016/drivers/vettel/constructors/ferrari/results 
?>