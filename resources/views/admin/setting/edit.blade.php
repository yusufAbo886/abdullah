
@extends('admin.common.master')
@section('content')



    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">create cart</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{route('admin.setting.update',[$setting->id])}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="card-body">

                <div class="form-group">
                    <label>Title :</label>
                    <input  class="form-control form-control-solid" id="input2" name="theTitle" placeholder="Enter Title"
                            value="{{$setting->theTitle}}"
                            required/>
                    <span class="form-text text-muted">Please enter your full title </span>
                </div>

                <div class="form-group">
                    <label>description :</label>
                    <textarea  class="form-control form-control-solid" id="theText" name="theText" placeholder="Enter text"
                    >{{$setting->theText}}</textarea>

                </div>
                <div class="form-group">
                    <label>abstract:</label>
                    <input  class="form-control form-control-solid" id="input2" name="abstract" placeholder="Enter abstract"
                            value="{{$setting->abstract}}"
                            required/>
                    <span class="form-text text-muted">Please enter your full abstract</span>
                </div>



                <div class="form-group">
                    <label>keywords :</label>
                    <input  class="form-control form-control-solid" id="input2" name="keywords" placeholder="Enter address"
                            value="{{$setting->keywords}}"
                            required/>
                    <span class="form-text text-muted">Please enter your full keywords</span>
                </div>

                <div class="form-group">
                    <label>telefon 1:</label>
                    <input  type="number" class="form-control form-control-solid" id="input2" name="telefon1" value="{{$setting->telefon1}}"placeholder="Enter  telefon 1" required/>
                    <span class="form-text text-muted">Please enter your full telefon</span>
                </div>
                <div class="form-group">
                    <label>telefon 2:</label>
                    <input  type="number" class="form-control form-control-solid" id="input2" name="telefon2" value="{{$setting->telefon2}}"placeholder="Enter telefon 2" required/>
                    <span class="form-text text-muted">Please enter your full telefon</span>
                </div>
                <div class="form-group">
                    <label>email:</label>
                    <input type="email" class="form-control form-control-solid" id="input2" name="email" value="{{$setting->email}}"placeholder="Enter Email" required/>
                    <span class="form-text text-muted">Please enter your full email</span>
                </div>
                <div class="form-group">
                    <label>facebook:</label>
                    <input  class="form-control form-control-solid" id="input2" name="facebook" value="{{$setting->facebook}}"placeholder="Enter facebook" required/>
                    <span class="form-text text-muted">Please enter your full facebook</span>
                </div>
                <div class="form-group">
                    <label>youtube:</label>
                    <input  class="form-control form-control-solid" id="input2" name="youtube" value="{{$setting->youtube}}"placeholder="Enter youtube" required/>
                    <span class="form-text text-muted">Please enter your full youtube</span>
                </div>

                <div class="form-group">
                    <label>linkdin:</label>
                    <input  class="form-control form-control-solid" id="linkdin" name="linkdin" value="{{$setting->linkdin}}"placeholder="Enter linkdin" required/>
                    <span class="form-text text-muted">Please enter your full linkdin</span>
                </div>
                <div class="form-group">
                    <label>instegram:</label>
                    <input  class="form-control form-control-solid" id="instegram" name="instegram" value="{{$setting->instegram}}"placeholder="Enter instegram" required/>
                    <span class="form-text text-muted">Please enter your full instegram</span>
                </div>
                <div class="form-group">
                    <label>twiter:</label>
                    <input  class="form-control form-control-solid" id="twiter" name="twiter" value="{{$setting->twiter}}"placeholder="Enter twiter" required/>
                    <span class="form-text text-muted">Please enter your full twiter</span>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input  class="form-control form-control-solid" id="theAddress" name="theAddress" value="{{$setting->theAddress}}"placeholder="Enter Address" required/>
                    <span class="form-text text-muted">Please enter your full Address</span>
                </div>
                <div class="form-group">
                    <label>Map:</label>
                    <input  class="form-control form-control-solid" id="theMap" name="theMap" value="{{$setting->theMap}}"placeholder="Enter Address" required/>
                    <span class="form-text text-muted">Please enter your full Map</span>
                </div>
                <div class="form-group">
                    <label>alt:</label>
                    <input  class="form-control form-control-solid" id="alt" name="alt" value="{{$setting->alt}}"placeholder="Enter alt" required/>
                    <span class="form-text text-muted">Please enter your full alt</span>
                </div>
                <div class="form-group">
                    <label>Text:</label>
                    <textarea  class="form-control form-control-solid" id="theText1" name="theText1" placeholder="Enter text"
                    >{{$setting->theText1}}</textarea>
                </div>

                <div class="form-group">

                    <h2 class="titleSelectPhoto"> the photo </h2>
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <input type="text" type="hidden" name="file" id="fieldID" class="form-control"

                                   value="{{$setting->thePhoto}}"

                                   placeholder="URL" required>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:open_popup('/public/lib/responsivefilemanager/filemanager/dialog.php?type=1&popup=1&multiple=0&field_id=fieldID')"
                               class="btn btn-primary" type="button">
                                select photo...(W:800px - H:425px)
                            </a>
                        </div>


                        <br><h3 style="margin-top:50px;">current photo</h3>
                        <img width='300px' src="{{$setting->thePhoto}}">
                        <br>
                        <br>
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

                <br>
                <br>
            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
          CKEDITOR.replace( 'theText1' );


            var homeBackground = document.getElementById("setting");
            homeBackground.classList.add("menu-item-active");
    </script>

@endsection
