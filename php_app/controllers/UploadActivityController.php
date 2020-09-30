<?php

    require_once("Controller.php");
    require_once(__DIR__ . "/../model/CalculDistance/JSON_Distance.php");
    require_once(__DIR__ . "/../model/Activity/Activity.php");
    require_once(__DIR__ . "/../model/Activity/ActivityDAO.php");



    class UploadActivityController implements Controller{

        

        public function handle($request) {

            echo("<PRE>");



            $target_dir = __DIR__ . "/../tmp_upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

            $json = new JSON_Distance();

            $tab = $json->read_JSON_entete($target_file);

            $aDAO = ActivityDao::getInstance();
            $aDAO->incID();


            $date = $tab[0];
            $description = $tab[1];
            $id = ActivityDAO::$id_activity;


            echo("ID :");
            echo($id);
            


            print_r($_SESSION);
            //We create a new activity
            $a = new Activity();
            $a->init($id, $date, $description, $_SESSION['id']);

            $aDAO->insert($a);
            


            echo("DAO = ");
            print_r($aDAO->findAll());

            

            echo("</PRE>");
        }
    }
?>