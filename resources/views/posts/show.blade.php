@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{ $post->title }}</h2>
                </div>
               
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group my-2">
                   <img src="/uploads/{{$post->image}}" width="200px" height="200px" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>content:</strong> <br>
                    {{ $post->content }}
                </div>
            </div>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
@endsection