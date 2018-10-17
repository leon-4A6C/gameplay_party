<?php require "partials/head.php"; ?>



<section class="hero">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Gelukt!
      </h1>
    </div>
    <div class="notification is-success">
      <h2>Uw reservering is succesvol geplaatst!</h2>
      <p>
          Uw order nummer is <b><?= $reserveringsnummer ?></b><br>
          Vergeet uw order nummer niet, dit heeft u nodig als u naar de bioscoop gaat.
      </p>
    </div>
  </div>
</section>

<?php require "partials/footer.php"; ?>