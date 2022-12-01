<!-- </div>  -->

</div>


</div>

<!--end::Entry-->

<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">

    <!--begin::Header-->

    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">

        <h3 class="font-weight-bold m-0">User Profile

            <small class="text-muted font-size-sm ml-2">12 messages</small></h3>

        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">

            <i class="ki ki-close icon-xs text-muted"></i>

        </a>

    </div>


    <script>var KTAppSettings = {
            "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };</script>


    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>


    <script src="{{ asset('uploads/vendor/jquery.ui.widget.js') }}"></script>

    <script src="{{ asset('uploads/jquery.iframe-transport.js') }}"></script>


    <script src="{{ asset('uploads/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('lib/validation/jquery.validate.js') }}"></script>


    <script src="{{ asset('js/common.js') }}"></script>


    <script src="{{ asset('assets/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/dataTables.bootstrap4.min.js') }}"></script>


    <script>


        $(document).ready(function () {
            $('#kt_datatable').DataTable({
                "order": [[1, "desc"]]
            });
        });


        $(document).on('click', '.delete', function () {

            var id = $(this).attr('id');
            var url = $(this).attr('url');
            var table = $(this).attr('table');
            var token = $("meta[name='csrf-token']").attr("content");
            // alert(table);


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed) {
                        // console.log(url);

                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                "_token": token,
                                id: id,
                                table: table,
                            },
                            success: function (data) {
                                // if (data.success){
                                //     Swal.fire(
                                //         "Deleted!",
                                //         "Your file has been deleted.",
                                //         "success"
                                //     );
                                //
                                // }
                                // alert(data);
                              //
                               location.reload();
                            }

                        });

                    }

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });


        });
        $(document).on('click', '.not', function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lütfen içindeki resimleri silin!',

            })
        });

    </script>


    </body>

    <!--end::Body-->

    </html>
