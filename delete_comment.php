<?php


include('connection.php');

if(isset($_POST['delete_comment_btn'])){

    $comment_id = $_POST['comment_id'];

    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i",$comment_id);
    
    if($stmt->execute()){

        header('location: profile.php?success_message=Comment deleted successfully!');

    }else{

        header('location: profile.php?error_message=Error occurred.');

    }
    exit;

}else{

    header('location: index.php');
    exit;

}


?>