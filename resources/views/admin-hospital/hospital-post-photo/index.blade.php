@extends('admin-hospital.common.master')

@section('content')

    <div class="card card-custom">

        <div class="card-header">

            <div class="card-title">

                    <span class="card-icon">



                    </span>

                <div class="card-toolbar">

                    <a href="{{asset('admin-hospital/hospital-post')}}" class="btn btn-primary font-weight-bolder">

                      Back
                    </a>
                </div>

            </div>
            <div class="card-toolbar">

                <a href="{{asset('admin-hospital/hospital-post-photos/create/'.$param)}}" class="btn btn-primary font-weight-bolder">

                    <i class="la la-plus"></i>New Record</a>
            </div>


        </div>

        <div class="card-body theDataTable">

            <!--begin: Datatable-->

            <table  class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead class="cf">
                <tr>
                    <th>image</th>
                    <th>Action</th>


                </tr>

                </thead>
                <tbody>
                @foreach( $photo as $item)
                    <tr>
                        <td> <img src="{{asset('images')}}/{{ $item->thePhoto}}" width="80"></td>
                        <td>
                            <button  class="btn btn-light-primary font-weight-bold delete" url="{{route('hospital-post-photos.destroy',$item->id)}}" id="{{ $item->id }}" content="{{csrf_token()}}"><i class='glyphicon glyphicon-trash text-danger'></i></button>
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
