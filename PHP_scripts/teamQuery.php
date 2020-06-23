<!DOCTPYE html>
<html lang = "en-US">

<head>
    <meta charset = "UTF-8">
    <title>Circuit query</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        caption{
            caption-side : top;
            font-size : 2em;
        }

        .table{
            margin-left: 100%;
        }
            
    </style>
</head>

<body>
    <?php
    require "APICALL_KEYWORDS.php";

    $yearInput = filter_input(INPUT_GET, "yearInput");  
    $teamInput = filter_input(INPUT_GET, "teamInput");  // za sada je tu maknut FILTER_SANITIZE_STRING jer on uklanja _ ako je prisutan, a ponekad je potreban za id-eve Ergast API-ja
    $cicruitInput = filter_input(INPUT_GET, "circuitInput");    // za sada je tu maknut FILTER_SANITIZE_STRING jer on uklanja _ ako je prisutan, a ponekad je potreban za id-eve Ergast API-ja

    if(!isset($cicruitInput) || trim($cicruitInput) == '')
    {
        $apiCallString_additionToGetAllRacesInOneGo = '?limit=50';

        $apiCallString = $apiCallRootSection . $yearInput . $slash . $constructorStringFilter . $slash . $teamInput . $slash . $resultsStringFilter . $jsonString . $apiCallString_additionToGetAllRacesInOneGo;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        
        $firstLayer = $response['MRData']['RaceTable']['Races'];

        $data = array(
            array(),    //race list
            array(),    //firstName
            array(),    //lastName
            array(),    //laps
            array(),    //status
            array(),    //points,
            array()     //position
        );

        $numberOfRaces = 1;
        while(true)     
        {
            if(!array_key_exists($numberOfRaces, $firstLayer))
            {
                break;
            }
            else
            {
                $numberOfRaces += 1;
            }
        }

        for($i = 0; $i < $numberOfRaces; $i++)
        {
            isset($firstLayer[$i]['raceName']) ? array_push($data[0], $firstLayer[$i]['raceName']) : '/';
        }
        for($i = 0; $i < $numberOfRaces; $i++)
        {
            for($j = 0; $j < 2; $j++)
            {
                isset($firstLayer[$i]['Results'][$j]['Driver']['givenName']) ? array_push($data[1], $firstLayer[$i]['Results'][$j]['Driver']['givenName']) : '/';
                isset($firstLayer[$i]['Results'][$j]['Driver']['familyName']) ? array_push($data[2], $firstLayer[$i]['Results'][$j]['Driver']['familyName']) : '/';
                isset($firstLayer[$i]['Results'][$j]['laps']) ? array_push($data[3], $firstLayer[$i]['Results'][$j]['laps']) : '/';
                isset($firstLayer[$i]['Results'][$j]['status']) ? array_push($data[4], $firstLayer[$i]['Results'][$j]['status']) : '/';
                isset($firstLayer[$i]['Results'][$j]['points']) ? array_push($data[5], $firstLayer[$i]['Results'][$j]['points']) : '/';
                isset($firstLayer[$i]['Results'][$j]['positionText']) ? array_push($data[6], $firstLayer[$i]['Results'][$j]['positionText']) : '/';
            }
        }
        buildTable_yearAndTeam($data);
        // BUILD POZIVA KAD STAZA NIJE UNESENA
    }
    else
    {
        $apiCallString = $apiCallRootSection . $yearInput . $slash . $constructorStringFilter . $slash . $teamInput . $slash . $circuitsStringFilter . $slash . $cicruitInput . $slash . $resultsStringFilter . $jsonString;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);

        $firstLayer = $response['MRData']['RaceTable']['Races'][0]['Results'];

        $data = array(
            array(),    //first name    0
            array(),    // last name    1
            array(),    //constructor   2
            array(),    //laps          3
            array(),    //starting pos. 4
            array(),    //time          5
            array(),    //status        6
            array(), //points           7
            array() //finishing pos.    8
        );
    
        $numberOfDrivers = getNumberOfDrivers($firstLayer);
        
        for($i = 0; $i < $numberOfDrivers; $i++)
        {
            isset($firstLayer[$i]["Driver"]["givenName"]) ? array_push($data[0], $firstLayer[$i]["Driver"]["givenName"]) : array_push($data[0], '/');
            isset($firstLayer[$i]["Driver"]["familyName"]) ? array_push($data[1], $firstLayer[$i]["Driver"]["familyName"]) : array_push($data[1], '/'); 
            isset($firstLayer[$i]["Constructor"]["name"]) ? array_push($data[2], $firstLayer[$i]["Constructor"]["name"]) : array_push($data[2], '/');
            isset($firstLayer[$i]['laps']) ? array_push($data[3], $firstLayer[$i]['laps']) : '/';
            isset($firstLayer[$i]['grid']) ? array_push($data[4], $firstLayer[$i]['grid']) : '/';
            isset($firstLayer[$i]['status']) ? array_push($data[5], $firstLayer[$i]['status']) : '/';
            isset($firstLayer[$i]['points']) ? array_push($data[6], $firstLayer[$i]['points']) : '/';
            isset($firstLayer[$i]['positionText']) ? array_push($data[7], $firstLayer[$i]['positionText']) : '/';
        }
    
        buildTable_AllFilters($data);

        // BUILD CIJELOG POZIVA SA SVIM POLJIMA UNESENIM
    }

    echo $apiCallString;


    


    /////////////////////////////////////////////   ˇˇ FUNCTIONS ˇˇ  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    function buildTable_AllFilters($twoDimDataArray)
    {
        $tableHeadersArray = array('First name', 'Last name', 'Constructor', 'Laps', 'Starting position', 'Status', 'Points', 'Finishing position');

        echo "<div class = \"container-fluid text-center\">";
            echo "<div class = \"row\">";
                echo "<div class = \"col-sm-4\">";

                echo "<table class= \"table table-striped\">";
                    echo "<caption>Race results</caption>";
                    echo "<tr>";
                    for($i = 0; $i < count($tableHeadersArray); $i++)
                    {
                        echo "<th>$tableHeadersArray[$i]</th>";
                    }
                    echo "</tr>";

                    for($i = 0; $i < count($twoDimDataArray[0]); $i++)
                    {
                            $name = $twoDimDataArray[0][$i];
                            $lastName = $twoDimDataArray[1][$i];
                            $team = $twoDimDataArray[2][$i];
                            $laps = $twoDimDataArray[3][$i];
                            $startingPosition = $twoDimDataArray[4][$i];
                            $status = $twoDimDataArray[5][$i];
                            $points = $twoDimDataArray[6][$i];
                            $finishingPosition = $twoDimDataArray[7][$i];

                            echo "<tr>";
                            echo "<td>$name</td>"; 
                            echo "<td>$lastName</td>";
                            echo "<td>$team</td>";
                            echo "<td>$laps</td>";
                            echo "<td>$startingPosition</td>";
                            echo "<td>$status</td>";
                            echo "<td>$points</td>";
                            echo "<td>$finishingPosition</td>";
                            echo "</tr>";
                    }

                echo "</table>";

                echo "</div>";
            echo "</div>";
        echo "</div>";
    }

    function buildTable_yearAndTeam($twoDimDataArray)
    {
        $tableHeadersArray = array('Race list', 'First name', 'Last name', 'Laps', 'Status', 'Points', 'Position');

        echo "<div class = \"container-fluid text-center\">";
            echo "<div class = \"row\">";
                echo "<div class = \"col-sm-4\">";

                
                for($i = 0; $i < count($twoDimDataArray[0]); $i++)
                {
                    echo "<table class= \"table table-striped\">";
                    $tableCaption_raceName = $twoDimDataArray[0][$i];
                    echo "<tr>";
                    echo "<caption>$tableCaption_raceName</caption>";
                    echo "</tr>";

                    echo "<tr>";
                    for($z = 1; $z < count($tableHeadersArray); $z++)
                    {
                        echo "<th>$tableHeadersArray[$z]</th>";
                    }
                    echo "</tr>";

                    
                    for($j = 0; $j < 2; $j++)
                    {
                        $firstName = $twoDimDataArray[1][$j];
                        $lastName = $twoDimDataArray[2][$j];
                        $laps = $twoDimDataArray[3][$j];
                        $status = $twoDimDataArray[4][$j];
                        $points = $twoDimDataArray[5][$j];
                        $position = $twoDimDataArray[6][$j];

                        echo "<tr>";
                        echo "<td>$firstName</td>";
                        echo "<td>$lastName</td>";
                        echo "<td>$laps</td>";
                        echo "<td>$status</td>";
                        echo "<td>$points</td>";
                        echo "<td>$position</td>";
                        echo "</tr>";
                        
                        
                    }

                    for($k = 1; $k < 7; $k++)
                    {
                        $twoDimDataArray[$k] = array_slice($twoDimDataArray[$k], 2);
                    }
                    echo "</table>";
                }
            
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }



    function getNumberOfDrivers($firstLayer)
    {
        $numberOfDrivers = 1;

        while(true)     
        {
            if(!array_key_exists($numberOfDrivers, $firstLayer))
            {
                break;
            }
            else
            {
                $numberOfDrivers += 1;
            }
        }
        return $numberOfDrivers;
    }




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