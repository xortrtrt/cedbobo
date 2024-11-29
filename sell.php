<?php
session_start();
require_once('crud.php'); 
require_once('database.php');  // Include the database class

// Instantiate the Database class
$database = new Database();
$conn = $database->getConnection(); // Get the PDO connection object

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_description = htmlspecialchars($_POST['product_description']);
    $starting_price = floatval($_POST['starting_price']);

    // Handle file upload
    $target_dir = "assets/images/";  // Directory to store images
    $file_name = basename($_FILES["product_image"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $file_name;  // Use unique id to avoid name conflicts

    // Check if the file upload is valid
    if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] === UPLOAD_ERR_OK) {
        // Check if the upload directory is writable
        if (is_writable($target_dir)) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                // Insert product data into the database
                $sql = "INSERT INTO products (product_name, product_description, product_image, starting_price)
                        VALUES (?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind parameters and execute the query
                    $stmt->bindParam(1, $product_name);
                    $stmt->bindParam(2, $product_description);
                    $stmt->bindParam(3, $target_file);
                    $stmt->bindParam(4, $starting_price);
                    
                    if ($stmt->execute()) {
                        echo "Product has been added to the marketplace!";
                    } else {
                        echo "Error: " . $stmt->errorInfo()[2];
                    }
                    $stmt = null;
                } else {
                    echo "Error preparing the SQL statement.";
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Error: Upload directory is not writable.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
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
                <li class="nav-item"><a class="nav-link" href="market.php">Market</a></li>
                <li class="nav-item"><a class="nav-link" href="sell.php">Sell</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Sell Your Product</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Input for Product Name -->
        <p>Product Name</p>
        <input type="text" name="product_name" required>

        <!-- Input for Product Description -->
        <p>Product Description</p>
        <textarea name="product_description" required></textarea>

        <!-- Input for Image Upload -->
        <p>Upload Image</p>
        <input type="file" name="product_image" accept="image/*" required>

        <!-- Starting Price -->
        <p>Starting Price</p>
        <input type="number" name="starting_price" step="0.01" required>

       


        <!-- Submit Button -->
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
