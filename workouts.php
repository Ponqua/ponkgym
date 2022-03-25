<?php 

    include('header.php')

?>

    <div class="camera-container">

        <?php if(isset($_GET['success_message'])) { ?>

            <p style="margin-top: 150px;" class="text-center alert-success"><?php echo $_GET['success_message']; ?></p>

        <?php } ?>

        <?php if(isset($_GET['error_message'])) { ?>

            <p style="margin-top: 150px;" class="text-center alert-danger"><?php echo $_GET['error_message']; ?></p>

        <?php } ?>

        <div class="camera">

            <div class="workout-options">

                <h1>Choose a workout to post</h1>

                <img src="assets/img/Workout1.png" class="workout camera-workout1" id="1 workout-optionss">
                <img src="assets/img/Workout2.png" class="workout camera-workout2" id="2 workout-optionss">
                <img src="assets/img/Workout3.png" class="workout camera-workout3" id="3 workout-optionss">
                <img src="assets/img/Workout4.png" class="workout camera-workout4" id="4 workout-optionss">
                <img src="assets/img/Workout5.png" class="workout camera-workout5" id="5 workout-optionss">

            </div>

            <form action="create_post.php" method="POST" class="camera-form">

                <div class="workout-choice" id="workout-choice">

                    <img src="assets/img/Workout1.png" alt="workout-screen1" class="active xxx" id="s1">
                    <img src="assets/img/Workout2.png" alt="workout-screen2" class = "xxx" id="s2">
                    <img src="assets/img/Workout3.png" alt="workout-screen3" class = "xxx" id="s3">
                    <img src="assets/img/Workout4.png" alt="workout-screen4" class = "xxx" id="s4">
                    <img src="assets/img/Workout5.png" alt="workout-screen5" class = "xxx" id="s5">

                </div>

                <div class="form-group">

                    <input type="text" name="caption" class="form-control" placeholder="Type a caption" required>

                </div>

                <div class="form-group">

                    <input id="type" name="workout" value="1" readonly style="visibility: hidden;"></input>

                </div>


                <div class="form-group">

                    <button type="submit" name="upload-image-btn" class="upload-btn">Post.</button>

                </div>

            </form>

        </div>
    </div>



    <script>

        var imageToClick = document.getElementsByClassName('workout')//.getElementsByTagName('img');
        var images = document.getElementsByClassName('xxx')//.getElementsByTagName('img');
        var workout = document.getElementById('type')

        for(let i = 0; i < 5; i++){
            imageToClick[i].addEventListener('click', function(){ 
                for(let j = 0; j < 5; j++){
                    images[j].classList.remove('active');
                }
                images[i].classList.add('active'); 
                workout.value = i+1;
            });
        }   

    </script>

    <script src="https://kit.fontawesome.com/2cf2f6924e.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>