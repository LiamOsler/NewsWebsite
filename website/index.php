<?php include "inc/header.php" ?>
<?php include "inc/components/searcharea.php" ?>

<main>
    <div class = "container">
        <?php 
            // If the query string for "show" is not set, default to latestnews
            if(!isset($_GET["show"])) {
                include "inc/components/latestnews.php";
            }
            // Otherwise, check the value of the query string and display content accordingly
            else {
                if ($_GET["show"] == "rulings") {
                    include "inc/components/rulings.php";
                }
                else if ($_GET["show"] == "legislation") {
                    include "inc/components/legislation.php";
                }
                else if ($_GET["show"] == "news-opinion") {
                    include "inc/components/news-opinion.php";
                }
                // Display latestnews if any other query string value is given
                else {
                    include "inc/components/latestnews.php";
                }
            }
        ?>
    </div>
</main>

<script>
</script>

<?php 
echo($_SESSION['userName']);
include "inc/footer.php" ?>