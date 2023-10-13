<?php
session_start();
require("./Functions.php");
// Remove everything from the @ symbol
$trimmedEmail = substr(($_SESSION['User']), 0, strpos(($_SESSION['User']), '@'));
?>

<script>
    var cartItems = sessionStorage.getItem("cartItems") ? JSON.parse(sessionStorage.getItem("cartItems")) : [];

    window.addEventListener("DOMContentLoaded", function() {
        var table = document.querySelector(".table");

        cartItems.forEach(function(item, index) {
            var header = item["header"];
            var price = item["price"];
            var img_path = item["img_path"];

            var row = document.createElement("tr");

            var itemColumn = document.createElement("td");
            var cartInfoDiv = document.createElement("div");
            cartInfoDiv.classList.add("cart-info");

            var img = document.createElement("img");
            img.src = img_path;
            cartInfoDiv.appendChild(img);

            var infoDiv = document.createElement("div");
            var itemName = document.createElement("p");
            itemName.textContent = header;
            infoDiv.appendChild(itemName);

            var itemPrice = document.createElement("small");
            itemPrice.textContent = "Price: " + price;
            infoDiv.appendChild(itemPrice);

            var removeLink = document.createElement("a");
            removeLink.href = "#";
            removeLink.textContent = "Remove";
            removeLink.addEventListener("click", function() {
                cartItems.splice(index, 1);
                sessionStorage.setItem("cartItems", JSON.stringify(cartItems));
                table.removeChild(row);
            });
            infoDiv.appendChild(removeLink);

            cartInfoDiv.appendChild(infoDiv);
            itemColumn.appendChild(cartInfoDiv);
            row.appendChild(itemColumn);

            var subtotalColumn = document.createElement("td");
            subtotalColumn.textContent = price;
            row.appendChild(subtotalColumn);

            table.appendChild(row);
        });
    });
</script>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="/images/logo.png">
    <title>Trend Trove</title>

    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <link rel="stylesheet" type="text/css" href="Styles.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <a href="#" class="logo">Trend Trove</a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="Delivery.html">Delivery</a></li>
            <li><a href="index.php">Shop</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
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

    <!DOCTYPE html>
    <html>

    <head>
        <title>Shopping Cart</title>
    </head>

    <body>
    </body>

    <div style="margin-top: 100px" class="CartContainer">
        <table class="table">
            <tr>
                <th>Product</th>
                <th>Subtotal</th>
            </tr>
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>R1525.98</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>R16.45</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>R1542.43</td>
                </tr>
            </table>
        </div>
    </div>

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
                <li><a href="#">Contact</a></li>
                <li><a href="#">Tel: +27 76 707 4101</a></li>
            </div>
            <div class="contact-content">
                <li><a href="https://www.facebook.com/trendtrove/">Facebook</a></li>
                <li><a href="https://www.instagram.com/trendtrove.in/">Instagram</a></li>
                <li><a href="https://twitter.com/trovedao_?lang=en">Twitter</a></li>
            </div>
        </div>
        <div class="last">
            <p>2023 by Trend Trove. Proudly created with DevHart7</p>
        </div>
    </section>
</body>

</html>