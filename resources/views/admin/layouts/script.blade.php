<!-- jQuery -->
<script src="{{ asset('backend/') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('backend/') }}/plugins/chart.js/Chart.min.js"></script>--}}
<!-- Sparkline -->
<script src="{{ asset('backend/') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('backend/') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('backend/') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/') }}/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('backend/') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
{{-- <script src="{{ asset('backend/') }}/dist/js/adminlte.js"></script> --}}

{{-- Sweet Alert2 --}}
<script src="{{ asset('backend/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  --}}
{{-- <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> --}}

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                },
                {
                    extend: 'colvis',
                    exportOptions: {
                        columns: ':visible:not(:contains(Action))'
                    }
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,

            dateFormat: "dd-mm-yy"
        });
    });
</script>

@yield('scripts')

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if (Session::has('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        })
    @endif
    @if (Session::has('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        })
    @endif
    @if (Session::has('info'))
        Toast.fire({
            icon: 'info',
            title: "{{ session('info') }}"
        })
    @endif
    @if (Session::has('warning'))
        Toast.fire({
            icon: 'warning',
            title: "{{ session('warning') }}"
        })
    @endif

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e) {

            var form = $(this).closest('form');
            var dataId = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        //CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //    mode: "htmlmixed",
        //    theme: "monokai"
        //});
    })
</script>
