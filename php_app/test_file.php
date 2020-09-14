<?php

// include the DAO file
include("model/UserDAO.php");

//creating DAO object
$dao = new UserDAO();
$dao->deleteAll();

// creating new users and initilizing its values
echo("Inserting line in database : \n");
$new_user1 = new User();
$new_user1->init("0005", "DESMONTS", "Leo", "12:06:2001", "Man", "179", "70", "leo@gmail.com", "hohoho"); //We init the user with multiples parameters

$new_user2 = new User();
$new_user2->init("0006", "GLZ", "Benj", "14:10:2012", "Man", "180", "100", "glz@hotmail.com", "yolerap"); //We init the user with multiples parameters

$dao->insert($new_user1);
$dao->insert($new_user2); // Inserting the new users in the database
print_r($dao->findAll());  // We print the content of the database

// updating the user1 php object, and updating the database
echo("Updating line : \n");
$new_user1->init("0005", "DESMONTS", "Leo", "12:06:2001", "Woman", "179", "70", "leo@gmail.com", "hohoho"); //We modifye the user's gender?
$dao->update($new_user1);
print_r($dao->findAll());  // We print the content of the database

// removing user1 from the database
echo("Removing line : \n");
$dao->delete($new_user1);
print_r($dao->findAll());  // We print the content of the database

?>