<?php

namespace Modules\Registrar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\COD\Entities\Nominalroll;
use Modules\Examination\Entities\Exam;
use Modules\Examination\Entities\ExamMarks;
use Modules\Student\Entities\AcademicLeave;
use Modules\Student\Entities\CourseTransfer;
use Modules\Student\Entities\ExamResults;
use Modules\Student\Entities\Readmission;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function courseStudent(){

        return $this->hasOne(StudentCourse::class)->withTrashed();
    }

    public function signNominal(){

        return $this->hasMany(Nominalroll::class);

    }
    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function nominalRoll(){

        return $this->hasOne(Nominalroll::class);

    }

    public function loginStudent(){

        return $this->hasOne(StudentLogin::class, 'id');

    }

    public function leaveStudent(){

        return $this->hasMany(AcademicLeave::class, 'student_id');
    }

    public function leaveStud(){

        return $this->hasMany(AcademicLeave::class, 'student_id');
    }
    public function examResults(){
        return $this->hasMany(ExamMarks::class, 'reg_number');
    }

    
    public function transferStudent(){
        return $this->hasMany(CourseTransfer::class, 'id')->withTrashed();
    }

    public function readmissionStudent(){

        return $this->hasMany(Readmission::class, 'id');
    }


    protected static function newFactory()
    {
        return \Modules\Registrar\Database\factories\StudentFactory::new();
    }
}
