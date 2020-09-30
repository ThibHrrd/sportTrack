<?php
    $uDAO = UserDao::getInstance();
    
    if ($uDAO->checkSuccess()) {
        header("Location: http://m3104.iut-info-vannes.net/m3104_13/index.php?page=user_connect_form");
    }
    else {
        header("Location: http://m3104.iut-info-vannes.net/m3104_13/index.php?page=user_add_form");
    }
?>