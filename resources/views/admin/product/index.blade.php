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
                <div class="col-md-12">
                    @include('validate')
                    <a class="btn btn-primary" href="#product-add-modal" data-toggle="modal">Add new Product</a>
                    <div class="card">
                        <div class="card-header" style="background-color: lightpink">
                            <h4 class="card-title">All Product</h4>
                        </div>
                        <div class="card-body" style="background-color: lightblue">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover mb-0">
                                    <thead class="bg-dark text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Regular Price</th>
                                        <th>Sell Price</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Colors</th>
                                        <th>Sizes</th>
                                        <th>Created By</th>
                                        <th>Product Image</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach( $all_data as $data )
                                            <tr>
                                                <td>{{ $loop -> index + 1 }}</td>
                                                <td>{{ $data -> title }}</td>
                                                <td>{{ $data -> regular_price }}</td>
                                                <td>{{ $data -> sell_price }}</td>
                                                <td>
                                                    @foreach($data -> categories as $category)
                                                        {{ $category -> name }} |
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data -> tags as $tag)
                                                        {{ $tag -> name }} |
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data -> colors as $color)
                                                        {{ $color -> name }} |
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data -> sizes as $size)
                                                        {{ $size -> size }} |
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $data -> author -> name }}
                                                </td>
                                                <td>
                                                    @if( !empty($data -> product_image) )
                                                        <img style="width: 40px; height: 40px;" src="{{ URL::to('/') }}/media/products/images/{{ $data -> product_image }}" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $data -> created_at -> diffForHumans() }}
                                                </td>
                                                <td>
                                                    @if( $data -> status == 'Published' )
                                                        <span class="badge badge-success">Published</span>
                                                    @else
                                                        <span class="badge badge-danger">Unpublished</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $data -> status == 'Published' )
                                                        <a href="{{ route('product.unpublished', $data ->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></a>
                                                    @else
                                                        <a href="{{ route('product.published', $data -> id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                    @endif
                                                    <a id="edit_product" edit_id="{{ $data->id }}" class="btn btn-warning btn-sm" href="#" data-toggle="modal">Edit</a>
                                                    <form class="d-inline" action="{{ route('product.destroy', $data -> id) }}" method="POST">
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


{{--Start Product Add Modal--}}
            <div id="product-add-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Product</h4>
                            <button class="close float-left" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label for="">Category</label>
                                        @foreach($category_info as $category)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="{{ $category -> id }}"> {{ $category -> name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label for="">Tags</label>
                                        @foreach($tags_info as $tag)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tag[]" value="{{ $tag -> id }}"> {{ $tag -> name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label for="">Colors</label>
                                        @foreach($color_info as $color)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="color[]" value="{{ $color -> id }}"> {{ $color -> name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label for="">Size</label>
                                        @foreach($size_info as $size)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="size[]" value="{{ $size -> id }}"> {{ $size -> size }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Regular Price: </label>
                                    <input type="text" name="regular_price">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Sell Price: </label>
                                    <input type="text" name="sell_price">
                                </div>
                                <div class="form-group">
                                    <label id="p_label_img" class="text-success bg-gradient" for="p_image"><i class="far fa-file-image fa-5x"></i></label>
                                    <input name="product_image" class="d-none" type="file" id="p_image" >
                                    <img class="w-100" id="product_image_load" src="" alt="">
                                </div>
                                <textarea id="text_editor" name="description"></textarea>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add new">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{--End Product Add Modal--}}


            {{--Start Product Edit Modal--}}
            <div id="product_modal_edit" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Product</h4>
                            <button class="close float-left" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Title">
                                    <input name="id" class="form-control" type="hidden" >
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <div class="col-md-10">
                                        <div class="cl"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <div class="col-md-10">
                                        <div class="tg"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Colors</label>
                                    <div class="col-md-10">
                                        <div class="cls"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Sizes</label>
                                    <div class="col-md-10">
                                        <div class="sz"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Regular Price: </label>
                                    <input type="text" name="regular_price">
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Sell Price: </label>
                                    <input type="text" name="sell_price">
                                </div>
                                <div class="form-group">
                                    <label id="label_p_img_edit" class="text-success bg-gradient" for="p_image_edit"><i class="far fa-file-image fa-5x"></i></label>
                                    <input name="product_image" class="d-none" type="file" id="p_image_edit" >
                                    <img class="w-100" id="product_image_edit" src="" alt="">
                                </div>
                                <textarea id="text_editor_edit" name="discription"></textarea>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" type="submit" value="Add new">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{--End Product Edit Modal--}}

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
