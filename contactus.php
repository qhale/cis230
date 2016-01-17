<?php
$title = 'Contact Us';
require 'includes/head.php';
require 'includes/nav.php';

?>

<header>
    <h1>Contact Us</h1>
</header>
<div class="row">
    <div class="col-6 contactleft">
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
                <input type="text" required><br>
                <label>Last Name</label>
                <input type="text" required><br>
                <label>Email</label>
                <input type="email" placeholder="Best email to reach you" required><br>
                <label>Phone</label>
                <input type="tel" required><br>
                <label>Street Address</label>
                <input type="text" required><br>
                <label>City</label>
                <input type="text" required><br>
                <label>State</label>
                <input type="text" placeholder="State abbreviated" maxlength="2"><br>
                <label>Zip Code</label>
                <input type="text" required><br>
                <label>Country</label>
                <input type="text" required>
            </fieldset>
            <textarea rows="5" cols="63" placeholder="Your message to us :)"></textarea>
            <p>
                Would you like to sign up for our newsletter?
            </p>
            <input type="checkbox" name="newsletter">Yes
            <p>
                How would you prefer to be contacted?
            </p>
            <input type="radio" class="radio" name="contact" value="Email" checked>Email
            <br>
            <input type="radio" class="radio" name="contact" value="Phone">Phone
            <br><br>
            <input class="contactbutton" type="submit" value="Submit">
            <input class="contactbutton" type="submit" value="Reset">
        </form>
    </div>
    <div class="col-6 contactright">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2696.8640314680683!2d-122.21819999999998!3d47.473079!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905d4cb95a3c11%3A0xf6acc28a6e5b393a!2sPopeyes!5e0!3m2!1sen!2sus!4v1433891300348" width="400" height="300" style="border:0"></iframe>
    </div>
</div>

<?php
require 'includes/footer.php';

?>
