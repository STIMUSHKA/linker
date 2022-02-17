<?php include "includes/heder.php";

if (isset($_POST['link']) && !empty($_POST['link']) && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    if(add_link($_POST['user_id'], $_POST['link'])) {
        $_SESSION['success'] = 'Добавил';
    } else {
        $_SESSION['error'] = 'Хуйня какая-то';
    }
}


echo $_POST['link'] . $_POST['user_id'];

header('Location: http://localhost/sex/profile.php');
die;
