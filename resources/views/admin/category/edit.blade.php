@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('admin.category.update',$category->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" value="{{$category->name}}" name="name" placeholder="Please Enter Category Name"/>
                            </div>
                            <button type="submit" class="btn btn-default">Create Category</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
