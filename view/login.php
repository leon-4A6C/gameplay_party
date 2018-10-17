<?php require "partials/head.php"; ?>


<section class="section">

    <div class="columns">

        <div class="column is-desktop"></div>

        <div class="column is-half-tablet is-one-third-desktop">

            <?php if(isset($_GET["error"])): ?>
            <div class="notification is-danger">
                Uw wachtwoord of gebruikersnaam is onjuist, probeer het opnieuw.
            </div>
            <?php endif; ?>

            <div class="card">
                <header class="card-header">
                    <h2 class="card-header-title">
                        Inloggen
                    </h2>
                </header>
                <div class="card-content">
                    <div class="content">
                        
                        <form action="/login/loggingIn<?php echo isset($_GET["redirect"]) ? ("?redirect=".urlencode($_GET["redirect"])) : ""; ?>" method="post">
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

                            <div class="control">
                                <input name="submit" class="button is-primary" type="submit" value="Login">
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