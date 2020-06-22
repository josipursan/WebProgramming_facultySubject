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

        body{
            
        }

        .table{
            margin-left: 100%;
        }
            
    </style>
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
        //print_r($response);
        //  POZIV KADA GODINA NIJE UNESENA - PRIKAZUJU SE SVI REZULTATI NA ODABRANOJ STAZI

        echo "</br>";
        echo "</br>";
        
        //echo $apiCallString;
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
        //print_r($response);
        //  POZIV KADA SU UNESENI I GODINA I STAZA
        echo "</br>";
        echo "</br>";
        
        //echo $apiCallString;
    }

    echo "</br>";

    $season = isset($response['MRData']['RaceTable']['season']) ? $response['MRData']['RaceTable']['season'] : '/' ;
    $roundInSeason = isset($response['MRData']['RaceTable']['Races'][0]['round']) ? $response['MRData']['RaceTable']['Races'][0]['round'] : '/';
    $circuitName = isset($response['MRData']['RaceTable']['Races'][0]['Circuit']['circuitName']) ? $response['MRData']['RaceTable']['Races'][0]['Circuit']['circuitName'] : '/';
    $country = isset($response['MRData']['RaceTable']['Races'][0]['Circuit']['Location']['country']) ? $response['MRData']['RaceTable']['Races'][0]['Circuit']['Location']['country'] : '/';
    $raceDate = isset($response['MRData']['RaceTable']['Races'][0]['date']) ? $response['MRData']['RaceTable']['Races'][0]['date'] : '/';

    $basicDataArray = array($season, $roundInSeason, $circuitName, $country, $raceDate);
    $basicData_tableHeader = array('Season', 'Round', 'Circuit name', 'Country', 'Date');

    
    $firstLayer = $response['MRData']['RaceTable']['Races'][0]['Results'];

    $data = array(
        array(),    //stavi tu imenovanje, i promijeni sto je potrebno u funkciji koja builda tablicu ("firstNames => array(), ....)
        array(),
        array(),
        array(),
        array(),
        array()
    );    //Polje u koje se trpaju imena, prezimena, ekipe, najbolja vremena, itd... za prikaz u tablici. 

    $numberOfDrivers = 1;   // Ovaj blok provjerava koliko ima vozaca
    while(true)     
    {
        if(!array_key_exists($numberOfDrivers, $firstLayer))
        {
            break;
        }
        else
        {
            $numberOfDrivers += 1;
            continue;
        }
    }

    for($i = 0; $i < $numberOfDrivers; $i++)
    {
        isset($firstLayer[$i]["Driver"]["givenName"]) ? array_push($data[0], $firstLayer[$i]["Driver"]["givenName"]) : array_push($data[0], '/');
        isset($firstLayer[$i]["Driver"]["familyName"]) ? array_push($data[1], $firstLayer[$i]["Driver"]["familyName"]) : array_push($data[1], '/');   
        isset($firstLayer[$i]["Constructor"]["name"]) ? array_push($data[2], $firstLayer[$i]["Constructor"]["name"]) : array_push($data[2], '/');
        isset($firstLayer[$i]["FastestLap"]["Time"]["time"]) ? array_push($data[3], $firstLayer[$i]["FastestLap"]["Time"]["time"]) : array_push($data[3], '/');
        isset($firstLayer[$i]["FastestLap"]["AverageSpeed"]["speed"]) ? array_push($data[4], $firstLayer[$i]["FastestLap"]["AverageSpeed"]["speed"]) : array_push($data[4], '/');
        isset($firstLayer[$i]["status"]) ? array_push($data[5], $firstLayer[$i]["status"]) : array_push($data[$i], '/');

        // PRIMJER PUSHANJA U data ARRAY BEZ "ERROR HANDLINGA" ZA SLUCAJEVE KADA ODREDENI VOZACI NEMAJU ODREDENE PARAMETRE DEFINIRANE POPUT AVG.SPEED ITD... : 
        //                                          array_push($data[5], $firstLayer[$i]["status"]);
    }


    buildBasicInfoTable($basicDataArray, $basicData_tableHeader);

    buildCircuitResultTable($data);


    /////////////////////////////////////////\\///   ˇˇ FUNCTIONS ˇˇ  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    function buildBasicInfoTable($basicDataArray, $basicData_tableHeader)
    {
        echo "<div class = \"container-fluid text-center\">";
            echo "<div class = \"row\">";
                echo "<div class = \"col-sm-4\">";

                    echo "<table class= \"table table-striped\">";
                    echo "<caption>Basic race information</caption>";
                    for($i = 0; $i < count($basicDataArray); $i++)
                    {
                        echo "<tr>";
                        echo "<th>$basicData_tableHeader[$i]</th>";
                        echo "<td>$basicDataArray[$i]</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                echo "</div>";
            echo "</div>";
        echo "</div>";
    }

    function buildCircuitResultTable($twoDimArray_data)
    {
        $tableHeadersArray = array("Name", "Last name", "Team", "Fastest Lap", "Avg. speed (kph)", "Status");

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
                    
                    for($i = 0; $i < count($twoDimArray_data[0]); $i++)
                    {
                            $name = $twoDimArray_data[0][$i];
                            $lastName = $twoDimArray_data[1][$i];
                            $team = $twoDimArray_data[2][$i];
                            $fastestLap = $twoDimArray_data[3][$i];
                            $averageSpeed = $twoDimArray_data[4][$i];
                            $status = $twoDimArray_data[5][$i];

                            echo "<tr>";
                            echo "<td>$name</td>"; 
                            echo "<td>$lastName</td>";
                            echo "<td>$team</td>";
                            echo "<td>$fastestLap</td>";
                            echo "<td>$averageSpeed</td>";
                            echo "<td>$status</td>";                       
                            echo "</tr>";
                    }
                    echo "</table>";

                    echo "</div>";
            echo "</div>";
        echo "</div>";
    }




    /*  PRIMJERI MOGUCIH QUERYA : 

        Korisnik moze unijeti slijedece podatke : godina, staza


        1. Korisnik odabire polja godina i staze.

            http://ergast.com/api/f1/2012/circuits/monza/results        ------> ovime se izbacuje rezultat utrke za odabranu sezonu i odabranu stazu


        2. Korisnik odabire samo stazu.

            http://ergast.com/api/f1/circuits/monza/results     ------> ovime se izbacuju svi rezultati utrka na odabranoj stazi od prve ikada odrzane utrke, do posljednje.

        

        Komentari : 
            -2. poziv nije bas mudar, mnoge utrke poput Monze, Spa, Silverstone-a, itd. se odrzavaju desetljecima, a bas da se sve to parsa, i prikazuje u prikladnim tablicama nije pametno


    */
    ?>

</body>


