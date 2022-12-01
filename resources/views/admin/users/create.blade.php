
@extends('admin.common.master')
@section('content')



    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">create about us</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="card-body">

                                  
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    <span class="form-text text-muted">Please enter your full title english</span>
                </div>
                <div class="form-group">
                    <label>the Title Tr:</label>
                    <input  class="form-control form-control-solid" id="input2" name="theTitleTr" placeholder="Enter Title"

                            required/>
                    <span class="form-text text-muted">Please enter your full title turkish</span>
                </div>
                <div class="form-group">
                    <label>the Title Ar:</label>
                    <input  class="form-control form-control-solid" id="input2" name="theTitleAr" placeholder="Enter Title"

                            required/>
                    <span class="form-text text-muted">Please enter your full title arabic</span>
                </div>
                <div class="form-group">
                    <label>Alt:</label>
                    <input  class="form-control form-control-solid" id="alt" name="alt" placeholder="Enter alt"

                            required/>
                    <span class="form-text text-muted">Please enter your full title english</span>
                </div>

                <div class="form-group">
                    <label>the text En:</label>
                    <textarea  class="form-control form-control-solid" id="theTextEn" name="theTextEn" placeholder="Enter text"
                               ></textarea>

                </div>
                <div class="form-group">
                    <label>the text Tr:</label>
                    <textarea  class="form-control form-control-solid" id="theTextTr" name="theTextTr" placeholder="Enter text"
                               ></textarea>

                </div>
                <div class="form-group">
                    <label>the text Ar:</label>

                    <textarea  class="form-control form-control-solid" id="theTextAr" name="theTextAr" placeholder="Enter text"
                               ></textarea>

                </div>


            </div>
            <div class="form-group">

                <h2 class="titleSelectPhoto"> the photo </h2>
                <div class="col-md-12">
                    <div class="col-md-9">
                        <input type="text" type="hidden" name="file" id="fieldID" class="form-control"
                               value="" placeholder="URL" required>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:open_popup('/public/lib/responsivefilemanager/filemanager/dialog.php?type=1&popup=1&multiple=0&field_id=fieldID')"
                           class="btn btn-primary" type="button">
                            select photo...(W:800px - H:425px)
                        </a>
                    </div>

                </div>
                <br>
            </div>
            <script type="text/javascript">
                function open_popup(url) {
                    var w = 880;
                    var h = 570;
                    var l = Math.floor((screen.width - w) / 2);
                    var t = Math.floor((screen.height - h) / 2);
                    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
                }

            </script>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    <script>
        ClassicEditor
            .create( document.querySelector( '#theTextEn' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#theTextTr' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#theTextAr' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
