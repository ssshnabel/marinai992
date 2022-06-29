<?php

require_once 'db.inc.php';

$users = mysqli_query($connect, "SELECT * FROM users");
$users = mysqli_fetch_all($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Task3 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="users_data.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="text-center">
            <div class="index-link-wrapper">
                <a class="index-link" href="index.php"> Click here to return to the main page </a>
            </div>
            <div class="toolbar">
                <form class="toolbar-form" action="users_data_process.php" method="post">
                    <button type="submit" name="block" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="block" title="Block">
                        <img class= "button-image" src="icons/block.svg"> Block
                    </button>

                    <button type="submit" name="unblock" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="unblock" title="Unblock">
                        <img class= "button-image" src="icons/unblock.svg"> Unblock
                    </button>

                    <button type="submit" name="delete" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="delete" title="Delete">
                        <img class= "button-image" src="icons/delete.svg"> Delete
                    </button>
                </form>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="main-checkbox" name="main-checkbox">
                                <label class="form-check-label" for="main-checkbox">
                                    Select all/Remove selection
                                </label>
                        </div>
                    </th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Register date</th>
                    <th scope="col">Last login date</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($users as $info){
                ?>
                    <tr scope="row">
                       <td>
                           <div class="form-check">
                               <form action="users_data_process.php" id="controls" method="post">
                                   <input class="form-check-input" type="checkbox" name="select_user[]" value="<?= $info[0] ?>">
                               </form>
                           </div>
                       </td>
                        <td> <?= $info[0] ?> </td>
                        <td> <?= $info[2] ?> </td>
                        <td> <?= $info[3] ?> </td>
                        <td> <?= $info[4] ?> </td>
                        <td> <?= $info[6] ?> </td>
                        <td> <?= $info[5] ?> </td>
                    </tr>
                <?php
                }
                ?>
                <script>
                    let checks = document.getElementsByName("select_user[]");
                    checks.forEach(setCheck);
                    function setCheck() {
                        $('#main-checkbox').click(function(){
                            if ($(this).is(':checked')){
                                $('#controls input:checkbox').prop('checked', true);
                            } else {
                                $('#controls input:checkbox').prop('checked', false);
                            }
                        });
                    }
                </script>
                </tbody>
            </table>

</body>
</html>

<?php
mysqli_close($connect);
?>