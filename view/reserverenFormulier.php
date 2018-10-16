<?php require "partials/head.php"; ?>

<section class="section">

<div class="columns">

    <div class="column is-desktop"></div>

    <div class="column is-half-tablet is-one-third-desktop">

        <div class="card">
            <header class="card-header">
                <h2 class="card-header-title">
                    Reserveren
                </h2>
            </header>
            <div class="card-content">
                <div class="content">
                    
                    <form action="/reserveren" method="post">

                        <div class="field">
                            <label for="tijd" class="label">Tijden:</label>
                            <div class="select">
                                <select id="tijd" name="tijd_id">
                                    <?php foreach ($zalen as $zaal) : ?>
                                        <?php foreach($zaal["tijden"] as $tijd): ?>
                                            <option value="<?= $tijd["tijd_id"] ?>">zaal: <?= $zaal["zaalnummer"] . " van " . $tijd["begindatum"] . " tot " . $tijd["einddatum"] ?></option>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="control">
                            <input name="submit" class="button is-primary" type="submit" value="Reserveer">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="column is-desktop"></div>

</div>

</section>

<?php require "partials/footer.php"; ?>