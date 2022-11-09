<?php
session_start();
ob_start();
$root = __DIR__;
define("base_url", "localhost/sappachok/");
include($root . "/db_connect.php");
if (!isset($_SESSION['login']))
{
    header("location: " . base_url . "login.php");
}
function changeLocate($location = null)
{
    if ($_SESSION['user_type'] == "admin")
    {
        echo base_url . "admin/" . $location;
    } 
    elseif ($_SESSION['user_type'] == "restaurant")
    {
        echo base_url . "restaurant/" . $location;
    } 
    elseif ($_SESSION['user_type'] == "customer")
    {
        echo base_url . "customer/" . $location;
    } 
    elseif ($_SESSION['user_type'] == "rider")
    {
        echo base_url . "rider/" . $location;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="<?php echo base_url . "bootstrap/dist/css/bootstrap.min.css"; ?>">
    <script src="<?php echo base_url . "bootstrap/dist/js/bootstrap.min.js"; ?>"></script>
    <script src="<?php echo base_url . "bootstrap/dist/js/bootstrap.bundle.min.js"; ?>"></script>

    <title>Document</title>
    <style>
        body, html {
            background-color: #f7f7f7;
            color: black;
        }
    </style>
</head>
<nav class="navbar navbar-dark bg-danger sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php changeLocate(); ?>">Sappachok's Food</a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-lg-0">
            <li><a href="<?php changeLocate(); ?>"class="nav-link px-2 text-white">Home</a></li>
        </ul>
        <form class="d-flex" method="post">
            <div class="btn-group">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <span class='text-white'><?php echo $_SESSION['username']; ?></span>
                    <?php if (empty($_SESSION['picture']) || ctype_space($_SESSION['picture'])) { ?>
                        <img src="<?php echo base_url . "img/KoonBest.png"; ?>" alt="delicious?" width="35" height="35" class="rounded-circle">
                    <?php } else { ?>
                        <img src="<?php echo base_url . "img/" . $_SESSION['picture']; ?>" alt="delicious?" width="35" height="35" class="rounded-circle">
                    <?php } ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm-start dropdown-menu-lg-end dropdown-menu-dark">
                    <li><a class="dropdown-item" href="<?php echo base_url . "action/profile.php"; ?>">โปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url . "action/password.php"; ?>">เปลี่ยนรหัส</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url . "action/logout.php"; ?>">ออกจากระบบ</a></li>
                </ul>
            </div>
        </form>
    </div>
</nav>