<?php
require 'db_config.php';

$id_poll = $id_answer = "";
$total = 0;

if (isset($_POST['id_poll'])) {
    $id_poll = (int)$_POST['id_poll'];
}

if (isset($_POST['id_answer'])) {
    $id_answer = (int)$_POST['id_answer'];
}


$sql = "UPDATE answer SET amount=amount+1
        WHERE id_poll='$id_poll' AND id_answer='$id_answer'";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

$sql_total = "SELECT sum(amount) FROM answer WHERE id_poll='$id_poll'";
$result = mysqli_query($connection, $sql_total) or die(mysqli_error($connection));
$record = mysqli_fetch_row($result);
$total = $record[0];

$sql = "SELECT text,amount FROM answer WHERE id_poll='$id_poll'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $percent = round(($record['amount'] / $total) * 100, 2);
    echo '<img src="poll.gif" width="' . $percent . '" height="20"> ' . $percent . ' % ' . $record['text'] . '<br>';
}
