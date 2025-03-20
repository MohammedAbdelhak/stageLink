<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Department;
use App\Models\Internship;
use App\Models\Member;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelationships

{

    /**
     * Get all of the internships for the UserRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function internships(): HasMany
    {
        return $this->hasMany(Internship::class, 'company_id');
    }


    /**
     * Get all of the memberships for the UserRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships(): HasMany
    {
        return $this->hasMany(Member::class, 'student_id');
    }



    /**
     * Get the department that owns the UserRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }



    /**
     * Get the company that owns the UserRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    /**
     * Get the speciality that owns the UserRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
    
}
