<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPosting extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'location',
        'job_type',
        'salary',
        'deadline',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}