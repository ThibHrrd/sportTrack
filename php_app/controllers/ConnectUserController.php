<?php

require_once("Controller.php");
require_once(__DIR__ . "/../model/User/User.php");
require_once(__DIR__ . "/../model/User/UserDAO.php");

class ConnectUserController implements Controller{

    public function handle($request) {

        $email = $request["email"];
        $password = $request["password"];

        $allowed = $this->verifyCredentials($email, $password);

        if ($allowed) {
            $_SESSION['id'] = $email;
            header("Location:  http://m3104.iut-info-vannes.net/m3104_13/index.php?page=list_activities");
        }
        else {
            header("Location:  http://m3104.iut-info-vannes.net/m3104_13/index.php?page=user_connect_form");
        }

    }

    public function verifyCredentials($email, $password) {

        $uDAO = UserDao::getInstance();
        $users = $uDAO->findAllString();

        $check = False;
        $size = count($users);

        for($i = 0 ; $i < $size ; $i++) {

            if ($users[$i]['email'] === $email and $users[$i]['password'] === $password) {
                
                $check = True;
            }
        }

        return $check;
    }
}
?>