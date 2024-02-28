<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('admin_giris.php?mes=Hata...','_self');</script>";
		
	}
	$sql="SELECT * FROM staff WHERE TID={$_GET["id"]}";
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
		<img src="img/YAVUZLAR-UZUN.jpg" style="margin-left:90px;" class="sha">
			<div id="section">
			<?php include"yan_kisayol.php";?><br><br><br>
				<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 >Sorumlu Detayları</h3><br>
						<div class="ibox">
							<img src="<?php echo $row["IMG"]; ?>" height="230" width="230">
							
						</div>
						<div class="tsbox">
						<table border="1px">
						
							<tr><th>İsim </th> <td> <?php echo $row["TNAME"]; ?></td></tr>
							<tr><th>Takım</th> <td> <?php echo $row["QUAL"]; ?></td></tr>
							<tr><th>Şehir </th> <td> <?php echo $row["SAL"]; ?></td></tr>
							<tr><th>Telefon </th> <td> <?php echo $row["PNO"]; ?></td></tr>
							<tr><th>Mail </th> <td> <?php echo $row["MAIL"]; ?></td></tr>
							<tr><th>Adres </th> <td> <?php echo $row["PADDR"]; ?></td></tr>
							
						</table>
						</div>
				</div>	
			</div>
			
			
	</body>
</html>