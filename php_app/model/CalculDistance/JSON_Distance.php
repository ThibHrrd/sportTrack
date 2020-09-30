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
            while ($i < sizeof($array["data"]))
            {
                $return_tab[$j] = $array["data"][$i]["latitude"];
                $return_tab[$j+1] = $array["data"][$i]["longitude"];

                $j+=2;
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