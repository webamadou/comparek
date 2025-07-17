<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationBody extends Model
{
    /** @use HasFactory<\Database\Factories\AccreditationBodyFactory> */
    use HasFactory;

    protected $guarded = [];

    public function programs()
    {
        return $this->belongsToMany(SchoolProgram::class, 'accreditation_programs')
            ->withPivot('status', 'accreditation_date', 'expiration_date', 'notes')
            ->withTimestamps();
    }
}
