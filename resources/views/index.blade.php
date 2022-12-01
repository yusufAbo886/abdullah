@extends('common.master')
@section('content')


    <section class="header-map google-maps" style="
        background: -webkit-linear-gradient(rgba(32, 51, 100, 0.8), rgba(32, 51, 100, 0.8)), url({{asset('asset/images/loks.jpg')}}) no-repeat center center;
         background: linear-gradient(rgba(32, 51, 100, 0.8), rgba(32, 51, 100, 0.8)), url({{asset('asset/images/loks.jpg')}}) no-repeat center center;
        height: 70vh;
        ">

        <div id="" class="background"  ></div>

        <div class="container">
            <div class="filter">
                <div class="filter-toggle hidden-md-up"><i class="fa fa-search"></i>
                    <h6>START SEARCHING</h6></div>
                <form method="get">
                    <div class="filter-item">
                        <label>Property Status</label>
                        <select name="property-status">
                            <option value="">Any Status</option>
                            <option value="for-sale">For Sale</option>
                            <option value="for-rent">For Rent</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label>Property Type</label>
                        <select name="property-type">
                            <option value="">Any Type</option>
                            <option value="family-house">Family House</option>
                            <option value="apartment">Apartment</option>
                            <option value="condo">Condo</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label>Location</label>
                        <select name="property-type">
                            <option value="">Any Location</option>
                            <option value="family-house">New York</option>
                            <option value="apartment">Los Angeles</option>
                            <option value="condo">Chicago</option>
                            <option value="condo">Philadelphia</option>
                            <option value="condo">San Francisco</option>
                        </select>
                    </div>




                    <div class="filter-item">
                        <label class="label-submit">Submit</label>
                        <br/>
                        <input type="submit" class="button alt" value="SEARCH PROPERTY" />
                    </div>
                </form>
            </div>
        </div>
    </section>




    <!-- START SECTION SERVICES -->
    <main class="services-2">
        <div class="container">
            <div class="section-title">
                <h3>Our</h3>
                <h2>Category</h2>
            </div>
            <div class="row service-1">
                <article class="col-md-4 serv" style="margin-bottom: 10px">
                    <div class="art-1 img-1">
                        <img src="{{asset('asset/images/35.png')}}" width="52" alt="">
                        <h3>{{$category[0]->theName}}</h3>
                    </div>
                </article>

                <article class="col-md-4 serv">
                    <div class="art-1 img-2">
                        <img src="{{asset('asset/images/34.png')}}" width="52" alt="">
                        <h3>{{$category[1]->theName}}</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-3">
                        <img src="{{asset('asset/images/32.png')}}" width="52" alt="">
                        <h3>{{$category[2]->theName}}</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-3">
                        <img src="{{asset('asset/images/33.png')}}" width="52" alt="">
                        <h3>{{$category[3]->theName}}</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-3">
                        <img src="{{asset('asset/images/38.png')}}" width="52" alt="">
                        <h3>{{$category[4]->theName}}</h3>
                    </div>
                </article>
                <article class="col-md-4 serv">
                    <div class="art-1 img-3">
                        <img src="{{asset('asset/images/37.png')}}" width="52" alt="">
                        <h3>{{$category[5]->theName}}</h3>
                    </div>
                </article>
            </div>
        </div>
    </main>
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h3>En Son r</h3>
                <h2>Eklenenle</h2>
            </div>
            <div class="owl-carousel style1 ">
                @foreach($hospital as $item)
                <div class="item col-xs-12 people landscapes no-pb">
                    <div class="homes no-mb">
                        <!-- homes img -->
                        <a href="{{$item->url}}" class="homes-img added-effect">
                            <div class="homes-tag button alt featured"><i class="fas fa-check"></i> </div>
                            <div class="homes-tag button sale rent">Ready</div>
                            <img src="{{asset('images')}}/{{ $item->thePhoto}}" style="height: 250px" alt="home-1" class="img-responsive">
                        </a>
                        <!-- homes content -->
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3 class="homes-address mb-3">
                                <a href="properties-details.html">
                                    <span>{{$item->theTitle}}</span>{{$item->url}}
                                </a>
                            </h3>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{$item->theLocation}}</span>
                                </li>

                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <ul class="homes-list clearfix">
{{--                                    <li >--}}
{{--                                        <i class="far fa-eye"></i>--}}
{{--                                        <span>website</span>--}}
{{--                                    </li>--}}
                                    <li style="float: right; " >
                                        <i class="far fa-eye"></i>
                                        <span> Call me</span>
                                    </li>


                                </ul>
                                <hr>
                                <div class="compare">

                                    <ul class="homes-list clearfix">
                                        <li >
                                            <i class="fas fa-mail-bulk"></i>
                                            <span>Mail me</span>
                                        </li>
                                        <li style="float: right; " >
                                            <i class="fas fa-phone-alt"></i>
                                            <span> Call me</span>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach





            </div>
        </div>
    </section>

    <!-- START SECTION BLOG -->
    <section class="blog" >
        <div class="container">
            <div class="row">
                @foreach($blog as $item)
                <div class="col-lg-4 col-md-6 blog-pots hover-effect">
                    <div class="single-blog-post">
                        <div class="blog-list img-box">

                            <img src="{{$item->thePhoto}}" style="height: 250px" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-info">
                            <a href="blog-details.html"><h3 class="mb-2">{{$item->theTitle}}</h3></a>
                            <p>{!! substr_replace($item->theText, "...", 190) !!}</p>
                            <a href="{{$item->url}}" class="btn btn-secondary">Read More...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
    </section>
    <!-- END SECTION BLOG -->
    <!-- START SECTION COUNTER UP -->
    <section class="counterup">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa far fa-smile-beam" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">300</p>
                            <h3>Sold Houses</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr">
                        <i class="fa fas fa-globe" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">400</p>
                            <h3>Daily Listings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">250</p>
                            <h3>Expert Agents</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="countr mb-0 last">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <div class="count-me">
                            <p class="counter text-left">200</p>
                            <h3>Won Awars</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COUNTER UP -->
    <!-- STAR SECTION PARTNERS -->
    <div class="partners">
        <div class="container">
            <div class="section-title">
                <h3>Our</h3>
                <h2>Partners</h2>
            </div>
            <div class="owl-carousel style2">
                <div class="owl-item"><img src="{{asset('asset/images/partners/1.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/2.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/3.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/4.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/5.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/6.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/7.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/8.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/9.png')}}" alt=""></div>
                <div class="owl-item"><img src="{{asset('asset/images/partners/10.png')}}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- END SECTION PARTNERS -->















@endsection
