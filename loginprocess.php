<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

if ($errorCount > 0) {
$session_error = "You have " . $errorCount . " error";

if ($errorCount > 1) {
    $session_error .= "s";
}

$session_error .=   " in your form submission";
$_SESSION["error"] = $session_error;

header("Location:login.php");
}else{
    echo "No errors";
}