@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('errors'))
                    @foreach($errors->all() as $error)
                   <div class="alert alert-danger">
                      {{$error}}
                   </div>
                    @endforeach
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name"/>
                        </div>
                        <button type="submit" class="btn btn-default">Create Category</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
