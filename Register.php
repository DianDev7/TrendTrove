<?php

require_once("./Functions.php");
// Get the form values using $_POST
if (isset($_POST['Submit'])) {
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $repassword = $_POST['RePassword'];

  // Create an instance of the class
  $conn = new Database();

  //SQL query to insert the values into the database
  $sql = "INSERT INTO users (Email, Password, RePassword)
VALUES ('$email', '$password', '$repassword')";

  // Execute the query and check if any data are returned
  $conn->query($sql);
  $result = $conn->execute();

  if ($result) {
    // User data found
    $_SESSION['User'] = $email;
    echo "<script>window.location.replace('Login.php')</script>";
    exit;
  } else {
    // User data not found
    echo '<script>alert("Did not Register!");</script>';
  }
  unset($_POST['Email']);
  unset($_POST['Password']);
}


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
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </header>
  <!--Shop Start-->
  <div class="RegisterContainer">
    <h1>Register Page</h1>

    <form action="Register.php" method="post">

      <label for="Email">Email Address:</label>
      <input type="text" id="Email" name="Email" required>

      <label for="Password">Password:</label>
      <input type="password" id="Password" name="Password" required>

      <label for="RePassword">Retype Password:</label>
      <input type="password" id="RePassword" name="RePassword" required>



      <input type="submit" value="Submit" name="Submit">
      <button id="Login-button">Login</button>
    </form>
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
<script>
  // Get the register button element
  var LoginButton = document.getElementById("Login-button");

  // Add click event listener to the register button
  LoginButton.addEventListener("click", redirectToLogin);

  function redirectToLogin(event) {
    event.preventDefault(); // Prevent form submission

    var emailInput = document.getElementById("Email");
    var passwordInput = document.getElementById("Password");
    var repasswordInput = document.getElementById("RePassword");
    // Remove the required attribute from the text areas
    emailInput.removeAttribute("required");
    passwordInput.removeAttribute("required");
    repasswordInput.removeAttribute("required");

    // Redirect to the login page
    window.location.href = "Login.php";

    // Add the required attribute from the text areas
    emailInput.required = true;
    passwordInput.required = true;
    repasswordInput.required = true;
  }
</script>
<style>
  body {
    background-color: lightgrey;
    padding-top: 7%;

  }

  .RegisterContainer {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
    margin-bottom: 5%;
  }

  form {
    margin-top: 20px;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="password"],
  textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
  }

  .RegisterContainer button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;


  }

  .button:hover {
    background-color: #45a049;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>