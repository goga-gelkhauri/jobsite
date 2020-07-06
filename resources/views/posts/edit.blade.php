@extends('layouts.app')


@section('content')
   <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Job</h2>
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


    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Title:</strong>
                <input type="text" value="{{$post->title}}" name="title" class="form-control" placeholder="Title">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Content:</strong>
		            <textarea class="form-control" tyle="height:150px" name="content" placeholder="Detail">{{$post->content}}</textarea>
		        </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Image:</strong>
                    <img src="/uploads/{{$post->image}}" width="100px" height="100px" >
		            <input type="file" name="image" class="form-control" placeholder="Sallary">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

   </div>

@endsection