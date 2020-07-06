@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Jobs</h2>
                </div>
                <div class="my-2">
                    @can('job-create')
                    <a class="btn btn-success" href="{{ route('jobs.create') }}"> Create New Job</a>
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
                <th>Description</th>
                <th>Salary</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->salary }}</td>
                <td>
                    <form action="{{ route('jobs.destroy',$job->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('jobs.show',$job->id) }}">Show</a>
                        @can('job-edit')
                        <a class="btn btn-primary" href="{{ route('jobs.edit',$job->id) }}">Edit</a>
                        @endcan
    
    
                        @csrf
                        @method('DELETE')
                        @can('job-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
        {!! $jobs->links() !!}
    </div>



@endsection