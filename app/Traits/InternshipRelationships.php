<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Department;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait InternshipRelationships
{

    /**
     * Get the company that owns the InternshipRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    /**
     * Get all of the members for the InternshipRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'internship_id');
    }


    /**
     * Get the department that owns the InternshipRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    
}
