@extends('admin.common.master')
@section('content')



    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">edit category</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{route('category.update',[$category->id])}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="card-body">
                <div class="row">
                <div class="col-sm form-group">
                    <label>name En:</label>
                    <input class="form-control form-control-solid" id="theNameEn" name="theNameEn"
                           placeholder="Enter name En"
                           value="{{$category->theNameEn}}"
                           required/>
                    <span class="form-text text-muted">Please enter your full title turkish</span>
                </div>
                <div class="col-sm form-group">
                    <label>name TR:</label>
                    <input class="form-control form-control-solid" id="theNameTr" name="theNameTr"
                           placeholder="Enter name TR"
                           value="{{$category->theNameTr}}"
                           required/>
                    <span class="form-text text-muted">Please enter your full title english</span>
                </div>
                </div>


            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



    <script>


        var pages = document.getElementById("category");
        var homeBackground = document.getElementById("categories");
        pages.classList.add("menu-item-open");
        homeBackground.classList.add("menu-item-active");

    </script>
@endsection
