@extends('layouts.default')
@section('content')
@include('layouts.slider')
<main id="main">

    <!-- ======= About Us Section ======= -->
   {{--  <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="{{asset('img/about.jpg')}}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

            <div class="section-title">
              <h2>About Us</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
 --}}

    <section class="section-services section-t8" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
                <h2 class="title font-weight-bold mb-3">About</h2>
            </div>
          </div>
        </div>
      </div>     
      <div class="row mt-4">
        <div class="col-md-3">
          <div class="card border-0">
            <div class="card-header bg-white border-0">
            	<img src="{{asset('images/governing_body_964532547.jpg')}}" style="width: 100%;height: 100%">
            </div>
            <div class="card-body">
            	<h5 class="font-weight-bold text-captitalize">Governing Body</h5>
            	<p class="text-justify" style="font-size: 15px;">
            		Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
            	</p>            	
          
              {{link_to('#',$title = 'Find out more >> ', $attributes = ['class' => 'font-weight-bold'] , $secure =null)}}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0">
            <div class="card-header bg-white border-0">
              <img src="{{asset('images/team.jpg')}}" style="width: 100%;height: 100%">
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold text-captitalize">IAP Legacy</h5>
              <p class="text-justify" style="font-size: 15px;">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
              </p>              
          
              {{link_to('#',$title = 'Find out more >> ', $attributes = ['class' => 'font-weight-bold'] , $secure =null)}}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0">
            <div class="card-header bg-white border-0">
              <img src="{{asset('images/governing_body_964532547.jpg')}}" style="width: 100%;height: 100%; ">
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold text-captitalize">Governing Body</h5>
              <p class="text-justify" style="font-size: 15px;">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
              </p>              
          
              {{link_to('#',$title = 'Find out more >> ', $attributes = ['class' => 'font-weight-bold'] , $secure =null)}}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card border-0">
            <div class="card-header bg-white border-0">
               <img src="{{asset('images/team.jpg')}}" style="width: 100%;height: 100%">
            </div>
            <div class="card-body">
              <h5 class="font-weight-bold text-captitalize">IAP Legacy</h5>
              <p class="text-justify" style="font-size: 15px;">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
              </p>              
          
              {{link_to('#',$title = 'Find out more >> ', $attributes = ['class' => 'font-weight-bold'] , $secure =null)}}
            </div>
          </div>
        </div>

      </div> 
    </div>
  </section>

  <section class="section-services section-t8" style="background-color: aliceblue ">
    <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="card border-0" >
                <div class="card-header border-0" style="background-color: aliceblue;">
                    <h2 class="text-primary"><b>IAP</b> Mission</h2>
                </div>
                <div class="card-body" style="background-color: aliceblue;">
                    <div class="row">
                      <div class="col-md-5">
                        
                      </div>
                      <div class="col-md-7">
                        <p class="text-justify mb-2"> 
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                        <p class="text-justify mb-2">
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. 
                        </p>
                      </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-md-7">
            <div class="card border-0" >
              <div class="card-header border-0" style="background-color: aliceblue;">
                  <h3 class="text-primary">Apply For <b>IAP Membership</b></h3>
              </div>
              <div class="card-body" style="background-color: aliceblue;">
                 <div class="card">
                   <div class="card-body">
                     <div class="row form-group">
                       <div class="col-md-6 mb-2">
                          {{Form::text('name','',['class' => 'form-control','placeholder' => 'Full Name'])}}
                       </div>
                       <div class="col-md-6 mb-2">
                          {{Form::text('member_type','',['class' => 'form-control','placeholder' => 'Membership Type'])}}
                       </div>
                     </div>
                     <div class="row form-group">
                       <div class="col-md-6 mb-2">
                          {{Form::email('email','',['class' => 'form-control','placeholder' => 'Email Address'])}}
                       </div>
                       <div class="col-md-6 mb-2">
                          {{Form::text('mobile','',['class' => 'form-control','placeholder' => 'Mobile Number','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
                       </div>
                     </div>
                     <div class="row form-group">                       
                       <div class="col-md-12 mb-2">
                          {{Form::textarea('description','',['class' => 'form-control','placeholder' => 'Member Text' , 'rows' => '3', 'cols' => '3' ])}}
                       </div>
                     </div>
                     <div class="row form-group">
                        <div class="col-md-12 mb-2">
                          {{Form::submit('Submit', ['class' => 'btn btn-sm btn-primary'])}}
                        </div>
                     </div>                       
                   </div>
                 </div>                
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <section class="section-services section-t8">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6" style="">
                <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
            </div>
             <div class="col-md-6">
                <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6" style="">
                <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
            </div>
             <div class="col-md-6">
                <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
            </div>
        </div>
    </div>
  </section>
<section class="section-services section-t8" style="background-color: aliceblue ">
    <div class="container">
        <div class="row">
          <div class="col-md-6" >
            <div class="card border-0" style="background-color: aliceblue ">
              <div class="card-header border-0 p-0"  style="background-color: aliceblue ">
                <div class="card-title">
                  <h4 class="font-weight-bold text-primary">Notices</h4>
                </div>
              </div>
              <div class="card-body p-0" >
                <div class="row">
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                </div>
              </div>
            </div>             
          </div>
          <div class="col-md-6 ">
            <div class="card border-0" style="background-color: aliceblue ">
              <div class="card-header border-0 p-0" style="background-color: aliceblue ">
                <div class="card-title">
                  <h4 class="font-weight-bold text-primary">News & Events</h4>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="row">
                   <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                  <div class="col-md-6 pr-1">
                      <a href="" style="color:black !important"><p class="font-weight-bold mb-0" style="font-size:13px;">Administrative councile of IAP to submit profile.</P> 
                      <p style="font-size:12px;">All IAP administrative council member to submit their details</p></a>
                  </div>
                </div>
              </div>
            </div>             
          </div>
        </div>
    </div>
  </section>
  <section class="section-services section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header p-0 border-0 bg-white">
                    <div class="card-title">
                        <img src="{{asset('images/sanjiv.jpeg')}}" style="width: 100%" >
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold">Dr. Saniv Jha</h5>
                    <h6>President</h6>
                    <p class="text-justify" style="font-size: 14px;">
                        Wisconsin is a U.S. state located in the north-central, Midwest and Great Lakes regions of the country. It is bordered by Minnesota to the west.
                    </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header p-0 border-0 bg-white">
                    <div class="card-title">
                        <img src="{{asset('images/sanjiv.jpeg')}}" style="width: 100%" >
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold">Dr. Saniv Jha</h5>
                    <h6>President</h6>
                    <p class="text-justify" style="font-size: 14px;">
                        Wisconsin is a U.S. state located in the north-central, Midwest and Great Lakes regions of the country. It is bordered by Minnesota to the west.
                    </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header p-0 border-0 bg-white">
                    <div class="card-title">
                        <img src="{{asset('images/sanjiv.jpeg')}}" style="width: 100%" >
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold">Dr. Saniv Jha</h5>
                    <h6>President</h6>
                    <p class="text-justify" style="font-size: 14px;">
                        Wisconsin is a U.S. state located in the north-central, Midwest and Great Lakes regions of the country. It is bordered by Minnesota to the west.
                    </p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header p-0 border-0 bg-white">
                    <div class="card-title">
                        <img src="{{asset('images/sanjiv.jpeg')}}" style="width: 100%" >
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold">Dr. Saniv Jha</h5>
                    <h6>President</h6>
                    <p class="text-justify" style="font-size: 14px;">
                        Wisconsin is a U.S. state located in the north-central, Midwest and Great Lakes regions of the country. It is bordered by Minnesota to the west.
                    </p>
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
  <section class="section-services section-t8">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-md-12 p-0">
            <img src="{{asset('images/single_slider.jpg')}}" style="width: 100%;height: 300px;">
        </div>
      </div>
    </div>
  </section>
  <section class="section-services section-t8">
    <div class="container">
      <div class="row ">
          <div class="col-md-12 mb-2">
              <h4 class="font-weight-bold text-primary">Physio Blogs</h4>  
          </div>
          <div class="col-md-12">
             <div class="row">
               <div class="col-md-3">
                  <div class="card">
                    <div class="card-header p-0 border-0 bg-white">
                        <div class="card-title">
                            <img src="{{asset('images/blog4.jpeg')}}" style="width: 100%" >
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold text-captitalize">Identifying and testing pain from nerve tension</h6>
                        <p class="text-justify" style="font-size: 13px;">
                           If your neural tissue is impeded then pain or restriction of your nerve movement is a common result.  The adverse neural tension can result in nerve pain and limited motion. This is what is commonly referred to as a trapped nerve.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header p-0 border-0 bg-white">
                        <div class="card-title">
                            <img src="{{asset('images/blog1.jpeg')}}" style="width: 100%" >
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold text-captitalize">Identifying and testing pain from nerve tension</h6>
                        <p class="text-justify" style="font-size: 13px;">
                           If your neural tissue is impeded then pain or restriction of your nerve movement is a common result.  The adverse neural tension can result in nerve pain and limited motion. This is what is commonly referred to as a trapped nerve.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header p-0 border-0 bg-white">
                        <div class="card-title">
                            <img src="{{asset('images/blog.jpeg')}}" style="width: 100%" >
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold text-captitalize">Identifying and testing pain from nerve tension</h6>
                        <p class="text-justify" style="font-size: 13px;">
                           If your neural tissue is impeded then pain or restriction of your nerve movement is a common result.  The adverse neural tension can result in nerve pain and limited motion. This is what is commonly referred to as a trapped nerve.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-header p-0 border-0 bg-white">
                        <div class="card-title">
                            <img src="{{asset('images/blog2.jpeg')}}" style="width: 100%" >
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold text-captitalize">Identifying and testing pain from nerve tension</h6>
                        <p class="text-justify" style="font-size: 13px;">
                           If your neural tissue is impeded then pain or restriction of your nerve movement is a common result.  The adverse neural tension can result in nerve pain and limited motion. This is what is commonly referred to as a trapped nerve.
                        </p>
                    </div>
                  </div>
                </div>

             </div>
          </div>
      </div>
    </div>
  </section>
  <section class="section-services section-t8">
    <div class="container">
      <div class="row ">
          <div class="col-md-3">
              <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
          </div>
           <div class="col-md-3">
              <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
          </div>
           <div class="col-md-3">
              <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
          </div>
           <div class="col-md-3">
              <img src="{{asset('images/dlife_576025684.jpg')}}" style="width: 100%;height:150px; ">
          </div>
      </div>
    </div>
  </section>
</main>
@endsection
