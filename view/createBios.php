
<?php require "partials/head.php"; ?>

<section class="section">

<div class="columns">

    <div class="column is-one-fifth-desktop"></div>

    <div class="column">

        <?php if(isset($_GET["error"])): ?>
        <div class="notification is-danger">
            Iets is verkeerd ingevuld probeer opnieuw.
        </div>
        <?php endif; ?>

        <div class="card">
            <header class="card-header">
                <h2 class="card-header-title">
                    Bios
                </h2>
            </header>
            <div class="card-content">
                <div class="content">
                    
                    <form action="/bios/create" method="post">
                        <div class="field">
                            <label for="bioscoop_naam" class="label">Naam:</label>
                            <div class="control">
                                <input id="bioscoop_naam" name="bioscoop_naam" class="input" type="text" placeholder="Naam" required>
                            </div>
                        </div>

                        <div class="field">
                            <label for="beschrijving" class="label">Beschrijving:</label>
                            <div class="control">
                                <textarea id="beschrijving" name="beschrijving" class="textarea" placeholder="Beschrijving"></textarea>
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
                            <label for="rolstoeltoegankelijkheid" class="label">Rolstoeltoegankelijkheid:</label>
                            <div class="control">
                                <textarea id="rolstoeltoegankelijkheid" name="rolstoeltoegankelijkheid" class="textarea" placeholder="Rolstoeltoegankelijkheid"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label for="voorwaarden" class="label">Voorwaarden:</label>
                            <div class="control">
                                <textarea id="voorwaarden" name="voorwaarden" class="textarea" placeholder="voorwaarden"></textarea>
                            </div>
                        </div>

                        <label for="tarieven" class="label">Tarieven:</label>
                        <div id="tarieven-inputs" class="field"></div>

                        <label for="zalen" class="label">Zalen:</label>
                        <div id="zalen-inputs" class="field"></div>

                        <div class="control">
                            <input name="submit" class="button is-primary" type="submit" value="Login">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="column is-one-fifth-desktop"></div>

</div>

</section>

<script src="/view/assets/js/repeatingInput.js"></script>
<script>
function tarievenInput(i) {
    return `
    <div class="columns">

        <div class="column">
            <div class="control">
                <input id="tarieven_${i}" name="tarieven[${i}][naam]" class="input" type="text" placeholder="Tarief naam">
            </div>
        </div>

        <div class="column">
            <div class="control">
                <input id="tarieven_${i}" name="tarieven[${i}][prijs]" class="input" type="number" placeholder="Tarief prijs">
            </div>
        </div>

        <div class="column is-3">
            <label class="checkbox">
                <input name="tarieven[${i}][toeslag]" type="checkbox">
                Toeslag?
            </label>
        </div>

        <div class="column is-1">
            <div class="control">
                <button type="button" class="repeating-add-button button is-success"><i class="fas fa-plus"></i></button>
                <button type="button" class="repeating-remove-button button is-danger repeating-invisible"><i class="fas fa-minus"></i></button>
            </div>
        </div>
    </div>
        
    `
}

function zalenInput(i) {
    return `
    <div class="columns">

        <div class="column">
            <div class="control">
                <input id="zalen_${i}" name="zalen[${i}][zaalnummer]" class="input" type="text" placeholder="Zaalnummer">
            </div>
        </div>

        <div class="column">
            <div class="control">
                <input id="zalen_${i}" name="zalen[${i}][schermgrootte]" class="input" type="text" placeholder="schermgrootte">
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="control">
                <input id="zalen_${i}" name="zalen[${i}][stoelen]" class="input" type="number" placeholder="Aantal stoelen">
            </div>
        </div>

        <div class="column">
            <div class="control">
                <input id="zalen_${i}" name="zalen[${i}][rolstoelplaatsen]" class="input" type="number" placeholder="Aantal rolstoelplaatsen">
            </div>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <textarea id="faciliteiten_${i}" name="zalen[${i}][faciliteiten]" class="textarea" placeholder="Faciliteiten"></textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <textarea id="versies_${i}" name="zalen[${i}][versies]" class="textarea" placeholder="Versies"></textarea>
        </div>
    </div>

    <div class="control">
        <button type="button" class="repeating-add-button button is-success"><i class="fas fa-plus"></i></button>
        <button type="button" class="repeating-remove-button button is-danger repeating-invisible"><i class="fas fa-minus"></i></button>
    </div>
        
    `
}

let tarievenGroup = new RepeatingInput(document.getElementById("tarieven-inputs"), tarievenInput, "field");
let zalenGroup = new RepeatingInput(document.getElementById("zalen-inputs"), zalenInput, "field");
</script>

<?php require "partials/footer.php"; ?>