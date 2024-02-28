<?php
session_start();
if (!isset($_SESSION["TID"])) {
    header("Location: sorumlu_giris.php?mes=hata");
    exit;
}

include "database.php";

if (isset($_POST["submit"])) {
    $student_id = $_POST["student_id"];
    $score = $_POST["score"];
    $exam_id = $_POST["exam_id"];
    $student_query = "SELECT * FROM student WHERE ID = $student_id";
    $student_result = $db->query($student_query);


    if (!empty($student_id)) {

        $sql = "INSERT INTO exam_results (EID, ID, SCORE) VALUES ('$exam_id', '$student_id', '$score')";

        if ($db->query($sql)) {
            $mesaj = "Başarılı";
        } else {
            $mesaj = "Hata: " . $db->error;
        }
    } else {
        $mesaj = "Geçersiz Öğrenci";
    }
}

if (!empty($mesaj) && strpos($mesaj, 'Başarılı') !== false) {
    header("Location: sinav_notu_gir.php?id=$exam_id&mes=basarili");
    exit;
} else {
    header("Location: sinav_notu_gir.php?id=$exam_id&mes=hata");
    exit;
}
?>