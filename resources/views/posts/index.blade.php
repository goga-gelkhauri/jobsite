@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Posts</h2>
                </div>
                <div class="my-2">
                    @can('job-create')
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                    @endcan
                </div>
            </div>
        </div>
    
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
    
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>image</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><img src="/uploads/{{ $post->image }}" style="width: 100px;height:100px"></td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                        @can('post-edit')
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('post-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
      
    </div>



@endsection