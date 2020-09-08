<?php

include("model/SqliteConnection.php");

$sqlite = new SqliteConnection();

$path = "../bdd/sport_track.db";
$pdo = $sqlite->connect($path);


?>