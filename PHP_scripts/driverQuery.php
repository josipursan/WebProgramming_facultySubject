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
    require "APICALL_KEYWORDS.php";

    $year = filter_input(INPUT_GET, "yearInput");
    $lastName = filter_input(INPUT_GET, "lastName");

    if((isset($year) || !empty($year)) && (isset($lastName) || !empty($lastName)))
    {
        $apiCallString_additionToGetAllRacesInOneGo = '?limit=50';

        $apiCallString = $apiCallRootSection . $year . $slash . $driverStringFilter . $slash . $lastName . $slash . $resultsStringFilter . $jsonString . $apiCallString_additionToGetAllRacesInOneGo;
        $response = file_get_contents($apiCallString);
        $response = json_decode($response, true);
        
        
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

            for($j = 0; $j < 1; $j++)
            {
                isset($firstLayer[$i]['Results'][$j]['Driver']['givenName']) ? array_push($data[1], $firstLayer[$i]['Results'][$j]['Driver']['givenName']) : '/';
                isset($firstLayer[$i]['Results'][$j]['Driver']['familyName']) ? array_push($data[2], $firstLayer[$i]['Results'][$j]['Driver']['familyName']) : '/';
                isset($firstLayer[$i]['Results'][$j]['laps']) ? array_push($data[3], $firstLayer[$i]['Results'][$j]['laps']) : '/';
                isset($firstLayer[$i]['Results'][$j]['status']) ? array_push($data[4], $firstLayer[$i]['Results'][$j]['status']) : '/';
                isset($firstLayer[$i]['Results'][$j]['points']) ? array_push($data[5], $firstLayer[$i]['Results'][$j]['points']) : '/';
                isset($firstLayer[$i]['Results'][$j]['positionText']) ? array_push($data[6], $firstLayer[$i]['Results'][$j]['positionText']) : '/';
            }
        }
        buildTable_driverResults($data);
        //echo $apiCallString;
    }


    function buildTable_driverResults($twoDimDataArray)
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

                    
                    for($j = 0; $j < 1; $j++)
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
                        $twoDimDataArray[$k] = array_slice($twoDimDataArray[$k], 1);
                    }
                    echo "</table>";
                }
            
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    
    ?>

</body>