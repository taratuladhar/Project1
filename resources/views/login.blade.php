<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div class="col-md-12">
        {{Session::get('access')}}
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
        
    </div>
    <div class="col-md-5">
        <h1>Login Form</h1>
        <form action="{{url('login')}}" method="post" class="form-group">
            @csrf
            <div class="form-group">
                <label>User Name:</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div> 
            <button class="btn btn-success">Login</button>
            </div>
            
            
        </form>
        <div class="form-group">
            <a href="{{url('/register')}}">Need an account? Sign up!</a>
        </div>
    </div>
</div>



