<?php
$title = 'Dogs Available';
require 'includes/head.php';
require 'includes/nav.php';

?>

<header>
    <h1>Dogs available for adoption:</h1>
</header>
<div class="row product-row">
    <div class="col-3">
        <figure>
            <img src="images/whiteboxer.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Gus Gus - $1</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/boxer1.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Sally - $2</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/tiredboxer.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">King Jellybean - $3</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/boxer4.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Rick and Morty - $4</a></figcaption>
        </figure>
    </div>
</div>
<div class="row product-row">
    <div class="col-3">
        <figure>
            <img src="images/boxer5.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Jerry - $5</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/boxer6.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Birdperson - $6</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/boxer7.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Lucky - $7</a></figcaption>
        </figure>
    </div>
    <div class="col-3">
        <figure>
            <img src="images/boxer8.jpg">
            <figcaption><a href="p_detail.php?prod_id=1">Mr. Meeseeks - $8</a></figcaption>
        </figure>
    </div>
</div>
<div class="row">
    <div class="copy col-12">
        <small><i>*These are not actually my images.</i></small>
    </div>
</div>

<?php
require 'includes/footer.php';

?>
