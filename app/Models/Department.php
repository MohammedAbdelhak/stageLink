<?php

namespace App\Models;

use App\Traits\DepartmentRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory , DepartmentRelationships;

    protected $guarded = [];


}
