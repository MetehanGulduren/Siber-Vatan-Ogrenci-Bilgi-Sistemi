<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
	 <?php include"ust_kisayol.php";?><br>
		
			<div id="section">
			<?php include"yan_kisayol.php";?><br><br><br>
				<h3 class="text">HOŞGELDİNİZ <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
					
						<h3 >Sınav Ekle</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$hashed_password = password_hash($_POST["passwd"], PASSWORD_ARGON2ID);
							$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
							$target="ogrenci/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="insert into student(RNO,NAME,SPASS,DOB,GEN,PHO,MAIL,ADDR,SCLASS,SIMG,TID) values('{$_POST["rno"]}','{$_POST["name"]}','{$hashed_password}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["addr"]}','{$_POST["cla"]}','{$target_file}','{$_SESSION["TID"]}')";
								
								if($db->query($sq))
								{
									echo "<div class='success'>Başarılı</div>";
								}
								else
								{
									echo "<div class='error'>Hata</div>";
								}
							}
							
						}
					
					
					
					
					
					
					?>
			
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label> ID</label><br>
						<?php
							$no="S101";
							$sql="select * from student order by ID desc limit 1";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["RNO"],1,strlen($row1["RNO"]));
								$no++;
								$no="S".$no;
							}
						
						
						
						?>
					<input type="text" class="input3" name="rno" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label> Öğrenci Adı</label><br>
					<input type="text" class="input3" name="name"><br><br>
                	<label>Şifre</label><br>
                	<input type="password" name="passwd" required class="input"><br>
                	
				
						
					<label> Doğum Tarihi</label><br>
					<select name="da" class="input5">
						<option value="">Gün</option>
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					<select name="mo" class="input5">
						<option> Ay</option>
						<option value="01">Ocak</option>
						<option value="02">Şubat</option>
						<option value="03">Mart</option>
						<option value="04">Nisan</option>
						<option value="05">Mayıs</option>
						<option value="06">Haziran</option>
						<option value="07">Temmuz</option>
						<option value="08">Ağustos</option>
						<option value="09">Eylül</option>
						<option value="10">Ekim</option>
						<option value="11">Kasım</option>
						<option value="12">Aralık</option>
					</select>
					<select name="ye" class="input5">
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
						<option value="2000">2000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
					</select><br><br>
					<label>Cinsiyet</label>
					<select name="gen" required class="input3">
							<option value="">Seç</option>
							<option value="Erkek">Erkek</option>
							<option value="Kadın">Kadın</option>
					</select><br><br>
					
					<label>Telefon Numarası</label><br>
					<input type="text" class="input3" maxlength="10" name="pho"><br><br>
				</div>
				
				<div class="rbox">
				
				<label>Mail Adresi</label><br>
					<input type="email" class="input3" name="email"><br><br>
					
					<label>Adres</label><br>
					<textarea rows="5" name="addr"></textarea><br><br>
				
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
					</select><br></br>
					<label>Fotoğraf</label><br>
					<input type="file"  class="input3" required name="img"><br><br>
			
			<button type="submit" style="float:right;" class="btn" name="submit">Onayla</button>
				</div>
					
				</form>
				
				
				</div>
				
				
			</div>
	
	</body>
</html>