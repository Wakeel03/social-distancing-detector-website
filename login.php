<?php
 include 'config/init.php';
    session_start();
?>

<?php


$login_error_message = "";
if(!empty($_POST['btn_login'])){
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    if($username == ""){
        $login_error_message = "Username is required";
    }else if ($password == ""){
        $login_error_message = "Password is required";
    }else{
        $user = new User;
        $result = $user->login($username, $password);

        if($username == $result){
            $login_error_message="";
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }
        else{
            $login_error_message='Invalid login details!';
        }
            

    }
   
}

$template = new Template('templates/login.php');
   
    $template->title = SITE_TITLE;
    $template->loginError  = $login_error_message; 
    echo $template;

?>