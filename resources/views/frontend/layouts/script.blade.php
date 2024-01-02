  <!-- jQuery (Necessary for All JavaScript Plugins) -->
  <!-- JS here -->
  <script src="{{asset('frontend')}}/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="{{asset('frontend')}}/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('frontend')}}/js/ajax-form.js"></script>
<script src="{{asset('frontend')}}/js/waypoints.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.counterup.min.js"></script>
<script src="{{asset('frontend')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('frontend')}}/js/scrollIt.js"></script>
<script src="{{asset('frontend')}}/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('frontend')}}/js/wow.min.js"></script>
<script src="{{asset('frontend')}}/js/nice-select.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.slicknav.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('frontend')}}/js/plugins.js"></script>
<script src="{{asset('frontend')}}/js/gijgo.min.js"></script>
<!--contact js-->
<script src="{{asset('frontend')}}/js/contact.js"></script>
<script src="{{asset('frontend')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.form.js"></script>
<script src="{{asset('frontend')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('frontend')}}/js/mail-script.js"></script>

<script src="{{asset('frontend')}}/js/main.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</script>

<script>
    @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

    
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
    @endif
</script>

<script>
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

@yield('scripts')