<?php
	include"database.php";
	session_start();
	if (!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('sorumlu_giris.php?mes=Hata...','_self');</script>";
		
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
				
			<?php include"yan_kisayol.php";?><br><br><br>
					
					<h3 class="text">Hoşgeldiniz</h3><br><hr><br>
					
				<div class="content">
					
						<h3 >Sınav Detayları Görüntüle</h3><br>
						
						<?php
							if(isset($_GET["mes"]))
								{
									echo"<div class='error'>{$_GET["mes"]}</div>";	
								}
					
						?>
						
						<table border="1px">
							<tr>
								<th>Sınıf </th>
								<th>Ders</th>
								<th>Sınav Adı</th>							
								<th>Sil</th>
							</tr>
							<?php
								$s="select * from exam";
								$res=$db->query($s);
								if($res->num_rows>0)
								{
									$i=0;
									while($r=$res->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												
												<td>{$r["CLASS"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["ENAME"]}</td>											
												<td><a href='sinav_sil.php?id={$r["EID"]}' class='btnr'>Sil</a></td>
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