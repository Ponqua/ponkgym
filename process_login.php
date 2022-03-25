<?php 


session_start();

include('connection.php');

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id,username,email,image,followers,following,posts,bio FROM users WHERE email = ? AND password = ?");
    
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0){

        $stmt->bind_result($id,$username,$email,$image,$followers,$following,$posts,$bio);
        $stmt->fetch();

        $_SESSION['id']=$id;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['image']=$image;
        $_SESSION['following']=$following;
        $_SESSION['followers']=$followers;
        $_SESSION['posts']=$posts;
        $_SESSION['bio']=$bio;

        header('location: index.php');

    }
    else{

        header('location: login.php?error_message=email/password is incorrect');
        exit;

    }

}
else{

    header('location: login.php?error_message=Error occured, try again');

}


?>