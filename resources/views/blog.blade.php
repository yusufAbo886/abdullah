@extends('common.master')
@section('content')
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Blogs</h1>
                <h2><a href="index.html">Home </a> &nbsp;/&nbsp; Blog</h2>
            </div>
        </div>
    </section>


    <section class="blog">
        <div class="container">
            <div class="row">
                @foreach($blog as $item)
                <div class="col-lg-4 col-md-6 blog-pots hover-effect mb-5">
                    <div class="single-blog-post">
                        <div class="blog-list img-box">
                            <img src="{{$item->thePhoto}}" style="height: 250px" alt="">
                            <div class="social">
                                <span class="date">11<span>Apr</span></span>
                                <a href="#"><i class="fa fa-user-o"></i><span>Admin</span></a>
                                <a href="#"><i class="fa fa-eye"></i><span>9243</span></a>
                                <a href="#"><i class="fa fa-comments"></i><span>69</span></a>
                            </div>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a  href="{{$item->url}}"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-info">
                            <a  href="{{$item->url}}"><h3 class="mb-2">{{ $item->theTitle}}</h3></a>
                            {!! substr_replace($item->theText, "...", 222) !!}<br>
                            <a href="{{$item->url}}" class="btn btn-secondary">Read More...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <nav aria-label="..." class="pt-5">
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



























@endsection
