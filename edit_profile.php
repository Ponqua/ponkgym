<?php 

    include('header.php')

?>

    <section class="main">

        <div class="wrapper">

            <div class="left-col">


                <h3>Update Profile</h3>

                <?php if(isset($_GET['error_message'])){ ?>

                    <p id="error_message" class="text-center alert-danger"> <?php echo $_GET['error_message']; ?> </p>

                <?php } ?>

                <form action="update_profile.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">

                    <img src="<?php echo "assets/img/".$_SESSION['image']; ?>" alt="" class="edit-pfp">
                        <input type="file" name="image" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label for="email" class="form-label">Email</label>
                        <p class="form-control"><?php echo $_SESSION['email']; ?></p>

                    </div>

                    <div class="mb-3">

                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" required value="<?php echo $_SESSION['username']; ?>"></input>

                    </div>

                    <div class="mb-3">

                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" class="form-control" cols="30" rows="3"><?php echo $_SESSION['bio']; ?></textarea>

                    </div>

                    <div class="mb-3">
                        <form action="update_profile.php" method="POST">
                            <button name="update_profile_btn" id="update_profile_btn" class="update-profile-btn" value="Update">Update</button>
                        </form>
                    </div>

                </form>

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