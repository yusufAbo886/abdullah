@extends('admin-hospital.common.master')

@section('content')

    <div class="card card-custom">

        <div class="card-header">

            <div class="card-title">

                    <span class="card-icon">

                      <i class="flaticon2-heart-rate-monitor text-primary"></i>

                    </span>

                <h3 class="card-label">post</h3>

            </div>
            <div class="card-toolbar">

                <a href="{{asset('admin-hospital/hospital-post/create')}}" class="btn btn-primary font-weight-bolder">

                    <i class="la la-plus"></i>New Record</a>
            </div>

        </div>

        <div class="card-body theDataTable">

            <!--begin: Datatable-->

            <table  class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead class="cf">
                <tr>
                    <th>Image </th>
                    <th>title En </th>
                    <th>category</th>
                    <th>subcategory</th>
                    <th>Status</th>
                    <th>add Photo</th>
                    <th>Action</th>


                </tr>

                </thead>
                <tbody>
                @foreach( $hospital as $item)
                    <tr>

                        <td> <img src="{{asset('images')}}/{{ $item->thePhoto}}" width="80"></td>
                        <td>{{$item->theTitleEn}}</td>
                        <td>{{$item->category->theNameEn}}</td>
                        <td>{{$item->subcategory->theNameEn}}</td>
                        @if($item->isActive == 0)
                            <td  class="text-danger">Not active yet</td>
                        @else
                            <td class="text-success" >is active </td>
                            @endif

                        <td><a href="{{asset('admin-hospital/hospital-post-photos/'.$item->id)}}"  class="btn btn-dark photo">add Photo</a></td>
                        <td style="width:132px;">
                            <div class='d-inline mr-4'><a class='btn btn-light-primary font-weight-bold' href='{{route('hospital-post.edit',$item->id)}}'><i class='flaticon2-pen text-info'></i></a></div>
                            @if(isset($item->photos_exist))
                            @else
                                <button  class="btn btn-light-primary font-weight-bold delete" url="{{route('hospital-post.destroy',$item->id)}}" id="{{ $item->id }}" content="{{csrf_token()}}"><i class='glyphicon glyphicon-trash text-danger'></i></button>

                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // var pages = document.getElementById("category");
        // var homeBackground = document.getElementById("subcategory");
        // pages.classList.add("menu-item-open");
        // homeBackground.classList.add("menu-item-active");
    </script>



@endsection
