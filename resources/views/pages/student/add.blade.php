{{-- @extends('main')
@section('content')
  
        <div class="row">
            <h1><i class="fa fa-user"></i> Add Student</h1>
            <div class="col-md-12">
                <form action="" method="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">First name</label><input type="text" class="form-control" name="fname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middle name</label><input type="text" class="form-control" name="mname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Last name</label><input type="text" class="form-control" name="lname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" class="form-control" name="gender" value="male">Male 
                            <input type="radio" class="form-control" name="gender" value="female">Female
                            <input type="radio" class="form-control" name="gender" value="others">others
                        </div>
                        <div class="col-md-6">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Country</label>
                    </div>
                   <div class="row">
                       <div class="col-md-6">
                           <label for="">Email</label>
                           <input type="email" class="form-control" name="email">
                       </div>
                       <div class="col-md-6">
                           <label for="">Mobile</label>
                           <input type="text" class="form-control" name="mobile">
                       </div>
                   </div>
                    </form>
            </div>
            
        </div>
  
@endsection --}}

@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-12">
        <h1><i class="fa fa-user mt-2"></i> Add Student</h1>

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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input id="fname" type="text" class="form-control" name="fname" value="{{old('fname')}}">  
                        
                         <a style="color:red;">
                            @error('fname')
                                {{$message}}
                            @enderror
                        </a>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Middle Name</label>
                            <input type="text" class="form-control" name="mname" value="{{old('mname')}}">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{old('lname')}}">
                        
                        <a style="color:red;">
                            @error('lname')
                                {{$message}}
                            @enderror
                        </a>
                    </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Gender</label>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="male">
                                    <input type="radio" id="male" name="gender" value="male"
                                    @if (old('gender')=='male')
                                    {{'checked'}}   
                                    @endif

                                    >Male
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="female">
                                    <input type="radio" id="female" name="gender" value="female"
                                    @if (old('gender')=='female')
                                    {{'checked'}}   
                                    @endif
                                    >Female
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="others">
                                    <input type="radio" id="others" name="gender" value="others"
                                    @if (old('gender')=='others')
                                    {{'checked'}}   
                                    @endif
                                    >Others
                                </label>
                            </div>
                            <a style="color:red;">
                                @error('gender')
                                    {{$message}}
                                @enderror
                            </a>
                        </div>


                    </div>
                    <div class="col-md-8">
                     <div class="form-group">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="city" value="{{old('city')}}">
                     
                     <a style="color:red;">
                        @error('city')
                            {{$message}}
                        @enderror
                    </a>
                </div>
                    </div>
                </div>
                <hr>
               <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                     <label for="">Country</label>
                     <select name="country" id="" class="form-control select2Dropdown">
                         <option selected disabled>Choose Country</option>
                         <option value="nepal"
                          @if (old('country')=='nepal')
                         {{'selected'}}   
                         @endif
                         >Nepal</option>

                         <option value="china"
                         @if (old('country')=='china')
                         {{'selected'}}   
                         @endif
                         >china</option>

                         <option value="india"
                         @if (old('country')=='india')
                         {{'selected'}}   
                         @endif
                         >india</option>

                         <option value="usa" 
                         @if (old('country')=='usa')
                         {{'selected'}}   
                         @endif
                         >usa</option>

                         <option value="uk" 
                         @if (old('country')=='uk')
                         {{'selected'}}   
                         @endif
                         >uk</option>
 
                     </select>
                    
                    <a style="color:red;">
                        @error('country')
                            {{$message}}
                        @enderror
                    </a>
                </div>
                 </div>
               </div>
               <hr>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}">

                       
                       <a style="color:red;">
                        @error('mobile')
                            {{$message}}
                        @enderror
                    </a>
                </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                       
                       <a style="color:red;">
                        @error('email')
                            {{$message}}
                        @enderror
                    </a>
                    </div>
                    </div>
                </div>
               
                    <button class="btn btn-info">Add Student</button>
                
            </form>
        </div>

    </div>
@endsection
  