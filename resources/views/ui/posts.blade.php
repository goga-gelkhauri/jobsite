@extends('layouts.ui')
@section('title')
    Blog
@endsection
@section('content')
<div style="height: 113px;"></div>

<div class="unit-5 overlay" style="background-image: url('images/hero_1.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">Blog</h2>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep">></span> <span>Blog</span></p>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row">
        @foreach ($posts as $post)
            
        <div class="col-md-6 mb-5 mb-lg-4 col-lg-3" data-aos="fade">
            <div class="position-relative unit-8">
                <a href="#" class="mb-3 d-block img-a"><img src="/uploads/{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                <span class="d-block text-gray-500 text-normal small mb-3">By <a href="#">Colorlib</a> <span class="mx-2">&bullet;</span> Jan 20th, 2019</span>
                <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">{{$post->title}}</a></h2>
                <p>{{$post->content}}</p>
            </div>
            
        </div>
        @endforeach
     
     
    </div>


    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <div class="site-block-27">
          <ul>
            <li><a href="#"><i class="icon-keyboard_arrow_left h5"></i></a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="icon-keyboard_arrow_right h5"></i></a></li>
          </ul>
        </div>
      </div>
    </div>


  </div>
</div>   
@endsection