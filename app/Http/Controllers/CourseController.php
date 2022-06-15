<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courseData=Course::all();
        return view('pages.course.index',['courseData'=>$courseData]);
    }
    public function create(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('pages.course.add');
        }
        if($request->isMethod('post'))
        {
            $request->validate([
                    'title'=>'required',
                    'duration'=>'required',
                    'price'=>'required'
            ]);

            $courseData=$request->all();
            Course::create($courseData);
            return redirect()->back()->with('success','Course data is inserted successfully.');
        }
    }
    public function edit(Request $request,$id)
    {
        if($request->isMethod('get')){
            $singleCourseData = Course::findOrFail($id);
            return view('pages.course.edit',[
                'courseData' => $singleCourseData
            ]);
        }
        if($request->isMethod('post')){
            $data = Course::findOrFail($id);
            $data->update($request->all());
        return redirect('display-course')->with('success','Data updated successfully.');

        } 
    }
    public function update(Request $request)
    {
        
    }
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted successfully.');
    }
    public function toggleStatus(Request $request)
    {
        if($request->isMethod('post'))
        {
            if($request->submit == 'active')
            {
             $data = Course::findOrfail($request->cid);
             $data->status = 0;
             $data->update();
             return redirect()->back()->with('success','Status updated successfully.');
            }
            elseif($request->submit == 'inactive')
            {
             $data = Course::findOrfail($request->cid);
             $data->status = 1;
             $data->update();
             return redirect()->back()->with('success','Status updated successfully.');
            }
         }
    }

    public function show($id)
    {
       
       $moreData=Course::findOrfail($id);
       
       return view('pages.course.show',[
           'singleData'=>$moreData
       ]);
    }
}
