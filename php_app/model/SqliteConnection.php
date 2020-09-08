<?php

    class SqliteConnection
    {
        public function connect($db_path)
        {
            $myPDO = new PDO('sqlite:' + $db_path);

            return $myPD0;
        }
    }
?>