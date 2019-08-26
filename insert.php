<?php
include("db_config.php");
if(isset($_POST['marka']) && isset($_POST['nev']) && isset($_POST['fajta']) && isset($_POST['ar']) && isset($_POST['raktaron']) && isset($_POST['evjarat']))
{
    $marka2 = trim($_POST['marka']);//levagja az elejen meg  vgn a spaceket
    $marka = mysqli_real_escape_string($connection,$marka2); // védelem a nem kivánt mysql parancsok ellen a input TEXT type-oknál
    $nev = $_POST['nev'];
    $fajta = $_POST['fajta'];
    $ar = $_POST['ar'];
    $raktaron = $_POST['raktaron'];
    $evjarat = $_POST['evjarat'];



    //$sql = "INSERT INTO termekek(id, marka, nev, fajta, ar, raktaron, evjarat) VALUES(id,'$marka', '$nev', '$fajta', '$ar', '$raktaron', '$evjarat')";
    $sql="INSERT INTO termekek(marka, nev, fajta, ar, raktaron, evjarat) VALUES (id," . $marka . "," . $nev . "," . $fajta . "," . $ar . "," . $raktaron . "," . $evjarat . ")";
    $myData = mysqli_query($connection, $sql);
    var_dump($sql);
    echo "<br>";
    if($myData)
    {
        echo "Sikeres beillesztes!";
        header("refresh:2; url=logged_admin.php");
    }
    else {
        echo "Hiba történt! A beillesztést NEM volt sikeres.";
        //var_dump($marka, $nev, $fajta, $ar, $raktaron, $evjarat);
        echo "<br>Marka: ".$marka."<br>", "Nev: ".$nev."<br>", "Fajta: ".$fajta."<br>", "Ar: ".$ar."<br>", "Raktaron: ".$raktaron."<br>", "Evjarat: ".$evjarat."<br>";
        //header("refresh:2; url=logged_admin.php");
    }
}
else {
    echo "Töltsd ki az össze<<Ѕs mezőt!";
    }

?>