(function($){

    $(document).ready(function(){


        //Logout System
        $(document).on('click', 'a#logout_id', function (event){
            $('form#logout-form').submit();
        });

        //Text Editor
        CKEDITOR.replace('text_editor');
        CKEDITOR.replace('text_editor_edit');
        CKEDITOR.replace('text_editor_edit_one');

        // //Add Data Table
        $('table#datatable').DataTable();



        //Edit Post Category System
        $(document).on('click', '#edit_post_category', function (event){
            event.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'category/edit/' + id,
                success : function (data){
                    $('#category-edit-modal form input[name="name"]').val(data.name);
                    $('#category-edit-modal form input[name="id"]').val(data.id);

                    $('#category-edit-modal').modal('show');
                }
            });
        });

        //Edit Post Tag System
        $(document).on('click', '#edit_post_tag', function(event){
            event.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'tags/edit/' + id,
                success : function(data){
                    $('#tag-edit-modal input[name="name"]').val(data.name);
                    $('#tag-edit-modal input[name="id"]').val(data.id);

                    $('#tag-edit-modal').modal('show');
                }
            });
        });

        //Post Edit System
        $(document).on('click', '#edit_post', function(event){
            event.preventDefault();
            //Get Edit ID
            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'edit/' + edit_id,
                success : function(data){
                    $('#post_modal_edit input[name="title"]').val(data.title);
                    $('#post_modal_edit input[name="id"]').val(data.id);
                    $('#post_modal_edit img#post_featured_image_edit').attr('src', '/media/posts/images/' +data.image)
                    $('#post_modal_edit div.cl').html(data.category_list);
                    $('#post_modal_edit div.tg').html(data.tags_list);
                    CKEDITOR.instances.text_editor_edit.setData( data.content, function (){
                       this.checkDirty();
                    });

                    $('#post_modal_edit').modal('show');
                }
            });
        });

        // Post Image Load Form
        $(document).on('change', '#f_image', function(event){
            event.preventDefault();
            let post_image_url = URL.createObjectURL(event.target.files[0]);
            $('#post_featured_image_load').attr('src', post_image_url);
            $('#label_img').css('display', 'none');
        });

        //Post Edit Image Load
        $(document).on('change', '#f_image_edit', function (e){
            e.preventDefault();
            let post_edit_url = URL.createObjectURL(e.target.files[0]);
            $('#post_featured_image_edit').attr('src', post_edit_url);
            $('#label_img_edit').css('display', 'none');
        });


        //Product Category Edit Script
        $(document).on('click', '#edit_product_category', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'category/edit/' + edit_id,
                success : function (data){
                    $('#category-edit-modal input[name="name"]').val(data.name);
                    $('#category-edit-modal input[name="id"]').val(data.id);

                    $('#category-edit-modal').modal('show');
                }
            });
        });

        //Product Tags Edit Script
        $(document).on('click', '#edit_product_tag', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'tags/edit/' + edit_id,
                success : function (data){
                    $('#tag-edit-modal input[name="name"]').val(data.name);
                    $('#tag-edit-modal input[name="id"]').val(data.id);

                    $('#tag-edit-modal').modal('show');
                }
            });
        });

        //Product Color Edit Script
        $(document).on('click', '#edit_product_color', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'colors/edit/' + edit_id,
                success : function (data){
                    $('#color-edit-modal input[name="name"]').val(data.name);
                    $('#color-edit-modal input[name="id"]').val(data.id);

                    $('#color-edit-modal').modal('show');
                }
            });
        });

        //Product Size Edit Script
        $(document).on('click', '#edit_product_size', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'sizes/edit/' + edit_id,
                success : function (data){
                    $('#size-edit-modal input[name="size"]').val(data.size);
                    $('#size-edit-modal input[name="id"]').val(data.id);

                    $('#size-edit-modal').modal('show');
                }
            });
        });

        //Product Edit Script
        $(document).on('click', '#edit_product', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'edit/' + edit_id,
                success : function (data){
                    $('#product_modal_edit input[name="title"]').val(data.title);
                    $('#product_modal_edit input[name="id"]').val(data.id);
                    $('#product_modal_edit input[name="regular_price"]').val(data.regular_price);
                    $('#product_modal_edit input[name="sell_price"]').val(data.sell_price);
                    $('#product_modal_edit .cl').html(data.category_list);
                    $('#product_modal_edit .tg').html(data.tags_list);
                    $('#product_modal_edit .cls').html(data.colors_list);
                    $('#product_modal_edit .sz').html(data.sizes_list);
                    $('#product_modal_edit #product_image_edit').attr('src', '/media/products/images/' + data.image);
                    CKEDITOR.instances.text_editor_edit.setData( data.discription, function (){
                        this.checkDirty();
                    });

                    $('#product_modal_edit').modal('show');
                }
            });
        });

        //Product Image Load Script
        $(document).on('change', '#p_image', function (e){
            e.preventDefault();
            const product_image_url = URL.createObjectURL(e.target.files[0]);
            $('#product_image_load').attr('src', product_image_url);
        });

        //Product Edit Image Script
        $(document).on('change', '#p_image_edit', function (e){
            e.preventDefault();
            const product_edit_image_url = URL.createObjectURL(e.target.files[0]);
            $('#product_image_edit').attr('src', product_edit_image_url);
        });

        //Client Image Show
        $(document).on('change', '#c_image1', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load1').attr('src', client_1);
            $('img#client_image_load1').css({'background-color': 'white'});
        });
        $(document).on('change', '#c_image2', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load2').attr('src', client_1);
            $('img#client_image_load2').css({'background-color': 'white'});
        });
        $(document).on('change', '#c_image3', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load3').attr('src', client_1);
            $('img#client_image_load3').css({'background-color': 'white'});
        });
        $(document).on('change', '#c_image4', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load4').attr('src', client_1);
            $('img#client_image_load4').css({'background-color': 'white'});
        });
        $(document).on('change', '#c_image5', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load5').attr('src', client_1);
            $('img#client_image_load5').css({'background-color': 'white'});
        });
        $(document).on('change', '#c_image6', function (e){
            e.preventDefault();
            const client_1 = URL.createObjectURL(e.target.files[0]);
            $('img#client_image_load6').attr('src', client_1);
            $('img#client_image_load6').css({'background-color': 'white'});
        });


        //Logo Image Show
        $(document).on('change', '#logo_light', function (e){
            e.preventDefault();
            const logo_url = URL.createObjectURL(e.target.files[0]);
            $('#lodo_light_load').attr('src', logo_url);
            $('#lodo_light_load').css('background-color', 'black');
        });

        $(document).on('change', '#logo_dark', function (e){
            e.preventDefault();
            const logo_url = URL.createObjectURL(e.target.files[0]);
            $('#lodo_dark_load').attr('src', logo_url);
            $('#lodo_dark_load').css('background-color', 'white');
        });

        //Favincon show
        $(document).on('change', '#fav_icon', function (e){
            e.preventDefault();
            const favicon_url = URL.createObjectURL(e.target.files[0]);
            $('#favicon_load').attr('src', favicon_url);
            $('#favicon_load').css('background-color', 'white');
        });


        // Comet Slider Script
        $(document).on('click', '.comet-add-slide', function (e){
            e.preventDefault();
            const rand = Math.floor(Math.random() * 10000);
            $('.comet-slider-container').append('<div class="card shadow" id="slider-card-'+rand+'">\n' +
                '                                                <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider '+rand+'<span class="copy_remove_btn"><a id="comet-slide-copy-btn" copy_id='+rand+' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='+rand+' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Sub Title</label>\n' +
            '                                                                <input name="subtitle[]" type="text" class="form-control" subtitle='+rand+'>\n' +
            '                                                                <input name="slide_code[]" type="hidden" class="form-control" value='+rand+'>\n' +
            '                                                            </div>\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Title</label>\n' +
            '                                                                <input name="title[]" type="text" class="form-control" title='+rand+'>\n' +
            '                                                            </div>\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Button 01 Title</label>\n' +
            '                                                                <input name="btntitle_01[]" type="text" class="form-control" btn_title_one='+rand+'>\n' +
            '                                                            </div>\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Button 01 Link</label>\n' +
            '                                                                <input name="btnlink_01[]" type="text" class="form-control" btn_link_one='+rand+'>\n' +
            '                                                            </div>\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Button 02 Title</label>\n' +
            '                                                                <input name="btntitle_02[]" type="text" class="form-control" btn_title_two='+rand+'>\n' +
            '                                                            </div>\n' +
            '                                                            <div class="form-group">\n' +
            '                                                                <label for="">Button 02 Link</label>\n' +
            '                                                                <input name="btnlink_02[]" type="text" class="form-control" btn_link_two='+rand+'>\n' +
            '                                                            </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            return false;
        });

        //Comet Slide Remove
        var remove_code = '';
        $(document).on('click', '#comet-slide-remove-btn', function (e) {
            e.preventDefault();
            remove_code = $(this).attr('remove_id');
            $('#slider-card-'+remove_code).css('transform', 'translateY(8rem) rotateZ(20deg)');
            $('#slider-card-'+remove_code).css('transition', 'all 0.5s ease');
            $('#slider-card-'+remove_code).remove();
            return false;
        });

        //Copy Slider
        $(document).on('click', '#comet-slide-copy-btn', function (e){
            e.preventDefault();
            let copy_id = $(this).attr('copy_id');
            let rand = Math.floor(Math.random() * 10000);
            let title = $('input[title='+copy_id+']').val();
            let subtitle = $('input[subtitle='+copy_id+']').val();
            let btn_title_one = $('input[btn_title_one='+copy_id+']').val();
            let btn_link_one = $('input[btn_link_one='+copy_id+']').val();
            let btn_title_two = $('input[btn_title_two='+copy_id+']').val();
            let btn_link_two = $('input[btn_link_two='+copy_id+']').val();


            $('.comet-slider-container').append('<div class="card shadow" id="slider-card-'+rand+'">\n' +
                '                                                <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider '+rand+'<span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-copy-btn" copy_id='+rand+' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='+rand+' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Sub Title</label>\n' +
                '                                                                <input name="subtitle[]" type="text" class="form-control" value="'+subtitle+'">\n' +
                '                                                                <input name="slide_code[]" type="hidden" class="form-control" value="'+rand+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Title</label>\n' +
                '                                                                <input name="title[]" type="text" class="form-control" value="'+title+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 01 Title</label>\n' +
                '                                                                <input name="btntitle_01[]" type="text" class="form-control" value="'+btn_title_one+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 01 Link</label>\n' +
                '                                                                <input name="btnlink_01[]" type="text" class="form-control" value="'+btn_link_one+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 02 Title</label>\n' +
                '                                                                <input name="btntitle_02[]" type="text" class="form-control" value="'+btn_title_two+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 02 Link</label>\n' +
                '                                                                <input name="btnlink_02[]" type="text" class="form-control" value="'+btn_link_two+'">\n' +
                '                                                            </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            return false;
        });




        //Slider Option
        $(document).on('change', '#trail', function(e){
           if($(this).val() == 'video'){
               $('#comet_slider_modal').modal('show');
           }else if ($(this).val() == 'carousel'){
               $('#comet_carosul_slider_modal').modal('show');
           }
        });

        //Slider Video Show Form
        $(document).on('change', '#sf', function (e){
            e.preventDefault();
            const slider_video = URL.createObjectURL(e.target.files[0]);
            $('#show_slider_video').attr('src', slider_video);
        });


        //Block Slider Live Show
        $(document).on('click', '#show_slider', function(e){
            // e.preventDefault();
            const slider_id = $(this).attr('edit_id');
            $('#slide_individual_show_modal').modal('show');

            $.ajax({
                url : 'slider-show/' + slider_id,
                success : function (data){
                    $('#slide_individual_show_modal iframe').attr('src', '/media/sliders/video/' + data.slider_video_url);
                   for(var i=0; i<data.sub_title.length; i++){
                        $('#slider_add_caption').append('<div class="carousel-item text-white remove_slide" id="helper-'+[i]+'" style="position: absolute; z-index: 1; margin-top: -300px; margin-left: 100px;">\n' +
                            '                                        <li style="list-style: none">\n' +
                            '                                            <div class="slide-wrap">\n' +
                            '                                                <div class="slide-content text-left bold-text">\n' +
                            '                                                    <div class="container">\n' +
                            '                                                        <h6>'+data.sub_title[i]+'.</h6>\n' +
                            '                                                        <h1 class="upper">'+data.title[i]+'<span class="red-dot"></span></h1>\n' +
                            '                                                        <p><a href="#" class="btn btn-outline-success mr-1">'+data.btn_title_01[i]+'</a><a href="#" class="btn btn-outline-danger btn-full">'+data.btn_title_02[i]+'</a>\n' +
                            '                                                        </p>\n' +
                            '                                                    </div>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                        </li>\n' +
                            '                                    </div>');

                   }
                    $('#helper-0').addClass('active');
                }
            });




        });

        //Slider Caption Remove
        $(document).on('click', '#remove_slider_caption', function (e){
            e.preventDefault();
            $('.remove_slide').remove();
        });


        //Add Comet Testimonials Slider Script
        $(document).on('click', '#comet-add-slide-testimonials', function (e){
            e.preventDefault();
            const rand = Math.floor(Math.random() * 10000);
            $('.comet-slider-testimonials').append('<div class="card shadow" id="slider-card-'+rand+'" style="position: relative; left: 0px; top: 0px;">\n' +
                '                                                    <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider'+rand+' <span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-test-copy-btn" copy_id='+rand+' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='+rand+' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>\n' +
                '                                                    <div id="slide-'+rand+'" class="collapse" style="">\n' +
                '                                                        <div class="card-body">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Description</label>\n' +
                '                                                                <textarea name="description[]" rows="2" class="form-control" description='+rand+'></textarea>\n' +
                '                                                                <input name="slide_code[]" type="hidden" class="form-control" value='+rand+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">By</label>\n' +
                '                                                                <input name="by[]" type="text" class="form-control" by='+rand+'>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>');
            return false;
        });

        //Remove Comet Testimonials Slider Script
        $(document).on('click', '#comet-slide-remove-btn', function (e){
            e.preventDefault();
            const remove_id = $(this).attr('remove_id');
            $('slider-card-'+remove_id).remove();
            return false;
        });

        //Copy Comet Testimonials Slider Script
        $(document).on('click', '#comet-slide-test-copy-btn', function (e){
            e.preventDefault();
            const copy_id = $(this).attr('copy_id');
            const rand = Math.floor(Math.random() * 10000);
            const description = $('textarea[description='+copy_id+']').val();
            const by = $('input[by='+copy_id+']').val();

            $('.comet-slider-testimonials').append('<div class="card shadow" id="slider-card-'+rand+'" style="position: relative; left: 0px; top: 0px;">\n' +
                '                                                    <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider'+rand+' <span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-test-copy-btn" copy_id='+rand+' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='+rand+' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>\n' +
                '                                                    <div id="slide-'+rand+'" class="collapse" style="">\n' +
                '                                                        <div class="card-body">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Description</label>\n' +
                '                                                                <textarea name="description[]" rows="2" class="form-control" description='+rand+'>'+description+'</textarea>\n' +
                '                                                                <input name="slide_code[]" type="hidden" class="form-control" value="'+rand+'">\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">By</label>\n' +
                '                                                                <input name="by[]" type="text" class="form-control" by='+rand+' value="'+by+'">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>');
            return false;
        });


        //Carousel Image Load
        function imageLoad(img_id, img_loc){
           $(img_id).change(function (e){
              const image_url = URL.createObjectURL(e.target.files[0]);
              $(img_loc).attr('src', image_url);
           });
        }


        //Carousel Slider Script
        $(document).on('click', '#comet-add-carousel-slide', function (e){
            e.preventDefault();
            const rand = Math.floor(Math.random() * 10000);
            $('.comet-carosul-slider-container').append('<div class="card shadow" id="slider-card-'+rand+'">\n' +
                '                                                <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider '+rand+'<span class="copy_remove_btn"><a id="comet-carousel-slide-copy-btn" copy_id='+rand+' href="#"><svg class="svg-inline--fa fa-copy fa-w-14 text-secondary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path></svg><!-- <i class="fas fa-copy text-secondary" aria-hidden="true"></i> --></a><a id="comet-carousel-slide-remove-btn" remove_id='+rand+' href="#"><svg class="svg-inline--fa fa-trash fa-w-14 text-secondary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg><!-- <i class="fas fa-trash text-secondary" aria-hidden="true"></i> --></a></span></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                        <div class="row">\n' +
                '                                                            <div class="col-lg-5">\n' +
                '                                                                <div class="form-group">\n' +
                '                                                                    <label for="carousel_image'+rand+'" class="img_file"><i class="fas fa-image fa-3x text-success"></i></label><span class="up">Upload Image</span>\n' +
                '                                                                    <input name="image[]" type="file" class="form-control d-none" id="carousel_image'+rand+'" image_file='+rand+'>\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-lg-5">\n' +
                '                                                                <div class="form-group">\n' +
                '                                                                    <img src="" id="carousel_file'+rand+'" alt="" style="width: 150px; height: 100px;" class="shadow">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Title</label>\n' +
                '                                                            <input name="title[]" type="text" class="form-control" title='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Sub Title</label>\n' +
                '                                                            <input name="sub_title[]" type="text" class="form-control" subtitle='+rand+'>\n' +
                '                                                            <input name="slide_code[]" type="hidden" class="form-control" value='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Title</label>\n' +
                '                                                            <input name="btn_title_one[]" type="text" class="form-control" btn_title_one='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Link</label>\n' +
                '                                                            <input name="btn_link_one[]" type="text" class="form-control" btn_link_one='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Title</label>\n' +
                '                                                            <input name="btn_title_two[]" type="text" class="form-control" btn_title_two='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Link</label>\n' +
                '                                                            <input name="btn_link_two[]" type="text" class="form-control" btn_link_two='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            imageLoad('#carousel_image'+rand+'', '#carousel_file'+rand+'');
        });

        //Remove Carousel Slider Script
        $(document).on('click', '#comet-carousel-slide-remove-btn', function (e){
            e.preventDefault();
            const remove_id = $(this).attr('remove_id');
            $('#slider-card-'+remove_id).remove();
            return false;
        });



        //Copy Carousel Slider Script
        $(document).on('click', '#comet-carousel-slide-copy-btn', function (e){
            e.preventDefault();
            const copy_id = $(this).attr('copy_id');
            const title = $('input[title='+copy_id+']').val();
            const sub_title = $('input[subtitle='+copy_id+']').val();
            const slide_code = $('input[value='+copy_id+']').val();
            const btn_title_one = $('input[btn_title_one='+copy_id+']').val();
            const btn_title_two = $('input[btn_title_two='+copy_id+']').val();
            const btn_link_one = $('input[btn_link_one='+copy_id+']').val();
            const btn_link_two = $('input[btn_link_two='+copy_id+']').val();
            const rand = Math.floor(Math.random() * 10000);
            const image_source = $('img[id="carousel_file'+copy_id+'"]').attr('src');

            $('.comet-carosul-slider-container').append('<div class="card shadow" id="slider-card-'+rand+'">\n' +
                '                                                <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider '+rand+'<span class="copy_remove_btn"><a id="comet-carousel-slide-copy-btn" copy_id='+rand+' href="#"><svg class="svg-inline--fa fa-copy fa-w-14 text-secondary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path></svg><!-- <i class="fas fa-copy text-secondary" aria-hidden="true"></i> --></a><a id="comet-carousel-slide-remove-btn" remove_id='+rand+' href="#"><svg class="svg-inline--fa fa-trash fa-w-14 text-secondary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg><!-- <i class="fas fa-trash text-secondary" aria-hidden="true"></i> --></a></span></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                        <div class="row">\n' +
                '                                                            <div class="col-lg-5">\n' +
                '                                                                <div class="form-group">\n' +
                '                                                                    <label for="carousel_image_copy'+rand+'" class="img_file"><svg class="svg-inline--fa fa-image fa-w-16 fa-3x text-success" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"></path></svg><!-- <i class="fas fa-image fa-3x text-success"></i> --></label><span class="up">Upload Image</span>\n' +
                '                                                                    <input name="image[]" type="file" class="form-control d-none" id="carousel_image_copy'+rand+'" image_file='+rand+'>\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-lg-5">\n' +
                '                                                                <div class="form-group">\n' +
                '                                                                    <img src="'+image_source+'" id="carousel_file'+rand+'" alt="" style="width: 150px; height: 100px;" class="shadow">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Title</label>\n' +
                '                                                            <input name="title[]" type="text" class="form-control" value="'+title+'" title='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Sub Title</label>\n' +
                '                                                            <input name="sub_title[]" type="text" class="form-control" value="'+sub_title+'" subtitle='+rand+'>\n' +
                '                                                            <input name="slide_code[]" type="hidden" class="form-control" value="'+rand+'">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Title</label>\n' +
                '                                                            <input name="btn_title_one[]" type="text" class="form-control" value="'+btn_title_one+'" btn_title_one='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Link</label>\n' +
                '                                                            <input name="btn_link_one[]" type="text" class="form-control" value="'+btn_link_one+'" btn_link_one='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Title</label>\n' +
                '                                                            <input name="btn_title_two[]" type="text" class="form-control" value="'+btn_title_two+'" btn_title_two='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Link</label>\n' +
                '                                                            <input name="btn_link_two[]" type="text" class="form-control" value="'+btn_link_two+'" btn_link_two='+rand+'>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');
            imageLoad('#carousel_image_copy'+rand+'', '#carousel_file'+rand+'')
            return false;
        });


        //Carousel Slider Live Show
        $(document).on('click', '#show_carousel_slider', function (e){
            e.preventDefault();
            const show_id = $(this).attr('edit_id');
            $('#carousel_slider_individual_show_modal').modal('show');

            $.ajax({
                url : 'carousel-slider-show/' + show_id,
                success : function(data){
                    for(var i=0; i<data.sub_title.length; i++){
                        $('#carousel_slider_add_caption').append('<div class="carousel-item text-white remove_slide" id="helper-'+[i]+'" >\n' +
                            '    <li>\n'+
                            '        <img src="/media/sliders/images/'+data.image[i]+'" alt="" style="width: 800px; height: 360px; position: relative;">\n' +
                            '        <div class="slide-wrap" style="position: absolute; margin-top: -200px; margin-left: 300px;">\n' +
                            '            <div class="slide-content">\n' +
                            '                <div class="container">\n' +
                            '                    <h1>'+data.title[i]+'<span class="red-dot"></span></h1>\n' +
                            '                    <h6>'+data.sub_title[i]+'</h6>\n' +
                            '                    <p><a href="#" class="btn btn-outline-light mr-2 text-white">'+data.btn_title_one[i]+'</a><a href="#" class="btn btn-danger">'+data.btn_title_two[i]+'</a></p>\n' +
                            '                </div>\n' +
                            '            </div>\n' +
                            '        </div>\n' +
                            '    </li>\n' +
                            '</div>');

                    }
                    $('#helper-0').addClass('active');
                }
            });
        });


        // //slider Video load
        // $(document).on('change', '#sv_file', function (e){
        //     e.preventDefault();
        //     const svu = URL.createObjectURL(e.target.files[0]);
        //     $('#slider_video_load').attr('src', svu);
        // });


        //Portfolio Category Edit Script
        $(document).on('click', '#edit_portfolio_category', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'category/edit/' + edit_id,
                success : function (data){
                    $('#portfolio-category-edit-modal input[name="name"]').val(data.name);
                    $('#portfolio-category-edit-modal input[name="id"]').val(data.id);

                    $('#portfolio-category-edit-modal').modal('show');
                }
            });
        });

        //Portfolio Tags Edit Script
        $(document).on('click', '#edit_portfolio_tag', function(e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'tags/edit/' + edit_id,
                success: function (data){
                    $('#portfolio-tag-edit-modal input[name="name"]').val(data.name);
                    $('#portfolio-tag-edit-modal input[name="id"]').val(data.id);

                    $('#portfolio-tag-edit-modal').modal('show');
                }
            });
        });

        //Portfolio Featured Image Load Script
        $(document).on('change', '#p_f_image', function (e){
            e.preventDefault();
            const image_file = URL.createObjectURL(e.target.files[0]);
            $('#portfolio_featured_image_load').attr('src', image_file);
        });

        $(document).on('click', '#edit_portfolio', function (e){
            e.preventDefault();
            const edit_id = $(this).attr('edit_id');


            $.ajax({
                url : 'edit/' + edit_id,
                success : function (data){
                    $('#portfolio_modal_edit input[name="title"]').val(data.title);
                    $('#portfolio_modal_edit input[name="id"]').val(data.id);
                    $('#portfolio_modal_edit input[name="sub_title"]').val(data.sub_title);
                    $('#portfolio_modal_edit .cl').html(data.category_list);
                    $('#portfolio_modal_edit .tg').html(data.tags_list);
                    $('#portfolio_modal_edit img#portfolio_featured_image_edit').attr('src', '/media/portfolio/images/' +data.featured_image);
                    CKEDITOR.instances.text_editor_edit_one.setData( data.discription, function (){
                        this.checkDirty();
                    });


                    $('#portfolio_modal_edit').modal('show');
                }
            });
        });

        //Portfolio Edit Image Load
        $(document).on('change', '#p_f_image_edit', function (e){
            e.preventDefault();
            const image_url = URL.createObjectURL(e.target.files[0]);
            $('#portfolio_featured_image_edit').attr('src', image_url);
        });


        //Portfolio Search By Category
        $(document).on('click', '#category_id', function (e){
            e.preventDefault();
            const category_id = $(this).attr('category_id');
            console.log(category_id);
        });




    });



})(jQuery)

// const select = document.querySelector('#helper-0');
// select.classList.add('active');


// for(let i=0; i<2; i++){
//     select[0].classList.add('active');
// }


//Move Block Slider
$(function() {
    $(".comet-slider-container").sortable({
        connectWith: ".comet-slider-container"
    })

})

//Move Testimonials Slider
$(function() {
    $('.comet-slider-testimonials').sortable({
        connectWith: ".comet-slider-testimonials"
    })
})

//Move Carousel Slider
$(function() {
    $('.comet-carosul-slider-container').sortable({
        connectWith: ".comet-carosul-slider-container"
    })
})



// //Copy Slider
// $(document).on('click', '#comet-slide-copy-btn', function (e){
//     e.preventDefault();
//     const copy_code = $(this).attr('copy_id');
//     const rand = Math.floor(Math.random() * 10000);
//     $('#slider-card-'+copy_code).clone().insertAfter('#slider-card-'+copy_code).attr('id', "slider-card-"+rand);
//     // $('#slide-'+copy_code).clone().attr('id', "slide-"+rand);
//     ;
// });
