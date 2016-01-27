<?php
$title = 'Contact Us';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';

$interest = $_POST['interest'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$question = $_POST['question'];
$newsletter = $_POST['newsletter'];
$notify = $_POST['notify'];
$contact = $_POST['contact']; //radio button choice
//$submit = $_POST['submit'];

$c_newsletter = $newsletter == "on" ? 'checked="checked"': "";
$c_notify = $notify == "on" ? 'checked="checked"': "";

$c_email = $contact == "c_email" ? 'checked="checked"': "";
$c_phone = $contact == "c_phone" ? 'checked="checked"': "";

$inquiry = array("General Inquiry", "Volunteer", "Other");
$selected_inquiry = $_POST['inquiry'];
$select = createSelect('inquiry', $inquiry, $selected_inquiry);

$errors = array();
if (!isset($fname) || $fname === ""){
    $errors['fname'] = "First name can't be blank";
}
if (!isset($lname) || $lname === ""){
    $errors['lname'] = "Last name can't be blank";
}
if (!isset($email) || $email === ""){
    $errors['email'] = "Email can't be blank";
}

?>

<!---------------- Contact Us ---------------->

<header>
    <h1>Contact Us</h1>
</header>
<div class="row">
    <div class="col-6 contactleft">

<?php
$contact_form = <<<EOF

        <form method="post" action="contactus.php">
            <fieldset>
                <legend>Thank You for Contacting Us</legend>
                <div>
                    <label for="inquiry">Inquiry Type</label>
                    $select
                </div>
                <label>First Name</label>
                <input type="text" name="fname" value="$fname"><br>
                <label>Last Name</label>
                <input type="text" name="lname" value="$lname"><br>
                <label>Email</label>
                <input type="text" name="email" placeholder="Best email to reach you" value="$email"><br>
                <label>Phone</label>
                <input type="text" name="phone" value="$phone"><br>
            </fieldset>
            <textarea rows="7" cols="63" name="question" placeholder="Your message to us :)">$question</textarea>
            <p>
                Would you like to sign up for:
            </p>
            <input type="checkbox" name="newsletter" $c_newsletter>Our newsletter
            <br>
            <input type="checkbox" name="notify" $c_notify>Notify me of new boxers to adopt
            <p>
                How would you prefer to be contacted?
            </p>
            <input type="radio" class="radio" name="contact" value="c_email" $c_email checked>Email
            <br>
            <input type="radio" class="radio" name="contact" value="c_phone" $c_phone>Phone
            <br><br>
            <input class="contactbutton" type="submit" value="Submit">
            <input class="contactbutton" type="submit" value="Reset">
        </form>

EOF;
        echo $contact_form;
        ?>

<!--
/*        print_r($POST);
        */?>
        </pre>
        </div>
        <h5>Form REesults:</h5>
        <p>Name: </p>
        <p>Email: </p>
        <p>Phone: </p>
        <p>I prefer to be contacted by: </p>-->


    </div>
    <div class="col-6 contactright">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2696.8640314680683!2d-122.21819999999998!3d47.473079!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905d4cb95a3c11%3A0xf6acc28a6e5b393a!2sPopeyes!5e0!3m2!1sen!2sus!4v1433891300348" width="400" height="300" style="border:0"></iframe>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php
        if (count($errors) > 0){
            echo "<h4> Please fix the following errors </h4>";
            echo "<ul>";
            foreach ($errors as $key => $error){
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }

        ?>
    </div>
</div>

<?php
require 'includes/footer.php';

?>
