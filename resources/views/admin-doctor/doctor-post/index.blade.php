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
                @if(isset($exist))
                @else
                    <a href="{{asset('admin-doctor/doctor-post/create')}}" class="btn btn-primary font-weight-bolder ">

                        <i class="la la-plus"></i>New Record</a>
                    @endif
            </div>

        </div>

        <div class="card-body theDataTable">

            <!--begin: Datatable-->

            <table  class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead class="cf">
                <tr>
                    <th>Image </th>
                    <th>title En </th>

                    <th>Status</th>
                    <th>Action</th>


                </tr>

                </thead>
                <tbody>
                @foreach( $doctor as $item)
                    <tr>

                        <td> <img src="{{asset('images')}}/{{ $item->thePhoto}}" width="80"></td>
                        <td>{{$item->theTitleEn}}</td>
                        @if($item->isActive == 0)
                            <td  class="text-danger">Not active yet</td>
                        @else
                            <td class="text-success" >is active </td>
                        @endif

                        <td>
                            <div class='d-inline mr-4'><a class='btn btn-light-primary font-weight-bold' href='{{route('doctor-post.edit',$item->id)}}'><i class='flaticon2-pen text-info'></i></a></div>

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
