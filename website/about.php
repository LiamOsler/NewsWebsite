<!--Edited by Adam Melvin - B00597004-->
<?php 
    include "inc/header.php";

    $contactFormFeedback = "";

    // Postback processing for contact form
    if (isset($_POST["contact-us"])) {
        // Check if the inputs are empty and display error messages
        if (empty($_POST["contact-name"])) {
            $contactFormFeedback = "<p>Please provide your name so we can return your message.</p>";
        }
        else if (empty($_POST["contact-msg"])) {
            $contactFormFeedback = "<p>Please provide a message.</p>";
        }
        else {
            $contactName = sanitizeData($_POST["contact-name"]);
            $contactMsg = sanitizeData($_POST["contact-msg"]);
            $contactFormFeedback = "<p>Message sent. Thank you for contacting us at NSLN, " . $contactName . "!</p>";
        }
    }

?>

<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <p class="lead">
                Nova Scotia Legal News is dedicated to making the law more accessible to the general public
                and legal professionals alike.
            </p>
        </div>
    </div>
    <div class="container">
        <p class="lead">
            Nova Scotia Legal News pulls recent rulings from the courts of Nova Scotia and presents them in a user
            friendly manner. We also host articles regarding Nova Scotia law, written by verified journalists
            and legal professionals alike.
        </p>
        <p class="lead">
            Here at NSLN, we encourage you to interact with the law and have an open discussion about it.
            Let us know what you think of recent court decisions in our comment sections.
        </p>
        <p class="lead">
            Have a particular area of law that you're interested in? On NSLN, you can stay up to date and
            "follow" specific topics, rulings, or journalists you are interested in.
        </p>
    </div>
    <div class="container">
        <h2>Contact Us</h2>
        <div id="contact-form-feedback" class="message lead">
            <?php echo $contactFormFeedback;?>
        </div>
        <form action="about.php" method="POST">
            <div class="form-group">
                <label for="contact-name">Enter your name:</label>
                <input type="text" class="form-control" id="contact-name" placeholder="Name" name="contact-name" required>
            </div>
            <div class="form-group">
                <label for="contact-msg">Message:</label>
                <textarea class="form-control" id="contact-msg" placeholder="Enter your message here..." name="contact-msg" rows=5 required></textarea>
            </div>
            <button class="btn btn-info btn-lg" name="contact-us" type="submit" >Submit Message</button>
        </form>
    </div>
</main>