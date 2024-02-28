<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('admin_giris.php?mes=Hata..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>E-OKUL</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style>
  .center-image {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30vh;
  }
</style>
	</head>
	<body>
	
		<?php include"ust_kisayol.php";?><br>
		
		<div id="section">
			
				<?php include"yan_kisayol.php";?><br>
		<div class="center-image">
  <img src="img/YAVUZLAR-UZUN.jpg" width="400">
</div>
			
			
				
				<div class="content">
					<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
						
					
					<p class="para">
					</p>
					
				
				</div>
				
			</div>
	
		
	</body>
</html>