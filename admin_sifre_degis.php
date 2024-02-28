<?php
include "database.php";
session_start();

if (!isset($_SESSION["AID"])) {
    echo "<script>window.open('admin_giris?mes=Hata...','_self');</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>E-OKUL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include "ust_kisayol.php"; ?><br>

    <div id="section">

        <?php include "yan_kisayol.php"; ?><br><br><br>

        <h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>

        <div class="content1">

            <h3> Şifre Değiştir</h3><br>
            <?php
            if (isset($_POST["submit"])) {
                $opass = $_POST["opass"];
                $npass = $_POST["npass"];
                $cpass = $_POST["cpass"];
                $AID = $_SESSION["AID"];

                $sql = "SELECT APASS FROM admin WHERE AID = '{$AID}'";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashedPassword = $row['APASS'];

                    if (password_verify($opass, $hashedPassword)) {
                        if ($npass == $cpass) {
                            $hashedNewPassword = password_hash($npass, PASSWORD_ARGON2ID);
                            $updateSql = "UPDATE admin SET APASS = '{$hashedNewPassword}' WHERE AID = '{$AID}'";
                            if ($db->query($updateSql) === TRUE) {
                                echo "<div class='success'>Parola Değiştirildi</div>";
                            } else {
                                echo "<div class='error'>Parola değiştirilirken bir hata oluştu</div>";
                            }
                        } else {
                            echo "<div class='error'>Yeni parolalar uyuşmuyor</div>";
                        }
                    } else {
                        echo "<div class='error'>Geçersiz Eski Parola</div>";
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>Eski Şire</label><br>
                <input type="password" class="input3" name="opass"><br><br>
                <label>Yeni Şifre</label><br>
                <input type="password" class="input3" name="npass"><br><br>
                <label>Şifre Tekrar</label><br>
                <input type="password" class="input3" name="cpass"><br><br>
                <button type="submit" class="btn" style="float:left" name="submit"> Onayla</button>
            </form>

        </div>
    </div>

</body>

</html>
