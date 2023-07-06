<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> -->
<script type="text/javascript" src="{{asset('vendors/jquery.min.js')}}"></script>
@vite([
    'resources/fancybox/jquery.mousewheel-3.0.4.pack.js',
    'resources/fancybox/jquery.fancybox-1.3.4.pack.js',
    'resources/js/scripts.js'])

<script src="{{ asset('toastr/toastr.min.js') }}"></script>
<script>
    let isRtl = $('html').attr('data-textdirection') === 'rtl';
</script>

@if(Session::has('message'))
    <script>
        let type = "{{ Session::get('status', 'success') }}";
        switch (type) {
            case 'info':
                toastr['info']("{!! Session::get('message') !!}", '{{ __('Information') }}!', {
                    closeButton: true,
                    positionClass: 'toast-top-right',
                    progressBar: true,
                    newestOnTop: true,
                    rtl: isRtl
                });

                break;

            case 'warning':
                toastr['warning']("{!! Session::get('message') !!}", '{{ __('Warning') }}!', {
                    closeButton: true,
                    positionClass: 'toast-top-right',
                    progressBar: true,
                    newestOnTop: true,
                    rtl: isRtl
                });
                break;

            case 'success':
                toastr['success']("{!! Session::get('message') !!}", '{{ __('Success') }}!!', {
                    closeButton: true,
                    positionClass: 'toast-top-right',
                    progressBar: true,
                    newestOnTop: true,
                    rtl: isRtl
                });
                break;

            case 'error':
                toastr['error']("{!! Session::get('message') !!}", '{{ __('Oops') }}..!!', {
                    closeButton: true,
                    positionClass: 'toast-top-right',
                    progressBar: true,
                    newestOnTop: true,
                    rtl: isRtl
                });
                break;
        }
    </script>
@endif