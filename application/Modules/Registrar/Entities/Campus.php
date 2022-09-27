<?php

namespace Modules\Registrar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function campusXCourse(){

        return $this->hasMany(AvailableCourse::class, 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Registrar\Database\factories\CampusFactory::new();
    }
}
