<?php include "includes/db_connection.php" ?>
<?php include "includes/header.php" ?>

<body>
<section id="new">
        <div class="jumbotron text-center" style="margin-bottom: 0" id="favheader">
            <h1 class="menu-title" style="color: rgb(78, 68, 34); margin-top: 40px;">FAVORITES</h1><br>
            <hr style="width:50%; margin-left:25%; margin-right:25%; border-top: 1px solid black;">
        </div>

        <div class="container">

            <div class="card-deck" style="margin-bottom: 200px">
                <div class="card" style="border-radius: 20px">
                    <a href="productlist.php">
                        <img class="card-img-top" style="border-radius: 20px" class="img-responsive" src="img/FavClassicWintermelonMT.png" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">PRODUCT</h5>
                        <hr style="border-top: 1px solid;">

                        <br><br>
                    </div>
                </div>

                <div class="card" style="border-radius: 20px">
                    <a href="product_details.php?id=13">
                        <img class="card-img-top" style="border-radius: 20px" class="img-responsive" src="img/FavCookiesNCreamMS.png" alt="Card image cap">
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

                <div class="card" style="border-radius: 20px">
                    <a href="product_details.php?id=8">
                        <img class="card-img-top" style="border-radius: 20px"class="img-responsive" src="img/FavPremiumCaramelSugarMT.png" alt="Card image cap">
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
</body>

<?php include "includes/footer.php" ?>
