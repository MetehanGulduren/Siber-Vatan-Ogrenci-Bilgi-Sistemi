<?php
session_start();

if (!isset($_SESSION["ID"])) {
    header("Location: ogrenci_giris.php?mes=hata");
    exit;
}

include "database.php";

$student_id = $_SESSION["ID"];
$query = "SELECT exam.ENAME, exam_results.SCORE
          FROM exam_results
          INNER JOIN exam ON exam_results.EID = exam.EID
          WHERE exam_results.ID = $student_id";

$result = $db->query($query);
$totalScore = 0;
$numExams = 0;
$examData = array();

while ($row = $result->fetch_assoc()) {
    $totalScore += $row["SCORE"];
    $numExams++;
    $examData[] = array(
        'ENAME' => $row["ENAME"],
        'SCORE' => $row["SCORE"]
    );
}

$averageScore = $numExams > 0 ? $totalScore / $numExams : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Notları</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "ust_kisayol.php"; ?>

    <div id="section">
    <?php include"yan_kisayol.php";?><br><br><br>
        <h3 class="text">Sınav Sonuçları</h3><br><hr><br>
        <div class="content">
            <h4>Sınav Sonuçları:</h4>
            <table border="1">
                <tr>
                    <th>Sınav Adı</th>
                    <th>Puan</th>
                </tr>
                <?php
                if ($numExams > 0) {
                    foreach ($examData as $exam) {
                        echo "<tr>";
                        echo "<td>" . $exam["ENAME"] . "</td>";
                        echo "<td>" . $exam["SCORE"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Sonuç Bulunamadı.</td></tr>";
                }
                ?>
            </table>
            <h4>Sınav Ortalaması: <?php echo $averageScore; ?></h4>
        </div>
    </div>
</body>
</html>
