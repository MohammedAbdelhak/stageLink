<?php

namespace App\Traits;

use App\Models\Internship;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait MemberRelationships
{

    /**
     * Get the company that owns the MemberRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(User::class, 'company_id');
    }


    /**
     * Get  the internship that owns the MemberRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function internship(): BelongsTo
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }


    /**
     * Get the student that owns the MemberRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
