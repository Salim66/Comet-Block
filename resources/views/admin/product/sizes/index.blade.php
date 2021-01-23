@extends('layouts.app')

@section('main')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    @include('validate')
                    <a class="btn btn-outline-primary" href="#size-add-modal" data-toggle="modal">Add new Size</a>
                    <div class="card">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">All Size</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <div  class="table-responsive">
                                <table id="datatable" class="table table-hover mb-0">
                                    <thead class="bg-dark text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Size</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach( $all_data as $data )
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $data -> size }}</td>
                                        <td>{{ $data -> slug }}</td>
                                        <td>
                                            @if( $data -> status == 'Published' )
                                                <span class="badge badge-success">Published</span>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if( $data -> status == 'Published' )
                                                <a href="{{ route('shop-sizes.unpublished', $data -> id) }}" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></a>
                                            @else
                                                <a href="{{ route('shop-sizes.published', $data -> id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            @endif
                                            <a id="edit_product_size" edit_id="{{ $data->id }}" class="btn btn-warning btn-sm" href="#" data-toggle="modal">Edit</a>
                                                <form class="d-inline" action="{{ route('shop-sizes.destroy', $data -> id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


{{--Start Size Add Modal--}}
            <div id="size-add-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Size</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('shop-sizes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="size" class="form-control" type="text" placeholder="Size">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add new">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{--End Color Add Modal--}}


            {{--Start Size Edit Modal--}}
            <div id="size-edit-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Color</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('shop-sizes.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input name="size" class="form-control" type="text" placeholder="Size">
                                    <input name="id" type="hidden">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{--End Size Edit Modal--}}

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
