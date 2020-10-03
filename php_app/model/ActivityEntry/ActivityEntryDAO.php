<?php

require_once(__DIR__."/../SqliteConnection.php");
require_once(__DIR__."/../Activity/Activity.php");
require_once(__DIR__."/../User/User.php");



class ActivityEntryDAO {

    private static $dao;

    public final static function getInstance() {

        if(!isset(self::$dao)) {         //On verifie que l'objet est créer.
            self::$dao= new ActivityEntryDAO();   //Si il est pas créer, alors on créer un unique objet DAO.
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from data_activity order by data_time";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
        return $results;
    }

    public final function insert($d){

        if($d instanceof Data){

           $dbc = SqliteConnection::getInstance()->getConnection();
           // prepare the SQL statement
           $query = "insert into data_activity(id_data, data_time, cardio_frequency, latitude, longitude, altitude, anActivity) values (:i,:d,:c,:la,:lo,:a,:act)";
           $stmt = $dbc->prepare($query);

           // bind the paramaters
           $stmt->bindValue(':i',$d->getID(),PDO::PARAM_INT);
           $stmt->bindValue(':d',$d->getDataTime(),PDO::PARAM_STR);
           $stmt->bindValue(':c',$d->getCardioFrequency(),PDO::PARAM_STR);
           $stmt->bindValue(':la',$d->getLatitude(),PDO::PARAM_STR);
           $stmt->bindValue(':lo',$d->getLongitude(),PDO::PARAM_STR);
           $stmt->bindValue(':a',$d->getAltitude(),PDO::PARAM_STR);
           $stmt->bindValue(':act',$d->getActivity(),PDO::PARAM_STR);



           // execute the prepared statement
           $stmt->execute();
       }
    }

    

    public function delete($d){

        if($d instanceof Data){

            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from data_activity WHERE (id_data= :i)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':i',$d->getID(),PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }
    }

    public function deleteAll(){

        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from data_activity";
        $stmt = $dbc->prepare($query);

        // execute the prepared statement
        $stmt->execute();

    }

    public function update($d){

        if($d instanceof Data){

            $this->delete($d); //It's a subterfuge :)
            $this->insert($d);

        }
    }


    public function getID() {

        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select id_data from data_activity order by id_data desc";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL();

        if (empty($results)) {
            $results = 0;
        }
        else {
            $results = ((int)$results[0]['id_data'])+1;
        }

        return $results;
    }

    }
