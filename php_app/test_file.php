<?php

include("CalculDistanceImpl.php");

$calculDistance = new CalculDistanceImpl();

echo($calculDistance->calculDistance2PointsGPS(47.644795, -2.776605, 47.646870, -2.778911));

$parcours = array(
    0 => 47.644795,
    1 => -2.776605,
    2 => 47.646870,
    3 => -2.778911,
);
echo("\n");
echo($calculDistance->calculDistanceTrajet($parcours))

?>