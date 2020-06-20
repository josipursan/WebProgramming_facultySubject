<!DOCTPYE html>
<html lang = "en-US">

<head>
    <meta charset = "UTF-8">
    <title>Circuit query</title>
</head>

<body>
    <?php
    require "APICALL_KEYWORDS.php";

    $yearInput = filter_input(INPUT_GET, "yearInput");
    $teamInput = filter_input(INPUT_GET, "teamInput", FILTER_SANITIZE_STRING);
    $cicruitInput = filter_input(INPUT_GET, "circuitInput", FILTER_SANITIZE_STRING);
    
    // echo $yearInput;
    // echo "</br>";

    // echo $teamInput;
    // echo "</br>";

    // echo $cicruitInput;
    // echo "</br>";

    if(!isset($yearInput) || trim($yearInput) == '')
    {
        $apiCallString = $apiCallRootSection . $constructorStringFilter . $slash . $teamInput . $slash . $circuitsStringFilter . $slash . $cicruitInput . $slash . $resultsStringFilter . $jsonString ;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        print_r($response);
        // BUILD POZIVA KAD GODINA NIJE UNESENA
    }
    elseif(!isset($cicruitInput) || trim($cicruitInput) == '')
    {
        $apiCallString = $apiCallRootSection . $yearInput . $slash . $constructorStringFilter . $slash . $teamInput . $slash . $resultsStringFilter . $jsonString;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        print_r($response);
        // BUILD POZIVA KAD STAZA NIJE UNESENA
    }
    else
    {
        $apiCallString = $apiCallRootSection . $yearInput . $slash . $constructorStringFilter . $slash . $teamInput . $slash . $circuitsStringFilter . $slash . $cicruitInput . $slash . $resultsStringFilter . $jsonString;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        print_r($response);
        // BUILD CIJELOG POZIVA SA SVIM POLJIMA UNESENIM
    }

    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo $apiCallString;




    /*  PRIMJERI MOGUCIH QUERYA :


        Korisnik moze unijeti slijedece podatke : godina, ekipa, staza



        1. Korisnik odabire polja ekipa, godina i staza.

            http://ergast.com/api/f1/2012/constructors/mclaren/circuits/spa/results     --------> ovime se prikazuju rezultati odabrane ekipe za odabranu sezonu na odabranoj stazi, tj. rezultat koji su ostvarili vozaci

        2. Korisnik odabire sezonu i ekipu.

            http://ergast.com/api/f1/2012/constructors/mclaren/results      -----> ovime se prikazuju rezultati odabrane ekipe za cijelu odabranu sezonu, tj. za sve utrke

        3. Korisnik odabire ekipu i stazu

            http://ergast.com/api/f1/constructors/mclaren/circuits/spa/results  -----> ovime se prikazuju svi rezultati odabrane ekipe na nekoj stazi (svi rezultati od prve do zadnje odrzane utrke na toj stazi)


        Komentari :     
            -kod querya samo ekipe i staze (kad se prikazuju svi povijesni podaci) mozda nije losa ideja da jednostavno otvoris taj link na Ergast API-ju, a ne da sam to sve parsas.


            
            ** AKO SE REZULTATI ZELE POKUPITI U OBLIKU JSON-A, NA KRAJU SVAKOG UPITA POTREBNO JE DODATI ".json"

    */


    ?>



</body>

<?php




/*  PRIMJERI MOGUCIH QUERYA :


    Korisnik moze unijeti slijedece podatke : godina, ekipa, staza



    1. Korisnik odabire polja ekipa, godina i staza.

        http://ergast.com/api/f1/2012/constructors/mclaren/circuits/spa/results     --------> ovime se prikazuju rezultati odabrane ekipe za odabranu sezonu na odabranoj stazi, tj. rezultat koji su ostvarili vozaci

    2. Korisnik odabire sezonu i ekipu.

        http://ergast.com/api/f1/2012/constructors/mclaren/results      -----> ovime se prikazuju rezultati odabrane ekipe za cijelu odabranu sezonu, tj. za sve utrke

    3. Korisnik odabire ekipu i stazu

        http://ergast.com/api/f1/constructors/mclaren/circuits/spa/results  -----> ovime se prikazuju svi rezultati odabrane ekipe na nekoj stazi (svi rezultati od prve do zadnje odrzane utrke na toj stazi)


    Komentari : /


        
        ** AKO SE REZULTATI ZELE POKUPITI U OBLIKU JSON-A, NA KRAJU SVAKOG UPITA POTREBNO JE DODATI ".json"

*/


?>