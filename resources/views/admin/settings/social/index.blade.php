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
                    <div class="card" style="background-color: lightblue">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title text-center">Social Media Settings</h4>
                        </div>
                        <div class="card-body">
                            @php

                                $social = $settings -> social;
                                $social_data = json_decode($social);

                            @endphp
                            <form action="{{ route('social.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Facebook</label>
                                    <div class="col-lg-9">
                                        <input name="fb" type="text" class="form-control" value="{{ $social_data -> fb }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Twitter</label>
                                    <div class="col-lg-9">
                                        <input name="tw"  type="text" class="form-control" value="{{ $social_data -> tw }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Linkedin</label>
                                    <div class="col-lg-9">
                                        <input name="lkdn" type="text" class="form-control" value="{{ $social_data -> lkdn }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Instagram</label>
                                    <div class="col-lg-9">
                                        <input name="itm" type="text" class="form-control" value="{{ $social_data -> itm }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Dribble</label>
                                    <div class="col-lg-9">
                                        <input name="dbl" type="text" class="form-control" value="{{ $social_data -> dbl }}">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn  w-100 shadow social-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


{{--                Copy Right Text--}}
                <div class="col-lg-6">
                    @include('validate')
                    <div class="card" style="background-color: lightblue">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title text-center">Copy Right Settings</h4>
                        </div>
                        <div class="card-body">


                            <form action="{{ route('copy-right.update') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Copy Right Text</label>
                                    <div class="col-lg-9">
                                        <input name="crt" type="text" class="form-control" value="{{ $settings -> crt }}">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn  w-100 shadow crt-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
