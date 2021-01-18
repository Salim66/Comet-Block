@extends('layouts.app')

@section('main')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user() -> name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-6">
                    @include('validate')
                    <div class="card" style="background-color: lightblue; border-radius: 10px; overflow: hidden">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Logo</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $logo_info = json_decode($settings -> logo);
                            @endphp
                            <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img class="w-75 shadow" style="border: 1px solid lightblue" id="lodo_light_load" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo_info -> logo_light }}" alt="">
                                    <br>
                                    <br>
                                    <label for="logo_light" class="shadow light" style="border-radius: 50%;"><i class="fab fa-reddit fa-5x"></i></label><span class="logo_l">Upload</span>
                                    <input type="file" name="logoLight" class="d-none" id="logo_light">
                                </div>
                                <div class="form-group">
                                    <img class="w-75 shadow" style="border: 1px solid lightblue" id="lodo_dark_load" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo_info -> logo_dark }}" alt="">
                                    <br>
                                    <br>
                                    <label for="logo_dark" class="shadow dark" style="border-radius: 50%;"><i class="fab fa-reddit fa-5x"></i></label><span class="logo_d">Upload</span>
                                    <input type="file" name="logoDark" class="d-none" placeholder="Logo Dark" id="logo_dark">
                                </div>
                                <div class="form-group shadow-sm p-3">
                                    <label for="points" style="font-size: 20px;">Logo Width :</label>
                                    <input class="ml-4 points" style="width: 110px;" type="number" name="logo_width" id="points" step="1" value="{{ $logo_info -> logo_width }}"><span> px</span>
                                </div>
                                <br>
                                <input class="btn form-control shadow logo_btn" type="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </div>


{{--                Favicon--}}
                <div class="col-lg-6">
                    @include('validate')
                    <div class="card" style="background-color: lightblue; border-radius: 10px; overflow: hidden">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">Favicon</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('favicon.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img class="w-75 shadow" style="border: 1px solid lightblue" id="favicon_load" src="{{ URL::to('/') }}/media/settings/favicon/{{ $settings -> favicon }}" alt="">
                                    <br>
                                    <br>
                                    <label for="fav_icon" class="shadow fav" style="border-radius: 50%;"><i class="fab fa-reddit fa-5x"></i></label><span class="fav_u">Upload</span>
                                    <input type="file" name="favicon" class="d-none" id="fav_icon">
                                </div>

                                <br>
                                <input class="btn form-control shadow logo_btn" type="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
