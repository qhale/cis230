<?php
$title = 'Contact Us';
require 'includes/head.php';
require 'includes/nav.php';

$fname = $_POST['fname'];
$lname = $_POST ['lname'];
$email = $_POST ['email'];
$phone = $_POST ['phone'];
$question = $_POST ['question'];
$newsletter = $_POST ['newsletter'];
$c_email = $_POST ['c_email'];
$c_phone = $_POST ['c_phone'];


?>

<header>
    <h1>Contact Us</h1>
</header>
<div class="row">
    <div class="col-6 contactleft">

<?php
$contact_form = <<<EOF

        <form method="post" action="index.php">
            <fieldset>
                <legend>Thank You for Contacting Us</legend>
                <div>
                    <label for="inquiry">Inquiry Type</label>
                    <select id="inquiry" name="inquiry" required>
                        <option value>Select an Inquiry</option>
                        <option value="general">General Inquiry</option>
                        <option value="volunteer">Volunteer</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <label>First Name</label>
                <input type="text" required value="$fname"><br>
                <label>Last Name</label>
                <input type="text" required value="$lname"><br>
                <label>Email</label>
                <input type="text" placeholder="Best email to reach you" value="$email" required><br>
                <label>Phone</label>
                <input type="text" value="$phone" required><br>
            </fieldset>
            <textarea rows="7" cols="63" placeholder="Your message to us :)">$question</textarea>
            <p>
                Would you like to sign up for our newsletter?
            </p>
            <input type="checkbox" name="newsletter" $newsletter>Yes
            <p>
                How would you prefer to be contacted?
            </p>
            <input type="radio" class="radio" name="contact" value="Email" $c_email checked>Email
            <br>
            <input type="radio" class="radio" name="contact" value="Phone" $c_phone>Phone
            <br><br>
            <input class="contactbutton" type="submit" value="Submit">
            <input class="contactbutton" type="submit" value="Reset">
        </form>

EOF;
        echo $form;
        ?>

    </div>
    <div class="col-6 contactright">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2696.8640314680683!2d-122.21819999999998!3d47.473079!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905d4cb95a3c11%3A0xf6acc28a6e5b393a!2sPopeyes!5e0!3m2!1sen!2sus!4v1433891300348" width="400" height="300" style="border:0"></iframe>
    </div>
</div>

<?php
require 'includes/footer.php';

?>
