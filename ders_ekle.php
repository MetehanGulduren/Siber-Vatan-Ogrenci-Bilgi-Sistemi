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
			<?php include"ust_kisayol.php";?><br>
				
				
			<div id="section">
			<?php include"yan_kisayol.php";?><br><br><br>
					<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
					<div class="content1">
					
						<h3 >Ders Ekle</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(SNAME) values ('{$_POST["sname"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Başarılı..</div>";
								}
								else
								{
									echo "<div class='error'>Hata..</div>";
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						   <label>Ders Adı</label><br>
						   <input type="text" name="sname" required class="input">
						   <button type="submit" class="btn" name="submit">Onayla</button>
						</form>
				
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px;">Ders Detayları</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Ders Adı</th>
							<th>Sil</th>
						</tr>
						<?php
							$s="select * from sub";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
										<td>{$i}</td>
										<td>{$r["SNAME"]}</td>
										<td><a href='ders_sil.php?id={$r["SID"]}' class='btnr'>Sil</a></td>
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