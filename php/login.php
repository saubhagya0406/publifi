<?php
// Start session
session_start();

// Check if session is going on
if(isset($_SESSION['validUser'])){
    header("Location: http://localhost/publify/home.php");
}

// Include Validator
include 'validate.php';

// Checing credentials
function checkCredit($usr, $pwd){
    /**
    TODO Change this method to get database account details and varification
    */
    global $errMsg;
    if($usr=="spandanbg@gmail.com" and $pwd=="tomfoolbirch"){
        $_SESSION['validUser'] = $usr;
        return true;
    } else {
        return false;
    }
}

// Receiving post data
if($_SERVER['REQUEST_METHOD']=="POST"){
    $usr = validate($_POST['eid']);
    $psw = validate($_POST['pswd']);
    if(!empty($usr) and !empty($psw)){
        if(checkCredit($usr,$psw)){
            header("Location: http://localhost/publify/home.php");
        } else {
            $_SESSION['LoginErrorMsg'] = "Incorrect email id or password!";     // Login credit fail error
            header("Location: http://localhost/publify/");
        }
    } else {
        $_SESSION['LoginErrorMsg'] = "One or more fields were missing.";        // Empty fields error
        header("Location: http://localhost/publify/");
    }
} else {
    header("Location: http://localhost/publify/");                              // Get method used error
}
?>