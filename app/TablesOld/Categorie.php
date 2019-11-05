<?php

namespace App\Table;

use App\App;

class Categorie extends Table {

    protected static $table = 'categories';


    public function getUrl(){
        return 'index.php?p=categories&id='.$this->id;
    }


}