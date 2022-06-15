<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['fname',
                         'mname',
                         'lname',
                         'gender',
                         'mobile',
                         'email',
                         'city',
                         'country',
                         'mobile',
                         'email',
                         'status'
];
public function getFnameAttribute($fname){
    return ucfirst($fname);
}
}
