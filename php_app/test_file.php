<?php

include("model/SqliteConnection.php");

$sqlite = new SqliteConnection();

$path = "../bdd/sport_track.db";
$pdo = $sqlite->getConnection($path);

$query = "select * from user";
print_r($sqlite->request($pdo, $query));


?>