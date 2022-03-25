<?php

session_start();

include('connection.php');

if(isset($_POST['comment_btn'])){

    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $comment_text = $_POST['comment_text'];
    $profile_image = $_SESSION['image'];
    date_default_timezone_set('Europe/London');
    $date = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO comments (post_id,user_id,username,profile_image,comment_text,date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss",$post_id,$user_id,$username,$profile_image,$comment_text,$date);
    
    if($stmt->execute()){

        header('location: single_post.php?post_id='.$post_id."&success_message=Comment was submitted!");

    }else{

        header('location: single_post.php?post_id='.$post_id."&error_message=Couldn't submit comment.");

    }
    exit;

}else{

    header('location: index.php');
    exit;

}


?>