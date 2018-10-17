<?php include "partials/dashboard_head.php"; ?>

<section class="section">

    <?php if(isset($_GET["success"])): ?>
    <div class="notification is-success">
        tijden succesvol toegevoegd!
    </div>
    <?php endif; ?>

    <div class="card">
        <header class="card-header">
            <h2 class="card-header-title">
                Tijden toevoegen
            </h2>
        </header>
        <div class="card-content">
            <div class="content">
                
                <form action="/bios/tijdenAdd" method="post">

                    <div class="field">
                        <label for="zaal" class="label">Zaal:</label>
                        <div class="select">
                            <select id="zaal" name="zaal_id">
                                <?php foreach($zalen as $zaal): ?>
                                    <option value="<?= $zaal["zaal_id"] ?>"><?= $zaal["zaalnummer"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <label for="tijden" class="label">Tijden:</label>
                    <div id="tijden-inputs" class="field"></div>

                    <div class="control">
                        <input name="submit" class="button is-primary" type="submit" value="Voeg tijden toe">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

</section>
<script src="/view/assets/js/repeatingInput.js"></script>
<script>
function tijdenInput(i) {

    setTimeout(() => {

        let eind = document.querySelector(`#eindtijden_${i}`)
        let eindPicker = flatpickr(eind, {
            enableTime: true,
            dateFormat: "Y/m/d H:i",
            minDate: "today",
            time_24hr: true
        });

        let begin = document.querySelector(`#begintijden_${i}`)
        let beginPicker = flatpickr(begin, {
            enableTime: true,
            dateFormat: "Y/m/d H:i",
            minDate: "today",
            time_24hr: true,
            onChange: e => {
                eindPicker.set("minDate", e[0])
            }
        });

    }, 200);

    return `
    <div class="columns">

        <div class="column">
            <div class="control">
                <input id="begintijden_${i}" name="tijden[${i}][begintijd]" class="input" type="text" placeholder="begintijd">
            </div>
        </div>

        <div class="column is-1"> - </div>

        <div class="column">
            <div class="control">
                <input id="eindtijden_${i}" name="tijden[${i}][eindtijd]" class="input" type="text" placeholder="eindtijd">
            </div>
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

let tijdenGroup = new RepeatingInput(document.getElementById("tijden-inputs"), tijdenInput, "field");
</script>

<?php include "partials/dashboard_footer.php"; ?>