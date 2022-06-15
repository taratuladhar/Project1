<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert-alert-danger">
                {{Session::get('error')}}
            </div>    
        @endif
    </div>
<div class="col-md-5">
    <h1>Register Form</h1>
    <form action="{{url('register')}}" method="post" class="form-group">
        @csrf
        <div class="form-group">
            <label>User Name:</label>
            <input type="text" name="username" class="form-control">
                @error('username')
                {{$message}}
                @enderror
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control">
                @error('password')
                {{$message}}
                @enderror
        </div>
        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
               
        </div>

        <div > 
          <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>

    <div class="form-group">
        <a href="{{url('/login')}}">Already have an account? Login</a>    
    </div> 

</div>

</div>

