<?php session_start(); ?>
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
    <div class="content">
      <?php require 'nav.php'; ?>
      <div class="wrapper">
        <?php
          if(empty($_SESSION['uid'])){
            echo '
              <p class="absocenter">Log venligst ind for at se sidens indhold.'.' '.'<a href="index.php">Log ind</a>.</p>
            ';

          }
          else {
            echo '
              <div class="absocenter"><p>Her kan du se din Moodle konto, som kun du har adgang til.</p></div>
            ';
          }
        ?>
      </div>
    </div>
    <div class="footer">
      <a class="logo" href="#"><span class="bordersymbol"></span><span class="accent">cph</span>business</a>
      <p>This is a project website for an assignment. Design and code by Sam.</p>
      <p>View project files on <a href="#">GitHub</a>.</p>
    </div>
  </body>
</html>
