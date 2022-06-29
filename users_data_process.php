<?php
session_start();

require_once 'db.inc.php';

$selectUser = $_POST['select_user'];
$blockButton = $_POST['block'];
$unblockButton = $_POST['unblock'];
$deleteButton = $_POST['delete'];

if (isset($selectUser)){
    foreach ($selectUser as $id){
        if (isset($unblockButton)){
            mysqli_query($connect, "UPDATE users SET status = 'active' WHERE user_id = '$id'");
            header( 'location: '.'users_data.php');
        }
        elseif (isset($blockButton)){
            mysqli_query($connect, "UPDATE users SET status = 'blocked' WHERE user_id = '$id'");
            foreach (mysqli_fetch_assoc(mysqli_query($connect,"SELECT id FROM users WHERE status = 'blocked'")) as $id){
                $id = implode($id);
                if ($_SESSION['userId'] = settype($id, "integer")){
                    unset($_SESSION['userId']);
                    session_destroy();
                    header( 'location: /');
                }
            }
        }

        elseif (isset($deleteButton)){
            mysqli_query($connect, "UPDATE users SET status = 'deleted' WHERE user_id = '$id'");
            foreach (mysqli_fetch_assoc(mysqli_query($connect,"SELECT id FROM users WHERE status = 'deleted'")) as $id){
                $id = implode($id);
                if ($_SESSION['userId'] = settype($id, "integer")){
                    unset($_SESSION['userId']);
                    session_destroy();
                    header( 'location: /');
                }
            }
        }
    }
}
mysqli_close($connect);





