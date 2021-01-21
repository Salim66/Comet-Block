{{--@if( $errors -> any() )--}}
{{--    <p class="alert alert-danger">{{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button></p>--}}
{{--@endif--}}

<script type="text/javascript">

    //Success Message
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

    @if (Session::has('error'))
    // toastr.error("{{ Session::get('error') }}")
    Lobibox.alert('error', { msg: "{{ Session::get('error') }}" });
    @endif

    //Errors Message
    @if ($errors -> any())
        @foreach($errors -> all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

</script>
