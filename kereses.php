<html>
<head>
    <title>Keresés a termékek között</title>
    <meta charset="utf8_hungarian_ci">
    <meta name="author" content="Ranc Edvin">
    <meta name="description" content="Olcsó és minőségi borok.">
    <meta name="keywords" content="borok sok minőségi">
    <meta name="robots" content="index, nofollow">
    <link rel="stylesheet" href="css/style.css">
    <style>
.flip-card {
  background-color: transparent;
  width: 100%;
  height: 400px;
  perspective: 1000px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #8f9ba3;
  color: white;
  transform: rotateY(180deg);
}
</style>
</head>
<body>
<div class="wrapperK">
    <div id="center">
        <div id="menu">
            <a class="menu" href="index.html">Kezdőlap</a>
            <a class="menu" href="termekvalasztek.php">Terékválasztékunk</a>
            <a class="menu" href="kereses.php">Keresés a termékek között</a>
            <a class="menu" href="about.php">Rólunk</a>
            <a class="menu" href="https://www.facebook.com/" target="_blank">Facebookon is</a>
            <a class="menu" href="admin.php">Admin Login</a>
        </div>
    </div>
    <div class="content">
    <div class="items">
        <div id="Cim" style="margin-right: 15px;">
            <h2>Keresés a termékek között:</h2>
        </div>

        <div id="KeresesiLeiras" style="margin-right: 15px;">
            <div id="keresniTud">
            <h3 style="margin-bottom: -10px">Keresni tud:</h3>
            <ul>
                <li>Márka szerint</li>
                <li>Fajta szerint</li>
                <li>Ár szerint</li>
            </ul>
            </div>
        </div>

        <div id="kereses">
        <form action="" method="post" class="keresesPanel">
            <label>Márka:</label>
            <select name="markaS">
                <option>-</option>
            <?php
            include("db_config.php");
            error_reporting(E_ALL ^ E_NOTICE);

           // $numberOfPages=$count/5;  //az osztas az az, hogy hany darab product legyen egy oldalon
           // $numberOfPages=ceil($numberOfPages);

            $query=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=1 group by marka"); //ez egy lekerdezes az adatbazisbol
            if(mysqli_num_rows($query)!=0) {
                foreach ($query as $row) {
                    echo "<option>" . $row['marka'] . "</option>";
                }
            }
            ?>
            </select>

            <label> &nbsp; &nbsp;Név:</label>
            <select name="nevS">
                <option>-</option>
                <?php
                include("db_config.php");
                $query=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=1 group by nev"); //ez egy lekerdezes az adatbazisbol
                if(mysqli_num_rows($query)!=0) {
                    foreach ($query as $row) {
                        echo "<option>" . $row['nev'] . "</option>";
                    }
                }
                ?>
            </select>

            <label>  &nbsp;Fajta:</label>
            <select name="fajtaS">
                <option>-</option>
                <?php
                include("db_config.php");
                $query=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=1 group by fajta"); //ez egy lekerdezes az adatbazisbol
                if(mysqli_num_rows($query)!=0) {
                    foreach ($query as $row) {
                        echo "<option>" . $row['fajta'] . "</option>";
                    }
                }
                ?>
            </select>

            <label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Évjárat:</label>
            <select name="evjaratS">
                <option>-</option>
                <?php
                include("db_config.php");
                $query=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=1 group by evjarat"); //ez egy lekerdezes az adatbazisbol
                if(mysqli_num_rows($query)!=0) {
                    foreach ($query as $row) {
                        echo "<option>" . $row['evjarat'] . "</option>";
                    }
                }
                ?>
            </select>

            <label> &nbsp; &nbsp;Ár:</label>
            <input type="number" min="0" max="30000" name="min">-tól &nbsp;<input type="number" min="0" max="50000" name="max">-ig
            <br><br>
            <input type="submit" class="searchButton" value="Keresés">

        </form>
            <div class="spacer" style="clear: both;"></div>


        <div id="talalatok">
        <!-- SEARCH RESULT - keresés eredménye -->
        <?php
            $marka = $_POST['markaS'];
            $nev = $_POST['nevS'];
            $fajta = $_POST['fajtaS'];
            $evjarat = $_POST['evjaratS'];
            $arMin = $_POST['min'];
            $arMax = $_POST['max'];

        /*$query4=mysqli_query($connection,"SELECT * FROM termekek"); // ez egy lekerdezes az adatbazisbol

        if(mysqli_num_rows($query4)!=0) {
            //foreach($query as $row){
            while($row=mysqli_fetch_array($query4)){
                echo "<div class='product'>";
                echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka_nev']."'>";
                echo "<p class='productName'>".$row['marka_nev']."</p>";
                echo "<p class='productSize'>".$row['meret']."</p>";
                echo "<p class='productPrice'>".$row['ar']." din</p>";
                echo "<a href='#' class='button'>Megvesz</a>";
                echo "</div>";
            }
        }
*/
        // TIPUS/MARKA SZERINTI KERESES //////////////////////////////////////////
			if($marka){

                if($marka != "-" && $nev == "-" && $fajta == "-" && $arMax == "" && $arMin== "" && $evjarat== "-") {
				//if($arMax > $arMin)
            //{
               // $query2=mysqli_query($connection,"SELECT * FROM termekek WHERE ar between $arMin and $arMax and marka_nev = '$tipus' and meret = '$meret' and szin = '$szin'");
                $query2=mysqli_query($connection,"SELECT * FROM termekek WHERE marka = '$marka'");
                    if(mysqli_num_rows($query2)!=0) {
                        foreach($query2 as $row){
                            echo "<div class='product'>";
                            echo "<div class='flip-card'>";
                            echo "<div class='flip-card-inner'>";
                            echo "<div class='flip-card-front'>";
                            echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                            echo "</div>";
                            echo "<div class='flip-card-back'>";
                            echo "<p class='productName'>"."<span class='underline'>Név:</span><br>".$row['nev']."</p>";
                            echo "<p class='productYear'>".$row['evjarat']."</p>";
                            echo "<p class='productSize'>".$row['fajta']."</p>";
                            echo "<p class='productPrice'>".$row['ar']." din</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<a href='#' class='button'>Megvesz</a>";
                            echo "</div>";
                        }
                    }
                }
                // MERET/NEV SZERINTI KERESES //////////////////////////////////////////
                elseif($marka = "-" && $nev !== "-" && $fajta == "-" && $arMax == "" && $arMin== "" && $evjarat== "-") {
                    //if($arMax > $arMin)
                    //{
                    // $query2=mysqli_query($connection,"SELECT * FROM termekek WHERE ar between $arMin and $arMax and marka_nev = '$tipus' and meret = '$meret' and szin = '$szin'");
                    $query3=mysqli_query($connection,"SELECT * FROM termekek WHERE nev = '$nev'");
                    if(mysqli_num_rows($query3)!=0) {
                        foreach($query3 as $row){
                            echo "<div class='product'>";
                            echo "<div class='flip-card'>";
                            echo "<div class='flip-card-inner'>";
                            echo "<div class='flip-card-front'>";
                            echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                            echo "</div>";
                            echo "<div class='flip-card-back'>";
                            echo "<p class='productName'>"."<span class='underline'>Név:</span><br>".$row['nev']."</p>";
                            echo "<p class='productYear'>".$row['evjarat']."</p>";
                            echo "<p class='productSize'>".$row['fajta']."</p>";
                            echo "<p class='productPrice'>".$row['ar']." din</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<a href='#' class='button'>Megvesz</a>";
                            echo "</div>";
                        }
                    }
                }
                // SZIN/FAJT SZERINTI KERESES //////////////////////////////////////////
                elseif($marka = "-" && $nev == "-" && $fajta == "-" && $arMax == "" && $arMin== "" && $evjarat !== "-") {
                    //if($arMax > $arMin)
                    //{
                    // $query2=mysqli_query($connection,"SELECT * FROM termekek WHERE ar between $arMin and $arMax and marka_nev = '$tipus' and meret = '$meret' and szin = '$szin'");
                    $query4=mysqli_query($connection,"SELECT * FROM termekek WHERE evjarat = '$evjarat'");
                    if(mysqli_num_rows($query4)!=0) {
                        foreach($query4 as $row){
                            echo "<div class='product'>";
                            echo "<div class='flip-card'>";
                            echo "<div class='flip-card-inner'>";
                            echo "<div class='flip-card-front'>";
                            echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                            echo "</div>";
                            echo "<div class='flip-card-back'>";
                            echo "<p class='productName'>"."<span class='underline'>Név:</span><br>".$row['nev']."</p>";
                            echo "<p class='productYear'>".$row['evjarat']."</p>";
                            echo "<p class='productSize'>".$row['fajta']."</p>";
                            echo "<p class='productPrice'>".$row['ar']." din</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<a href='#' class='button'>Megvesz</a>";
                            echo "</div>";
                        }
                    }
                }
                // NINCS/EVJARAT SZERINTI KERESES //////////////////////////////////////////
                elseif($marka != "-" && $nev == "-" && $fajta !== "-" && $arMax == "" && $arMin== "" && $evjarat== "-") {
                    //if($arMax > $arMin)
                    //{
                    // $query2=mysqli_query($connection,"SELECT * FROM termekek WHERE ar between $arMin and $arMax and marka_nev = '$tipus' and meret = '$meret' and szin = '$szin'");
                    $query4=mysqli_query($connection,"SELECT * FROM termekek WHERE fajta = '$fajta'");
                    if(mysqli_num_rows($query4)!=0) {
                        foreach($query4 as $row){
                            echo "<div class='product'>";
                            echo "<div class='flip-card'>";
                            echo "<div class='flip-card-inner'>";
                            echo "<div class='flip-card-front'>";
                            echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                            echo "</div>";
                            echo "<div class='flip-card-back'>";
                            echo "<p class='productName'>"."<span class='underline'>Név:</span><br>".$row['nev']."</p>";
                            echo "<p class='productYear'>".$row['evjarat']."</p>";
                            echo "<p class='productSize'>".$row['fajta']."</p>";
                            echo "<p class='productPrice'>".$row['ar']." din</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<a href='#' class='button'>Megvesz</a>";
                            echo "</div>";
                        }
                    }
                }

                // AR/AR SZERINTI KERESES //////////////////////////////////////////
                elseif($marka = "-" && $nev == "-" && $fajta == "-" && $arMax !== "" && $arMin !== "" && $evjarat== "-") {
                    if ($arMax > $arMin) {
                        $query6 = mysqli_query($connection, "SELECT * FROM termekek WHERE ar between $arMin and $arMax");

                        if (mysqli_num_rows($query6) != 0) {
                            foreach ($query6 as $row) {
                                echo "<div class='product'>";
                            echo "<div class='flip-card'>";
                            echo "<div class='flip-card-inner'>";
                            echo "<div class='flip-card-front'>";
                            echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                            echo "</div>";
                            echo "<div class='flip-card-back'>";
                            echo "<p class='productName'>"."<span class='underline'>Név:</span><br>".$row['nev']."</p>";
                            echo "<p class='productYear'>".$row['evjarat']."</p>";
                            echo "<p class='productSize'>".$row['fajta']."</p>";
                            echo "<p class='productPrice'>".$row['ar']." din</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<a href='#' class='button'>Megvesz</a>";
                            echo "</div>";
                            }
                        }
                    }
                }
                else{
                echo "<p class='hibauzenet'>Válasszon ki egy keresési feltételt!</p>";
                exit;
                }

            }



        $query1=mysqli_query($connection,"SELECT * FROM termekek"); // ez egy lekerdezes az adatbazisbol
        $count=mysqli_num_rows($query1);

        $numberOfPages=$count/5;  //az osztas az az, hogy hany darab product legyen egy oldalon
        $numberOfPages=ceil($numberOfPages);



        ?>
            <div class="spacer" style="clear: both;"></div>
             </div>
        </div>
    </div>
</div>
</body>

</html>