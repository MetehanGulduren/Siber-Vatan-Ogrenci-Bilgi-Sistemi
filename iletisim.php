<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>E-OKUL</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	</head>
	<body class="back">
		<?php include "ust_kisayol.php"; ?><br>
		<img src="img/YAVUZLAR-UZUN.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">İLETİŞİM</h1>
			<div class="cont">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<div class="contact-info">
						<h4>Metehan Güldüren</h4>
						<p>SİBER VATAN YAVUZLAR</p>
						<p>metegulduren@outlook.com</p>
						<p>0555 444 33 22</p>
					</div>
				</form>
			</div>
		</div>
		
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
	</body>
</html>
