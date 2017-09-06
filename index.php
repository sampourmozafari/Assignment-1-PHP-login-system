<?php session_start();

   if(isset($_POST['submit'])){
    header('Location: content.php');
   }
?>

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

	      require_once('dbcon.php');
	      $sql = 'SELECT id, pwhash FROM moodle WHERE username=?';
	      $stmt = $link->prepare($sql);
	      $stmt->bind_param('s', $un);
	      $stmt->execute();
	      $stmt->bind_result($uid, $pwhash);

	      while($stmt->fetch()) { }

	      if (password_verify($pw, $pwhash)){
		      $_SESSION['uid'] = $uid;
		      $_SESSION['username'] = $un;
        }
	      else{
		      echo '
            <p id="alert">Enten forkert brugernavn eller adgangskode.</p>
          ';
	      }

      }
	  ?>
    <div class="content">
      <?php require 'nav.php'; ?>
      <div class="wrapper">
        <div class="login">
          <h1>Velkommen til <span class="bold">Moodle</span><br>for <span class="bold">Cphbusiness</span></h1>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input name="un" type="text" placeholder="Brugernavn" required/>
            <input name="pw" type="password" placeholder="Adgangskode" required/>
            <input name="submit" type="submit" value="Log ind"/>
          </form>
          <p>Har du ikke en konto? <a href="adduser.php">Opret en</a>.</p>
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
