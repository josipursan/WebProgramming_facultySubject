<!DOCTPYE html>
<html lang = "en-US">

<head>
    <meta charset = "UTF-8">
    <title>Team details</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>


<body>
    <?php
    $chosenTeam = filter_input(INPUT_GET, "Team");

    $tableHeader = array('Abbreviation', 'Name', 'Predecessor', 'Country', 'First GP', 'Number of GPs', 'Wins', 'Pole positions', 'Podiums', 'WCC');

    $con = new PDO('mysql:host=localhost; dbname = web_projektnizadatak', "weblv", "weblv");
    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $con->prepare("SELECT * FROM web_projektnizadatak.teamdetails WHERE abbreviation = :abb");
    $statement->execute(array(':abb' => $chosenTeam));
    $result = $statement->fetch();

    echo "<table class= \"table table-striped\">";
    echo "<tr>";
    for($i = 0; $i < count($tableHeader); $i++)
    {
        echo "<th>$tableHeader[$i]</th>";
    }
    echo "</tr>";

    echo "<tr>";
    for($i = 0; $i < count($tableHeader); $i++)
    {
        echo "<td>";
        echo $result[$i];
        echo "</td>";
    }

    echo "</tr>";
    echo "</table>";

    ?>

</body>