<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }
    public function candidateProfile(): HasOne
    {
        return $this->hasOne(CandidateProfile::class);
    }
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'candidate_id');
    }
}