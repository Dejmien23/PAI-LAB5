<!DOCTYPE html>

<?php 
  include 'connect.php'; 
  session_start();
?>

<html lang="en">
<head>
  <title>Damian Dziedzic Laptopy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="lightbox.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'naglowek.php';?>

<?php include 'menu.php';?>

<div class="container" style="margin-top:30px">
  <div class="row">
      <?php

        $kat_id = isset($_GET['kat_id']) ? (int)$_GET['kat_id'] : 1;
        $sql = 'SELECT `id`, `nazwa`, `opis`, `img`
                     FROM `produkty`
                     WHERE `kategoria_id` = ' . $kat_id .
                     ' ORDER BY `id`';

        $wynik = mysqli_query($conn, $sql);

        if(isset($_GET['kat_id'])) {
          if (mysqli_num_rows($wynik) > 0) {
              while ($produkt = @mysqli_fetch_array($wynik)) {
                  echo '<h2>'. $produkt['nazwa']. '</h2>' . PHP_EOL;

                  if((isset($_SESSION['admin'])) && ($_SESSION['admin']==true))
                    {
                        echo"<br\><form method='post' action='edytuj_prod.php'>
                          <input type='hidden' name='id' value='".$produkt['id']."' >
                          <input type='hidden' name='tytul' value='".$produkt['nazwa']."' >
                          <input type='hidden' name='opis' value='".$produkt['opis']."' >
                          <button class='comment-edyt' type='submit'> <i class='fa fa-cog'></i>&nbsp;Edytuj produkt</button>
                        </form>";
                        echo"<form method='post' action='usun_prod.php'>
                          <input type='hidden' name='id' value='".$produkt['id']."' >
                          <button class='comment-usun' type='submit'><i class='fa fa-trash' aria-hidden='true'></i>&nbsp;Usuń produkt</button>
                        </form>";
                    }

                  echo '<a class="example-image-link" style=" margin-left: auto; margin-right: auto;" href="' . $produkt['img']. '" data-lightbox="example-set"> <img class="example-image" src="' . $produkt['img']. '" alt="" width="100%" /></a>'. PHP_EOL;
                  echo $produkt['opis'].'<br/>'. PHP_EOL;
              }
            }
          } 
        else {
              echo '<h3>
                     Hej! Żeby się ze mną skontaktować, napisz do mnie maila: <a href="mailto:dejmien23@gmail.com">dejmien23@gmail.com</a>
                    </h3>';
            }

        mysqli_close($conn);

      ?>
</div>

<?php include 'footer.php';?>

<script src="lightbox-plus-jquery.min.js"></script>

</body>
</html>
