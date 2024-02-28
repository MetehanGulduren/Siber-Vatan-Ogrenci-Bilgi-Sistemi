<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('sorumlu_giris.php?mes=Hata...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
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
					<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Profil Detay Ekle</h3><br>
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							$target="sorumlu/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="update staff set PNO='{$_POST["pno"]}',MAIL='{$_POST["mail"]}',PADDR='{$_POST["addr"]}',IMG='{$target_file}'where TID={$_SESSION["TID"]}";
								$db->query($sql);
								echo "<div class='success'>Başarılı</div>";
							}
							
						}
					
					
					?>
					
					
					
					
						
					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							<label>Telefon Numarası</label><br>
							<input type="text" maxlength="10" required class="input3" name="pno"><br><br>
							<label>Mail Adresi</label><br>
							<input type="email"  class="input3" required name="mail"><br><br>
							<label>Adres</label><br>
							<textarea rows="5" name="addr"></textarea><br><br>
							<label>Fotoğraf</label><br>
							<input type="file"  class="input3" required name="img"><br><br>
						<button type="submit" class="btn" name="submit">Onayla</button>
						</form>
					</div>
					
					
					
					
					<div class="rbox1">
					<h3> Sorumlu</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="Yükleme Bekleniyor"></td></tr>
							<tr><th>Ad Soyad </th> <td><?php echo $row["TNAME"] ?> </td></tr>
							<tr><th>Takım</th> <td><?php echo $row["QUAL"] ?>  </td></tr>
							<tr><th>Şehir</th> <td> <?php echo $row["SAL"] ?>  </td></tr>
							<tr><th>Telefon Numarası </th> <td> <?php echo $row["PNO"] ?> </td></tr>
							<tr><th>Mail</th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Adres</th> <td> <?php echo $row["PADDR"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>
	
				
	</body>
</html>