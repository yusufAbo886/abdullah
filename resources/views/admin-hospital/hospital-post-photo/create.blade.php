@extends('admin-hospital.common.master')
@section('content')
    {{--    PHOTO UPLOAD--}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    {{--    PHOTO UPLOAD--}}
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Post</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->

        <form method="post" action="{{route('hospital-post-photos.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <input  type="hidden" id="post" name="post_id" value="{{$param}}"/>
                    <div class="col-12 form-group">
                        <input type="file" name="avatar" id="avatar" required/>
                    </div>





                </div>

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
                <a href="{{asset('admin-hospital/hospital-post')}}" class="btn btn-primary font-weight-bolder"> Back </a>
            </div>
        </form>


    </div>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        CKEDITOR.replace( 'theTextEn' );
        CKEDITOR.replace( 'theTextTr' );
        // var pages = document.getElementById("category");
        // var homeBackground = document.getElementById("subcategory");
        // pages.classList.add("menu-item-open");
        // homeBackground.classList.add("menu-item-active");

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="avatar"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: 'http://127.0.0.1:8000/',
                process: {
                    url: 'upload',
                    method: 'POST',
                    withCredentials: false,
                    headers: { 'X-CSRF-TOKEN':'{{csrf_token()}}'},
                    timeout: 7000,
                    onload: null,
                    onerror: null,
                    ondata: null,

                },
                revert: {
                    url: 'upload-delete',
                    headers: { 'X-CSRF-TOKEN':'{{csrf_token()}}'},
                    timeout: 7000,
                },


            }
        });
    </script>

@endsection
