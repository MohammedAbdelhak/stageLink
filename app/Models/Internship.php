<?php

namespace App\Models;

use App\Traits\InternshipRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    /** @use HasFactory<\Database\Factories\InternshipFactory> */
    use HasFactory , InternshipRelationships;


    protected $guarded = [];
}
