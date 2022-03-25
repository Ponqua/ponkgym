<?php 

    include('header.php')

?>

    <header class="profile-header">

        <?php if(isset($_GET['success_message'])) { ?>

            <p class="text-center alert-success"><?php echo $_GET['success_message']; ?></p>

        <?php } ?>

        <?php if(isset($_GET['error_message'])) { ?>

            <p class="text-center alert-danger"><?php echo $_GET['error_message']; ?></p>

        <?php } ?>

        <div class="profile-container">

            <div class="profile">

                

                <?php if(isset($_GET['error_message'])){ ?>

                    <p id="success_message" class="text-center alert-success"> <?php echo $_GET['success_message']; ?> </p>

                <?php } ?>

                <div class="profile-img">
                    <img class="otherpfp" src="<?php echo "assets/img/".$_SESSION['image']; ?>" alt="">
                </div>

                <div class="profile-user-settings">

                    <h1 class="profile-username"><?php echo $_SESSION['username']; ?></h1>
                    <form action="edit_profile.php" method="GET">
                        <button class="profile-btn profile-edit-btn" type="submit">Edit profile.</button>
                    </form>

                </div>

                <div class="profile-stats">

                    <ul>

                        <li><span class="profile-stat-count"><?php echo $_SESSION['posts']; ?></span> Posts</li>
                        <li><span class="profile-stat-count"><?php echo $_SESSION['followers']; ?></span> Followers</li>
                        <li><span class="profile-stat-count"><?php echo $_SESSION['following']; ?></span> Following</li>

                    </ul>

                </div>

                <div class="profile-bio">
                    <p><?php echo $_SESSION['bio']; ?></p>
                </div>

            </div>

        </div>

    </header>



    <main>

        <div class="profile-container">

            <div class="gallery">

                <?php 
            
                    include("get_user_posts.php");

                ?>

                <?php foreach($posts as $post){ ?>

                    <div class="gallery-item">
                        <a href="single_post.php?post_id=<?php echo $post['id']; ?>">
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
                        </a>
                    </div>

                <?php } ?>

            </div>
    
        </div>    

    </main>
    




    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>