@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Category</h2>
                </div>
               
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $category->name }}
                </div>
            </div>
        </div>
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('jobs.index') }}"> Back</a>
                </div>
    </div>
@endsection