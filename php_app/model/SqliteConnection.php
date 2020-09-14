<?php

    class SqliteConnection
    {
        public function getConnection($db_path)
        {
            try{

                $myPDO = new PDO('sqlite:'.$db_path);
                $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $myPDO;

            } catch(Exception $e) {

                echo 'Exception reçue : ',  $e->getMessage(), "\n";
                die();

            }



            
        }

        public function request($pdo, $query)
        {
            $requete = $pdo->prepare($query);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result[0];
        }

        
    }
?>