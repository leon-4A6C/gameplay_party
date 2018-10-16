<?php include "partials/dashboard_head.php"; ?>

<section class="section">

    <?php if(isset($_GET["error"]) && $_GET["error"] == "username"): ?>
    <div class="notification is-danger">
        Gebruikersnaam is al ingebruik, bedenk een andere.
    </div>
    <?php endif; ?>

    <?php if(isset($_GET["success"])): ?>
    <div class="notification is-success">
        gebruiker succesvol toegevoegd!
    </div>
    <?php endif; ?>

    <div class="card">
        <header class="card-header">
            <h2 class="card-header-title">
                Gebruiker toevoegen
            </h2>
        </header>
        <div class="card-content">
            <div class="content">
                
                <form action="/users/add" method="post">
                    <div class="field">
                        <label for="username" class="label">Gebruikersnaam:</label>
                        <div class="control">
                            <input id="username" name="username" class="input" type="text" placeholder="Gebruikersnaam">
                        </div>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Wachtwoord:</label>
                        <div class="control">
                            <input id="password" name="password" class="input" type="password" placeholder="Wachtwoord">
                        </div>
                    </div>

                    <div class="field">
                        <label for="role" class="label">Rol:</label>
                        <div class="select">
                            <select id="role" name="role_id">
                                <?php foreach($roles as $role): ?>
                                    <option value="<?= $role["role_id"] ?>"><?= $role["role_name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control">
                        <input name="submit" class="button is-primary" type="submit" value="Voeg user toe">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

</section>

<?php include "partials/dashboard_footer.php"; ?>