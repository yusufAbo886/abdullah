@extends('admin-hospital.common.master')
@section('content')
    {{--    PHOTO UPLOAD--}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    {{--    PHOTO UPLOAD--}}
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">edit Post</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{route('hospital-post.update',[$hospital->id])}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="card-body">
                <div class="row">
                    <div class="col-6 form-group category">
                    <label for="cars">Choose a category:</label>
                    <select  class="form-control form-control-solid" name="category_id" id="categoryId" required>

                        <?php foreach ($category as $key => $value){ ?>
                            <option @if($value->id == $hospital->category_id)  selected @endif value="{{$value->id}}">{{$value->theNameEn}}</option>

                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-6 form-group ">
                        <label for="cars">Choose a clinic:</label>

                        <select  class="form-control form-control-solid" name="subcategory"  required>
                            <?php foreach ($subcategory as $key => $t){ ?>
                            <option @if($t->id == $hospital->subCategory_id) selected @endif
                            value="{{$t->id}}">{{$t->theNameEn}}
                               </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="col-6 form-group">

                        <label>title En:</label>
                        <input class="form-control form-control-solid" id="theTitleEn" name="theTitleEn"
                               placeholder="Enter title En"
                               value="{{$hospital->theTitleEn}}"
                               required/>
                        @if ($errors->has('theTitleEn'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                        <label>title TR:</label>
                        <input class="form-control form-control-solid" id="theTitleTr" name="theTitleTr"
                               placeholder="Enter title TR"
                               value="{{$hospital->theTitleTr}}"
                               required/>
                        @if ($errors->has('theTitleTr'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>

                    <div class="col-6 form-group">
                        <label>Url:</label>
                        <input class="form-control form-control-solid" id="url" name="url"
                               placeholder="Enter url"
                               value="{{$hospital->url}}"
                               required/>
                        <span class="form-text text-muted">Please enter your full title english</span>
                        @if ($errors->has('url'))
                            <p class="text-danger">url should be unique</p>
                        @endif
                    </div>
                    <div class="col-6 form-group">
                        <label>Location :</label>
                        <input class="form-control form-control-solid" id="theLocation" name="theLocation"
                               placeholder="Enter title TR"
                               value="{{$hospital->theLocation}}"
                               required/>
                        @if ($errors->has('theLocation'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>Phone :</label>
                        <input class="form-control form-control-solid" id="thePhone" name="thePhone"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->thePhone}}"
                               required/>
                        @if ($errors->has('thePhone'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>Email :</label>
                        <input class="form-control form-control-solid" id="theEmail" name="theEmail"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->theEmail}}"
                               required/>
                        @if ($errors->has('theEmail'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>Website :</label>
                        <input class="form-control form-control-solid" id="theWebsite" name="theWebsite"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->theWebsite}}"
                               />
                        @if ($errors->has('theWebsite'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>facebook :</label>
                        <input class="form-control form-control-solid" id="facebook" name="facebook"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->facebook}}"
                               required/>
                        @if ($errors->has('facebook'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>instegram :</label>
                        <input class="form-control form-control-solid" id="instegram" name="instegram"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->instegram}}"
                               required/>
                        @if ($errors->has('instegram'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label>Twiter :</label>
                        <input class="form-control form-control-solid" id="twiter" name="twiter"
                               placeholder="Enter Phone TR"
                               value="{{$hospital->twiter}}"
                               required/>
                        @if ($errors->has('twiter'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <label>Map :</label>
                        <input class="form-control form-control-solid" id="map" name="map"
                               placeholder="Enter map TR"
                               value="{{$hospital->map}}"
                               required/>
                        @if ($errors->has('map'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>





                    <div class="col-12 form-group">
                        <label>Text En:</label>

                        <textarea class="form-control" id="theTextEn" name="theTextEn">{{$hospital->theTextEn}}</textarea>
                        @if ($errors->has('theTextEn'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <label>Text Tr:</label>
                        <textarea class="form-control" id="theTextTr" name="theTextTr">{{$hospital->theTextTr}}</textarea>
                        @if ($errors->has('theTextTr'))
                            <p class="text-danger">required</p>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <input type="file" name="avatar" id="avatar" />
                    </div>
                    <img src="{{asset('images')}}/{{ $hospital->thePhoto}}" width="80">

                </div>





                <br>

                <br>
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
        // var pages = document.getElementById("pages");
        // var homeBackground = document.getElementById("blog");
        // // pages.classList.add("menu-item-open");
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
                        $('select[name="subcategory"]').append('<option value="'+parseInt(key)+'"> '+value+' </option>')
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
