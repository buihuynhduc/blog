@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                    @if(session('errors'))
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.user.update',$user->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" value="{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Password Old</label>
                            <input type="password" class="form-control" name="password" placeholder="Please Enter Old Password" />
                        </div>
                        <div class="form-group">
                            <label>Password New</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Please Enter New Password" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="is_admin" value="1" {{($user->is_admin==1)?'checked':''}} type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="is_admin" value="0" type="radio" {{($user->is_admin==0)?'checked':''}}>Member
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Edit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
