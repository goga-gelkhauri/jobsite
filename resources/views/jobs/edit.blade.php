@extends('layouts.app')


@section('content')
   <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Job</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('jobs.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('jobs.update',$job->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="title" value="{{ $job->title }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $job->description }}</textarea>
		        </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Salary:</strong>
		            <input type="text" name="salary" value="{{ $job->salary }}" class="form-control" placeholder="Sallary">
		        </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Location:</strong>
		            <input type="text" name="location" value="{{ $job->location }}" class="form-control" placeholder="Location">
		        </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Company:</strong>
                    <select name="company_id" class="form-control">
                        <option value="">Choose Company</option>
                        @foreach ($companies as $company)
                            
                        <option value="{{$company->id}}" {{$job->company == $company ? 'selected' : '' }}>{{$company->name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

   </div>

@endsection