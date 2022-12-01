@extends('admin.common.master')
@section('content')



    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title"> category</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->

        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-sm form-group">
                        <label>Identifier:</label>
                        <input class="form-control form-control-solid" id="theNameEn" name="theNameEn"
                               placeholder="Enter name En"

                               required/>
                        <span class="form-text text-muted">Please enter your full title turkish</span>
                        @if ($errors->has('theNameEn'))
                            <p class="text-danger">{{ $errors->first('theNameEn') }}</p>
                        @endif
                    </div>
                    <div class="col-sm form-group">
                        <label>name TR:</label>
                        <input class="form-control form-control-solid" id="theNameTr" name="theNameTr"
                               placeholder="Enter name TR"

                               required/>
                        <span class="form-text text-muted">Please enter your full title english</span>
                        @if ($errors->has('theNameTr'))
                            <p class="text-danger">{{ $errors->first('theNameTr') }}</p>
                        @endif
                    </div>
                </div>

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    <script>

    </script>

@endsection
