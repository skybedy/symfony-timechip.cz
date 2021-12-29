<?php

namespace App\Model;

class Basic {

    public $currentYear;
    public $sqlZavody;

    public function sqlShortcuts($raceYear){
        $this->sqlZavody = 'zavody_'.$raceYear;
    }







}


?>