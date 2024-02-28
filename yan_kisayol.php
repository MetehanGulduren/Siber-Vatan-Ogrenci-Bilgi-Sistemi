<div class="sidebar"><br>
<h3 class="text"</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			
			<li class="li"><a href="takim_ekle.php">Takımlar</a></li>
			<li class="li"><a href="ders_ekle.php">Dersler</a></li>
			<li class="li"><a href="sorumlu_ekle.php">Sorumlu Ekle</a></li>
			<li class="li"><a href="sorumlu_gor.php">Sorumlu Görüntüle</a></li>
			<li class="li"><a href="admin_sinav_ekle.php">Sınav Ekle</a></li>
			<li class="li"><a href="admin_sinav_goruntule.php">Sınav Görüntüle</a></li>
			<li class="li"><a href="ogrenci.php"target="_blank">Öğrenci Görüntüle</a></li>
			<li class="li"><a href="cikis.php">Çıkış Yap</a></li>
		
		';
	
	
	}
	elseif(isset($_SESSION["TID"])){
		echo'
			<li class="li"><a href="sorumlu_profil.php">Profil</a></li>
			<li class="li"><a href="sinav_ekle.php">Sınav Ekle</a></li>
			<li class="li"><a href="sinav_goruntule.php">Sınav Görüntüle</a></li>
			<li class="li"><a href="sorumlu_not_gir.php">Sınav Notu Gir</a></li>
			<li class="li"><a href="sorumlu_not_goruntuleme.php">Sınav Notları Görüntüle</a></li>
			<li class="li"><a href="ogrenci_ekle.php">Öğrenci Ekle</a></li>
			<li class="li"><a href="ogrenci_goruntule.php" target="_blank">Öğrenci Görüntüle</a></li>			
			<li class="li"><a href="cikis.php">Çıkış</a></li>

		
		';
	}
	elseif(isset($_SESSION["ID"])){
		echo'
			<li class="li"><a href="ogrenci_profil.php">Profil</a></li>
			<li class="li"><a href="ogrenci_not.php">Sınav Notu Görüntüle</a></li>	
			<li class="li"><a href="cikis.php">Çıkış</a></li>

		
		';
	}
	


?>
	

</ul>

</div>