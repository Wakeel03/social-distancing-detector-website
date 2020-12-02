<?php include 'config/init.php';?>
<?php
    session_start();
    $registration_error_message ="";
     if(!empty($_POST['btn_register'])){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['inputEmail'];
        $username = $_POST['Username'];
        $password = $_POST['inputPassword'];
        $repeatPassword = $_POST['repeatPassword'];
        $companyName= $_POST['inputCompanyName'];

        $user = new User;

        if($password != $repeatPassword){
            $registration_error_message =  "Passwords do not match";
        }else{
            if($user->foundSimilarUsername($username)){
                $registration_error_message =  "Username is already taken";   
            }
            else{
                $result = $user->register($firstname, $lastname, $username, $password, $email, $companyName);
                header("Location: login.php");
            }
                
        }
    }

    else{
    $registration_error_message = "";
    $template = new Template('templates/register.php');
    $template->registrationError = $registration_error_message;
    echo $template;
}

?>