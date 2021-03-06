@extends('layouts.ui')
@section('title')
  {{$company->name}}
@endsection
@section('content')
<div style="height: 113px;"></div>

<div class="unit-5 overlay" style="background-image: url('{{asset('images/hero_2.jpg')}}');">
  <div class="container text-center">
    <h2 class="mb-0">{{$company->name}}</h2>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep">></span> <span>{{$company->name}}</span></p>
  </div>
</div>




<div class="site-section bg-light">
  <div class="container">
    <div class="row">
   
      <div class="col-md-12 col-lg-8 mb-5">
      

      
        <div class="p-5 bg-white">

          <div class="mb-4 mb-md-5 mr-5">
           <div class="job-post-item-header d-flex align-items-center">
           <h2 class="mr-3 text-black h4">{{$company->name}}</h2>
             
           </div>
           <div class="job-post-item-body d-block d-md-flex">
             <div><span class="fl-bigmug-line-big104"></span> <span>{{$company->location}}</span></div>
           </div>
          </div>


        
          <div class="img-border mb-5">
            <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
              <span class="icon-wrap">
                <span class="icon icon-play"></span>
              </span>
              <img src="{{asset('images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
            </a>
          </div>
        
      
          
            <p>{{$company->description}}</p>
          <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
        </div>
      </div>

     
        
        
        <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex mb-0">
              <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
              <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
            </div>

            <div class="nonloop-block-16 owl-carousel">
                @foreach ($company->jobs()->get() as $job)
                    
                <div class="border rounded p-4 bg-white">
                    <h2 class="h5">{{$job->title}}</h2>
                    <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                    <p>
                        <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                        <span class="d-block"><span class="icon-room"></span> {{$job->location}}</span>
                        <span class="d-block"><span class="icon-money mr-1"></span> ${{$job->salary}}</span>
                    </p>
                    <p class="mb-0">{{$job->description}}</p>
                </div>
                @endforeach




            
        </div>
      </div>
    </div>
  </div>
</div>




<div class="site-section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-6" data-aos="fade" >
        <h2>Frequently Ask Questions</h2>
      </div>
    </div>
    

    <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
      <div class="col-md-8">
        <div class="accordion unit-8" id="accordion">
        <div class="accordion-item">
          <h3 class="mb-0 heading">
            <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
          </h3>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="body-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
            </div>
          </div>
        </div> <!-- .accordion-item -->
        
        <div class="accordion-item">
          <h3 class="mb-0 heading">
            <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
          </h3>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="body-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
            </div>
          </div>
        </div> <!-- .accordion-item -->

        <div class="accordion-item">
          <h3 class="mb-0 heading">
            <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
          </h3>
          <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="body-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
            </div>
          </div>
        </div> <!-- .accordion-item -->

        <div class="accordion-item">
          <h3 class="mb-0 heading">
            <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
          </h3>
          <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="body-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
            </div>
          </div>
        </div> <!-- .accordion-item -->

      </div>
      </div>
    </div>
  
  </div>
</div>

@endsection