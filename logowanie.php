<!DOCTYPE html>

<?php 

	include 'connect.php'; 
	include 'zdjecie.php'; 
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

        	if(!isset($_SESSION['zalogowany']))
        		{
              	echo '<div class="wrapper fadeInDown">
					    <div id="formContent">
					      <form action="zaloguj.php" method="post">
					      <br/>
					     	<legend> Jeśli posiadasz już konto: </legend>
					        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
					        <input type="password" id="haslo" class="fadeIn second" name="haslo" placeholder="Hasło">
					        <input type="submit" class="fadeIn second" value="Zaloguj się">
					      </form>';
				}
		?>

		 <?php if(!isset($_SESSION['zalogowany'])) : ?>
						
				<?php 
					if(isset($_SESSION['udana_rejestracja']))
					{
						echo '<h4 class="section-title font-alt mb-70 mb-sm-40">'.$_SESSION['udana_rejestracja'].'</h4>';
						unset($_SESSION['udana_rejestracja']);
					}
				?>

			<form action="rejestracja.php" method="post">
				<fieldset>
					<legend> Jeśli jesteś nowy: </legend>
					</br>
					<input type="text" class="fadeIn third" value="<?php 
						if(isset($_SESSION['fr_nick']))
						{
							echo $_SESSION['fr_nick'];
							unset($_SESSION['fr_nick']);
						}
					?>" name="login" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'"/>
					
						<?php
							if(isset($_SESSION['e_nick']))
							{
								echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
								unset($_SESSION['e_nick']);
							}
						?>

					<input type="text" class="fadeIn third" value="<?php 
						if(isset($_SESSION['fr_email']))
						{
							echo $_SESSION['fr_email'];
							unset($_SESSION['fr_email']);
						}

					?>" name="email" placeholder="E-mail" onfocus="this.placeholder=''" onblur="this.placeholder='E-mail'"/>
						<?php
							if(isset($_SESSION['e_email']))
							{
								echo'<div class="error">'.$_SESSION['e_email'].'</div>';
								unset($_SESSION['e_email']);
							}
						?>
					<input type="password" class="fadeIn third" value="<?php 
						if(isset($_SESSION['fr_haslo1']))
						{
							echo $_SESSION['fr_haslo1'];
							unset($_SESSION['fr_haslo1']);
						}

					?>" name="haslo1" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'"/>
						<?php
							if(isset($_SESSION['e_haslo']))
							{
								echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
								unset($_SESSION['e_haslo']);
							}
						?>
					
					<input type="password" class="fadeIn third" value="<?php 
						if(isset($_SESSION['fr_haslo2']))
						{
							echo $_SESSION['fr_haslo2'];
							unset($_SESSION['fr_haslo2']);
						}

					?>" name="haslo2" placeholder="Powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz hasło'"/>
					
					<input type="submit" value="Zarejestruj się" />
													
				</fieldset>
				</form>

		<?php endif; ?>



		<?php

				if(isset($_SESSION['zalogowany']))
				{
					echo '<div class="wrapper fadeInDown">
					    	<div id="formContent">
					    	<br/>';
					    	sprawdz_zdjecie($conn);
					    	echo'<h2 style="padding-top:10px;">';
					    			echo $_SESSION['user'];
						    	echo '
						    	</h2>
						    	<br/>
	
								<form role="form" class="form" action="'.zmien_zdjecie_profilowe($conn).'" method="POST" enctype="multipart/form-data">		
								<div class="custom-file">	
									<input type="file" class="custom-file-input" name="postImage" value="">
									<label style="margin: 0 10px 0 10px;" class="custom-file-label" for="customFile">Wybierz zdjęcie [kwadratowe]</label>
									<br/><br/>
									<input name="submit-profilowe" type="submit" class="fadeIn fourth" value="Zmień profilowe">
								</div>
								</form>	
								<br/>
						    	<form action="dodaj_prod.php" method="post">
								    <br/>
								    <input type="submit" class="fadeIn fourth" value="Dodaj produkt">
								</form>

						    	<form action="logout.php" method="post">
								    <input type="submit" class="fadeIn fourth" value="Wyloguj się">
								</form>
						    </div>
						</div>';
				}
            }

        mysqli_close($conn);

      ?>
  </div>

<?php include 'footer.php';?>

<script src="lightbox-plus-jquery.min.js"></script>

</body>
</html>