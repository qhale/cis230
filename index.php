<?php
$title = 'Home';
require 'includes/head.php';
require 'includes/nav.php';

?>

<header>
    <div class="logo">
        <h1><img src="images/quail.jpeg" alt="logo">QHale's Boxer Adoption</h1>
    </div>
</header>
<main class="container">
    <div class="row">
        <div class="col-6 left">
            <blockquote>Hello! I'm Little Man! I came from a bad place, but my new parents makes me feel loved every day! I am so happy now! Many people have adopted my distant cousins because they like me so much! Won't you adopt a boxer too?</blockquote>
        </div>
        <div class="col-6 right">
            <figure>
                <img src="images/littleman.jpg" alt="Little Man">
                <figcaption>I'm Little Man and I love everyone!</figcaption>
            </figure>
        </div>
    </div>
</main>
<div class="row entice">
    <a class="col-4 backstory" href="archive/news.html">Find out about recent adoptions and new happy homes!</a>
    <a class="col-4 portfolio" href="archive/products.html">See which dogs are available to come home with you!</a>
    <a class="col-4 contact" href="archive/contactus.html">Ready to adopt? Contact us!</a>
</div>



<?php
require 'includes/footer.php';

?>
