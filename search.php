<?php

include('header.php');

?>

<?php


    include('connection.php');

    if(isset($_POST['search_input'])){

        //search input as keywords
        $search_input = $_POST['search_input'];
        $searchvalue = strval("%".$search_input."%");

        $stmt = $conn->prepare("SELECT * FROM users WHERE username LIKE ? LIMIT 20");
        $stmt->bind_param("s",$searchvalue);
        $stmt->execute();
        $users = $stmt->get_result();

    }else{

        //default keyword
        $search_input = "";
        $searchvalue = strval("%".$search_input."%");

        $stmt = $conn->prepare("SELECT * FROM users WHERE username LIKE ? LIMIT 20");
        $stmt->bind_param("s",$searchvalue);
        $stmt->execute();
        $users = $stmt->get_result();

    }


?>


    <div class="mt-5 mx-5">

        <form action="search.php" method="POST">

            <div class="form-group search-component">

                <input type="text" class="form-control" placeholder="Search..." name="search_input"> 
                <button type="submit" class="search-btn" name="search_btn">Search</button>

            </div>

        </form>

        <ul class="list-group">

            <?php foreach($users as $user){ ?>

                <?php if($user['id'] != $_SESSION['id']){ ?>

                <li class="list-group-item search-result-item">

                    <img src="<?php echo "assets/img/".$user['image']; ?>">
                    <div style="width: 100%;">
                        <p><?php echo $user['username']; ?></p>
                        <span><?php echo substr($user['bio'],0,100); ?></span>
                    </div>

                    <div class="search-result-item-button">
                        <form action="user_profile.php" method="POST">
                            <button type="submit" style="height: auto;">Go to profile.</button>
                            <input type="hidden" name="other_user_id" value="<?php echo $user['id']; ?>"/>
                        </form>
                    </div>

                </li>

                <?php } ?>

            <?php } ?>

        </ul>

    </div>


    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>