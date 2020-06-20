<!DOCTPYE html>
<html lang = "en-US">

<head>
    <meta charset = "UTF-8">
    <title>Circuit query</title>
</head>

<body>
    <?php
    require 'APICALL_KEYWORDS.php';

    $selectedYear = filter_input(INPUT_GET, "yearInput");
    $selectedCircuit = filter_input(INPUT_GET, "circuitInput", FILTER_SANITIZE_STRING);     
    $selectedCircuit = strtolower($selectedCircuit);    // cak i ako korisnik unese neku glupost kao MoNzA, sPA, itd., api call radi jer api vjerojatno na svojoj strani provjerava ulaz
    // tu je svejedno rucno low casano da to lici na nesto

    if(!isset($selectedYear) || trim($selectedYear) == '')
    {
        $apiCallString = $apiCallRootSection . $circuitsStringFilter . $slash . $selectedCircuit . $slash . $resultsStringFilter . $jsonString;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        print_r($response);
        //  POZIV KADA GODINA NIJE UNESENA - PRIKAZUJU SE SVI REZULTATI NA ODABRANOJ STAZI
    }
    elseif(!isset($selectedCircuit) || trim($selectedCircuit) == '')
    {
        header('Location: ../statistics.html');
        exit();
        //  AKO STAZA NIJE UNESENA, KORISNIKA SE VRACA NA statistics.html
    }
    else
    {
        $apiCallString = $apiCallRootSection . $selectedYear . $slash . $circuitsStringFilter . $slash . $selectedCircuit . $slash . $resultsStringFilter . $jsonString;

        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        print_r($response);
        //  POZIV KADA SU UNESENI I GODINA I STAZA

        echo "</br>";
        echo "</br>";
        
        echo $apiCallString;
    }

    echo $apiCallString;
    echo "</br>";

    echo $selectedYear;
    echo "</br>";
    
    echo $selectedCircuit;
    echo "</br>";
    

    
    







    /*  PRIMJERI MOGUCIH QUERYA : 

        Korisnik moze unijeti slijedece podatke : godina, staza


        1. Korisnik odabire polja godina i staze.

            http://ergast.com/api/f1/2012/circuits/monza/results        ------> ovime se izbacuje rezultat utrke za odabranu sezonu i odabranu stazu


        2. Korisnik odabire samo stazu.

            http://ergast.com/api/f1/circuits/monza/results     ------> ovime se izbacuju svi rezultati utrka na odabranoj stazi od prve ikada odrzane utrke, do posljednje.

        

        Komentari : 
            -2. poziv nije bas mudar, mnoge utrke poput Monze, Spa, Silverstone-a, itd. se odrzavaju desetljecima, a bas da se sve to parsa, i prikazuje u prikladnim tablicama nije pametno



    $apiCallRootSection = "http://ergast.com/api/f1/";
    $slash = "/";

    $driverStringFilter = "drivers";
    $construstorStringFilter = "constructors";
    $resultsStringFilter = "results";
    $circuitsStringFilter = "circuits";



    $jsonString = ".json";

    */



    ?>

</body>


