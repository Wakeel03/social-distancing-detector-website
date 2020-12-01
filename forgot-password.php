<?php include 'config/init.php';?>

<?php
    if(!empty($_POST['btn_forgetPassword'])){
        $username=$_POST['inputUsername'];
        $newpassword=$_POST['inputNewPassword'];

        if($username == ""){
            $login_error_message = "Username is required";
        }else if ($password == ""){
            $login_error_message = "new Password is required";
        }else{
            $user = new User;
            $username = $user->updatePassword($username, $newpassword);

            if($username){
                $login_error_message="";
                header("Location: login.php");
            }
            else{
                $login_error_message='Invalid details!';
            }
        }
   
}

$template = new Template('templates/forgot-password.php');
$template->title = SITE_TITLE;
$template->loginError  = $login_error_message; 
echo $template;

?>