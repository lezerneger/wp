<html>
<head>
    <title>ADMIN FELULET BELEJELNTKEZVE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include("db_config.php");
if(isset($_POST['update']))
{
	$sql = "SELECT * FROM termekek WHERE id= ".$_POST['update'];
	    $myData = mysqli_query($connection, $sql);
	    if($myData)
	    {
	    	foreach($myData as $row)
	    	{
	        	echo "<form action='updateset.php' method='post'>";
				echo "<label>Márka: </label><input type='text' name='marka' value='".$row['marka']."'>&nbsp;";
				echo "<label>Név: </label><input type='text' name='nev' value='".$row['nev']."'>&nbsp;";
				echo "<label>Évjárat: </label><input type='text' name='evjarat' value='".$row['evjarat']."'>&nbsp;";
				echo "<label>Fajta: </label><input type='text' name='fajta' value='".$row['fajta']."'>&nbsp;";
				echo "<label>Ár: </label><input type='text' name='ar' value='".$row['ar']."'>&nbsp;";
				echo "<label>Raktáron: </label><input type='text' name='raktaron' value='".$row['raktaron']."'>&nbsp;";
				echo "<input type='submit' value='Mentés'>";
                echo "<input type='reset' value='Mégsem'>";
				echo "<input type='hidden' value='".$row['id']."' name='modosit'>";
				echo "</form>";
			}
	    }
}
?>
</body>
</html>