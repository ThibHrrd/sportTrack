<?php

    require_once("Controller.php");
    require_once(__DIR__ . "/../model/CalculDistance/JSON_Distance.php");
    
    require_once(__DIR__ . "/../model/Activity/Activity.php");
    require_once(__DIR__ . "/../model/Activity/ActivityDAO.php");
    
    require_once(__DIR__ . "/../model/ActivityEntry/ActivityEntryDAO.php");
    require_once(__DIR__ . "/../model/ActivityEntry/Data.php");





    class UploadActivityController implements Controller{

        

        public function handle($request) {

            $target_dir = __DIR__ . "/../tmp_upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

            $json = new JSON_Distance(); //On creer un nouveau reader

            $entete = $json->read_JSON_entete($target_file);    //On creer un tableau de taille 2 avec les donnees de l'entete du JSON
            $data = $json->read_JSON($target_file);             //On recupère les datas de l'activity

            $aDAO = ActivityDao::getInstance();     
            
            $date = $entete[0]; //On récupère la date 
            $description = $entete[1]; //On récupère la description
            $id_activity = $aDAO->getId(); //On récupère l'id du dernier user de la BDD et on l'incrémente
          
            //We create a new activity
            $a = new Activity();
            $a->init($id_activity, $date, $description, $_SESSION['id']);

            $aDAO->insert($a);


            $eDAO = ActivityEntryDAO::getInstance();
            

            for($i=0 ; $i < sizeof($data) ; $i++) {

                $e = new Data();
                $id_data = $eDAO->getId(); //On récupère l'id du dernier user de la BDD et on l'incrémente
                $time = $data[$i]['time'];
                $cardio = $data[$i]['cardio_frequency'];
                $latitude = $data[$i]['latitude'];
                $longitude= $data[$i]['longitude'];
                $altitude = $data[$i]['altitude'];

                
                $e->init($id_data, $time, $cardio, $latitude, $longitude, $altitude, $id_activity);

                $eDAO->insert($e);
            }
        }
    }
?>