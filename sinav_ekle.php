<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	
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
				
					
				
				<div class="content">
					
				<h3 >Sınav Ekle</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{	
							$sq="insert into exam(ENAME,CLASS,SUB) values ('{$_POST["ename"]}','{$_POST["cla"]}','{$_POST["sub"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Başarılı</div>";
							}
							else
							{
								echo "<div class='error'>Hata</div>";
							}
						}
					?>
			
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<div class="lbox">
						<label> Sınav Adı</label><br>
							<input type="text" class="input2" name="ename"><br><br>
					
				</div>
				<div class="lbox">
					<label>Sınıf</label><br>
					<select name="cla" required class="input2">
					</div>
						<?php
							$sl="select DISTINCT(CNAME) from class";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Seç</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
					
					<br><br>
					
					
					<label>Ders</label><br>
					<select name="sub" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Seç</option>";
								while($r=$re->fetch_assoc())
								{
									echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						?>
						
					</select>
					<br><br>
				</div>
					<button type="submit" class="btn" name="submit">Onayla</button>
				</form>
				
				
				</div>
				
				
			</div>
	</body>
</html>