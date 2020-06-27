<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="Bootstrap_jQuery_Popper/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="Bootstrap_jQuery_Popper/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="Bootstrap_jQuery_Popper/popper.min.js"></script>
    <script src="Bootstrap_jQuery_Popper/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="Styles/currentDriverTeamStatistics_style.css">
    <!-- <script type="text/javascript" src = "functionality.js"></script> -->
</head>

<body>
    <div class="container-fluid text-center">

        <div class="row">
            <div class="col-sm-12">
                <h1 class = "sectionHeadings" id = "currentDriversSectionHeading">Current drivers</h1>

                <?php
                try
                {
                    $tableHeader = array('Abbreviated last name','First name','Last name','Car number','Nationality','Date of birth','Team','First season','Wins');

                    $con = new PDO('mysql:host=localhost; dbname = web_projektnizadatak', "weblv", "weblv");
                    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $result = $con->query('SELECT * FROM web_projektnizadatak.driverlist');
                    $result->setFetchMode(PDO::FETCH_ASSOC);

                    echo "<table class= \"table table-striped\">";
                    echo "<tr>";
                    for($i = 0; $i < count($tableHeader); $i++)
                    {
                        echo "<th>$tableHeader[$i]</th>";
                    }
                    echo "</tr>";


                    foreach($result as $row)
                    {
                        echo "<tr>";
                        foreach($row as $name => $value)
                        {
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                catch(PDOException $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }

                ?>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" id="raceList">
                <h1 id = "raceListSectionHeading">Current race list</h1>

                <?php
                try
                {
                    $tableHeader = array('Abbreviation', 'Country', 'Location', 'Circuit', 'Date');
                    $con = new PDO('mysql:host=localhost; dbname = web_projektnizadatak', "weblv", "weblv");
                    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $result = $con->query('SELECT * FROM web_projektnizadatak.seasonracelist');
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    
                    echo "<table class= \"table table-striped\">";
                    echo "<tr>";
                    for($i = 0; $i < count($tableHeader); $i++)
                    {
                        echo "<th>$tableHeader[$i]</th>";
                    }
                    echo "</tr>";

                    foreach($result as $row)
                    {
                        echo "<tr>";
                        foreach($row as $name => $value)
                        {
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                catch(PDOException $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
                
                ?>

            </div>

        </div>
        <h1 id = "driverTeamDetailsSectionHeading">Query driver/team details</h1>
        <div class = "row" id = "detailsQuerySection">
            

            <div class = "col-sm-6" id = "chooseDriverSection">
                <form action = "PHP_scripts/driverDetails.php" method="GET">

                    <label>Choose driver : </label>
                    
                    <select name="Drivers" id="driversLastName">
                        <option value="HAM">Hamilton</option>
                        <option value="BOT">Saab</option>
                        <option value="VET">Mercedes</option>
                        <option value="LEC">Leclerc</option>
                        <option value="VER">Verstappen</option>
                        <option value="ALB">Albon</option>
                        <option value="SAI">Sainz</option>
                        <option value="NOR">Norris</option>
                        <option value="RIC">Ricciardo</option>
                        <option value="OCO">Ocon</option>
                        <option value="PER">Perez</option>
                        <option value="STR">Stroll</option>
                        <option value="GAS">Gasly</option>
                        <option value="KVY">Kvyat</option>
                        <option value="GRO">Grosjean</option>
                        <option value="MAG">Magnussen</option>
                        <option value="RAI">Räikkönen</option>
                        <option value="GIO">Giovinazzi</option>
                        <option value="RUS">Russell</option>
                        <option value="LAT">Latifi</option>
                    </select>

                    <button type="submit" class="btn btn-success">Query</button>
                </form>
            </div>

            <div class = "col-sm-6" id = "chooseTeamSection">
                <form action = "PHP_scripts/teamDetails.php" method="GET">
                    <label>Choose team : </label>

                    <select name = "Team" id = "chooseTeam">
                        <option value = "MER">Mercedes</option>
                        <option value = "FER">Ferrari</option>
                        <option value = "RBR">Red Bull Racing</option>
                        <option value = "MCL">McLaren</option>
                        <option value = "REN">Renault</option>
                        <option value = "ALF">Alfa Romeo</option>
                        <option value = "HAS">Haas</option>
                        <option value = "RCP">Racing Point</option>
                        <option value = "WIL">Williams</option>
                        <option value = "ATR">AlphaTauri</option>
                    </select>

                    <button type="submit" class="btn btn-success">Query</button>

                </form>
                    

            </div>
        </div>
    </div>



</body>