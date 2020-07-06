@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Categories</h2>
                </div>
                <div class="my-2">
                    @can('category-create')
                    <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
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
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
                        @can('job-edit')
                        <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('category-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
    </div>



@endsection