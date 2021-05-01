<?php 
include 'header.php';
?>

<body class="bodycolor">

    <!--Hero Section-->
    <!--<section id="hero">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!--Indicators-->
            <!--<ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!--Wrapper for Slides-->
           <!-- <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" data-interval="7000">
                    <img class="d-md-block img-fluid" src="img/banner4.png">
                </div>
                <div class="carousel-item" data-interval="5000">
                    <img class="d-md-block img-fluid" src="img/banner3.png">
                </div>
                <div class="carousel-item" data-interval="5000">
                    <img class="d-md-block img-fluid" src="img/banner1.gif">
                </div>
                <div class="carousel-item" data-interval="5000">
                    <img class="d-md-block img-fluid" src="img/banner2.gif">
                </div>
            </div>

            <!--Left and right-->
           <!-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </section>
    </section>
    <!--End Hero Section-->

    <!--Favorites Section-->
    <section id="new">
        <div class="jumbotron text-center" style="margin-bottom: 0" id="favheader">
            <h1 class="menu-title" style="color: #725527; margin-top: 40px;">FAVORITES</h1><br>
            <hr style="width:50%; margin-left:25%; margin-right:25%">
        </div>

        <div class="container">

            <div class="card-deck" style=" margin-bottom: 200px">
                <div class="card">
                    <a href="milktWintermelon.php">
                        <img class="card-img-top" class="img-responsive" src="img/FavClassicWintermelonMT.png" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Classic Wintermelon Milktea</h5>
                        <hr style="border-top: 1px solid;">
                        <p class="card-text">This drink is light and refreshing, perfect for a hot day! The wintermelon has a distinctive flavor that resembles caramel and adds a new twist to your regular milktea drink.
                        </p>
                        <br><br>
                    </div>
                </div>

                <div class="card">
                    <a href="milkshCNC.php">
                        <img class="card-img-top" class="img-responsive" src="img/FavCookiesNCreamMS.png" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Cookies and Cream Milkshake</h5>
                        <hr style="border-top: 1px solid;">
                        <p class="card-text">A delicious milkshake made with only 3 ingredients:
                            <br>ice cream, milk, and Oreos! The perfect treat on a hot summer day.
                        </p>
                        <br><br>
                    </div>
                </div>

                <div class="card">
                    <a href="milktCaramel.php">
                        <img class="card-img-top" class="img-responsive" src="img/FavPremiumCaramelSugarMT.png" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Premium Caramel Sugar Milktea</h5>
                        <hr style="border-top: 1px solid;">
                        <p class="card-text">The perfect blend of creamy milk and tea, swirls of sweet caramel-colored sugar, chewy and tasty tapioca pearls… What's not to love about our Premium Caramel Sugar Milktea? That is for only
                            <strong>₱59!</strong>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Favorites Section-->

    <!--Menu Section-->
    <section id="menu">
        <div class="fixed-bg" id="menuheader">
            <div class="section-intro">
                <span class="title2 p-l-15 p-r-15" style="color: #322d11;">MENU</span>
            </div>
        </div>

        <div class="container" style="margin-top: 200px;">

            <div class="row">

                <div class="container1" style=" margin-bottom: 200px;">
                    <div class="centerimage">
                        <div class="col-md-12">
                            <img src="img/Milkshakes.png" alt=" " class="image">
                            <div class="middle">
                                <div class="text"><a href="milkshake.php" style="color: #F0FFF0; text-decoration: none;"><b>MILKSHAKE</b></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container2" style=" margin-bottom: 200px;">
                    <div class="centerimage">
                        <div class="col-md-12">
                            <img src="img/Milktea.png" alt=" " class="image">
                            <div class="middle">
                                <div class="text"><a href="milktea.php" style="color: #F0FFF0; text-decoration: none;"><b>MILKTEA</b></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Menu Section-->

    <!--Footer Section-->
   
</body>

<?php 
include 'footer.php';
?>