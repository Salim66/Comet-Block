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
                <div class="col-lg-10">
                    @include('validate')
                    <div class="card" style="background-color: lightblue">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title font-weight-bold text-center">Clients Settings</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $client_json_data = $settings -> clients;
                                $client_data = json_decode($client_json_data);
                            @endphp
                            <form action="{{ route('clients.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Upper</label>
                                    <input name="upper" type="text" class="form-control" value="{{ $client_data -> upper }}">
                                </div>
                                <div class="form-group">
                                    <label>Our Clients</label>
                                    <input name="client" type="text" class="form-control" value="{{ $client_data -> client }}">
                                </div>
                                <div class="form-group">
                                    <label class="block">Add Clients</label>
                                    <hr>
                                </div>
                               <div class="row">
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load1" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_one }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue;">
                                           <label for="c_image1" class="btn shadow" style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 1</label>
                                           <input name="clients1" type="file" class="d-none" id="c_image1">
                                       </div>
                                   </div>
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load2" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_two }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue">
                                           <label for="c_image2" class="btn shadow"  style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 2</label>
                                           <input name="clients2" type="file" class="d-none" id="c_image2">
                                       </div>
                                   </div>
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load3" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_three }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue">
                                           <label for="c_image3" class="btn shadow" style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 3</label>
                                           <input name="clients3" type="file" class="d-none" id="c_image3">
                                       </div>
                                   </div>
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load4" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_four }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue">
                                           <label for="c_image4" class="btn shadow" style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 4</label>
                                           <input name="clients4" type="file" class="d-none" id="c_image4">
                                       </div>
                                   </div>
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load5" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_five }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue">
                                           <label for="c_image5" class="btn shadow" style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 5</label>
                                           <input name="clients5" type="file" class="d-none" id="c_image5">
                                       </div>
                                   </div>
                                   <div class="col-md-4" style="display: flex; justify-content: space-around">
                                       <div class="form-group">
                                           <img id="client_image_load6" src="{{ URL::to('/') }}/media/settings/clients/{{ $client_data -> clients_six }}" alt="" class="d-block mb-2 shadow" style="border-radius: 30%; width: 100px; height: 100px; border: 2px solid lightblue">
                                           <label for="c_image6" class="btn shadow" style="background-color: lightblue; color: white"><i class="far fa-plus-square"></i> Client 6</label>
                                           <input name="clients6" type="file" class="d-none" id="c_image6">
                                       </div>
                                   </div>
                               </div>
                                <button type="submit" class="btn  w-100 shadow client-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="todo-container">
                        <ul class="todo-list">
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
