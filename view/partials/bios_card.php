<div class="column">
    <div class="card hover card-equal-height">
        <a href="https://kinepolis.nl/bioscopen/<?= str_replace(" ", "-", strtolower($bioscoop["bios_naam"])) ?>/info">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="/view/assets/images/bioscopen/<?= $bioscoop["afbeelding_path"] ?>" alt="<?= $bioscoop["bios_naam"] ?>">
                </figure>
            </div>
        </a>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-3"><?= $bioscoop["bios_naam"] ?></p>
                    <p><?= $bioscoop["bios_beschrijving"] ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/reserveer/bios/<?= $bioscoop["bios_id"] ?>" class="card-footer-item is-primary">Reserveer</a>
        </div>
    </div>
</div>