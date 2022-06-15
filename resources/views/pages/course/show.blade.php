@extends('main')
@section('content')
    <div class="col-md-12">
        <h2>Details of {{$singleData->title}}</h2> <hr>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{$singleData->title}}</td>
            </tr>
            <tr>
                <th>Duration</th>
                <td>{{$singleData->duration}}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$singleData->price}}</td>
            </tr>
        </table>
        <a href="{{route('displayCourse')}}" class="btn btn-info text-light">Back</a>
    </div>
@endsection