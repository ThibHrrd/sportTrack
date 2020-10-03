<?php

    require_once(__DIR__ . "/../model/ActivityEntry/ActivityEntryDAO.php");
    require_once(__DIR__ . "/../model/ActivityEntry/Data.php");

    require_once(__DIR__ . "/../model/Activity/ActivityDAO.php");
    require_once(__DIR__ . "/../model/Activity/Activity.php");

    require_once("Controller.php");
    require_once(__DIR__ . "/../model/CalculDistance/CalculDistanceImpl.php");

    class ListActivitiesController implements Controller{

        public function handle($request) {
            
            $aDAO = ActivityDAO::getInstance();
            $eDAO = ActivityEntryDAO::getInstance();

            $a = new Activity();
            $e = new Data();

            $activities = $aDAO->findAll();
            
            $i = 0;

            $affichage = Array();

            foreach($activities as $activity){ //Le foreach
        
                $j = 0;

                if($activity->getUser() === $_SESSION['id']){
                    
                    $cardioz = Array();
                    $positions = Array();

                    $entries = $eDAO->findAll();
                    foreach($entries as $entry) {
                        
                        if ($entry->getActivity() === $activity->getID()) {

                            $cardioz[$j] = $entry->getCardioFrequency();
                            $j++;
                            array_push($positions, $entry->getLatitude(), $entry->getLongitude());
                        }
                    }

                    $calculDistance = new CalculDistanceImpl();
                    $distance = $calculDistance->calculDistanceTrajet($positions);

                    $h1 = strtotime($entries[0]->getDataTime());
                    $h2 = strtotime($entries[sizeof($entries)-1]->getDataTime());
                    $duree = gmdate("H:i:s", $h2-$h1);
                    
                    

                    $min = 1000;
                    $max = 0;
                    $somme = 0;
                    foreach($cardioz as $cardio){

                        if($cardio > $max){
                            $max = $cardio;
                        }
                        if($cardio < $min){
                            $min = $cardio;
                        }

                        $somme = $somme + $cardio;
                    }

                    $moyenne = $somme/sizeof($cardioz);

                    $affichage[$i]['date'] = $activity->getActivityDate();
                    $affichage[$i]['description'] = $activity->getActivityDescription();
                    $affichage[$i]['debut'] = $entries[0]->getDataTime();
                    $affichage[$i]['duree'] = $duree;
                    $affichage[$i]['distance'] = $distance;
                    $affichage[$i]['cardioMin'] = $min;  
                    $affichage[$i]['cardioMax'] = $max;  
                    $affichage[$i]['cardioMoy'] = $moyenne;
        
                    $i++;
        
                }
               
        
        
            }

            $_SESSION['activity'] = $affichage;
        }
    }
?>