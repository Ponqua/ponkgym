<?php 

include("header.php");
include('connection.php');

?>


<?php 


if(isset($_GET{'post_id'})){

    $post_id = $_GET['post_id'];

    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param("i",$post_id);
    $stmt->execute();
    $post_array = $stmt->get_result();


    //get comments
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

        $page_no = $_GET['page_no'];
    
    }else{
    
        $page_no = 1;
    
    }
    
    
    $stmt = $conn->prepare("SELECT COUNT(*) as total_comments FROM comments WHERE post_id = ?");
    $stmt->bind_param("i",$post_id);
    $stmt->execute();
    $stmt->bind_result($total_comments);
    $stmt->store_result();
    $stmt->fetch();
    
    
    $total_comments_per_page = 1000000000000;
    
    $offset = ($page_no - 1) * $total_comments_per_page;
    
    $total_no_of_pages = ceil($total_comments / $total_comments_per_page); //ceil() rounds the number
    
    $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = $post_id LIMIT $offset,$total_comments_per_page");
    $stmt->execute();
    $comments = $stmt->get_result();
    
    


}else{

    header("location: index.php");

}


?>

    <section class="main">

        <div class="wrapper">

            <div class="left-col">

                <?php if(isset($_GET['success_message'])){ ?>

                    <p class="text-center alert-success"> <?php echo $_GET['success_message']; ?> </p>

                <?php } ?>

                <?php if(isset($_GET['error_message'])){ ?>

                    <p class="text-center alert-danger"> <?php echo $_GET['error_message']; ?> </p>

                <?php } ?>

                <?php foreach($post_array as $post){ ?>

                    <div class="post">

                        <div class="info">

                            <div class="user">

                                <div class="pfp">
                                    <img src="<?php echo "assets/img/".$post['profile_image']; ?>"/>
                                </div>
                                <p class="username"><?php echo $post['username']; ?></p>

                            </div>


                            <?php if($post['user_id'] == $_SESSION['id']){ ?>

                                <i id="options_btn" class="fas fa-ellipsis-h options"></i>

                            <?php } ?>

                            <div class="popup" id="popup">

                                <div class="popup-window" id="popup_window">

                                    <span id="close_popup" class="close-popup">&times;</span>
                                    <form action="delete_post.php" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"></input>
                                        <input type="hidden" name="user_id" value="<?php echo $post['user_id']; ?>"></input>
                                        <input onclick="<?php $_SESSION['posts'] = $_SESSION['posts']-1; ?>"style="border: none;" type="submit" name="delete_post_btn" value="Delete Post">
                                    </form>

                                </div>

                            </div>

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


                        </div>

                       
                        <div class="comment-wrapper">

                                <img src="<?php echo "assets/img/".$_SESSION['image']; ?>" class="icon"/>
                            <form class="comment-wrapper" method="POST" action="store_comment.php">
                                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>
                                <input type="text" name="comment_text" class="comment-box" placeholder="Add a Comment!"/>
                                <button class="comment-button" name="comment_btn">Post</button>
                            </form>

                        </div>

                    </div>

                <?php } ?>


                <?php foreach($comments as $comment){ ?>

                    <div class="comment-element">
                        <img src="<?php echo "assets/img/".$comment['profile_image']; ?>" class="icon commentpfp" alt="">
                        <p><span><?php echo $comment['username']; ?></span> <?php echo $comment['comment_text']; ?></p>

                        <?php if($comment['user_id'] == $_SESSION['id']){ ?>

                            <i onclick="document.getElementById('popup_comment'+<?php echo $comment['id']; ?>).style.display = 'block';" style="float: right;" id="c_options_btn" class="fas fa-ellipsis-h options"></i>





                            <div class="popup" id="popup_comment<?php echo $comment['id']; ?>">

                                <div class="popup-window" id="popup_comment_window<?php echo $comment['id']; ?>">

                                    <span onclick="document.getElementById('popup_comment'+<?php echo $comment['id']; ?>).style.display = 'none';" id="close_popup<?php echo $comment['id']; ?>" class="close-popup">&times;</span>
                                    <form action="delete_comment.php" method="POST">

                                        <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>"></input>
                                        <input style="border: none;" type="submit" name="delete_comment_btn" value="Delete Comment">

                                    </form>

                                </div>

                            </div>

                        <?php } ?>


                    </div>


                <?php } ?>

                


            </div>

            <div class="right-col">
                <?php include('suggestion_sidearea.php'); ?>
            </div>

        </div>

    </section>


    <script>

        var popupWindow = document.getElementById('popup');
        var optionsBtn = document.getElementById('options_btn');
        var closeWindow = document.getElementById('close_popup');

        
        optionsBtn.addEventListener("click",(e)=>{
            e.preventDefault();
            popupWindow.style.display = "block";
        })

        closeWindow.addEventListener("click",(e)=>{
            e.preventDefault();
            popupWindow.style.display = "none";
        })

        window.addEventListener("click",(e)=>{
            if(e.target == popupWindow){

                popupWindow.style.display = "none";

            }
        })




    </script>


    
    
    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>