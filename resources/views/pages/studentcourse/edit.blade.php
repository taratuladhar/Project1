@extends('main')
@section('content')
<div class="col-md-6">
    <h2>Student Course Edit form</h2>
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
    <form action="{{route('updatestudentcourse')}}" class="form-group" method="post">
        @csrf
        <input type="hidden" name="scid" value="{{$editData->id}}">
        <div class="form-group">
            <label for="">Select Student</label>
           <select name="sid" id="" class="form-control">         
                <option selected disabled>Choose student</option>
                     @foreach($students as $sid)
                <option
                    @if($editData->sid==$sid->id)
                        {{"selected"}}
                    @endif
                    value="{{$sid->id}}">{{$sid->fname}}</option>
                    @endforeach
           
           </select>        
        </div>


        <div class="form-group">
            <label for="">Select Course</label>
           <select name="cid" id="" class="form-control">
                    <option selected disabled>Choose course</option>
                            @foreach($courses as $cid)
                    <option @if($editData->cid==$cid->id)
                                {{"selected"}}
                            @endif value="{{$cid->id}}">{{$cid->title}}</option>
                             @endforeach
           </select>
        </div>

       <div class="form-group">
                <button class="btn btn-success">Update</button>
       </div>

    </form>
    
</div>
@endsection