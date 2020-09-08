<?php

include("SqliteConnection.php");

$sqlite = new SqliteConnection();

$path = "../../bdd/sport_track.db";
$pdo = $sqlite->connect($path);

echo($pdo->query("SELECT * FROM User"));

?>