<?php
class User {
    private $conn;
    private $table_name = "users"; 

    public $user_name;
    public $user_email;
    public $user_password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new user
    public function create() {
        // Ensure the user has provided the necessary fields
        if (empty($this->user_name) || empty($this->user_email) || empty($this->user_password)) {
            return false; 
        }

        // Insert query
        $query = "INSERT INTO " . $this->table_name . " (user_name, user_email, user_password) 
                  VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);

        // Sanitize user inputs
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->user_email = htmlspecialchars(strip_tags($this->user_email));
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);  // Hash password
        
        // Bind parameters to the query
        $stmt->bindParam(":name", $this->user_name);
        $stmt->bindParam(":email", $this->user_email);
        $stmt->bindParam(":password", $this->user_password);

        // Execute and check for success
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Login user by verifying email and password
    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_email = :email LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        // Sanitize email input
        $this->user_email = htmlspecialchars(strip_tags($this->user_email));
        $stmt->bindParam(":email", $this->user_email);

        // Execute the query
        $stmt->execute();

        // Check if email exists and verify password
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password using password_verify()
            if (password_verify($this->user_password, $row['user_password'])) {
                $this->user_name = $row['user_name'];  // Set user name
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Sell a product (insert into products table)
    public function sell($product_name, $product_description, $product_image, $starting_price, $bid_deadline) {
        // Insert query for product sale
        $query = "INSERT INTO products (product_name, product_description, product_image, starting_price, bid_deadline) 
                  VALUES (:product_name, :product_description, :product_image, :starting_price, :bid_deadline)";
        $stmt = $this->conn->prepare($query);

        // Bind the parameters to the query
        $stmt->bindParam(":product_name", $product_name);
        $stmt->bindParam(":product_description", $product_description);
        $stmt->bindParam(":product_image", $product_image);
        $stmt->bindParam(":starting_price", $starting_price);
        $stmt->bindParam(":bid_deadline", $bid_deadline);

        // Execute the query and check for success
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
