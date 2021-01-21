<!-- jQuery -->
<script src="{{ asset('backend/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- FontAwesome -->
<script src="{{ asset('backend/admin/assets/js/all.js')}}"></script>

{{--CK EDITOR--}}
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('backend/admin/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('backend/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('backend/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('backend/admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('backend/admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{ asset('backend/admin/assets/js/chart.morris.js')}}"></script>

{{--Drop Down JS--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- CKEDITOR -->
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

{{--Data Table JS--}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

{{--SweetAlert --}}
{{--<script src="{{ asset('backend/admin/assets/js/sweetalert.min.js')}}"></script>--}}

{{--@if( Session::has('success') )--}}
{{--    <script>--}}
{{--        swal("Success!","{!! Session::get('success') !!}", "success",{--}}
{{--            buttons: {--}}
{{--                confirm: true,--}}
{{--            },--}}
{{--        })--}}
{{--    </script>--}}
{{--@endif--}}


{{--Toster Notification--}}
{{--<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>--}}
{{--{!! Toastr::message() !!}--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>


<!-- Custom JS -->
<script  src="{{ asset('backend/admin/assets/js/script.js')}}"></script>
<script  src="{{ asset('backend/admin/assets/js/custom/script.js')}}"></script>

@include('validate')
