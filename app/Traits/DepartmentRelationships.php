<?php

namespace App\Traits;

use App\Models\Internship;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait DepartmentRelationships {



    /**
     * Get all of the admins for the DepartmentRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins(): HasMany
    {
        return $this->hasMany(User::class, 'department_id');
    }

    /**
     * Get all of the students for the DepartmentRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(User::class, 'department_id');
    }


    /**
     * Get all of the specialties for the DepartmentRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialties(): HasMany
    {
        return $this->hasMany(Speciality::class, 'speciality_id');
    }

    /**
     * Get all of the internships for the DepartmentRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function internships(): HasMany
    {
        return $this->hasMany(Internship::class, 'department_id');
    }
}