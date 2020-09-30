<?php

class User{

    private $lastname;
    private $firstname;
    private $birthdate;
    private $gender;
    private $height;
    private $weight;
    private $email;
    private $password;

    public function __construct() {
        
    }

    public function init($l,$f,$b,$g,$h,$w,$e,$p){

        $this->lastname = $l;
        $this->firstname = $f;
        $this->birthdate = $b;
        $this->gender = $g;
        $this->height = $h;
        $this->weight = $w;
        $this->email = $e;
        $this->password = $p;

    }

    public function getLastName(){return $this->lastname;}
    public function getFirstName(){return $this->firstname;}
    public function getBirthdate(){return $this->birthdate;}
    public function getGender(){return $this->gender;}
    public function getHeight(){return $this->height;}
    public function getWeight(){return $this->weight;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}

    public function __toString(){return "USER = " . $this->firstname . " " . $this->lastname;}



}



?>