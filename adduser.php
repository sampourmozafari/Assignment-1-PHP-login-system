<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moodle</title>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <?php
      if(filter_input(INPUT_POST, 'submit')){

	      $un = filter_input(INPUT_POST, 'un', FILTER_SANITIZE_STRING) or die('Missing/illegal un parameter');

        $pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING) or die('Missing/illegal pw parameter');

	      $pw = password_hash($pw, PASSWORD_DEFAULT);

	      require_once('dbcon.php');
	      $sql = 'INSERT INTO moodle (username, pwhash) VALUES (?, ?)';
	      $stmt = $link->prepare($sql);
	      $stmt->bind_param('ss', $un, $pw);
	      $stmt->execute();

	      if($stmt->affected_rows > 0){
		      echo '
            <p id="alert">Kontoen med brugernavnet '.'<span class="bold">'.'&nbsp;'.$un.'</span>'.'&nbsp;'.'er oprettet.</p>
          ';
	      }
	      else {
		      echo '
            <p id="alert">Kontoen kunne ikke oprettes. Måske eksisterer kontoen allerede.</p>
          ';
	      }

      }
    ?>
    <div class="content">
      <?php require 'nav.php'; ?>
      <div class="wrapper">
        <div class="login">
          <h1>Opret en konto<br>for at bruge <span class="bold">Moodle</span></h1>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input name="un" type="text" placeholder="Brugernavn" required/>
            <input name="pw" type="password" placeholder="Adgangskode" required/>
            <input name="submit" type="submit" value="Opret konto"/>
          </form>
          <p>Har du allerde en konto? <a href="index.php">Log ind</a>.</p>
        </div>
      </div>
    </div>
    <div class="footer">
      <a class="logo" href="#"><span class="bordersymbol"></span><span class="accent">cph</span>business</a>
      <p>This is a project website for an assignment. Design and code by Sam.</p>
      <p>View project files on <a href="#">GitHub</a>.</p>
    </div>
  </body>
</html>
