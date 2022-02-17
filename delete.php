<?php include "includes/heder.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: http://localhost/sex/profile.php');
    die;
}

delete_link($_GET['id']);
$_SESSION['success'] = 'Удалено';
header('Location: http://localhost/sex/profile.php');
die;
