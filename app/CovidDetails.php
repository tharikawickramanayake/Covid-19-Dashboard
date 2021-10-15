<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CovidDetails extends Model
{
       protected $fillable = [
        'Local_Deaths',
        'Local_Total_Cases',
        'Local_New_Deaths',
        'Local_Recovered',
        'Local_Active_Cases',
    ];
}
