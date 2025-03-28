<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Internship;
use App\Models\Member;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CompanyRelationships {



    /**
     * Get all of the users for the CompanyRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }

    /**
     * Get all of the internships for the CompanyRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function internships(): HasMany
    {
        return $this->hasMany(Internship::class, 'company_id');
    }

    /**
     * Get all of the applications for the CompanyRelationships
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Member::class, 'company_id');
    }

}