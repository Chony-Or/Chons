<!DOCTYPE html>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lhoyzki Milkshake & Milktea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css" type="text/css">
    <link rel="icon" href="img/colored logo.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</head>

<!--Header-->
<section id="header">
        <nav class="navbar navbar-expand-xl fixed-top navbar-light">
            <div class="container">
            <a class="navbar-brand" href="#header"><img id="navbarBrand" src="img/coloredlogo.png" style="margin-left: 30px;" width="90" height="60"><span>Lhoyzki</span></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarMenu">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="HomePage.php" >HOME</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="HomePage.php#new">FAVORITES</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true">MENU</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            
                                <a class="dropdown-item" href="product.php?code=MilkShake">Milkshake</a>
                                <a class="dropdown-item" href="product.php?code=MilkTea">Milktea</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#about">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cart.php">
                                <img src="https://img.icons8.com/dotty/40/000000/add-shopping-cart.png"/>
                                <div class="addcart-icon">
                                    <center><span class="addcart-text">0</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!--End Header-->

    <script>
        $(window).scroll(function() {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
        });
    </script>

</html>


