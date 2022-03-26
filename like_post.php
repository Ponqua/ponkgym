<?php


include('connection.php');

session_start();


if(isset($_POST['heart_btn'])){


    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    //associate user with post
    $stmt = $conn->prepare("INSERT INTO likes (user_id,post_id) VALUES (?, ?)");
    $stmt->bind_param("ii",$user_id,$post_id);

    //increase no. likes on post
    $stmt1 = $conn->prepare("UPDATE posts SET likes=likes+1 WHERE id = ?");
    $stmt1->bind_param("i",$post_id);

    $stmt->execute();
    $stmt1->execute();

    header('location: index.php');


}else{

    header('location: index.php');

}



?>