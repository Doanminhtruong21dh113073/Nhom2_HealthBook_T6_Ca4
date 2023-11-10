@extends('layouts.client.app')
@section('content')
  <!-- Start Hero -->
  <section class="bg-half-260 d-table w-100" style="background: url('/client/assets/images/bg/01.jpg') center;">
    <div class="bg-overlay bg-overlay-dark"></div>
    <div class="container">
        <div class="row mt-5 mt-lg-0">
            <div class="col-12">
                <div class="heading-title">
                    <img src="{{ asset('client/assets/images/logo-icon.png') }}" height="50" alt="">
                    <h4 class="display-4 fw-bold text-white title-dark mt-3 mb-4">Meet The <br> Best Doctor</h4>
                    <p class="para-desc text-white-50 mb-0">Great doctor if you need your family member to get
                        effective immediate assistance, emergency treatment or a simple consultation.</p>

                    <div class="mt-4 pt-2">
                        <a href="{{ route('client.booking.booking_create') }}" class="btn btn-primary">Make Appointment</a>
                        <p class="text-white-50 mb-0 mt-2">T&C apply. Please read <a href="#"
                                class="text-white-50">Terms and Conditions <i
                                    class="ri-arrow-right-line align-middle"></i></a></p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->
<!-- Start -->
 <section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="features-absolute bg-white shadow rounded overflow-hidden card-group">
                    <div class="card border-0 bg-light p-4">
                        <i class="ri-heart-pulse-fill text-primary h2 mb-0"></i>
                        <h5 class="mt-1">Emergency Cases</h5>
                        <p class="text-muted mt-2">This is required when, for example, the is not yet available. Dummy text is also known as 'fill text'.</p>
                        <a href="departments.html" class="text-primary">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>

                    <div class="card border-0 p-4">
                        <i class="ri-dossier-fill text-primary h2 mb-0"></i>
                        <h5 class="mt-1">Doctors Timetable</h5>
                        <p class="text-muted mt-2">This is required when, for example, the is not yet available. Dummy text is also known as 'fill text'.</p>
                        <a href="departments.html" class="text-primary">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>

                    <div class="card border-0 bg-light p-4">
                        <i class="ri-time-fill text-primary h2 mb-0"></i>
                        <h5 class="mt-1">Opening Hours</h5>
                        <ul class="list-unstyled mt-2">
                            <li class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Monday - Friday</p>
                                <p class="text-primary mb-0">8.00 - 20.00</p>
                            </li>
                            <li class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Saturday</p>
                                <p class="text-primary mb-0">8.00 - 18.00</p>
                            </li>
                            <li class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Sunday</p>
                                <p class="text-primary mb-0">8.00 - 14.00</p>
                            </li>
                        </ul>
                        <a href="departments.html" class="text-primary">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="position-relative">
                    <img src="{{asset('client/assets/images/about/about-2.png')}}" class="img-fluid" alt="">
                    <div class="play-icon">
                        <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox video-play-icon">
                            <i class="mdi mdi-play text-primary rounded-circle shadow"></i>
                        </a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">About Our Treatments</h4>
                        <p class="text-muted para-desc">Great doctor if you need your family member to get effective immediate assistance, examination, emergency treatment or a simple consultation. Thank you.</p>
                        <p class="text-muted para-desc mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words.</p>
                    </div>

                    <div class="mt-4">
                        <a href="aboutus.html" class="btn btn-primary">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title mb-4 pb-2 text-center">
                    <span class="badge rounded-pill bg-soft-primary mb-3">Departments</span>
                    <h4 class="title mb-4">Our Medical Services</h4>
                    <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-eye-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Eye Care</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-psychotherapy-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Psychotherapy</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-stethoscope-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Primary Care</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-capsule-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Dental Care</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-microscope-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Orthopedic</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-pulse-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Cardiology</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-empathize-fill h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Gynecology</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-md-4 col-12 mt-5">
                <div class="card features feature-primary border-0">
                    <div class="icon text-center rounded-md">
                        <i class="ri-mind-map h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="departments.html" class="title text-dark h5">Neurology</a>
                        <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely to fill a space.</p>
                        <a href="departments.html" class="link">Read More <i class="ri-arrow-right-line align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->



<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4">Doctors</h4>
                    <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team border-0 rounded shadow overflow-hidden">
                    <div class="team-img position-relative">
                        <img src="{{asset('client/assets/images/doctors/01.jpg')}}" class="img-fluid" alt="">
                        <ul class="list-unstyled team-social mb-0">
                            <li><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="facebook" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="linkedin" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="github" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="twitter" class="icons"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body content text-center">
                        <a href="doctor-team-one.html" class="title text-dark h5 d-block mb-0">Calvin Carlo</a>
                        <small class="text-muted speciality">Eye Care</small>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team border-0 rounded shadow overflow-hidden">
                    <div class="team-img position-relative">
                        <img src="{{asset('client/assets/images/doctors/02.jpg')}}" class="img-fluid" alt="">
                        <ul class="list-unstyled team-social mb-0">
                            <li><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="facebook" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="linkedin" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="github" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="twitter" class="icons"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body content text-center">
                        <a href="doctor-team-one.html" class="title text-dark h5 d-block mb-0">Cristino Murphy</a>
                        <small class="text-muted speciality">Gynecology</small>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team border-0 rounded shadow overflow-hidden">
                    <div class="team-img position-relative">
                        <img src="{{asset('client/assets/images/doctors/03.jpg')}}" class="img-fluid" alt="">
                        <ul class="list-unstyled team-social mb-0">
                            <li><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="facebook" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="linkedin" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="github" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="twitter" class="icons"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body content text-center">
                        <a href="doctor-team-one.html" class="title text-dark h5 d-block mb-0">Alia Reddy</a>
                        <small class="text-muted speciality">Psychotherapy</small>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team border-0 rounded shadow overflow-hidden">
                    <div class="team-img position-relative">
                        <img src="{{asset('client/assets/images/doctors/04.jpg')}}" class="img-fluid" alt="">
                        <ul class="list-unstyled team-social mb-0">
                            <li><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="facebook" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="linkedin" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="github" class="icons"></i></a></li>
                            <li class="mt-2"><a href="#" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="twitter" class="icons"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body content text-center">
                        <a href="doctor-team-one.html" class="title text-dark h5 d-block mb-0">Toni Kovar</a>
                        <small class="text-muted speciality">Orthopedic</small>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-12 mt-4 pt-2 text-center">
                <a href="doctor-team-one.html" class="btn btn-primary">See More</a>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative">
                        <img src="{{asset('client/assets/images/bg/01.jpg')}}" class="img-fluid rounded-md shadow-lg" alt="">
                        <div class="play-icon">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox video-play-icon">
                                <i class="mdi mdi-play text-primary rounded-circle bg-white title-bg-dark shadow-lg"></i>
                            </a>
                        </div>
                    </div>

                    <div class="content">
                        <div class="row" id="counter">
                            <div class="col-md-4 mt-4 pt-2">
                                <div class="counter-box text-center">
                                    <h1 class="mt-3 text-white title-dark"><span class="counter-value" data-target="99">10</span>%</h1>
                                    <h5 class="counter-head text-white title-dark mb-1">Positive feedback</h5>
                                    <p class="text-white-50 mb-0">From Doctors</p>
                                </div><!--end counter box-->
                            </div><!--end col-->

                            <div class="col-md-4 mt-4 pt-2">
                                <div class="counter-box text-center">
                                    <h1 class="mt-3 text-white title-dark"><span class="counter-value" data-target="25">2</span>+</h1>
                                    <h5 class="counter-head text-white title-dark mb-1">Experienced Clinics</h5>
                                    <p class="text-white-50 mb-0">High Qualified</p>
                                </div><!--end counter box-->
                            </div><!--end col-->

                            <div class="col-md-4 mt-4 pt-2">
                                <div class="counter-box text-center">
                                    <h1 class="mt-3 text-white title-dark"><span class="counter-value" data-target="1251">95</span>+</h1>
                                    <h5 class="counter-head text-white title-dark mb-1">Questions & Answers</h5>
                                    <p class="text-white-50 mb-0">Your Questions</p>
                                </div><!--end counter box-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row -->
        <div class="feature-posts-placeholder bg-primary"></div>
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4">Patients Says</h4>
                    <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-lg-8 mt-4 pt-2 text-center">
                <div class="client-review-slider">
                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                        <img src="{{asset('client/assets/images/client/01.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                    </div><!--end customer testi-->

                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                        <img src="{{asset('client/assets/images/client/02.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                    </div><!--end customer testi-->

                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                        <img src="{{asset('client/assets/images/client/03.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                    </div><!--end customer testi-->

                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                        <img src="{{asset('client/assets/images/client/04.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                    </div><!--end customer testi-->

                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                        <img src="{{asset('client/assets/images/client/05.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                    </div><!--end customer testi-->

                    <div class="tiny-slide text-center">
                        <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                        <img src="{{asset('client/assets/images/client/06.jpg')}}" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                        </ul>
                        <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                    </div><!--end customer testi-->
                </div><!--end carousel-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <span class="badge rounded-pill bg-soft-primary mb-3">Read News</span>
                    <h4 class="title mb-4">Latest News & Blogs</h4>
                    <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog blog-primary border-0 shadow rounded overflow-hidden">
                    <img src="{{asset('client/assets/images/blog/01.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-2">
                            <li class="list-inline-item text-muted small me-3"><i class="uil uil-calendar-alt text-dark h6 me-1"></i>20th November, 2020</li>
                            <li class="list-inline-item text-muted small"><i class="uil uil-clock text-dark h6 me-1"></i>5 min read</li>
                        </ul>
                        <a href="blog-detail.html" class="text-dark title h5">You can easily connect to doctor and make a treatment</a>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="#" class="text-muted like"><i class="mdi mdi-heart-outline me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted comments"><i class="mdi mdi-comment-outline me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="link">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog blog-primary border-0 shadow rounded overflow-hidden">
                    <img src="{{asset('client/assets/images/blog/02.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-2">
                            <li class="list-inline-item text-muted small me-3"><i class="uil uil-calendar-alt text-dark h6 me-1"></i>20th November, 2020</li>
                            <li class="list-inline-item text-muted small"><i class="uil uil-clock text-dark h6 me-1"></i>5 min read</li>
                        </ul>
                        <a href="blog-detail.html" class="text-dark title h5">Lockdowns lead to fewer people seeking medical care</a>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="#" class="text-muted like"><i class="mdi mdi-heart-outline me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted comments"><i class="mdi mdi-comment-outline me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="link">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog blog-primary border-0 shadow rounded overflow-hidden">
                    <img src="{{asset('client/assets/images/blog/03.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-2">
                            <li class="list-inline-item text-muted small me-3"><i class="uil uil-calendar-alt text-dark h6 me-1"></i>20th November, 2020</li>
                            <li class="list-inline-item text-muted small"><i class="uil uil-clock text-dark h6 me-1"></i>5 min read</li>
                        </ul>
                        <a href="blog-detail.html" class="text-dark title h5">Emergency medicine research course for the doctors</a>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="#" class="text-muted like"><i class="mdi mdi-heart-outline me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted comments"><i class="mdi mdi-comment-outline me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="link">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Partners start -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/amazon.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/google.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/lenovo.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/paypal.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/shopify.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->

            <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                <img src="{{asset('client/assets/images/client/spotify.png')}}" class="avatar avatar-client" alt="">
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Partners End -->

@endsection
