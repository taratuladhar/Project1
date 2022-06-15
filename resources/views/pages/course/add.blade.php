@extends('main')
@section('content')

    <div class="row">
       <div class="row-md-12">
       <h1> Add Course</h1> 

       @if (Session::has('success'))
       <div class="alert alert-success">
           {{Session::get('success')}}
       </div>
       @endif

       @if (Session::has('error'))
       <div class="alert alert-error">
           {{Session::get('error')}}
       </div>
       @endif

      </div>
      
       <div class="col-md-12">
          <form action="" method="post">
             @csrf
               
            <div class="row mt-3">
                     <div class="col-md-4">
                        <div class="form-group">
                              <label for="title">Title</label> 
                              <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                    <a style="color:red;" >
                                       @error('title')
                                       {{$message}} 
                                       @enderror
                                    </a>
                        </div> 
                     </div>

                     <div class="col-md-4">
                           <div class="form-group">
                              <label for="duration">Duration</label> 
                              <input type="text" class="form-control" name="duration" {{old('duration')}}>
                              <a style="color:red;" >
                                 @error('duration')
                                 {{$message}} 
                                 @enderror
                              </a>
                        </div> 
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="price">Price</label> 
                           <input type="text" class="form-control" name="price" {{old('price')}}>
                           <a style="color:red;" >
                              @error('price')  
                              {{$message}} 
                              @enderror
                           </a>
                     </div> 
                  </div>
          </div>

                <button class="btn btn-info">Add Course</button>

          </form>
       </div>
    </div>

@endsection