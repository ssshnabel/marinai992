<?php
session_start();

require_once 'db.inc.php';

$enteredMail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$enteredPassword = hash('sha3-256', filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));
$loginDate = date('d-m-Y');

$requestedPassword = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_password FROM users WHERE user_mail = '$enteredMail'"));
if ($requestedPassword != NULL) {
    $realPassword = implode($requestedPassword);
}else {
    echo 'Password is empty';
    header('Location: '.'register.php');
    die;
}

$requestedStatus = mysqli_fetch_assoc(mysqli_query($connect, "SELECT status FROM users WHERE user_mail = '$enteredMail'"));
if ($requestedStatus != NULL){
    $userStatus = implode($requestedStatus);
} else{
    $userStatus = 'active';
}

$userId = null;
$requestedId = mysqli_fetch_assoc(mysqli_query($connect, "SELECT user_id FROM users WHERE user_mail = '$enteredMail'"));
if ($requestedId != NULL){
    $userId = implode($requestedId);
    settype($userId, "integer");
} else{
    echo 'Data about id are empty. Enter your data again';
}

if(($enteredPassword == $realPassword) && ($userStatus != 'blocked')){
    mysqli_query($connect, "UPDATE users SET login_date ='$loginDate' WHERE user_mail = '$enteredMail'");
    $_SESSION['userId'] = $userId;
    header('Location: '.'users_data.php');
}else {
    echo 'Incorrect password or such user is blocked';
}

mysqli_close($connect);

