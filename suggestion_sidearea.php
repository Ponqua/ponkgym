<div class="profile-card">

    <div class="pfp">
        <img src="<?php echo "assets/img/".$_SESSION['image']; ?>" alt="">
    </div>
    <div>

        <p class="username"><?php echo $_SESSION['username']; ?></p>
        <p class="sub-text"><?php echo $_SESSION['bio']; ?></p>
        <form method="GET" action="logout.php">
            <button class="logout-button">Log out.</button>
        </form>

    </div>

</div>


<p class="suggestion-text">Recommended for you:</p>

<?php include("get_suggestions.php"); ?>

<?php foreach($suggestions as $suggestion){ ?>

    <?php if($suggestion['id'] != $_SESSION['id']){ ?>

    <!----Suggestions-->
    <div class="suggestion-card">

        <div class="suggestion-pic">
            <form id="suggestion_form<?php echo $suggestion['id'];?>" method="POST" action="user_profile.php">
                
                <input type="hidden" value="<?php echo $suggestion['id'];?>" name="other_user_id">
                <img class="otherpfp" style="cursor: pointer;" onclick="document.getElementById('suggestion_form'+<?php echo $suggestion['id'];?>).submit();" src="<?php echo "assets/img/".$suggestion['image'];?>"/>
        
            </form>
        </div>
        <div>
            <p onclick="document.getElementById('suggestion_form'+<?php echo $suggestion['id'];?>).submit();" class="username"><?php echo $suggestion['username'];?></p>
            <p class="sub-text"><?php 
            
                if(strlen($suggestion['bio']) < 30){

                    echo $suggestion['bio'];

                }else{

                    echo substr($suggestion['bio'],0,30)."...";

                }
            
            ?></p>
        </div>
        <form action="follow_user.php" method="POST">

            <input type="hidden" name="other_user_id" value="<?php echo $suggestion['id']; ?>">
            <button name="follow_btn" type="submit" class="comment-button">Follow.</button>

        </form>


    </div>

    <?php } ?>

<?php } ?>