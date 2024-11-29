<?php
class Session {
    public function __construct() {
        // Start session and regenerate session ID for security
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Regenerate session ID to prevent session fixation
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            session_regenerate_id(true);
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect after logout
        exit();
    }
}
?>
