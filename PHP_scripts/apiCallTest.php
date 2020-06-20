<?php
    $apiCall_string = "http://ergast.com/api/f1/2019/20/driverStandings.json";

    $response = file_get_contents("http://ergast.com/api/f1/2019/20/driverStandings.json");

    // foreach($response['items'] as $drivers)
    // {
    //     echo "Drivers : " . $drivers["German"] ."\n";
    // }

    $response = json_decode($response, true);

    //print_r($response);

    $currentDriver = $response['MRData']['StandingsTable']['StandingsLists'];
    var_dump($currentDriver[0]['DriverStandings'][0]['Driver']['driverId']); 
    echo "<br/>"; 
    // koji pohani kruh rade ove nule tu? Vjerojatno je stvar u tome sto su polja znestana, tj. kad si navigirao naredbom iznad ($response['MRData']['StandingsTable']['StandingsLists'])
    // dosao si do polja StandingsLists. Da bi uletio u to polje se stavlja [0], pa se po tom polju dalje ide kao i prije. Odabrao si kao iduci indeks DriverStandings pa si opet morao staviti
    // [0] jer je DriverStandings novo polje. Sad ponovo u tom polju se dalje normalno navigira po nazivima kljuceva tj. indeksa. 
    
    //var_dump($currentDriver[0]['DriverStandings'][2]['Constructors']);  PRIMJER PRISTUPA CONSTRUCTOR POLJU


    for($i = 0; $i < 20; $i++)
    {
      echo $i . "<br/>";
      var_dump($currentDriver[0]['DriverStandings'][$i]['Driver']['code']);
    }

    
    /*
      Vjerojatno je najbolje rjesenje da se svaki karakteristicni poziv razdvoji, tj. ako korisnik queryja samo Vozaca, postojat ce php skripta koja ce na odgovarajuci nacin vrtiti taj poziv
      i handlati parsanja i popunjavanje tablice.
    
      */

?>