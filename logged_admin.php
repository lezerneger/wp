<html>
<head>
    <title>ADMIN FELULET BELEJELNTKEZVE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/adminStyle.css">
</head>
<body>
<div class="wrapper">
    <div class="content">
    <!--LOGIN + conditions - BELÉPÉS + feltetelek-->
    <?php
        include("db_config.php");
        session_start(); // egy valtozot tobb oldalon tudsz hasznalni majd

        @$user = $_POST['username']; // admin.php kuldi ide
        //jelszo atformalasa:
        //$pass = "kecske123";
        //$pass2 = md5($pass);
        //echo $pass2;
        if(isset($_POST['username']) && isset($_POST['password'])) {  // isset-tel leellenorzi, hogy letezik-e, azaz, hogy bevan-e allitva ra valami

            $password = md5($_POST['password']);  // dekodolja md5-tel a kapott passwordot

            $query = mysqli_query($connection, "SELECT id FROM users WHERE user = '$user' AND password = '$password'");
            if (mysqli_num_rows($query) == 1) { // kap-e vissza sort
                $_SESSION['loggedin'] = true;
                echo "Sikeres bejelentkezes!";
            }
            else{
                echo "Hiba! Próbálkozzon újra";
                header("Location: admin.php");
            }
        }
    ?>
    <div id="adminLabel">
        <p>ADMIN PANEL</p>
    </div>
        <div id="vissza">
            <a href="index.html" > > WEBOLDAL</a>
        </div>
    <!-- INSERT - beiras -->
    <div id="insert">
        <label>INSERT NEW DATA:</label> <br><br>
            <form action="insert.php" method="post">
                <label>Márka: </label><input type="text" name="marka"> <label>&nbsp;&nbsp;Név: </label><input type="text" name="nev"> <label>&nbsp;&nbsp;Évjárat: </label><input type="number" name="evjarat"> <label>&nbsp;&nbsp;Fajta: </label><input type="text" name="fajta"> <label>&nbsp;&nbsp;Ár: </label><input  type="number" name="ar"> <label>&nbsp;&nbsp;<br><br>Raktáron (0 / 1): </label><input  type="number" name="raktaron" min="0" max="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="searchButton" type="submit" value="Elküldés" >
            </form>
    </div>

    <br>

    <!-- LIST ALL - mind kiliztazasa-->
    <div id="listAll">
    <table border="5px solid black" >
        <caption id="tableCaption">DATAS IN DATABASE:</caption>
    <?php
    $query2=mysqli_query($connection,"SELECT * FROM termekek"); // ez egy lekerdezes az adatbazisbol
    if(mysqli_num_rows($query2)!=0) {
        echo "<tr><th class='listed'>MÁRKA</th><th class='listed'>NÉV</th><th class='listed'>ÉVJÁRAT</th><th class='listed'>FAJTA</th><th class='listed'>ÁR</th><th class='listed'>RAKTÁRON (0/1)</th><th class='listedOption' colspan='2'>OPTIONS:</th></tr>";
        foreach($query2 as $row){
            echo "<tr><td class='listed'>".$row['marka']."</td>";
            echo "<td class='listed'>".$row['nev']."</td>";
            echo "<td class='listed'>".$row['evjarat']."</td>";
            echo "<td class='listed'>".$row['fajta']."</td>";
            echo "<td class='listed'>".$row['ar']."</td>";
            echo "<td class='listed'>".$row['raktaron']."</td>";
            echo "<td class='listedButton'><form action='delete.php' method='POST'><input type='hidden' name='delete' value='".$row['id']."'><input type='submit' value='DELETE'></form></td>";
            echo "<td class='listedButton'><form action='update.php' method='POST'><input type='hidden' name='update' value='".$row['id']."'><input type='submit' value='UPDATE'></form></td></tr>";
        }
    }
    ?>
    </table><br>
    </div>
    </div>
</div>
</body>
</html>