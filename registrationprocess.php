<?php session_start();
//collecting the data
$errorCount = 0;
// using operation to validate the inputted data
$fullname = $_POST['fullname'] != "" ? $_POST['fullname'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;


$_SESSION['fullname'] = $fullname;
$_SESSION['email'] = $email;

if ($errorCount > 0) {
    $session_error = "You have " . $errorCount . " error";

    if ($errorCount > 1) {
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location:register.php");
} else {
    //setting up the auto ID
    $allUsers = scandir("database/");
    //    print_r($allUsers);
    //    die();
    $allUsersCount = count($allUsers);
    // this is because of the 2 default files that already exist in the folder, so i had to subtract both and then add 1 which is -2+1=-1 hence the -1
    $newUserId = ($allUsersCount - 1);

    $userDetails = [
        'id' => $newUserId,
        'fullname' => $fullname,
        'email' => $email,
        //Password Encryption
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ];
    //checking if a user already exists

    for ($counter = 0; $counter < $allUsersCount; $counter++) {
        //returns the name of the file
        $currentUser = $allUsers[$counter];
        //error message
        if ($currentUser == $email . ".json") {
            $_SESSION["error"] = "Registeration Failed, User email already exists ";
            header("Location:register.php");
            die();
        }
    }
    //save registration to database folder
    file_put_contents("database/" . $userDetails['email'] . ".json", json_encode($userDetails));
}


$_SESSION["message"] = "You can now login " . $fullname;
// for redirecting to another page after completing a particular process
header("Location:login.php");
