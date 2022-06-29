<?php 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> SummerPractice </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <style>       .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="register.css" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin">
    <form action="register_process.php" method="POST">
        <h1 class="register_label"> Enter the data to sign in : </h1>
        <div class="form-floating">
            <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="name" name="name" class="form-control" id="floatingName" placeholder="Name">
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <a class="register-link" href="users_data.php"> Click here to see info </a> 
</main>
</body>
</html>
