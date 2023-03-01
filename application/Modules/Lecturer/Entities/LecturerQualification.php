<?php

namespace Modules\Lecturer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LecturerQualification extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Lecturer\Database\factories\LecturerQualificationFactory::new();
    }
}
