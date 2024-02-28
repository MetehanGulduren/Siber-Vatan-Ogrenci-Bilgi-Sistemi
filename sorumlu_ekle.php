<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
    echo "<script>window.open('admin_giris.php?mes=Hata...','_self');</script>";
}

$sqlTeams = "SELECT * FROM class";
$result = $db->query($sqlTeams);

$teams = array();
while ($row = $result->fetch_assoc()) {
    $teams[] = $row;
}

if (isset($_POST["submit"])) {
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_ARGON2ID);

    $sq = "INSERT INTO staff (TNAME, TPASS, QUAL, SAL) VALUES (
        '{$_POST["sname"]}',
        '{$hashed_password}',
        '{$_POST["qual"]}',
        '{$_POST["sal"]}'
    )";
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
        <?php include "yan_kisayol.php"; ?><br><br><br>
        <h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
        <div class="content1">
            <h3> Sorumlu Ekle</h3><br>
            <?php if (isset($_POST["submit"])) {
                $hashed_password = password_hash($_POST["passwd"], PASSWORD_ARGON2ID);
                $sq = "INSERT INTO staff (TNAME, TPASS, QUAL, SAL) VALUES (
                    '{$_POST["sname"]}',
                    '{$hashed_password}',
                    '{$_POST["qual"]}',
                    '{$_POST["sal"]}'
                )";
                if ($db->query($sq)) {
                    echo "<div class='success'>Başarılı..</div>";
                } else {
                    echo "<div class='error'>Hata..</div>";
                }
            }
            ?>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>Sorumlu Adı</label><br>
                <input type="text" name="sname" required class="input">
                <br><br>
                <label>Takım</label><br>
                <select name="qual" required class="input">
                    <option value="">Seç</option>
                    <?php foreach ($teams as $team) : ?>
                        <option value="<?php echo $team['CNAME']; ?>"><?php echo $team['CNAME']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <label>Şehir</label><br>
                <input type="text" name="sal" required class="input">
                <br><br>
                <label>Şifre</label><br>
                <input type="password" name="passwd" required class="input">
                <br><br>
                <button type="submit" class="btn" name="submit">Onayla</button>
            </form>
        </div>
    </div>
</body>

</html>
