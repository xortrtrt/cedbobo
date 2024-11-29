<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <script src="assets/js/alert.js"></script>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="assets/images/Logo.webp" width="45" height="55" alt="Logo">
        <a class="navbar-brand" href="#">LaptopHaven</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#brandings">Brands</a></li>
                <li class="nav-item"><a class="nav-link" href="market.php">Market</a></li>
                <li class="nav-item"><a class="nav-link" href="#sell.html">Sell</a></li>
                <li class="nav-item"><a class="nav-link" href="#footer">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="about us.html">About Us</a></li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<!-- Account SECTION -->
<section class="my-5 py-5">
    <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <h3 class="font-weight-bold">Account Info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name<span>BRUH</span></p>
                <p>Email<span>Moments</span></p>
                <p><a href="" id="order-btn">Your Orders</a></p>
                <p><a href="" id="logout-btn">Log Out</a></p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <form id="account-form">
            <h3>Chnage Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="account-password" name="password" placeholder="password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="account-confimr-password" name="confirm-password" placeholder="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>
</section>


<!-- FOOTER -->
<footer class="mt-5 py-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <img src="assets/images/Logo.webp" alt="LaptopHaven Logo" width="70" height="100">
                <p class="pt-3">We are happy that you chose LaptopHaven for your second-hand laptop hunting!</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Budget-Friendly</a></li>
                    <li><a href="#">Low-End</a></li>
                    <li><a href="#">Mid-End</a></li>
                    <li><a href="#">High-End</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5>Contact Us</h5>
                <div>
                    <h6>Andor</h6>
                    <p>123 Lipa City Batangas</p>
                </div>
                <div>
                    <h6>Del Rosario</h6>
                    <p>123 Lipa City Batangas</p>
                </div>
                <div>
                    <h6>Romero</h6>
                    <p>123 Lipa City Batangas</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

