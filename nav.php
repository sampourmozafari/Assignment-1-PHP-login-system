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
    <div class="nav">
      <div class="left">
        <a class="logo" href=""><span class="bordersymbol"></span><span class="accentcolor">cph</span>business</a>
      </div>
      <div class="right">
        <?php
          if(empty($_SESSION['uid'])){

          }
          else {
            echo 'Hej '.$_SESSION['username'];
            echo '
              <a href="logout.php"><span class="bold">Log ud</span></a>
            ';
          }
        ?>
      </div>
    </div>
  </body>
</html>
