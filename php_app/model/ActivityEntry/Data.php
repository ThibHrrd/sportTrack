<?php

class Data {

    private $id_data;
    private $data_time;
    private $cardio_frequency;
    private $latitude;
    private $longitude;
    private $altitude;
    private $anActivity;


    public function __construct(){}
    
    public function init($i, $d, $c, $la, $lo, $alt, $act){
        
        $this->id_data = $i;
        $this->data_time = $d;
        $this->cardio_frequency = $c;
        $this->latitude = $la;
        $this->longitude = $lo;
        $this->altitude = $alt;
        $this->anActivity = $act;

    }

    public function getID() {return $this->id_data;}
    
    public function getDataTime() {return $this->data_time;}
    
    public function getCardioFrequency() {return $this->cardio_frequency;}

    public function getLatitude() {return $this->latitude;}
    
    public function getLongitude() {return $this->longitude;}
    
    public function getAltitude() {return $this->altitude;}

    public function getActivity() {return $this->anActivity;}

    public function __toString(){return "DATA = ". $this->id_data. " " .$data_time;}
    
}



?>