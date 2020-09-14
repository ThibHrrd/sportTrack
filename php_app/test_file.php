<?php

include("model/UserDAO.php");

$dao = new UserDAO();

print_r($dao->findAll());

$new_user = new User("0005", "DESMONTS", "Leo", "12:06:2001", "Man", "179", "70", "leo@gmail.com", "hohoho");

$dao->insert($new_user);

print_r($dao->findAll());

?>