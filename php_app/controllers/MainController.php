<?php
require_once('Controller.php');

class MainController implements Controller{

    public function handle($request){
        header("Location: /m3104_13/index.php?page=user_connect");
    }
}
?>
