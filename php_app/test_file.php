<?php

include("CalculDistanceImpl.php");

$calculDistance = new CalculDistanceImpl();

echo($calculDistance->calculDistance2PointsGPS(47.644795, -2.776605, 47.646870, -2.778911))

parcours = array(
    1 => 47.644795,
    2 => -2.776605,
    3 => 47.646870,
    4 => -2.778911,
);
echo($calculDistance->calculDistanceTrajet($parcours))

?>