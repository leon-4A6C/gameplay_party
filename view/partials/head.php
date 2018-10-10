<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Gameplay party</title>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {

      // Get all "navbar-burger" elements
       const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
          el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
    </script>
</head>
<body>

  <header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" ></script>

<nav class="navbar is-dark" style="background-color: #A3CB38;">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
      <img src="/view\assets\images\gpp.svg" alt="#" width="112" height="28">Gameplay Party
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
      <a class="navbar-item" href="/">
        Home
      </a>
      <a class="navbar-item" href="/bios">
        Overzicht
      </a>
      <a class="navbar-item" href="/cms/overons">
        Over ons
      </a>
      <a class="navbar-item" href="/cms/contact">
        Contact
      </a>
      <a class="navbar-item">
        <input class="input is-rounded" name="search" placeholder="Zoeken">
      </a>

    </div>
  </div>
</nav>
</header>
