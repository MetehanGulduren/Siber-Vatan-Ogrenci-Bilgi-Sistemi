
<?php 

	include"database.php";
	
	$sql = "SELECT * FROM staff WHERE 1=1";
	$res=$db->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>No</th>
					<th>İsim</th>
					<th>Takım</th>
					<th>Üniversite</th>
					<th>Görüntüle</th>
					<th>Sil</th>
				</tr>
				";
	if($res->num_rows>0)
		
	{
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo "<tr>
				<td>{$i}</td>
				<td>{$row["TNAME"]}</td>
				<td>{$row["QUAL"]}</td>
				<td>{$row["SAL"]}</td>
				<td><a href='sorumlu_goruntule.php?id={$row["TID"]}' class='btnb'>Görüntüle</a></td>
				<td><a href='sorumlu_sil.php?id={$row["TID"]}' class='btnr'>Sil</a></td>
				</tr>
			";
		}
				echo "</table>";
	}
		
	else
	{
		echo "<p>Kayıt Bulunamadı</p>";
	}
	
?>