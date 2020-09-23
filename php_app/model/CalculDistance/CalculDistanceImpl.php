<?php

    include("CalculDistance.php");

    class CalculDistanceImpl implements CalculDistance
    {
        /**
         * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
         * @param float $lat1 Latitude du premier point GPS
         * @param float $long1 Longitude du premier point GPS
         * @param float $lat2 Latitude du second point GPS
         * @param float $long2 Longitude du second point GPS
         * @return float La distance entre les deux points GPS
         */
        public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2)
        {
            // convert from degrees to radians
            $latFrom = deg2rad($lat1);
            $lonFrom = deg2rad($long1);
            $latTo = deg2rad($lat2);
            $lonTo = deg2rad($long2);

            $earthRadius = 6378137;

            $latDelta = $latTo - $latFrom;
            $lonDelta = $lonTo - $lonFrom;

            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
            
            return $angle * $earthRadius;
        }

        /**
         * Retourne la distance en metres du parcours passé en paramètres. Le parcours est
         * défini par un tableau ordonné de points GPS.
         * @param Array $parcours Le tableau contenant les points GPS
         * @return float La distance du parcours
         */
        public function calculDistanceTrajet(Array $parcours)
        {
            // init total distance
            $totalDistance = 0;

            // getting intermediate distance between each GPS coordinates
            for ($i = 0; $i < sizeof($parcours)-2; $i+=2) {
                $lat1 = $parcours[$i];
                $long1 = $parcours[$i+1];
                $lat2 = $parcours[$i+2];
                $long2 = $parcours[$i+3];

                $distance = $this->calculDistance2PointsGPS($lat1, $long1, $lat2, $long2);

                $totalDistance += $distance;
        
            }

            return $totalDistance;
        }
    }