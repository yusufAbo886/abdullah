@extends('common.master')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Doctors</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Doctors</h2>
            </div>
        </div>
    </section>

    <!-- START SECTION AGENTS -->
    <section class="team blog">
        <div class="container">

            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 col-md-12 blog-pots">
            <div class="row team-all padding">
                @foreach($doctor as $item)
                <div class="col-lg-4 col-md-6 team-pro hover-effect">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{asset('images')}}/{{ $item->thePhoto}}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>{{ $item->theTitle}}</h3>
                                <p>Doctor</p>
                                <div class="team-socials">
                                    <ul>
                                        <li>
                                            <a href="{{$item->thePhone}}" title="call doctor"><i class="fa fa-phone-alt" aria-hidden="true"></i></a>
                                            <a href="{{$item->url}}" title="see details"><i class="far fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{$item->theEmail}}" title="ask question"><i class="fa fas fa-mail-bulk" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <span><a href="{{$item->url}}">View Profile</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            </div>

                    <aside class="col-lg-3 col-md-12">
                        <div class="widget">
                            <div class="section-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fas fa-comment-medical"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5>Search Properties</h5>
                                        <div class="border"></div>
                                        <p>Search your Properties</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Fields -->
                            <div class="main-search-field">
                                <h5 class="title">Filter</h5>
                                <form method="GET">
                                    <div class="at-col-default-mar">
                                        <select>
                                            <option value="0" selected>city</option>
                                            <option value="1">New York</option>
                                            <option value="2">Los Angeles</option>
                                            <option value="3">Chicago</option>
                                            <option value="4">Philadelphia</option>
                                            <option value="5">San Francisco</option>
                                        </select>
                                    </div>
                                    <div class="at-col-default-mar">
                                        <select class="div-toggle" data-target=".my-info-1">
                                            <option value="0" data-show=".acitveon" selected>Area</option>
                                            <option value="1" data-show=".sale">For Sale</option>
                                            <option value="2" data-show=".rent">For Rent</option>
                                            <option value="3" data-show=".rent">Sold</option>
                                        </select>
                                    </div>



                                </form>
                            </div>
                            <!-- Price Fields -->

                            <div class="col-lg-12 no-pds">
                                <div class="at-col-default-mar">
                                    <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="faq service-details">
                            <div class="container">
                                <h4 class="mb-5">Branşlar</h4>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 service-info">
                                        <article class="faq">
                                            <div id="accordion" role="tablist" aria-multiselectable="true">

                                                    <div class="panel panel-default">
                                                        <h4 class="panel-heading">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tab-"></a>
                                                        </h4>
                                                        <div id="tab-" class="panel-collapse collapse">

                                                        </div>
                                                    </div>

                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->




























@endsection
