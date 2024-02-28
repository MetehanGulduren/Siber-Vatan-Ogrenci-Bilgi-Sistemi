<?php
	include "database.php";
	session_start();
	$s="delete from sub where SID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('ders_ekle.php?mes=Silindi..','_self');</script>";
?>