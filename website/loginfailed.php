<?php include "inc/header.php" ?>
<main>
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-6">
                <div class="card loginfailed">
                    <div class="card-body">
                        <h5 class="card-title"> Username or Password Incorrect </h5>
                        <i class="bi-exclamation-diamond-fill" style="font-size: 5em "></i>
                        <hr>
                        <button  class="btn btn-info btn-lg"  data-toggle="modal" data-target="#loginModal"> <a href="#" style = "text-decoration: none; color: black;">Try Again &nbsp;<i class="bi-arrow-clockwise" style="font-size: 1em"></i></a>  </button>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
</script>

<?php 
include "inc/footer.php" ?>