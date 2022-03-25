<?php


session_start();

//if user id is in the session, user is logged in
if(isset($_SESSION['id'])){

    header("location: index.php");
    exit;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="icon" href="assets/img/PonkGymIcon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css"/>


</head>
<body>


    <div class="container">
        
        <img src="assets/img/logo.png" class="brand-img"/>

        <div class="main-container">

            <div class="main-content">

                <div class="slide-container">

                    <div class="slide-content" id="slide-content">

                        <img src="assets/img/Workout1.png" class="active" alt="screen 1"/>
                        <img src="assets/img/Workout2.png" alt="screen 2"/>
                        <img src="assets/img/Workout3.png" alt="screen 3"/>
                        <img src="assets/img/Workout4.png" alt="screen 4"/>
                        <img src="assets/img/Workout5.png" alt="screen 5"/>
    
                    </div>
    
                </div>
    
                <div class="form-container">
    
                    <div class="form-content">

                        <div class="form-content box">

                            <div class="logo">

                                <img src="assets/img/Log-in.png" class="logo-img"/>

                            </div>

                            <form class="login-form" id="login-form" method="POST" action="process_login.php">

                                <?php if(isset($_GET['error_message'])){ ?>

                                    <p id="error_message" class="text-center alert-danger"> <?php echo $_GET['error_message']; ?> </p>

                                <?php } ?>

                                <div class="form-group">
                                    <div class="login-input">
                                        <input type="text" name="email" id="username" placeholder="Email address" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="login-input">
                                        <input type="password" name="password"id="password" placeholder="Password" required/>
                                    </div>
                                </div>

                                <div class="btn-group">

                                    <button class="login-btn" id="login-btn" type="submit" name="login_btn">Log In.</button>

                                </div>

                            </form>




                            <div class="or">

                                <hr>

                                    <span>OR</span>

                                <hr/>

                            </div>

                            <div class="goto">
                                <p>Don't have an account? <a href="signup.php">Sign Up.</a></p>
                            </div>




                        </div>

                    </div>
    
                </div>
    
            </div>

        

        <div class="footer">



        </div>

    </div>

    <script>



        setInterval(()=>{changeImage();}, 1700);
        changeImage();

        function changeImage(){

            var images = document.getElementById('slide-content').getElementsByTagName('img');


            var i = 0
            for (i = 0; i < images.length; i++){

                var image = images[i];
                
                if(image.classList.contains('active')){

                    //remove active class from current image
                    image.classList.remove('active');

                    //if at last value we loop back to first image
                    if (i == images.length - 1){

                        var nextimage = images[0];
                        nextimage.classList.add('active');
                        break;

                    }

                    var nextimage = images[i + 1];

                    nextimage.classList.add('active');
                    break;
                }

            }   

        }

        

    </script>



    
    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>