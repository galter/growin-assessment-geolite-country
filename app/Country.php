<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Table Name
    protected $table = 'countries';
    // Primary Key
    public $primaryKey = 'id'; 
    // Timestamps
    public  $timestamps = true;

}
