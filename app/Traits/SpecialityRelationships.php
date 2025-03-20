<?php

namespace App\Traits;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait SpecialityRelationships {

    /**
     * Get all of the students for the SpecialityRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(User::class, 'specialty_id');
    }

    /**
     * Get the department that owns the SpecialityRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}