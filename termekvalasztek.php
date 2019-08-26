<html>
<head>
    <title>Termékválasztékunk</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<div class="wrapper">
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
                <h2>Termékválasztékunk:</h2>
            </div>
        <?php
        //header("Content-type: text/html; charset=utf-8");
        include("db_config.php"); //ez nelkul nem is fut le, ha nm talalja meg, include-nal meg probal tovabbmenni
        error_reporting(E_ALL ^ E_NOTICE);

        //$query3=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=0");
        //$countZeros=mysqli_num_rows($query3);

        $page=$_GET["page"];

        if($page == "" || $page == "1"){
            $page1 = 0;
        }
        else{
            $page1 = ($page*8)-8;
        }

        $query=mysqli_query($connection,"SELECT * FROM termekek WHERE raktaron=1 ORDER BY ar asc limit $page1,8"); // ez egy lekerdezes az adatbazisbol

            if(mysqli_num_rows($query)!=0) {
                //foreach($query as $row){
                while($row=mysqli_fetch_array($query)){
                    echo "<div class='product'>";
                    echo "<div class='flip-card'>";
                    echo "<div class='flip-card-inner'>";
                    echo "<div class='flip-card-front'>";
                    echo "<img src='img/".$row['id'].".jpg' alt='".$row['marka']."'>";
                    echo "</div>";
                    echo "<div class='flip-card-back'>";
                    echo "<p class='productName'>".$row['marka']."</p>";
                    echo "<p class='productName'>".$row['nev']."</p>";
                    echo "<p class='productYear'>".$row['evjarat']."</p>";
                    echo "<p class='productSize'>".$row['fajta']."</p>";
                    echo "<p class='productPrice'>".$row['ar']." din</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='#'  class='button'>Megvesz</a>";
                    echo "</div>";
                }
            }
        else {
            echo "!!! Nincs adat. / Tulfutott a lapozas !!!";
        }
        //$res1=mysqli_query($connection,"select * from termekek limit 0 OFFSET 5");
        $query1=mysqli_query($connection,"SELECT * FROM termekek"); // ez egy lekerdezes az adatbazisbol
        $count=mysqli_num_rows($query1);

        $numberOfPages=$count/5;  //az osztas az az, hogy hany darab product legyen egy oldalon
        $numberOfPages2=ceil($numberOfPages);
        ?>
            <div class="spacer" style="clear: both;"></div>
           <?php
           echo "<p id='paginingP' style='color: black; font-size: 25px'>";
           for ($counter=1; $counter<$numberOfPages2; $counter++){
               echo "<a href='termekvalasztek.php?page=$counter' id='pagining' class='paginingNumbers'>" . "$counter" . "</a>";
           }
           echo "</p>";
           ?>
        </div>

        
 
    </div>
</div>
</body>
</html>
