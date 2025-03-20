<?php

namespace App\Models;

use App\Traits\MemberRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory , MemberRelationships;
    

    protected $guarded = [];



}
