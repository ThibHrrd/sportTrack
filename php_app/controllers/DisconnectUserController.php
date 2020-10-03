<?php

require_once("Controller.php");

    class DisconnectUserController implements Controller{

        public function handle($request) {
            if (isset($_SESSION)) {
                $_SESSION['id'] = "";
                $_SESSION['activity'] = "";
                unset($_SESSION);
            }
        }
    }
?>