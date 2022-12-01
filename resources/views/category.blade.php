@extends('common.master')
@section('content')

    <!-- START SECTION AGENTS -->
    <section class="properties-right featured blog">
        <div class="container-fluid">

            <div class="row">
                <div class="d-flex justify-content-center">
            <div class="col-lg-8 col-md-12 blog-pots">
            <div class="row">

                @foreach($post as $item)

                        <div class="col-lg-12 col-md-12 agent-mb">
                            <div class="agent agent-row shadow-hover">
                                <a href="{{$item->url}}" class="agent-img">
                                    <div class="img-fade"></div>
                                    <div class="button alt agent-tag">60 Properties</div>
                                    <img src="{{asset('images')}}/{{ $item->thePhoto}}" style="min-height:285px" alt="" />
                                </a>
                                <div class="agent-content">
                                    <div class="agent-details">
                                        <h4><a href="agent-details.html"></a>{{ $item->theTitle}}</h4>
                                        <p><i class="fa fa-tag icon"></i>{{ $item->theWebsite}}</p>
                                        <p><i class="fa fa-envelope icon"></i>{{ $item->theEmail}}</p>
                                        <p><i class="fa fa-phone icon"></i>{{$item->thePhone}}</p>
                                    </div>
                                    <div class="agent-text">
                                        {!! substr_replace($item->theText, "...", 250) !!}
                                    </div>
                                    <div class="agent-footer center">

                                        <ul class="netsocials">
                                            <li><a href="{{$item->facebook}}"><i class="fab fa-facebook-f " aria-hidden="true"></i></a></li>
                                            <li><a href="{{$item->twiter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="{{$item->facebook}}"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                                            <li><a href="{{$item->instegram}}"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                                        <div class="clear"></div>
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
                                <i class="fa fa-home"></i>
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
                                        @foreach($category as $key =>$catey)
                                        <div class="panel panel-default">
                                            <h4 class="panel-heading">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tab-{{$key}}">{{$catey->theNameEn}}</a>
                                            </h4>
                                            <div id="tab-{{$key}}" class="panel-collapse collapse">
                                                @foreach( $catey->subcategory as $subcategory)
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="{{$subcategory->id}}"> <lable>{{$subcategory->theNameEn}}</lable><br>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            </div>
            </div>
            <!-- end row -->
            <nav aria-label="..." class="pt-3">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- END SECTION AGENTS -->




























@endsection
