<?php
	include "database.php";
	session_start();
	$s="delete from student where ID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('view_stud_teach.php?mes=Silindi','_self');</script>";


?>