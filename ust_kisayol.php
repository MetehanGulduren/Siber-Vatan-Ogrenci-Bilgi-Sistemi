<div class="navbar">

			<ul class="list">
				<b style="color:black;float:left;line-height:50px;margin-left:19px;font-family:"Times New Roman", Times, serif;">
				E-OKUL</b>
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'
				
						<li><a href="admin_home.php">Ana Sayfa</a></li>
				<li><a href="admin_sifre_degis.php">Ayarlar</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'
					<li><a href="sorumlu_anasayfa.php">Ana Sayfa</a></li>
				<li><a href="sorumlu_sifre_degistir.php">Ayarlar</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
					';
				}
				elseif(isset($_SESSION["ID"]))
				{
					echo'
					<li><a href="ogrenci_anasayfa.php">Ana Sayfa</a></li>
				<li><a href="ogrenci_sifre_degistir.php">Ayarlar</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
					';
				}
				else{
					echo'
					
					<li><a href="admin_giris.php">Admin Giriş</a></li>
				<li><a href="sorumlu_giris.php">Sorumlu Giriş</a></li>
				<li><a href="ogrenci_giris.php">Öğrenci Giriş</a></li>
				<li><a href="iletisim.php">İletişime Geç</a></li>';
				}
			?>
				
			</ul>
		</div>
		