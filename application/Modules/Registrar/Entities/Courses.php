<?php

namespace Modules\Registrar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\Entities\CourseTransfer;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'course_code', 'course_name','level'];
    protected $guared = [];

    protected $table = 'courses';


    public function newCourses(){

        return $this->belongsToMany(Intake::class, 'available_courses', 'course_id', 'intake_id');

    }

//    available courses vs courses

    public function onOffer(){

        return $this->hasMany(AvailableCourse::class, 'id');

    }

    public function courseXAvailable(){

        return $this->hasOne(AvailableCourse::class, 'course_id');
    }

//    relationship between a course and an application

    public function apps(){

        return $this->hasMany(Application::class, 'id');

    }
    public function courseRequirements(){
        return $this->hasOne(CourseRequirement::class, 'course_id');
    }

    // public function dept(){

    //     return $this->belongsTo(Department::class, 'department_id');
    // }

    public function getCourseDept(){

        return $this->belongsTo(Department::class, 'department_id');

    }

    public function useDept(){
        return $this->belongsTo(Department::class);
    }

    public function studentCrs(){
        return $this->hasOne(StudentCourse::class, 'id');
    }

    public function transferCourse(){
        return $this->hasMany(CourseTransfer::class, 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Courses\Database\factories\CoursesFactory::new();
    }

    public function Classes(){
        return $this->hasOne(Classes::class, 'id');
    }
}
