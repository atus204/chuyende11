<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = ['name', 'credits'];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments')->withTimestamps();
    }
}
