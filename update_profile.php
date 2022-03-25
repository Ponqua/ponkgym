<?php 


session_start();

include("connection.php");

if(isset($_POST['update_profile_btn'])){

    $user_id = $_SESSION['id'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $image = $_FILES['image']['tmp_name']; //actual image file


    if($image != ""){

        //name that refers to file
        $image_name = $username."_pic.png";

    }
    else{

        $image_name = $_SESSION['image'];

    }

    
    //username is unique
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0 && $username != $_SESSION['username']){

        header("location: edit_profile.php?error_message=username already exists");
        exit;

    }
    else{

        updateProfileComments($conn,$username,$image_name,$user_id);
        
        updateProfilePosts($conn,$username,$image_name,$user_id);

        $stmt = $conn->prepare("UPDATE users SET username = ?, bio = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi",$username,$bio,$image_name,$user_id);

        if ($stmt->execute()){

            if($image != ""){

                //store image in folder
                move_uploaded_file($image, "assets/img/".$image_name);

            }

            //update session
            $_SESSION['username']=$username;
            $_SESSION['bio']=$bio;
            $_SESSION['image']=$image_name;

            $stmt = $conn->prepare("UPDATE posts SET username = ? WHERE user_id = ?");
            $stmt->bind_param("si",$_SESSION['username'],$_SESSION['id']);
            $stmt->execute();

            $stmt = $conn->prepare("UPDATE comments SET username = ? WHERE user_id = ?");
            $stmt->bind_param("si",$_SESSION['username'],$_SESSION['id']);
            $stmt->execute();

            header('location: profile.php?success_message=Profile was updated successfully!');
            exit;

        }
        else{

            header('location: edit_profile.php?error_message=Error occured');
            exit;

        }

    }

}
else{

    header('location: edit_profile.php?error_message=Error occured');
    exit;

}



function updateProfileComments($conn,$username,$image_name,$user_id){

    $stmt = $conn->prepare("UPDATE comments SET username = ?, profile_image = ? WHERE user_id = ?");
    $stmt->bind_param("ssi",$username,$image_name,$user_id);
    $stmt->execute();

}

function updateProfilePosts($conn,$username,$image_name,$user_id){

    $stmt = $conn->prepare("UPDATE posts SET username = ?, profile_image = ? WHERE user_id = ?");
    $stmt->bind_param("ssi",$username,$image_name,$user_id);
    $stmt->execute();

}



?>