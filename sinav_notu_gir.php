<?php
session_start();
if (!isset($_SESSION["TID"])) {
    header("Location: sorumlu_giris.php?mes=hata");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sınav Notu Girişi</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "ust_kisayol.php"; ?>

    <div id="section">
        <?php include "yan_kisayol.php"; ?><br><br><br>

        <h3 class="text">Sınav Notu Girişi</h3><br><hr><br>

        <div class="content">
            <?php
            if (isset($_GET["id"])) {
                $exam_id = $_GET["id"];
            }
            if (isset($_GET["mes"]) && $_GET["mes"] === "basarili") {
                echo "<div class='success'>Başarılı!</div>";
            }
            ?>
            

            <form method="post" action="sinav_notu_kaydet.php">
                <label>Öğrenci Kimliği (ID):</label>
                <input type="text" name="student_id" required>
                <br>

                <label>Not:</label>
                <input type="text" name="score" required>
                <br>

                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                <button type="submit" class="btn" name="submit">Kaydet</button>
            </form>
        </div>
    </div>
</body>
</html>
