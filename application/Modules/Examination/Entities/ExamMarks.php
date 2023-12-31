<?php

namespace Modules\Examination\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Registrar\Entities\Student;
use Modules\Registrar\Entities\Department;
use Modules\Registrar\Entities\UnitProgramms;
use Modules\Examination\Entities\ExamWorkflow;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamMarks extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function unit(){

        return $this->belongsTo(UnitProgramms::class, 'unit_code', 'course_unit_code');
    }

    public function studentMark(){

        return $this->belongsTo(Student::class, 'reg_number', 'reg_number');
    }

    public function examProcessed(){

        return $this->hasMany(ExamWorkflow::class, 'workflow_id');
    }
  
     public function marksApproval(){

        return $this->hasOne(ExamWorkflow::class, 'workflow_id');
    }


    public function examDept(){

        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Examination\Database\factories\ExamMarksFactory::new();
    }
}
