<?php
    $uDAO = UserDao::getInstance();
    
    if ($uDAO->checkSuccess()) {
        echo("Success");
    }
    else {
        echo("Error");
    }
?>