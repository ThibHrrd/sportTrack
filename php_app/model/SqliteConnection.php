<?php

    class SqliteConnection
    {
        public function connect($db_path)
        {
            $myPDO = new PDO('sqlite:'.$db_path);

            return $myPDO;
        }

        public function request($pdo, $query)
        {
            $requete = $pdo->prepare($query);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }
    }
?>