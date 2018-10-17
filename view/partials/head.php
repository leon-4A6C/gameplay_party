<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Gameplay party</title>
</head>
<body>
   <!-- Global Site Tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127217039-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-127217039-1');
   </script>

  <header>

<nav class="navbar is-dark is-fixed" style="background-color: #A3CB38; position: fixed; width: 100%; z-index: 101;">
  <div class="navbar-brand">
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
      <a class="navbar-item" href="/contact">
        Contact
      </a>
      <a class="navbar-item">
        <input class="input is-rounded" name="search" placeholder="Zoeken">
      </a>

    </div>
  </div>
</nav>
<div class="logo" style="position: fixed; z-index: 100; top: 52px;">
  <img src="/view\assets\images\gpp.svg" alt="#">
</div>
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
</header>
<main>
