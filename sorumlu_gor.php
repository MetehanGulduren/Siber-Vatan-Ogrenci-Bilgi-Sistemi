<?php
    include "database.php";
    session_start();
    if(!isset($_SESSION["AID"])) {
        echo "<script>window.open('admin_giris.php?mes=Hata...','_self');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-OKUL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include "ust_kisayol.php";?>
    <div id="section">
        <?php include "yan_kisayol.php";?><br>
        <h3 class="text">Hoşgeldiniz <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
        <div class="content1">
            <h3 > Sorumlular</h3><br>
            
            <br>
            <div id="box"></div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var txtInput = document.getElementById("txt");
            var boxDiv = document.getElementById("box");

            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "ara.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    boxDiv.innerHTML = xhr.responseText;
                }
            };
            xhr.send();

            txtInput.addEventListener("input", function() {
                var txt = txtInput.value;
                if (txt !== "") {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "ara.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            boxDiv.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send("s=" + txt);
                }
            });
        });
    </script>
</body>
</html>
