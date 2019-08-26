<?php
include("db_config.php");
if(isset($_POST['marka']) && isset($_POST['nev']) && isset($_POST['evjarat']) && isset($_POST['fajta']) && isset($_POST['ar']) && isset($_POST['raktaron']) && isset($_POST['modosit']))
{
    $modosit = $_POST['modosit'];

    $sql = "UPDATE termekek SET marka='$_POST[marka]', nev='$_POST[nev]', evjarat='$_POST[evjarat]', fajta='$_POST[fajta]', ar='$_POST[ar]', raktaron='$_POST[raktaron]' WHERE id='$_POST[modosit]'";
    var_dump($sql);
    $myData = mysqli_query($connection, $sql);
    if($myData)
    {
        echo "Sikeres update!";
        header("refresh:2; url=logged_admin.php");
    }
    else
    {
    	echo "gond van";
    }
}
else
{
	echo "nincs adat";
}
?>