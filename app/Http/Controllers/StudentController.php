<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $studentData=Student::all();
        return view('pages.student.index',['studentData'=>$studentData]);
    }
    public function create(Request $request)
    {
       if($request->isMethod('get'))
       {
           return view('pages.student.add');
       }
       if($request->isMethod('post'))
       {
           $request->validate([
                  'fname'=>'required',
                  'lname'=>'required',
                  'gender'=>'required',
                  'city'=>'required',
                  'country'=>'required',
                  'mobile'=>'required|unique:students,mobile',
                  'email'=>'required|unique:students,email',
                  
           ]);
           
           $name = $request->fname.' '.$request->mname.' '.$request->lname;

           $studentdata=$request->all();
           Student::create($studentdata);
           return redirect()->back()->with('success','Data of '. $name.' has been inserted successfully.'); //back to student.php
       }
    }
    public function edit(Request $request,$id)
    {
     if($request->isMethod('get'))
     {
         $singleStudentData=Student::findOrFail($id);
         return view('pages.student.edit',['studentData'=>$singleStudentData]);
     }
     if($request->isMethod('post'))
     {
         $data=Student::findOrFail($id);
         $data->update($request->all());
         return redirect('display-student')->with('success','Data updated successfully.');
     }
     }
     public function update(Request $request)
     {

     }
     public function destroy($id)
     {
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
     }
     public function toggleStatus(Request $request)
     {
        if($request->isMethod('post'))
        {
            if($request->submit == 'active')
            {
             $data = Student::findOrfail($request->sid);
             $data->status = 0;
             $data->update();
             return redirect()->back()->with('success','Status updated successfully.');
            }
            elseif($request->submit == 'inactive')
            {
             $data = Student::findOrfail($request->sid);
             $data->status = 1;
             $data->update();
             return redirect()->back()->with('success','Status updated successfully.');
            }
         }
     }
    
}
