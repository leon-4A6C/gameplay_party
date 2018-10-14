INSERT INTO `roles`(`id`, `name`) VALUES
(1, "admin"),
(2, "bioscoop");

INSERT INTO `users`(`username`, `password`, `role_id`) VALUES
("test", "$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu", 1),
("test2", "$2y$10$hRGDvVyEgqMv.gBMKHlpauW/Vzzu/dK/qwJs7.J4KElDfMII1C0nu", 2);

INSERT INTO `cms`(`title`, `path`, `content`) VALUES
("over ons", "overons", '
<div class="container">
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Over GamplayParty
                </h1>
                <h2 class="subtitle">
                    Lorem ipsum dolor sit?
                </h2>
            </div>
        </div>
    </section>
    <div class="tile is-parent">
            <article class="tile is-child box">
                <div class="content">
                    <p class="title">Tall column</p>
                    <p class="subtitle">With even more content</p>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula eleifend, nunc dui porta orci, quis semper odio felis ut quam.</p>
                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>
                        <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>
                        <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>
                    </div>
                </div>
            </article>
    </div>
</div>
<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h3 class="title is-1">
                Lorem, ipsum.
            </h3>
            <p class="subtitle">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis modi aut mollitia tempore. Animi, tempora?
            </p>
        </div>
    </div>
</section>
'),
("contact", "contact", '
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
');