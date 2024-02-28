<?php
	include "database.php";
	session_start();

	if (!isset($_SESSION["AID"])) {
		echo "<script>window.open('admin_giris.php?mes=Hata...', '_self');</script>";
	}

	if (isset($_POST["submit"])) {
		$cname = $_POST["cname"];

		$sql = "INSERT INTO class (CNAME) VALUES ('$cname')";

		if ($db->query($sql)) {
			echo "<div class='success'>Başarılı..</div>";
		} else {
			echo "<div class='error'>Hata..</div>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>E-OKUL</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include "ust_kisayol.php"; ?>
		
		<div id="section">
			<?php include "yan_kisayol.php"; ?><br>
			<h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
			<div class="content1">
				<h3 >Sınıf Düzenle</h3><br>
				
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<label>Takım İsmi</label><br>
					<input type="text" name="cname" required class="input2">
					<br>
					<button type="submit" class="btn" name="submit">Onayla</button>
				</form>
			</div>
			
			<div class="tbox">
				<h3 style="margin-top:30px;"> Sınıf Detayları</h3><br>
				<?php
					if (isset($_GET["mes"])) {
						echo "<div class='error'>{$_GET["mes"]}</div>";
					}
				?>
				<table border="1px">
					<tr>
						<th>No</th>
						<th>Sınıf Adı</th>
						<th>Sil</th>
					</tr>
					<?php
						$s = "select * from class";
						$res = $db->query($s);
						if ($res->num_rows > 0) {
							$i = 0;
							while ($r = $res->fetch_assoc()) {
								$i++;
								echo "
									<tr>
										<td>{$i}</td>
										<td>{$r["CNAME"]}</td>
										<td><a href='takim_sil.php?id={$r["CID"]}' class='btnr'>Sil</a></td>
									</tr>";
							}
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
