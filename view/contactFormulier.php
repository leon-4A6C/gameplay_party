<?php require "partials/head.php"; ?>

<?php

// define variables and set to empty values
$nameErr = $emailErr = $commentErr = "";
$name = $email =  $comment = $succes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["naam"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["naam"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


  if (empty($_POST["bericht"])) {
    $commentErr = "Message is required";
    $comment = "";
  } else {
    $comment = test_input($_POST["bericht"]);
  }

  if (!empty($name and $email and $comment)) {
    $succes = "Bericht is verzonden!";
    $name = $email = $comment = '';
  }

  // if ($nameErr == ' '  && $emailErr = ' '  && $commentErr == ' ';) {
  //   $message_body = '';
  //   unset($_POST['submit']);
  //   foreach ($_POST as $key => $value) {
  //     $message_body .= "$key: $value\n";
  //   }
  //
  //   $to = 'dryfluesz@gmail.com';
  //   $subject = 'Contact Form verzonden';
  //   if (mail($to, $subject, $comment)) {
  //     $succes = "Bericht is verzonden!";
  //     $name = $email = $comment = '';
  //   }
  // }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

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

                    <form action="contact" method="post">
                        <div class="field">
                            <label for="naam" class="label">Naam:</label>
                            <div class="control">
                                <input id="naam" name="naam" class="input" type="text" placeholder="Naam" value="<?php echo isset($_POST['naam']) ? $name : '';?>">
                                <span class="message is-danger"> <?php echo $nameErr;?></span>
                            </div>
                        </div>

                        <div class="field">
                            <label for="email" class="label">E-mail:</label>
                            <div class="control">
                                <input id="email" name="email" class="input" placeholder="E-mail" value="<?php echo isset($_POST['email']) ? $email : '';?>">
                                <span class="message is-danger"> <?php echo $emailErr;?></span>
                            </div>
                        </div>

                        <div class="field">
                            <label for="bericht" class="label">Bericht:</label>
                            <div class="control">
                                <textarea id="bericht" name="bericht" class="textarea"><?php echo isset($_POST['bericht']) ? $comment : '';?></textarea>
                                <span class="message is-danger"> <?php echo $commentErr;?></span>
                            </div>
                        </div>

                        <div class="control">
                            <input name="submit" class="button is-primary" type="submit" value="Verzend">
                        </div>
                          <div class="message is-succes"> <?php echo $succes;?></div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="column is-desktop"></div>

</div>

</section>



<?php require "partials/footer.php"; ?>
