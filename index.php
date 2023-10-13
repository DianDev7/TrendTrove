<?php
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: Login.php");
    exit;
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");


// Remove everything from the @ symbol
$trimmedEmail = substr(($_SESSION['User']), 0, strpos(($_SESSION['User']), '@'));

?>

<!--<!DOCTYPE html>-->
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="/images/logo.png">
    <title>Trend Trove</title>

    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Styles.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>

    <!--Header Start-->
    <header>

        <a href="#" class=" logo">Trend Trove</a>
        <div class="bx bx-menu" id="menu-icon"> </div>
        <ul class="navbar">
            <li><a href="Delivery.html">Delivery</a></li>
            <li><a href="#TopBoxPanel">Shop</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="Login.php">Logout</a></li>
        </ul>
        <script>
            document.getElementById("menu-icon").addEventListener("click", function() {
                var navbar = document.querySelector(".navbar");
                navbar.classList.toggle("active");
            });
        </script>



        <div class="icons">
            <a href="Cart.php"><i class='bx bxs-shopping-bag'></i> </a>
            <p> <?php echo $trimmedEmail  ?> </p>
        </div>

    </header>
    <!--Shop Start-->
    <section class="TopBoxPanel" id="TopBoxPanel">

        <div class="TopContainer">

            <div class="box">
                <a href="Mens.php?page=Mens">
                    <img src="/images/MENS.jpg">
                </a>
                <h4>Mens</h4>
                <div class="cart">
                    <a href="#"><i class='bx bx-cart'></i></a>
                </div>
            </div>

            <div class="box">
                <a href="Womens.php?page=Womens">
                    <img src="/images/Women.jpg">
                </a>
                <h4>Womens</h4>
                <div class="cart">
                    <a href="#"><i class='bx bx-cart'></i></a>
                </div>
            </div>

            <div class="box">
                <a href="Kids.php?page=Kids">
                    <img src="/images/kids.webp">
                </a>
                </a>

                <h4>Kids</h4>
                <div class="cart">
                    <a href="#"><i class='bx bx-cart'></i></a>
                </div>
            </div>

            <div class="box">
                <a href="Beauty.php?page=Beauty">
                    <img src="/images/beauty.webp">

                </a>
                <h4>Beauty</h4>
                <div class="cart">
                    <a href="#"><i class='bx bx-cart'></i></a>
                </div>
            </div>


        </div>

    </section>

    <div class="Banner">
        <img style="width: 100%;" ; src="./images/Banner.webp">
    </div>


    <section class="NewArrivals" id="NewArrivals">
        <h2>New Arrivals !</h2>

        <div class="carousel-container">
            <div class="carousel-wrapper">
                <div class="carousel-items">
                    <!-- Add your five item containers here -->
                    <div class="item-container">
                        <h4>Plain Red Shirt</h4>
                        <p>R150.99</p>
                        <img style="height: 100% ;" src="/images/item4.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>Black Shirt</h4>
                        <p>R170.99</p>

                        <img style="height: 100% ;" src="/images/item2.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>Pump Shirt</h4>
                        <p>R179.99</p>

                        <img style="height: 100% ;" src="/images/item3.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>More Shirt</h4>
                        <p>R220.00</p>
                        <img style="height: 100% ;" src="/images/item1.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>Plain Shirt</h4>
                        <p>R100.99</p>
                        <img style="height: 100% ;" src="/images/item5.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>Alpaca Shirt</h4>
                        <p>R135.99</p>
                        <img style="height: 100% ;" src="/images/item6.webp">
                        <!-- Add other details for the item -->
                    </div>
                    <div class="item-container">
                        <h4>Nike Shirt</h4>
                        <p>R29.99</p>
                        <img style="height: 100% ;" src="/images/item7.webp" "> 
                      <!-- Add other details for the item -->
                    </div>
                </div>
                  
                </div>
              
            </div>    
    </section>
    <div class=" Banner">
                        <img style="width: 100%;" ; src="./images/3for2banner.jpg">
                    </div>



                    <!--  about start  -->
                    <section class="about" id="about">
                        <div class="about-content">
                            <h2>About</h2>
                            <p>"
                                Introducing TrendTrove - Where Fashion Meets Confidence!

                                Welcome to TrendTrove, where fashion meets flair. Explore our handpicked selection of trendy and stylish clothing, designed to elevate your wardrobe. Embrace your individuality and discover your perfect look with TrendTrove.
                            </p>
                        </div>
                    </section>

                    <!--Contact Start-->
                    <section class="contact" id="contact">
                        <div class="main-contact">
                            <div class="contact-content">
                                <li><a href="index.php">Shop</a></li>
                                <li><a href="#about">About</a></li>

                                <li><a href="#contact">Contact</a></li>
                            </div>
                            <div class="contact-content">
                                <li><a href="#">Shipping & Returns</a></li>
                                <li><a href="#">Store Policy</a></li>
                                <li><a href="#">Payment Methods</a></li>

                            </div>

                            <div class="contact-content">
                                <li>Contact</li>
                                <li>Tel: +27 76 707 4101</li>


                            </div>

                            <div class="contact-content">
                                <li><a href="https://www.facebook.com/trendtrove/">Facebook</a></li>
                                <li><a href="https://www.instagram.com/trendtrove.in/">Instagram</a></li>
                                <li><a href="https://twitter.com/trovedao_?lang=en">Twitter</a></li>

                            </div>


                        </div>


                        <div class="last">
                            <p> 2023 by Trend Trove. Proudly created with DevHart7</p>
                        </div>

                    </Section>


</body>



</html>