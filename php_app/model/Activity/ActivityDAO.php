<?php

require_once(__DIR__."/../SqliteConnection.php");
require_once(__DIR__."/../Activity/Activity.php");
require_once(__DIR__."/../User/User.php");

class ActivityDAO {

    public static $dao;

    public final static function getInstance() {

        if(!isset(self::$dao)) {         //On verifie que l'objet est créer.
            self::$dao = new ActivityDAO();   //Si il est pas créer, alors on créer un unique objet DAO.
        }
        return self::$dao;
    }

    public final function incID(){

        echo("JE PASSE PAR LA ");
        $GLOBALS['id_activity'] = $GLOBALS['id_activity'] + 1;
        echo($GLOBALS['id_activity']);

    }

    public final function findAll(){
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from activity order by activity_date desc";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
        return $results;
    }

    public final function insert($a){

        if($a instanceof Activity){

           $dbc = SqliteConnection::getInstance()->getConnection();
           // prepare the SQL statement
           $query = "insert into Activity(id_activity, activity_date, activity_description, aUser) values (:i,:d,:a,:u)";
           $stmt = $dbc->prepare($query);

           // bind the paramaters
           $stmt->bindValue(':i',$a->getID(),PDO::PARAM_INT);
           $stmt->bindValue(':d',$a->getActivityDate(),PDO::PARAM_STR);
           $stmt->bindValue(':a',$a->getActivityDescription(),PDO::PARAM_STR);
           $stmt->bindValue(':u',$a->getUser(),PDO::PARAM_STR);


           // execute the prepared statement
           $stmt->execute();
       }
    }

    public function getUserActivities($u){

      if($u instanceof User){

        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from activity WHERE (aUser = 'leo951206@gmail.com')";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
        return $results;

      }


    }

    public function delete($a){

        if($a instanceof Activity){

            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Activity WHERE (id_activity= :i)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':i',$a->getID(),PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }
    }

    public function deleteAll(){

        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from activity";
        $stmt = $dbc->prepare($query);

        // execute the prepared statement
        $stmt->execute();

    }

    public function update($a){

        if($a instanceof Activity){

            $this->delete($a); //It's a subterfuge :)
            $this->insert($a);

        }
    }

    public function getID() {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select id_activity from activity order by id_activity desc";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL();

        if (empty($results)) {
            $results = 0;
        }
        else {
            $results = ((int)$results[0]['id_activity'])+1;
        }

        return $results;
    }

    }
