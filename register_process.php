<?php

require_once 'db.inc.php';

if(!empty($_POST['mail'])){
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
} else {
    echo 'Mail is empty', PHP_EOL;
    die;
  }

if(!empty($_POST['name'])) {
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
} else echo 'Name is empty', PHP_EOL;

if (!empty($_POST['password'])) {
    $password = hash('sha3-256', filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));
} else echo 'Password is empty', PHP_EOL;

$registerDate = date('d-m-Y');
$loginDate = date('d-m-Y');

$requestedStatus = mysqli_fetch_assoc(mysqli_query($connect, "SELECT status FROM users WHERE user_mail = '$mail'"));
    if ($requestedStatus != NULL){
        $userStatus = implode($requestedStatus);
        if($userStatus != 'blocked'){
            $insertQuery = "INSERT INTO users (`user_name`, `user_mail`, `user_password`, `register_date`, `login_date`, `status`) VALUES ('$name', '$mail', '$password', '$registerDate', '$loginDate', 'active')";
            mysqli_query($connect, $insertQuery);
        } else echo 'The user is blocked';
    } else{
        $insertQuery = "INSERT INTO users (`user_name`, `user_mail`, `user_password`, `register_date`, `login_date`, `status`) VALUES ('$name', '$mail', '$password', '$registerDate', '$loginDate', 'active')";
        mysqli_query($connect, $insertQuery);
    }

header('Location: /');
mysqli_close($connect);



