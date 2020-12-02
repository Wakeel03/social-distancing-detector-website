<?php
 include 'config/init.php';
    session_start();
?>

<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $username = $_SESSION['username'];
    $user_obj = new User;
    $date = '2020-12-01';
    $cam = 1;

    if (!empty($_GET['btn_getRecord'])){
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        $date = $year . "-" . $month . "-" . $day;
        $cam = (int)$_GET['camera'];

        $_SESSION['date'] = $date;
        $_SESSION['cam'] = $cam;
    }



    $user_cameras = $user_obj->getCameras($username);
    #echo $username;
    #var_dump($user_cameras);
    #die;
    $template = new Template('templates/report.php');
   
    $template->title = SITE_TITLE;
    $template->user_cams = $user_cameras;
    echo $template;

?>      