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
		<?php include "ust_kisayol.php"; ?>
		<img src="img/YAVUZLAR-UZUN.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">Sorumlu Girişi</h1>
			<div class="log">
				<?php
					if (isset($_POST["login"])) {
						$name = $_POST["name"];
						$pass = $_POST["pass"];
						$sql = "select * from staff where TNAME=?";
						$stmt = $db->prepare($sql);
						$stmt->bind_param("s", $name);
						$stmt->execute();
						$result = $stmt->get_result();
						
						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$storedPass = $row["TPASS"];
							
							
							if (password_verify($pass, $storedPass)) {
								
								$_SESSION["TID"] = $row["TID"];
								$_SESSION["TNAME"] = $row["TNAME"];
								echo "<script>window.open('sorumlu_anasayfa.php','_self');</script>";
							} else {
								echo "<div class='alert alert-danger'>Yanlış Ad Soyad veya Şifre</div>";
							}
						} else {
							echo "<div class='alert alert-danger'>Kullanıcı bulunamadı</div>";
						}
					}
				?>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<div class="form-group">
						<label for="name">Ad Soyad</label>
						<input type="text" name="name" required class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="pass">Şifre</label>
						<input type="password" name="pass" required class="form-control" id="pass">
					</div>
					<button type="submit" class="btn btn-primary" name="login">Giriş Yap</button>
				</form>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
	</body>
</html>
