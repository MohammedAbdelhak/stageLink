<?php

namespace App\Models;

use App\Traits\CompanyRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use HasFactory , CompanyRelationships;

    protected $guarded = [];
}
