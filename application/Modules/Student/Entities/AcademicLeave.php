<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Registrar\Entities\Student;

class AcademicLeave extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function studentLeave(){

        return $this->belongsTo(Student::class, 'student_id');
    }

    protected static function newFactory()
    {
        return \Modules\Student\Database\factories\AcademicLeaveFactory::new();
    }
}