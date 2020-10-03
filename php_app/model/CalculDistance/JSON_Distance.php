<?php

    include("CalculDistanceImpl.php");

    class JSON_Distance
    {
        public function read_JSON($json_file)
        {
            $data = file_get_contents($json_file); //Le contenu du fichier est dans data
            
            $array = json_decode($data, true);  //faire un tableau avec les informations décodées

            $i = 0;
            $j = 0;

            while ($i < sizeof($array["data"])){

                echo($i);

                $return_tab[$i]["time"] = $array["data"][$i]["time"];
                $return_tab[$i]["cardio_frequency"] = $array["data"][$i]["cardio_frequency"];
                $return_tab[$i]["latitude"] = $array["data"][$i]["latitude"];
                $return_tab[$i]["longitude"] = $array["data"][$i]["longitude"];
                $return_tab[$i]["altitude"] = $array["data"][$i]["altitude"];

                $i++;
            }

            return $return_tab;
        }

        public function read_JSON_entete($json_file)
        {
            $data = file_get_contents($json_file); //Le contenu du fichier est dans data
            
            $array = json_decode($data, true);  //faire un tableau avec les informations décodées

            $return_tab[0] = $array["activity"]["date"];
            $return_tab[1] = $array["activity"]["description"];
            
            return $return_tab;
        }
        

        public function getDistance($path)
        {
            $parcours = $this->read_JSON($path); // Lis le contenu du fichier json et on obtient un tableau avec les coord

            $distanceCalculator = new CalculDistanceImpl();
            $distance = $distanceCalculator->calculDistanceTrajet($parcours); // Calcul la distance

            return $distance;
        }
    }

?>