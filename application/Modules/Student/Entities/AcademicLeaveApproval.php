<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicLeaveApproval extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function leaveApproval(){

        return $this->belongsTo(AcademicLeave::class, 'id');
    }
    // public function leaveApp(){

    //     return $this->belongsTo(AcademicLeave::class, 'academic_leave_id');
    // }
    
    protected static function newFactory()
    {
        return \Modules\Student\Database\factories\AcademicLeaveApprovalFactory::new();
    }
}
