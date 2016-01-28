<?php
$title = 'Contact Us';
require 'includes/head.php';
require 'includes/nav.php';
require 'includes/utilities.php';

?>

<!-- ********** Contact Us ********** -->

<header>
    <h1>Contact Us</h1>
</header>
<div class="row">
    <div class="col-6 contactleft">

    <?php
    require 'includes/form.php';
    ?>

    </div>
    <div class="col-6 contactright">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2696.8640314680683!2d-122.21819999999998!3d47.473079!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905d4cb95a3c11%3A0xf6acc28a6e5b393a!2sPopeyes!5e0!3m2!1sen!2sus!4v1433891300348" width="400" height="300" style="border:0"></iframe>
    </div>
</div>

<?php
require 'includes/footer.php';

?>
