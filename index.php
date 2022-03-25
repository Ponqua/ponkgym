<?php 

    include('header.php')

?>

    <section class="main">

        <div class="wrapper">

            <div class="left-col">
    
    
                <?php include('following_index.php'); ?>

                <?php include('get_latest_posts.php'); ?>


                <?php foreach($posts as $post){ ?>

                    <div class="post">

                        <div class="info">

                            <div class="user">


                                <?php if($post['user_id'] != $_SESSION['id']){ ?>

                                    <form action="user_profile.php" id="other_user_form<?php echo $post['user_id']; ?>" method="POST" style="display: flex;">

                                            <div class="pfp">
                                                <img onclick="document.getElementById('other_user_form'+<?php echo $post['user_id']; ?>).submit();" src="<?php echo "assets/img/".$post['profile_image']; ?>"/>
                                            </div>
                                            <p class="username2" onclick="document.getElementById('other_user_form'+<?php echo $post['user_id']; ?>).submit();"><?php echo $post['username']; ?></p>

                                    </form>

                                <?php } else {?>

                                    <form action="profile.php" id="other_user_form" method="POST" style="display: flex;">

                                        <div class="pfp">
                                            <img onclick="document.getElementById('other_user_form').submit();" src="<?php echo "assets/img/".$post['profile_image']; ?>"/>
                                        </div>
                                        <p class="username2" onclick="document.getElementById('other_user_form').submit();"><?php echo $post['username']; ?></p>

                                    </form>

                                <?php } ?>

                            </div>

                            <a href="single_post.php?post_id=<?php echo $post['id']; ?>"><i class="fas fa-ellipsis-h options"></i></a>

                        </div>

                        <img src="<?php echo "assets/img/".$post['image']; ?>" class="post-img"/>

                        <div class="post-content">

                            <div class="reaction-wrapper">


                            <?php include('check_if_liked.php'); ?>
                            <?php if($like_status){ ?>

                                <form action="unlike_post.php" method="POST">

                                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>
                                    <button class="heart" type="submit" name="unheart_btn" >
                                        <i style="color: red;" class="icon fas fa-heart"></i>
                                    </button>
                                
                                </form>
                                

                            <?php }else{ ?>

                                <form action="like_post.php" method="POST">

                                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>
                                    <button class="heart" type="submit" name="heart_btn" >
                                        <i class="icon fas fa-heart"></i>
                                    </button>
                                
                                </form>

                            <?php } ?>

                            </div>

                            <p class="likes"><?php echo $post['likes']; ?> likes</p>
                            <p class="description"><span><?php echo $post['username']; ?></span>  <?php echo $post['caption']; ?></p>
                            <p class="post-time"><?php echo date("d M Y", strtotime($post['date'])); ?></p>


                            <div>

                                <a class="comment-button" href="single_post.php?post_id=<?php echo $post['id']; ?>">comments</a>

                            </div>

                        </div>

                    </div>

                <?php }?>

            </div>

            <div class="right-col">
                <?php include('suggestion_sidearea.php'); ?>
            </div>

        </div>

    </section>


    
    
    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>