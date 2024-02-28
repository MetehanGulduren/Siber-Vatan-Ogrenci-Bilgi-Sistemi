<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('ogrenci_giris.php?mes=Hata...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM student WHERE ID={$_SESSION["ID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>E-OKUL</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<?php include"ust_kisayol.php";?>
	
			<div id="section">
			<?php include"yan_kisayol.php";?><br>
					<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["NAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					
					
					<div class="rbox1">
					<h3> Öğrenci</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["SIMG"] ?>" height="100" width="100" alt="Yükleme Bekleniyor"></td></tr>
							<tr><th>Ad Soyad </th> <td><?php echo $row["NAME"] ?> </td></tr>
							<tr><th>Takım</th> <td><?php echo $row["SCLASS"] ?>  </td></tr>
							<tr><th>Telefon Numarası </th> <td> <?php echo $row["PHO"] ?> </td></tr>
							<tr><th>Mail</th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Adres</th> <td> <?php echo $row["ADDR"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				
	</body>
</html>