<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
