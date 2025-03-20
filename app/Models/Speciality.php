<?php

namespace App\Models;

use App\Traits\SpecialityRelationships;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use SpecialityRelationships;

    protected $guarded = [];

}
