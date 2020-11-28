<!DOCTYPE html>

<?php 
  session_start();
  
  date_default_timezone_set('Europe/Warsaw');
  
  if(  !((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))  )
  {
    //header('Location:'.$_SERVER['HTTP_REFERER']);
    header('Location: index.php');
    exit();
  }

  include 'connect.php'; 
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

  <script>
      document.forms[0].submit()
  </script>
  <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>


  <link rel="stylesheet" href="lightbox.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'naglowek.php';?>

<?php include 'menu.php';?>

<div class="container" style="margin-top:30px">
  <div class="row">
      
      <?php 
        $id = $_POST['id'];
      ?>

    <form action='<?php usun_prod($conn)?>' method='post' enctype="multipart/form-data">
      <input type='hidden' name='postID' value='<?php echo $_POST['id'];?>'>
      <p><label>Czy na pewno chcesz usunąć produkt?</label><br />
      <p><input style='background-color:#ed566f;' type='submit' name='submit' value='Usuń produkt'></p>
    </form>

  </div>

<?php include 'footer.php';?>

<script src="lightbox-plus-jquery.min.js"></script>

<?php
      ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

  function usun_prod($conn)  
      {
        if(isset($_POST['submit']))
        {
          $id = $_POST['postID'];

          $sql = "DELETE FROM produkty WHERE id = '$id'";
          $result = mysqli_query($conn,$sql);
          
          header('Location: index.php?produkt-usuniety');   

        }
      }  

error_reporting(E_ALL);
  ?>

</body>
</html>