<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('admin_giris.php?mes=Hata...','_self');</script>";
		
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
			
				<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				<h3 >Öğrenci Görüntüle</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Takım</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Seç</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>

					<button type="submit" class="btn" name="view">Tıkla</button>
				
						
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Öğrenci Detayları</h3><br>";
								$sql="select * from student where SCLASS='{$_POST["cla"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>No</th>
											<th>ID</th>
											<th>Ad</th>
											<th>Doğum Tarihi</th>
											<th>Cinsiyet</th>
											<th>Telefon</th>
											<th>Mail</th>
											<th>Adres</th>
											<th>Takım</th>
											<th>Fotoğraf</th>
										</tr>
									
									
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
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
										
										
										</tr>
										";
										
									}
								}
							else
							{
								echo "Kayıt Bulunamadı";
							}
								echo "</table>";
							}
						
						
						?>
					
					</div>
				</div>
				
				
			</div>
	
			
	</body>
</html>