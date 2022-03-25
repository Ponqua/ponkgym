<?php

include('connection.php');


$user_id = $_SESSION['id'];
$post_id = $post['id'];

$stmt = $conn->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
$stmt->bind_param("ii",$user_id,$post_id);
$stmt->execute();

$stmt->store_result();
if($stmt->num_rows() > 0){

    $like_status = true;

}else{

    $like_status = false;

}


?>