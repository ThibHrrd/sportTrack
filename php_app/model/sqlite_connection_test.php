<?php

// include the DAO file
include("User/UserDAO.php");
include("Activity/ActivityDAO.php");

echo("\t TEST OF USER_DAO \n\n");
//creating DAO object
$User_dao = UserDAO::getInstance();
$User_dao->deleteAll();

// creating new users and initilizing its values
echo("Inserting line in database : \n");
$new_user1 = new User();
$new_user1->init("0005", "DESMONTS", "Leo", "12:06:2001", "Man", "179", "70", "leo@gmail.com", "hohoho"); //We init the user with multiples parameters

$new_user2 = new User();
$new_user2->init("0006", "GLZ", "Benj", "14:10:2012", "Man", "180", "100", "glz@hotmail.com", "yolerap"); //We init the user with multiples parameters

$User_dao->insert($new_user1);
$User_dao->insert($new_user2); // Inserting the new users in the database
print_r($User_dao->findAll());  // We print the content of the database

// updating the user1 php object, and updating the database
echo("Updating line : \n");
$new_user1->init("0005", "DESMONTS", "Leo", "12:06:2001", "Woman", "179", "70", "leo@gmail.com", "hohoho"); //We modifye the user's gender?
$User_dao->update($new_user1);
print_r($User_dao->findAll());  // We print the content of the database

// removing user1 from the database
echo("Removing line : \n");
$User_dao->delete($new_user1);
print_r($User_dao->findAll());  // We print the content of the database


echo("\n\n\n\t TEST OF USER_DAO \n\n");

//Let's test the ActivityDAO

//creating DAO object
$Activity_dao = ActivityDAO::getInstance();
$Activity_dao->deleteAll();

// creating new activities and initilizing its values
echo("Inserting line in database : \n");
$new_activity1 = new Activity();
$new_activity1->init("0001", "22:04:2020", "Course a pied", "0006"); //We init the user with multiples parameters

$new_activity2 = new Activity();
$new_activity2->init("0002", "22:05:2019", "Natation", "0006"); //We init the user with multiples parameters

$Activity_dao->insert($new_activity1);
$Activity_dao->insert($new_activity2); // Inserting the new activities in the database
print_r($Activity_dao->findAll());  // We print the content of the database

// updating the activity1 php object, and updating the database
echo("Updating line : \n");
$new_activity1->init("0001", "22:04:2020", "Poney", "0006"); //We modify the activity description
$Activity_dao->update($new_activity1);
print_r($Activity_dao->findAll());  // We print the content of the database

// removing activity1 from the database
echo("Removing line : \n");
$Activity_dao->delete($new_activity1);
print_r($Activity_dao->findAll());  // We print the content of the database



?>