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
    
    <hr>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $k=0; ?>
                @foreach ($courseData as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->duration}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        @if($item->status == 1)
                        <form action="{{url('course/toggleStatus')}}" method="POST">
                           @csrf
                           <input type="hidden" name="cid" value="{{$item->id}}">
                           <button name="submit" value="active" type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button>
                           </form>
                       @else
                           <form action="{{url('course/toggleStatus')}}" method="POST">
                           @csrf
                               <input type="hidden" name="cid" value="{{$item->id}}">
                               <button name="submit" value="inactive"  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                           </form>
                           @endif
                    </td>
                    <td>
                        {{-- <a  class="btn btn-sm btn-info" title="View More" data-toggle="modal" data-target="#mymodal{{$k}}"><i class="fa fa-eye"></i></a>  --}}
                        <a  class="btn btn-sm btn-info" title="View More" href="{{route('viewCourse',$item->id)}}"><i class="fa fa-eye" ></i></a> 




                        <a href="{{url('edit-course/'.$item->id)}}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{url('delete-course/'.$item->id)}}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                    <!-- Scrollable modal -->
                    {{-- <div class="modal fade" id="mymodal{{$k}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Details of {{$item->title}} </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <b>Title</b> : {{$item->title}}  <hr>
                               <b> Duration </b>: {{$item->duration}}<hr>
                                <b>Price</b> : {{$item->price}}<hr>
                                                                

                            </div> --}}

             <?php $key++; ?>       
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection