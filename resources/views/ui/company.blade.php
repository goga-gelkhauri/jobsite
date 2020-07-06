@extends('layouts.ui')
@section('content')
    <div style="height: 113px;"></div>

    <div class="site-blocks-cover overlay" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12" data-aos="fade">
            <h1>Companies</h1>
            <form action="" id="searchForm">
              <div class="row mb-3">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <input type="text" id="query" class="mr-3 form-control border-0 px-4" placeholder="job title, keywords or company name ">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      {{-- <div class="input-wrap">
                        <span class="icon icon-room"></span>
                      <input type="text" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="city, province or region" onFocus="geolocate()">
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <input type="submit" class="btn btn-search btn-primary btn-block" id="searchButton" value="Search">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="small">or browse by category: <a href="#" class="category">Category #1</a> <a href="#" class="category">Category #2</a></p>
                </div>
              </div>
              
            </form>
            <script>
              
        $('input#searchButton').click( function() {
            $.ajax({
                url: '/company/' + $('#query').val(),
                type: 'get',
                dataType: 'json',
                success: function(data) {
                          // ... do something with the data...
                          console.log(data);
                        }
            });
        });
            </script>
          </div>
        </div>
      </div>
    </div>
    

 


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Companies List</h2>
            <div class="rounded border jobs-wrap">
              @foreach ($companies as $company)
                  
              <a href="/singleCompany/{{$company->id}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset('images/company_logo_blank.png')}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$company->name}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{$company->industry}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span>{{$company->location}}</div>
                     
                    </div>
                  </div>
                </div>
               
              </a>

              @endforeach


         </div>
            </div>

          </div>
        </div>
      </div>
    </div>

   

    <div class="site-blocks-cover overlay inner-page" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Can't find anything</h1>
            <p class="h3 text-white mb-5"><a href="/register" style="color: green">Register</a> and add profile to company page employees will contact you</p>
            <p><a href="#" class="btn btn-outline-warning py-3 px-4">Companys list</a></p>
            
          </div>
        </div>
      </div>
    </div>

    

    


    

    

@endsection