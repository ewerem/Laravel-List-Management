@extends('app')

@section('contents')
    <div style="color:white;background:black;padding:8px;text-align:center">
        <h1>LIST MANAGEMENT DASHBOARD</h1>
    </div>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-9 ">
                <h4><i class="fas fa-circle-user"></i> {{$data->fullname}}</h4>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right;"><i class="fas fa-plus"></i> Add List</a>
                    </div>
                    <div class="col-lg-6">
                        <form method="post" action="/logout">
                            @csrf
                            <button class="btn btn-danger" style="float:right;">Logout <i class="fas fa-sign-out"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-responsive">
            <thead style="background:black; color:white;text-align:center;font-weight:bold;">
                <tr>
                    <td>S/N</td>
                    <td>Title</td>
                    <td>Contents</td>
                    <td>Email</td>
                    <td>Time Created</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody style="text-align:center;">
                @php $n = 1 @endphp
                @foreach($todo as $row)
                <tr>
                    <td>
                        {{$n++}}
                    </td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->content}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->created_at}}</td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}" style="float:right;"><i class="fas fa-pen"></i> Edit</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModaldelete{{$row->id}}" style="float:right;"><i class="fas fa-times"></i> Delete</a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Edit List Here</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/addList/{{$row->id}}">
                            @csrf
                            @method('put')
                            <div class="mb-4">
                                <label for="title">Enter Title</label>
                                <input class="form-control form-control-lg" name="title" type="text" value="{{$row->title}}" required>
                                @error('title')
                                    <i style="color:red">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="content">Enter Content</label>
                                <textarea class="form-control form-control-lg" name="content" required>{{$row->content}}</textarea>
                                @error('content')
                                    <i style="color:red">{{$message}}</i>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-lg btn-success"><i class="fas fa-pen-to-square"></i> Submit Changes </button>
                            </div>
                            
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end of edit modal -->

                <!-- Delete Modal -->
                <div class="modal fade" id="exampleModaldelete{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                            <h4 style="color:red; text-align:center;">
                                Are you sure you want to delete item {{$row->title}}?
                            </h4>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <center>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-lg btn-block btn-success" data-bs-dismiss="modal"> No </button>
                                    </div>
                                    </center>
                                </div>
                                <div class="col-6">
                                <form method="post" action="/deleteList/{{$row->id}}">
                                    @csrf
                                    @method('delete')
                                    <center>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-lg btn-block btn-danger"> Yes </button>
                                    </div>
                                    </center>
                                </form>
                                </div>
                            </div>
                        
                    </div>
                    </div>
                </div>
                </div>
                <!-- end of delete modal -->

                @endforeach
            </tbody>
        </table>
    </div>
@endsection