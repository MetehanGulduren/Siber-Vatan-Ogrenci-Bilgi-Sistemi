<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		header("Location: sorumlu_giris.php?mes=Hata...");
		exit;
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
			
				<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
					
						<h3 >Öğrenci Detayları Görüntüle</h3><br>
					
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='hata'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>İsim</th>
							<th>Doğum Tarihi</th>
							<th>Cinsiyet</th>
							<th>Telefon No</th>
							<th>Mail</th>
							<th>Adres</th>
							<th>Takım</th>
							<th>Fotoğraf</th>
							<th>Sil</th>
						</tr>
						<?php
							$s="select * from student where TID={$_SESSION["TID"]}";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
										<tr>
											<td>{$i}</td>
											<td>{$r["ID"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["DOB"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["PHO"]}</td>
											<td>{$r["MAIL"]}</td>
											<td>{$r["ADDR"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td><img src='{$r["SIMG"]}' height='70' width='70'></td>
											<td><a href='ogrenci_sil.php?id={$r["ID"]}' class='btnr'>Sil</a><td>
										</tr>
									
									
									
									";
								}
							}
							else
							{
								echo "Kayıt Bulunamadı";
							}
						
						?>
						
					</table>
				
				</div>
				
				
			</div>
	
				
	</body>
</html>