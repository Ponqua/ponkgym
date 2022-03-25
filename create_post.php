<?php


session_start();

include("connection.php");

if(isset($_POST['upload-image-btn'])){

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $profile_image = $_SESSION['image'];
    $caption = $_POST['caption'];
    $image = "Workout".$_POST['workout'].".png";
    $likes = 0;
    date_default_timezone_set('Europe/London');
    $date = date("Y-m-d H:i:s");


    $timestamp = strval(time()); //creating a timestamp


    $stmt = $conn->prepare("INSERT INTO posts (user_id,likes,image,caption,date,username,profile_image) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("iisssss",$id,$likes,$image,$caption,$date,$username,$profile_image);

    if ($stmt->execute()){

        //increase number of posts by 1
        $stmt1 = $conn->prepare("UPDATE users SET posts=posts+1 WHERE id = ?");
        $stmt1->bind_param("i",$id);
        $stmt1->execute();

        $_SESSION['posts'] = $_SESSION['posts']+1;

        
        header('location: workouts.php?success_message=Post created!');
        exit;

    }
    else{

        header('location: workouts.php?error_message=Error occured');
        exit;

    }

}
else{

    header('location: workouts.php?error_message=Error occured');
    exit;

}



?>