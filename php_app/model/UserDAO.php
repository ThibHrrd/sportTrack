<?php

include("SqliteConnection.php");
include("User.php");

class UserDAO {

    private static $dao;

    public final static function getInstance() {
        if(!isset(self::$dao)) {         //On verifie que l'objet est créer.
            self::$dao= new UserDAO();   //Si il est pas créer, alors on créer un unique objet DAO.
        }
        return self::$dao;
    }

    public final function findAll(){
        $connect = new SqliteConnection();
        $dbc = $connect->getConnection();
        $query = "select * from user order by lastName,firstName";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert($u){

        if($u instanceof User){

           $connect = new SqliteConnection();
           $dbc = $connect->getConnection();
           // prepare the SQL statement
           $query = "insert into user(id_user, lastname, firstname, birthday, gender, weight, height, mail, password) values (:i,:l,:f,:b,:g,:w,:h,:m,:p)";
           $stmt = $dbc->prepare($query);
  
           // bind the paramaters
           $stmt->bindValue(':i',$u->getIdUser(),PDO::PARAM_INT);
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

            $connect = new SqliteConnection();
            $dbc = $connect->getConnection();
            // prepare the SQL statement
            $query = "delete from user WHERE (id_user= :i)";
            $stmt = $dbc->prepare($query);
  
            // bind the paramaters
            $stmt->bindValue(':i',$u->getIdUser(),PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }

    }

    public final function update($u){

        if($u instanceof User){

           $connect = new SqliteConnection();
           $dbc = $connect->getConnection();
           // prepare the SQL statement
           $query = "
           update user 
           set
            lastname = :l,
            firstname = :f,
            birthdate = :b,
            gender = :g,
            weigth = :w,
            height = :h,
            mail = :m,
            password = :p
           where
            id_user = :i ";
           $stmt = $dbc->prepare($query);
  
           // bind the paramaters
           $stmt->bindValue(':i',$u->getIdUser(),PDO::PARAM_INT);
           $stmt->bindValue(':l',$u->getLastname(),PDO::PARAM_STR);
           $stmt->bindValue(':f',$u->getFirstname(),PDO::PARAM_STR);
           $stmt->bindValue(':b',$u->getBirthdate(),PDO::PARAM_STR);
           $stmt->bindValue(':g',$u->getGender(),PDO::PARAM_INT);
           $stmt->bindValue(':w',$u->getWeight(),PDO::PARAM_INT);
           $stmt->bindValue(':h',$u->getHeight(),PDO::PARAM_INT);
           $stmt->bindValue(':m',$u->getEmail(),PDO::PARAM_STR);
           $stmt->bindValue(':p',$u->getPassword(),PDO::PARAM_STR);

           // execute the prepared statement
           $stmt->execute();
       }
    }



}

?>