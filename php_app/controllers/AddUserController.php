<?php

require_once("Controller.php");
require_once(__DIR__ . "/../model/User/User.php");
require_once(__DIR__ . "/../model/User/UserDAO.php");

class AddUserController implements Controller{

    public function inDatabase($email) {

        $User_dao = UserDAO::getInstance();
        $userlist = $User_dao->findAll();

        $isInDatabase = False;

        foreach ($userlist["email"] as $value){
            echo($value);
            if ($key === "email" and $value === $email) {
                $isInDatabase = False;
            }
        }

        return $isInDatabase;
    }

    public function handle($request) {

        $firstname = $request["firstname"];
        $lastname = $request["lastname"];
        $date = $request["date"];
        $gender = $request["gender"];
        $height = $request["height"];
        $weight = $request["weight"];
        $email = $request["email"];
        $password = $request["password"];
        $confirmPass = $request["_confirm"];

        $u = new User();
        $u->init($lastname,$firstname,$date,$gender,$height,$weight,$email,$password);

        $uDAO = UserDao::getInstance();

        if (($password === $confirmPass) and (!$this->inDatabase($email))) {
            $uDAO->insert($u);            
        }
    }
}
?>