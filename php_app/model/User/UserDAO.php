<?php

require_once(__DIR__ . "/../SqliteConnection.php");
require_once("User.php");

class UserDAO {

    private static $dao;
    private static $nb_lines;

    public function __construct() {
    }

    public final static function getInstance() {
        if(!isset(self::$dao)) {         //On verifie que l'objet est créer.
            self::$dao= new UserDAO();   //Si il est pas créer, alors on créer un unique objet DAO.
            self::$nb_lines = 0;
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from user order by lastName,firstName";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert($u){

        if($u instanceof User){

            $dbc = SqliteConnection::getInstance()->getConnection();
           // prepare the SQL statement
           $query = "insert into user(lastname, firstname, birthdate, gender, weight, height, email, password) values (:l,:f,:b,:g,:w,:h,:m,:p)";
           $stmt = $dbc->prepare($query);
  
           // bind the paramaters
           $stmt->bindValue(':l',$u->getLastName(),PDO::PARAM_STR);
           $stmt->bindValue(':f',$u->getFirstName(),PDO::PARAM_STR);
           $stmt->bindValue(':b',$u->getBirthdate(),PDO::PARAM_STR);
           $stmt->bindValue(':g',$u->getGender(),PDO::PARAM_STR);
           $stmt->bindValue(':w',$u->getWeight(),PDO::PARAM_INT);
           $stmt->bindValue(':h',$u->getHeight(),PDO::PARAM_INT);
           $stmt->bindValue(':m',$u->getEmail(),PDO::PARAM_STR);
           $stmt->bindValue(':p',$u->getPassword(),PDO::PARAM_STR);

           // execute the prepared statement
           $stmt->execute();
       }
    }

    public function delete($u){

        if($u instanceof User){

            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from user WHERE (email= :e)";
            $stmt = $dbc->prepare($query);
  
            // bind the paramaters
            $stmt->bindValue(':e',$u->getEmail(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();

        }

    }

    public function deleteAll(){

        $dbc = SqliteConnection::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "delete from user";
        $stmt = $dbc->prepare($query);

        // execute the prepared statement
        $stmt->execute();

    }

    public function update($u){

        if($u instanceof User){

           $this->delete($u); //It's a subterfuge :)
           $this->insert($u); 

       }
    }

    public function checkSuccess() {
        
        $returnValue = True;

        if (count($this->findAll()) === self::$nb_lines) {
            $returnValue = False;
        }

        return $returnValue;
    }



}

?>