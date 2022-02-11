@extends('admin.layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                    @if(session('errors'))
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title"  value="{{$post->title}}"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" value="{{$post->description}}"/>
                        </div>
                        <div class="form-group">
                            <label>New Post</label>
                            <input type="checkbox" {{($post->new_post==0) ? 'checked' : ' '}} name="new_post"/>
                        </div>
                        <div>
                            <label>Highlight Post</label>
                            <input type="checkbox" {{($post->highlight_post==0) ? 'checked' : ' '}} name="highlight_post">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" value="{{}}" >
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="demo" name="content" class="ckeditor">{!! $post->content !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Create Post</button>
                    </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
