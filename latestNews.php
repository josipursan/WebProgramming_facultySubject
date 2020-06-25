<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="Bootstrap_jQuery_Popper/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="Bootstrap_jQuery_Popper/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <script src="Bootstrap_jQuery_Popper/popper.min.js"></script>
    <script src="Bootstrap_jQuery_Popper/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="Styles/latestNews_style.css">
    <!-- <script type="text/javascript" src = "functionality.js"></script> -->
</head>

<body>
    <div class="container-fluid text-center">

        <div class="row" id="newsSection">
            <div class="col-sm-12">
            <h1 class = "sectionHeadings">Latest news</h1>

                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!-- https://www.reddit.com/r/formula1/top.json     PRIMJER POZIVA DA SE POVUCE TOP POSTOVE SA SUBREDDITA FORMULA1 - TU UZMES PRVIH 5 I PROVJERISH KOJA 2-3 IMAJU NAJVISE
                UPVOTEOVA - NJIH SE PRIKAZE NA SCREENU
                MORAT CES SVE OVE CARDOVE BUILDATI U PHP-U - AKO TO NE BUDE NESTO PAMETNO, PROBAJ NAPRAVITI QUERYJANJE PODATAKA O EKIPAMA I VOZACIMA PREKO AJAXA.
                 -->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <img class="card-img-top"
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Second slide-->



                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" id="raceScheduleSection">
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
            <div class="col-sm-12" id="currentDriversSection">
                <p>Test3</p>
                <p>Test3</p>
                <p>Test3</p>
                <p>Test3</p>


            </div>

        </div>
    </div>



</body>