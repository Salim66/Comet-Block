
@php
     $settings = App\Models\Settings::find(1);
     $logo_info = json_decode($settings -> logo);
@endphp

<!DOCTYPE html>
<html lang="en">


<!--Start Head -->
    @include('frontend.post.layouts.head')
<!--End Head -->

<body>
<!-- Preloader-->
<div id="loader">
    <div class="centrize">
        <div class="v-center">
            <div id="mask">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader-->
<!-- Navigation Bar-->
 @include('frontend.post.layouts.header')
<!-- End Navigation Bar-->
<!-- Home section-->




@section('main-content')
@show





<!-- Footer-->
@include('frontend.post.layouts.footer')
<!-- end of footer-->

<!-- Scripts -->
@include('frontend.post.layouts.partials.scripts')
</body>


<!-- Mirrored from themes.hody.co/html/comet/index-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:39:31 GMT -->
</html>
