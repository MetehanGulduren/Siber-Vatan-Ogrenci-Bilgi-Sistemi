<?php
include "database.php";
session_start();

if (!isset($_SESSION["TID"])) {
    echo "<script>window.open('sorumlu_profil.php?mes=Hata...','_self');</script>";
}

$sql = "SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
$res = $db->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
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
        <h3 class="text">Hoşgeldiniz <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
        <div class="content">
            <h3>Şifre Değiştir</h3><br>
            <div class="lbox1">
                <?php
                if (isset($_POST["submit"])) {
                    $opass = $_POST["opass"];
                    $npass = $_POST["npass"];
                    $cpass = $_POST["cpass"];

                    $sql = "SELECT TPASS FROM staff WHERE TID={$_SESSION["TID"]}";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $hash = $row["TPASS"];

                        if (password_verify($opass, $hash)) {
                            if ($npass === $cpass) {
                                $hashedPassword = password_hash($npass, PASSWORD_ARGON2ID);

                                $sql = "UPDATE staff SET TPASS='{$hashedPassword}' WHERE TID={$_SESSION["TID"]}";
                                $db->query($sql);
                                echo "<div class='success'>Şifre Değiştirildi</div>";
                            } else {
                                echo "<div class='error'>Şifreler Uyuşmuyor</div>";
                            }
                        } else {
                            echo "<div class='error'>Geçersiz Eski Şifre</div>";
                        }
                    }
                }
                ?>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label>Eski Şifre</label><br>
                    <input type="password" class="input3" name="opass"><br><br>
                    <label>Yeni Şifre</label><br>
                    <input type="password" class="input3" name="npass"><br><br>
                    <label>Şifre Tekrar</label><br>
                    <input type="password" class="input3" name="cpass"><br><br>
                    <button type="submit" class="btn" style="float:left" name="submit">Onayla</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
