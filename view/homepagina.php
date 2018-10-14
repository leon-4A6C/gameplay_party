<?php require "partials/head.php"; ?>

<header class="image-header">

    <figure class="image">
        <img src="/view/assets/images/homepagepic.jpg" alt="homepage afbeelding">
    </figure>

</header>

<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title is-1">
                Gameplay party
            </h1>
            <p class="subtitle">
                Huur een bioscoopzaal om te gamen.
            </p>
        </div>
    </div>
</section>

<section class="section home-columns-section">
    <div class="columns-background"></div>
    <div class="container">
        <h2 class="title has-text-centered">Bioscopen</h2>
        
        <div class="home-columns-container">
        
            <div class="columns is-8 is-variable">
                <?php foreach($bioscopen as $bioscoop): ?>
                    <?php include "partials/bios_card.php"; ?>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</section>

<!-- <section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h3 class="title is-1">
                Lorem, ipsum.
            </h3>
            <p class="subtitle">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis modi aut mollitia tempore. Animi, tempora?
            </p>
        </div>
    </div>
</section> -->

<?php require "partials/footer.php"; ?>