<?php

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

if (count($errors) > 0){
    echo "<h4> Please fix the following errors </h4>";
    echo "<ul>";
    foreach ($errors as $key => $error){
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

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

