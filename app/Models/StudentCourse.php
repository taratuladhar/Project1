<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $fillable=[
                         'sid',
                         'cid'
                        ];

    public function getStudentName(){
        return $this->belongsTo(Student::class,'sid','id');
         }
    public function getCourseName(){
        return $this->belongsTo(course::class,'cid','id');
        }                    
}
