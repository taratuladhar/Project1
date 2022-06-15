@extends('main')
@section('content')

<div class="col-md-12">
    <h2>Display Student</h2>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>    
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    <hr>
</div>

<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $k = 0; ?>
            @foreach ($studentData as $key => $item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->fname}} {{$item->mname}} {{$item->lname}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        @if($item->status == 1)
                         <form action="{{url('student/toggleStatus')}}" method="POST">
                            @csrf
                            <input type="hidden" name="sid" value="{{$item->id}}">
                            <button name="submit" value="active" type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button>
                            </form>
                        @else
                            <form action="{{url('student/toggleStatus')}}" method="POST">
                            @csrf
                                <input type="hidden" name="sid" value="{{$item->id}}">
                                <button name="submit" value="inactive"  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                            @endif
                    </td>
                    <td>
                        <a  class="btn btn-sm btn-info" title="View More" data-toggle="modal" data-target="#mymodal{{$k}}"><i class="fa fa-eye"></i></a>

                        <a href="{{url('edit-student/'.$item->id)}}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{url('delete-student/'.$item->id)}}" class="btn btn-sm btn-danger " title="Delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></a>

                    </td>

                </tr>
                <!-- Scrollable modal -->
                <div class="modal fade" id="mymodal{{$k}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Details of {{$item->fname}} {{$item->mname}} {{$item->lname}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <b>Name</b> : {{$item->fname}} {{$item->mname}} {{$item->lname}} <hr>
                           <b> City </b>: {{$item->city}}<hr>
                            <b>Gender</b> : {{$item->gender}}<hr>
                            <b>Country</b> : {{$item->country}}<hr>
                            <b>Email</b> : {{$item->email}}<hr>
                            <b>Phone</b> : {{$item->phone}}<hr>


                            

                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                  <?php $k++;?>
                @endforeach
        </tbody>
    </table>
</div>
@endsection