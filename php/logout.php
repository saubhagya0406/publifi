<?php
// Start session
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

// Send back to login page;
header("Location: http://localhost/publify/");
?>