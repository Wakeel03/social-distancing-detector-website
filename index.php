<?php include 'config/init.php';?>

<?php
    #session_start();

    #$current_user = $_SESSION['user_id'];
    
    $template = new Template('templates/index.php');
    $template->title = SITE_TITLE;

    #$user_obj = new User;
    #$user = $user_obj->getUserById($current_user);
    #$posts = $user_obj->getPostsByUserId($current_user);
    #$number_post = count($posts);
    //echo $user->first_name;
    #$template->user = $user;
    #$template->posts = $posts;
    #$template->number_post = $number_post;

    echo $template;

?>