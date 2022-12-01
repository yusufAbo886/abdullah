@extends('admin.common.master')

@section('content')

    <div class="card card-custom">

        <div class="card-header">

            <div class="card-title">

                    <span class="card-icon">

                      <i class="flaticon2-heart-rate-monitor text-primary"></i>

                    </span>

                <h3 class="card-label">subcategory</h3>

            </div>
            <div class="card-toolbar">

                <a href="{{asset('admin/subcategory/create')}}" class="btn btn-primary font-weight-bolder">

                    <i class="la la-plus"></i>New Record</a>
            </div>

        </div>

        <div class="card-body theDataTable">

            <!--begin: Datatable-->

            <table  class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead class="cf">
                <tr>
                    <th>name En </th>
                    <th>name Tr</th>
                    <th>category</th>
                    <th>Action</th>


                </tr>

                </thead>
                <tbody>
                @foreach( $subcategory as $item)
                    <tr>

                        <td>{{$item->theNameEn}}</td>
                        <td>{{$item->theNameTr}}</td>
                        <td>{{$item->category->theNameEn}}</td>

                        <td>
                            <div class='d-inline mr-4'><a class='btn btn-light-primary font-weight-bold' href='{{route('subcategory.edit',$item->id)}}'><i class='flaticon2-pen text-info'></i></a></div>
                            <button  class="btn btn-light-primary font-weight-bold delete" url="{{route('subcategory.destroy',$item->id)}}" id="{{ $item->id }}" content="{{csrf_token()}}"><i class='glyphicon glyphicon-trash text-danger'></i></button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var pages = document.getElementById("category");
        var homeBackground = document.getElementById("subcategory");
        pages.classList.add("menu-item-open");
        homeBackground.classList.add("menu-item-active");
    </script>



@endsection
