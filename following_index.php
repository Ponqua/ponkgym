<?php

include('get_following.php');

?>


<div class="status-wrapper">
    <h1>Following:</h1>

    <?php foreach($other_people as $person){?>
        <form method="POST" action="user_profile.php" id="other_user_form<?php echo $person['id']; ?>">
            <div class="status-card">
                <input type="hidden" name="other_user_id" value="<?php echo $person['id']; ?>">
                <div class="pfp">
                    <img onclick="document.getElementById('other_user_form'+<?php echo $person['id']; ?>).submit();" src="<?php echo "assets/img/".$person['image']; ?>">
                </div>
                <p class="username" onclick="document.getElementById('other_user_form'+<?php echo $person['id']; ?>).submit();"><?php echo $person['username']; ?></p>
            </div>
        </form>
    <?php } ?>
</div>

