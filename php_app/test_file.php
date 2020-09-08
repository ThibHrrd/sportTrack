<?php

include("JSON_Distance.php");

$distanceCalulator = new JSON_Distance();

$path = "activity.json";

//expected : ~770m
echo($distanceCalulator->getDistance($path))

?>