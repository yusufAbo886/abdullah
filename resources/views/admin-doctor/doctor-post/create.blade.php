@extends('admin-doctor.common.master')
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

        <form method="post" action="{{route('doctor-post.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-6 form-group">
                        <label>title En:</label>
                        <input class="form-control form-control-solid" id="theTitleEn" name="theTitleEn"
                               placeholder="Enter title En"
                               required/>
                        @if ($errors->has('theTitleEn'))
                            <p class="text-danger">{{ $errors->first('theTitleEn') }}</p>
                        @endif
                    </div>

                    <div class="col-6 form-group">
                        <label>title TR:</label>
                        <input class="form-control form-control-solid" id="theTitleTr" name="theTitleTr"
                               placeholder="Enter title TR"
                               required/>
                        @if ($errors->has('theTitleTr'))
                            <p class="text-danger">{{ $errors->first('theTitleTr') }}</p>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                        <label>url:</label>
                        <input class="form-control form-control-solid" id="url" name="url"
                               placeholder="Enter url"
                               required/>
                        @if ($errors->has('url'))
                            <p class="text-danger">url should be unique</p>
                        @endif

                    </div>
                    <div class="col-6 form-group">
                        <label>Location:</label>
                        <input class="form-control form-control-solid" id="theLocation" name="theLocation"
                               placeholder="Enter Location"
                               required/>
                        @if ($errors->has('theLocation'))
                            <p class="text-danger">{{ $errors->first('theLocation') }}</p>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label>Phone:</label>
                        <input class="form-control form-control-solid" id="thePhone" name="thePhone"
                               placeholder="Enter Phone"
                               required/>
                        @if ($errors->has('thePhone'))
                            <p class="text-danger">{{ $errors->first('thePhone') }}</p>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label>Email:</label>
                        <input class="form-control form-control-solid" id="theEmail" name="theEmail"
                               placeholder="Enter Phone"
                               required/>
                        @if ($errors->has('theEmail'))
                            <p class="text-danger">{{ $errors->first('theEmail') }}</p>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label>Website:</label>
                        <input class="form-control form-control-solid" id="theWebsite" name="theWebsite"
                               placeholder="Enter Phone"
                        />
                    </div>
                    <div class="col-4 form-group">
                        <label>facebook:</label>
                        <input class="form-control form-control-solid" id="facebook" name="facebook"
                               placeholder="Enter facebook"
                               required/>
                        @if ($errors->has('facebook'))
                            <p class="text-danger">{{ $errors->first('facebook') }}</p>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label>instegram:</label>
                        <input class="form-control form-control-solid" id="instegram" name="instegram"
                               placeholder="Enter instegram"
                               required/>
                        @if ($errors->has('instegram'))
                            <p class="text-danger">{{ $errors->first('instegram') }}</p>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label>twiter:</label>
                        <input class="form-control form-control-solid" id="twiter" name="twiter"
                               placeholder="Enter twiter"
                               required/>
                        @if ($errors->has('twiter'))
                            <p class="text-danger">{{ $errors->first('twiter') }}</p>
                        @endif

                    </div>
                    <div class="col-12 form-group">
                        <label>map:</label>
                        <input class="form-control form-control-solid" id="map" name="map"
                               placeholder="Enter map"
                               required/>
                        @if ($errors->has('map'))
                            <p class="text-danger">{{ $errors->first('map') }}</p>
                        @endif

                    </div>
                    <div class="col-12 form-group">
                        <label>Text En:</label>
                        <textarea class="form-control" id="theTextEn" name="theTextEn"></textarea>
                        @if ($errors->has('theTextEn'))
                            <p class="text-danger">{{ $errors->first('theTextEn') }}</p>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <label>Text Tr:</label>
                        <textarea class="form-control" id="theTextTr" name="theTextTr"></textarea>
                        @if ($errors->has('theTextTr'))
                            <p class="text-danger">{{ $errors->first('theTextTr') }}</p>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <input type="file" name="avatar" id="avatar" required/>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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



        $(document).on('change', '.category', function () {
            var id = $('#categoryId').val();
            var token = '{{csrf_token()}}';
            $.ajax({
                type: 'GET',
                url:  '{{route('hospital-post.show',1)}}',
                data: {
                    "_token": token,
                    id: id,
                },
                success: function (data) {
                    $('select[name="subcategory"]').empty();
                    $.each(data,function (key,value){
                        $('select[name="subcategory"]').append('<option value="'+key+'"> '+value+' </option>')
                    })
                }
            });
        });

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
