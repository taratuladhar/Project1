<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentcourseData = StudentCourse::all();
       return view('pages.studentcourse.index',['studentcourseData' => $studentcourseData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where('status',1)->get();
        $courses = Course::where('status',1)->get();
        return view('pages.studentcourse.create',[
            'students' => $students,
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StudentCourse::create($request->all());
        return redirect()->route('addstudentcourse')->with('success','Data inserted succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if($request->isMethod('get')){
            $students = Student::where('status',1)->get();
            $courses = Course::where('status',1)->get();
            $editData = StudentCourse::findOrfail($id);
        
            return view('pages.studentcourse.edit',['editData' => $editData,
            'students' => $students,
            'courses' => $courses ]);
           }
    
            if($request->isMethod('post')){
                $olddata = StudentCourse::findOrFail($id);  
                $olddata->update($request->all());
                return redirect()->route('displaystudentcourse')->with('success','Data updated successfully.');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $scid = $request->scid;
        $req['sid'] = $request->sid;
        $req['cid'] = $request->cid;      

        $olddata = StudentCourse::findOrFail($scid);  
        $olddata->update($req);
        return redirect()->route('displaystudentcourse')->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentCourse::findOrfail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully');
    }
}
