@extends('main')
@section('content')

<div class="row">
    <div class="cold-md-12">
        <h1 class="mt-2"><i class="fa fa-user"></i>Edit Course</h1>
    </div>

<div class="col-md-12">
    <form action="{{url('edit-course/'.$courseData->id)}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input id="title" type="text" class="form-control" name="title" value="{{$courseData->title}}">
               
                <a style="color:red;">
                    @error('title')
                        {{ $message }}
                    @enderror
                </a>
             </div> 
            </div>
         
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{$courseData->duration}}">
                    <a style="color:red;">
                        @error('duration')
                            {{ $message }}
                        @enderror
                    </a>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$courseData->price}}">
                    <a style="color:red;">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </a>
                </div>
            </div>

        </div>

       <button class="btn btn-info">Update Course</button>

    </form>
</div>

</div>

@endsection