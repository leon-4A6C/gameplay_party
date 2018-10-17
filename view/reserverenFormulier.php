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
                    
                    <form action="/reserveer/reserveer" method="post">

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

                        <div class="field">
                            <label for="aantal_personen" class="label">Aantal personen:</label>
                            <div class="control">
                                <input id="aantal_personen" name="aantal_personen" class="input" type="number" placeholder="Aantal personen">
                            </div>
                        </div>

                        <div class="field">
                            <label for="" class="label">klant</label>
                        </div>

                        <div class="field">
                            <label for="klant_geslacht">Aanhef</label>
                            <div class="control">
                                <label class="radio">
                                    <input checked value="v" type="radio" name="klant_geslacht">
                                    Mevrouw
                                </label>
                                <label class="radio">
                                    <input value="m" type="radio" name="klant_geslacht">
                                    Meneer
                                </label>
                            </div>
                        </div>

                        <div class="field">
                            <label for="klant_voorletter" class="label">Voorletter:</label>
                            <div class="control">
                                <input id="klant_voorletter" name="klant_voorletter" class="input" type="text" placeholder="Voorletter">
                            </div>
                        </div>

                        <div class="field">
                            <label for="klant_achternaam" class="label">Achternaam:</label>
                            <div class="control">
                                <input id="klant_achternaam" name="klant_achternaam" class="input" type="text" placeholder="Achternaam">
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label for="straatnaam" class="label">Straatnaam:</label>
                                    <div class="control">
                                        <input id="straatnaam" name="straatnaam" class="input" type="text" placeholder="Straatnaam" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label for="huisnummer" class="label">Huisnummer:</label>
                                    <div class="control">
                                        <input id="huisnummer" name="huisnummer" class="input" type="number" placeholder="Huisnummer" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label for="toevoeging" class="label">Toevoeging:</label>
                                    <div class="control">
                                        <input id="toevoeging" name="toevoeging" class="input" type="text" placeholder="Toevoeging">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-8">
                                <div class="field">
                                    <label for="woonplaats" class="label">Woonplaats:</label>
                                    <div class="control">
                                        <input id="woonplaats" name="woonplaats" class="input" type="text" placeholder="Woonplaats" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="field">
                                    <label for="postcode" class="label">Postcode:</label>
                                    <div class="control">
                                        <input id="postcode" name="postcode" class="input" type="text" placeholder="Postcode" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="provincie" class="label">Provincie:</label>
                            <div class="control">
                                <input id="provincie" name="provincie" class="input" type="text" placeholder="Provincie" required>
                            </div>
                        </div>

                        <div class="field">
                            <label for="telefoonnummer" class="label">Telefoonnummer:</label>
                            <div class="control">
                                <input id="telefoonnummer" name="telefoonnummer" class="input" type="text" placeholder="Telefoonnummer" required>
                            </div>
                        </div>

                        <div class="field">
                            <label for="email" class="label">Email:</label>
                            <div class="control">
                                <input id="email" name="email" class="input" type="text" placeholder="Email" required>
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