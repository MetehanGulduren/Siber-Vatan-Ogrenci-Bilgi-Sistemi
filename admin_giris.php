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
		<?php include "ust_kisayol.php";?>
		<img src="img/YAVUZLAR-UZUN.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">Admin Giriş</h1>
			<div class="log">
			<?php
				if(isset($_POST["login"]))
				{
					$sql="select * from admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["AID"]=$ro["AID"];
						$_SESSION["ANAME"]=$ro["ANAME"];
						echo "<script>window.open('admin_home.php','_self');</script>";
					}
					else
					{
						echo "<div class='alert alert-danger'>Yanlış isim veya şifre</div>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='alert alert-danger'>{$_GET["mes"]}</div>";
				}
				
			?>
		
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-group">
						<label for="aname">İsim</label>
						<input type="text" name="aname" required class="form-control" id="aname">
					</div>
					<div class="form-group">
						<label for="apass">Şifre</label>
						<input type="password" name="apass" required class="form-control" id="apass">
					</div>
					<button type="submit" class="btn btn-primary" name="login">Giriş Yap</button>
				</form>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
	</body>
</html>
