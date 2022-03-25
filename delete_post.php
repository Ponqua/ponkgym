<?php


include('connection.php');

if(isset($_POST['delete_post_btn'])){

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i",$post_id);
    
    if($stmt->execute()){

        $stmt1 = $conn->prepare("DELETE FROM comments WHERE post_id = ?");
        $stmt1->bind_param("i",$post_id);
        $stmt1->execute();

        $stmt3 = $conn->prepare("DELETE FROM likes WHERE post_id = ?");
        $stmt3->bind_param("i",$post_id);
        $stmt3->execute();

        $stmt2 = $conn->prepare("UPDATE users SET posts=posts-1 WHERE id = ?");
        $stmt2->bind_param("i",$user_id);
        $stmt2->execute();

        $_SESSION['id'] = ($user_id - 1);

        header('location: profile.php?success_message=Post deleted successfully!');

    }else{

        header('location: profile.php?error_message=Error occurred.');

    }
    exit;

}else{

    header('location: index.php');
    exit;

}


?>