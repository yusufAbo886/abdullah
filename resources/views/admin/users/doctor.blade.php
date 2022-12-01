@extends('admin.common.master')
@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            @foreach($post as $item)
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex">
                            <!--begin::Pic-->
                            <a href="{{route('users.edit',$item->id)}}">
                                {{--                            {{route('hospital-post.destroy',$item->id)}}--}}
                                <div class="flex-shrink-0 mr-7">
                                    <div class="symbol symbol-50 symbol-lg-120">
                                        <img src="{{asset('images')}}/{{ $item->thePhoto}}" >

                                    </div>
                                </div>
                            </a>
                            <!--end::Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a  href="{{route('users.edit',$item->id)}}"  class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$item->theTitleEn}}
                                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>

                                        <!--end::Name-->
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <p  class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
																		<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>{{$item->theEmail}}</p>

                                            <p  class="text-muted text-hover-primary font-weight-bold">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>{{$item->theLocation}}</p>
                                        </div>
                                    </div>
                                    <div class="my-lg-0 my-1">
                                        @if(isset($item->isActive))
                                            @if($item->isActive == 0)
                                                <a class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2 actv" id="{{$item->id}}" userId="{{$item->user_id}}" isActive ="1" >is not Active</a>
                                            @else
                                                <a  class="btn btn-sm btn-primary font-weight-bolder text-uppercase actv" id="{{$item->id}}" userId="{{$item->user_id}}" isActive ="0" >Active</a>
                                            @endif
                                        @endif
                                    </div>
                                    <!--end::Actions-->
                                </div>

                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">  {!! substr($item->theTextEn, 0,50) !!}   </div>



                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid my-7"></div>
                        <!--end::Separator-->
                        <!--begin::Bottom-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">pone number</span>
                                    <span class="font-weight-bolder font-size-h5">
											{{$item->thePhone}}	</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
												</span>

                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">website </span>
                                    <span class="font-weight-bolder font-size-h5">
														{{$item->theWebsite}}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->



                        </div>
                        <!--end::Bottom-->
                    </div>
                </div>
                <!--end::Card-->
            @endforeach


        </div>
        <!--end::Container-->
    </div>

    <script>
        $(document).on('click', '.actv', function () {

            var id = $(this).attr('id');
            var userId = $(this).attr('userId');
            var isActive = $(this).attr('isActive');
            var token = '{{csrf_token()}}';
            var url = '{{route('users.store')}}';
            // alert(isActive);


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "do you want to Active post!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Active  it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'Post',
                            url: url,
                            data: {
                                "_token": token,
                                id: id,
                                userId: userId,
                                isActive:isActive

                            },
                            success: function (data) {
                                if (data == 1){
                                    location.reload();
                                }else{
                                    alert(data);
                                }

                                //
                                // location.reload();
                            }

                        });

                    }

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'the Post not active :)',
                        'error'
                    );
                }
            });


        });
    </script>
@endsection
