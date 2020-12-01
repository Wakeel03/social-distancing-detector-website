<?php include 'config/init.php';

session_start();
?>

<?php
    $registration_error_message= "";

    if(!empty($_POST['btn_save_limit'])){
        $firstlimit = $_POST['firstlevel'];
        $secondlimit = $_POST['secondlevel'];
        $thirdlimit = $_POST['thirdlevel'];
        $fourthlimit = $_POST['fourthlevel'];
        $fifthlimit = $_POST['fifthlevel'];
 

        $user = new User;

        
        $user->add_user_level_limit ($_SESSION['username'], $firstlimit, $secondlimit, $thirdlimit, $fourthlimit, $fifthlimit);
                
        header("Location: index.php");
        }
    else{
            $template = new Template('templates/setting.php');
            $template->registrationError = $registration_error_message;
            echo $template;
    }
?>