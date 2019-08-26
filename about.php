<html>
<head>
    <title>Rólunk</title>
    <meta charset="UTF-8">
    <meta name="author" content="Ranc Edvin">
    <meta name="description" content="Olcsó és minőségi borok.">
    <meta name="keywords" content="borok sok minőségi">
    <meta name="robots" content="index, nofollow">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/s.css">
    <script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="wrapper">
    <div id="center">
        <div id="menu">
            <a class="menu" href="index.html">Kezdőlap</a>
            <a class="menu" href="termekvalasztek.php">Terékválasztékunk</a>
            <a class="menu" href="kereses.php">Keresés a termékek között</a>
            <a class="menu" href="about.php">Rólunk</a>
            <a class="menu" href="https://www.facebook.com/fsshopORIGINAL" target="_blank">Facebookon is</a>
            <a class="menu" href="admin.php">Admin Login</a>
        </div>
    </div>
    <div class="content">
        <div id="whitePanel">
          
                <div class="flip-card">
                  
                        <div class="flip-card-inner">
                          <div class="flip-card-front">
                            <img src="img/avatar.jpg" alt="Avatar" style="width:400px;height:400px;">
                          </div>
                          <div class="flip-card-back">
                            <h1>Ranc Edvin</h1>
                            <p> Észrevételeiket, panaszukat jelezhetik:<br>
                                solidworks.support@gmail.com<br></p>
                                <p>A Weboldal iskolai projekre készült.</p>
                          </div>
                        </div>
                      </div> </br></br>
                      <?php

require "db_config.php";

$sql = "SELECT * FROM poll ORDER BY id_poll";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<b>$record[question]</b><br>";
    $id_poll = $record['id_poll'];

    $sql = "SELECT id_answer,text FROM answer WHERE id_poll='$id_poll'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<input type="radio" id="a' . $record['id_answer'] . '" name="answer' . $id_poll . '" data-id-poll="' . $id_poll . '" data-id-answer="' . $record['id_answer'] . '">';
        echo '<label for="a' . $record['id_answer'] . '">' . $record['text'] . '</label><br>';
    }
}

?>
<hr>
<div id="results"></div>


            </div>

        </div>
        <div class="spacer" style="clear: both;"></div>
    </div>
</div>
</body>
</html>