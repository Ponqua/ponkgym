<?php 

    include('header.php');

    include('connection.php');

    if(isset($_POST['other_user_id'])){

        $other_user_id = $_POST['other_user_id'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i",$other_user_id);
        
        if($stmt->execute()){

            $user_array = $stmt->get_result();

        }else{

            header('location: index.php');
            exit;
    
        }

    }else{

        header('location: index.php');
        exit;

    }

?>


    <header class="profile-header">

        <div class="profile-container">

            <?php foreach($user_array as $user){ ?>

                <div class="profile">

                    <div class="profile-img">
                        <img class="otherpfp" src="<?php echo "assets/img/".$user['image']; ?>" alt="">
                    </div>

                    <div class="profile-user-settings">

                        <h1 class="profile-username"><?php echo $user['username']; ?></h1>

                    </div>

                    <div class="profile-stats">

                        <ul>

                            <li><span class="profile-stat-count"><?php echo $user['posts']; ?></span> Posts</li>
                            <li><span class="profile-stat-count"><?php echo $user['followers']; ?></span> Followers</li>
                            <li><span class="profile-stat-count"><?php echo $user['following']; ?></span> Following</li>

                        </ul>

                    </div>
                    <?php include('check_follow.php') ?>
                    <?php if($following_status) { ?>

                        <form action="unfollow_user.php" method="POST">

                            <input type="hidden" name="other_user_id" value="<?php echo $user['id']; ?>"/>
                            <button onclick="<?php $_SESSION['following'] = $_SESSION['following']-1; ?>" type="submit" name="unfollow_btn" class="profile-btn user-follow-button">Unfollow.</button>

                        </form>
                    
                    <?php } else { ?>

                        <form action="follow_user.php" method="POST">

                            <input type="hidden" name="other_user_id" value="<?php echo $user['id']; ?>"/>
                            <button type="submit" name="follow_btn" class="profile-btn user-follow-button">Follow.</button>

                        </form>

                    <?php } ?>

                    <div class="profile-bio" style="text-align: center;">
                        <p><span class="profile-real-name"><?php echo $user['username']; ?></span> <?php echo $user['bio']; ?></p>
                    </div>

                </div>

            <?php } ?>

        </div>

    </header>



    <main>

        <div class="profile-container">

            <div class="gallery">

                <?php 
                
                    include("get_other_user_posts.php");

                ?>

                <?php foreach($posts as $post){ ?>
                    <a href="single_post.php?post_id=<?php echo $post['id']; ?>">
                        <div class="gallery-item">
                            <img class="gallery-img" src="<?php echo "assets/img/".$post['image']; ?>">
                            <div class="gallery-item-info">

                                <ul|>

                                    <li class="gallery-item-likes"><span class="hide-gallery-element"><?php echo $post['likes']; ?></span>
                                        <i class="fa-solid fa-heart"></i>
                                    </li>

                                    <li class="gallery-item-date"><span class="hide-gallery-element">Date:</span>
                                        <p><?php echo $post['date']; ?></p>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </a>

                <?php } ?>


                


            </div>
    
        </div>    

    </main>
    




    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>