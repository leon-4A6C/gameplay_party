<?php require "partials/head.php"; ?>



<section class="hero">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Contact
      </h1>
      <h2 class="subtitle">
        Dit is de contact pagina.
      </h2>
    </div>
  </div>
</section>

<section class="section">

<div class="columns">

    <div class="column is-desktop"></div>

    <div class="column is-half-tablet is-one-third-desktop">

        <div class="card">
            <header class="card-header">
                <h2 class="card-header-title">
                    Contact
                </h2>
            </header>
            <div class="card-content">
                <div class="content">
                    
                    <form action="/contact" method="post">
                        <div class="field">
                            <label for="naam" class="label">Naam:</label>
                            <div class="control">
                                <input id="naam" name="naam" class="input" type="text" placeholder="Naam">
                            </div>
                        </div>

                        <div class="field">
                            <label for="email" class="label">E-mail:</label>
                            <div class="control">
                                <input id="email" name="email" class="input" type="email" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="field">
                            <label for="bericht" class="label">Bericht:</label>
                            <div class="control">
                                <textarea id="bericht" name="bericht" class="textarea"></textarea>
                            </div>
                        </div>

                        <div class="control">
                            <input name="submit" class="button is-primary" type="submit" value="Verzend">
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