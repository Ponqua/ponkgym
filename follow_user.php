<?php


include('connection.php');

session_start();


if(isset($_POST['follow_btn'])){


    $user_id = $_SESSION['id'];
    $other_user_id = $_POST['other_user_id'];

    //create relationship
    $stmt = $conn->prepare("INSERT INTO followings (user_id,other_user_id) VALUES (?, ?)");
    $stmt->bind_param("ii",$user_id,$other_user_id);

    $stmt1 = $conn->prepare("UPDATE users SET following=following+1 WHERE id = ?");
    $stmt1->bind_param("i",$user_id);

    $stmt2 = $conn->prepare("UPDATE users SET followers=followers+1 WHERE id = ?");
    $stmt2->bind_param("i",$other_user_id);

    $stmt->execute();
    $stmt1->execute();
    $stmt2->execute();

    $_SESSION['following'] = $_SESSION['following']+1;

    header('location: index.php');


}else{

    header('location: index.php');

}



?>