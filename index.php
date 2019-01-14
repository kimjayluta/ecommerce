<?php include "header.php";
session_start();
$loggedIn = true;
if (!$_SESSION){
    $loggedIn = false;
} else {
    if($_SESSION['type'] == '1'){
        header('location: admin/dashboard.php');
    }
}

?>

<title>TheClothing Co.</title>
<link rel="stylesheet" href="css/index.css">

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand txtColor txt" href="#" style="margin-right: 35rem !important;">
        <strong style="font-family: 'Open Sans', sans-serif;">TheClothing Co.</strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link  thirdItem txtColor txt" href="#bestSell">
                Best seller
            </a>
            <hr id="hrThree">
        </li>
        <li class="nav-item">
            <a class="nav-link fourthItem  txtColor txt" href="#newArr">New arrival</a>
            <hr id="hrFour">
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle txtColor fifthItem txt" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown">
                Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="">
                <h4 class="dropdown-header"><strong>Shop by categories</strong></h4>
                <a class="dropdown-item txtColor" href="#">T-Shirt</a>
                <a class="dropdown-item txtColor" href="#">Shorts</a>
                <a class="dropdown-item txtColor" href="#">Pants</a>
                <a class="dropdown-item txtColor" href="#">Shoes</a>
                <a class="dropdown-item txtColor" href="#">Jackets</a>
                <h4 class="dropdown-header"><strong>Shop by gender</strong></h4>
                <a class="dropdown-item txtColor" href="#">Men's</a>
                <a class="dropdown-item txtColor" href="#">Women's</a>
            </div>
        </li>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle txtColor txt" href="" id="navbarDropdown"
                    role="button" data-toggle="dropdown">
                    <i class="fas fa-user fa-lg"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -9rem;top: 26px;">
                    <?php
                    if (!$loggedIn){
                        echo '<a class="dropdown-item txtColor" href="signup.php">Create new account</a>';
                        echo '<a class="dropdown-item txtColor" href="login.php">Login account</a>';
                    } else {
                        echo '<a class="dropdown-header dropdown-item" href="#">
                                <h6 class="m-0">Hi, '.$_SESSION['usn'].'</h6>
                              </a>';
                        echo '<a class="dropdown-item txtColor" href="#">Account settings</a>';
                        echo '<a class="dropdown-item txtColor" href="includes/account_function.php?logout">Sign out</a>';
                    }
                    ?>

                </div>
            </li>
        </ul>
    </div>
  </div>
</nav>
<!-- Carousel and background image-->
<section>
    <div class="container-fluid bgImg" style="background-image: url('img/background.jpg');">
        <!--Carousel-->
        <div class="container ctn">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card txtColor" style="background-color: #ffffff00;border: 0;">
                            <div class="card-body">
                                <span class="card-title" style="font-size: 48px;">TheClothing Co.</span>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Welcome in best boutique online shop.
                                </h6>
                                <a href="home.php" class="card-link btn btn-outline-primary">SHOP NOW </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card txtColor" style="background-color: #ffffff00;border: 0; ">
                            <div class="card-body">
                                <span class="card-title" style="font-size: 50px;">Just For You</span>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Hand picked pieces for your personal style
                                </h6>
                                <a href="home.php" class="card-link btn btn-outline-primary">SHOP NOW </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card txtColor" style="background-color: #ffffff00;border: 0;">
                            <div class="card-body">
                                <span class="card-title" style="font-size: 50px;">Holiday season!</span>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Wait for our holiday 50% sale, Coming Soon!
                                </h6>
                                <a href="home.php" class="card-link btn btn-outline-primary">SHOP NOW </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Arrival Section -->
<section id="newArr">
    <div class="container mt-5">
        <div class="col text-center">
            <h2>Let's shop now</h2>
            <h1>New Arrivals</h1>
        </div>
        <div class="row" style="margin-top: 35px;">
            <div class="col p-0" ">
                <div class="card cd" id="cardOne" style="margin-left: 126px;">
                    <img src="img/c1.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf" id="cdOne">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Brown Glasses</h3>
                            <h4 style="text-align: center">₱500.00</h4>
                            <a href="home.php" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <div class="card cd" id="cardTwo" >
                    <img src="img/c2.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Men's Shoes</h3>
                            <h4 style="text-align: center">₱2,500.00</h4>
                            <a href="home.php" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <div class="card cd" id="cardThree" style="margin-right: 114px;">
                    <img src="img/c3.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Red Snapback</h3>
                            <h4 style="text-align: center">₱1,250.00</h4>
                            <a href="home.php" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col p-0" >
                <div class="card cd" id="cardFour" style="margin-left: 126px;">
                    <img src="img/c4.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Black Glass</h3>
                            <h4 style="text-align: center">₱750.00</h4>
                            <a href="#" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col p-0" >
                <div class="card cd" id="cardFive">
                    <img src="img/c5.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Women's shoes</h3>
                            <h4 style="text-align: center">₱2,500.00</h4>
                            <a href="#" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col p-0" >
                <div class="card cd" id="cardSix" style="margin-right: 114px;">
                    <img src="img/c6.PNG" alt="Card image cap" class="cdImg">
                    <div class="card cdEf">
                        <div class="card-body txtColor" style="padding-top: 100px;">
                            <h3 style="text-align: center">Pink Backpack</h3>
                            <h4 style="text-align: center">₱1,550.00</h4>
                            <a href="#" class="btn btn-outline-primary" style="width: 142px; margin-left: 4rem;">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-dark" style="margin: 30px 0 10px 31rem;">View more</a>
        <hr id="menAndWomen" style="border: 0;">
    </div>
</section>
<!-- men and women -->
<section >
    <div class="container-fluid" style="margin-top: 50px; height: 30rem;">
        <div class="row">
            <div class="col p-0">
                <div class="card" style="border: 0 !important;">
                    <img src="img/women.jpg" alt="" style="width: 100%; position: relative;">
                    <div style="position: relative; top: -105px; margin-left: 13rem;">
                        <h2 style="color: whitesmoke;">Women's</h2>
                        <a href="" class="btn bn" >Shop this</a>
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <div class="card" style="border: 0 !important;">
                    <img src="img/men.jpg" alt="" style="width: 100%; position: relative;">
                    <div style="position: relative; top: -105px; margin-left: 20rem;">
                        <h2 style="color: whitesmoke;">Men's</h2>
                        <a href="" class="btn bn">Shop this</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Best seller-->
<section id="bestSell">
    <div class="container" style="margin-top: 7rem;">
        <div class="row">
            <div class="col text-center" >
                <h1>The best seller of all time!</h1>
            </div>
        </div>
        <div class="row" style="margin-top: 35px">
            <div class="col-lg-3">
                <div class="card" style="border: 0 !important;">
                    <img class="card-img-top" src="img/b1.PNG" alt="No image">
                    <div class="card-body">
                        <h6 class="card-title">Bomber Jacket</h6>
                        <p class="card-text">
                            ₱1,099.00
                        </p>
                        <a href="#" class="btn btn-dark">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="border: 0 !important;">
                    <img class="card-img-top" src="img/b2.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title">Basic Hoodie</h6>
                        <p class="card-text">
                            ₱899.00
                        </p>
                        <a href="#" class="btn btn-dark">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="border: 0 !important;">
                    <img class="card-img-top" src="img/b3.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title">Knitted Top</h6>
                        <p class="card-text">
                            ₱399.00
                        </p>
                        <a href="#" class="btn btn-dark">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card" style="border: 0 !important;">
                    <img class="card-img-top" src="img/b4.PNG" alt="Card image cap" style="height: 381px; ">
                    <div class="card-body">
                        <h6 class="card-title">Pullover With Print</h6>
                        <p class="card-text">
                            ₱699.00
                        </p>
                        <a href="#" class="btn btn-dark">View more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<section class="txtColor" style="background: url('img/f1.jpg') no-repeat fixed center; background-size: 100% 100%;">
    <div class="container-fluid" style="height: 21rem;padding-top: 45px; margin-top: 45px">
        <div class="row">
            <div class="col-5">
                <div class="card" style="background-color: transparent; border:0;">
                    <h5 style="text-align: center">TheClothing Co.</h5>
                    <small style="text-align: center">
                        As Asia’s Online Fashion Destination, we create endless style possibilities throughan
                        ever-expanding range of products form the most coveted international and local brands,
                        putting you at the centre of it all.
                    </small>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="background-color: transparent; border:0; float: right;">
                    <ul style="list-style: none">
                        <li><p class="m-0">Information</p></li>
                        <li><small>Terms and Conditions</small></li>
                        <li><small>Return Policy</small></li>
                        <li><small>About us</small></li>
                        <li><small>Shipping and delivery</small></li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="background-color: transparent; border:0;float: right;">
                    <ul style="list-style: none">
                        <li><p class="m-0">Developers</p></li>
                        <li><small>Kim Jay Luta</small></li>
                        <li><small>Jed Alcantara</small></li>
                        <li><small>Christian Retubio</small></li>
                        <li><small>John Harley Ascuncion</small></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 30px 0 0 35rem">
            <h6>FIND US ON</h6>
        </div>
        <div class="row" style="color: whitesmoke;">
            <div class="col" style="padding: 10px 0 0 31rem">
                <i class="fab fa-facebook-f fa-2x"></i>
                <i class="fab fa-twitter fa-2x pl-4"></i>
                <i class="fab fa-instagram fa-2x pl-4"></i>
                <i class="fab fa-pinterest-square fa-2x pl-4"></i>
                <i class="fab fa-linkedin-in fa-2x pl-4"></i>
            </div>
        </div>
        <div class="row" style="margin: 10px 0 0 33rem">
            <small>Copyright © 2018 AMACIANS</small>
        </div>
    </div>
</section>
<!-- Js -->
<script>
$(document).ready(
    $('.thirdItem').hover(
        function () {
            $('#hrThree').addClass('hr');
        },
        function () {
            $('#hrThree').removeClass('hr');
        }
    ),
    $('.fourthItem').hover(
        function () {
            $('#hrFour').addClass('hr');
        },
        function () {
            $('#hrFour').removeClass('hr');
        }
    )
)
</script>
<?php include "footer.php"?>