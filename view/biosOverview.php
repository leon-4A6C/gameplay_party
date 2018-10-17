<?php require "partials/head.php"; ?>

<section class="section">
    <div class="container">
        <h2 class="title has-text-centered">Bioscopen</h2>
        
        <div class="home-columns-container">
        
            <div class="columns is-4 is-variable">
                <?php foreach($bioscopen as $bioscoop): ?>
                    <?php include "partials/bios_card.php"; ?>
                <?php endforeach; ?>
            </div>
            <div class="columns is-4 is-variable">
                <?php foreach($bioscopen as $bioscoop): ?>
                    <?php include "partials/bios_card.php"; ?>
                <?php endforeach; ?>
            </div>
            <div class="columns is-4 is-variable">
                <?php foreach($bioscopen as $bioscoop): ?>
                    <?php include "partials/bios_card.php"; ?>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</section>

<?php require "partials/footer.php"; ?>