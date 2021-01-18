(function($){

    $(document).ready(function(){


        //Logout System
        $(document).on('click', 'a#logout_id', function (event){
            $('form#logout-form').submit();
        });

        //Text Editor
        CKEDITOR.replace('text_editor');
        CKEDITOR.replace('text_editor_edit');


        //Edit Category System
        $(document).on('click', 'a#edit_category', function (event){
            event.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'post-category-edit/' + id,
                dataType : 'json',
                success : function (data){
                    $('#category-edit-modal form input[name="name"]').val(data.name);
                    $('#category-edit-modal form input[name="id"]').val(data.id);
                }
            });
        });

        //Edit Post Tag
        $(document).on('click', 'a#edit_tag', function(event){
            event.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'post-tag-edit/' + id,
                dataType: 'json',
                success : function(data){
                    $('#tag-edit-modal input[name="name"]').val(data.name);
                    $('#tag-edit-modal input[name="id"]').val(data.id);
                }
            });
        });

        //Photo Upload And Show Form
        $(document).on('change', 'input#f_image', function(event){
            event.preventDefault();
            let post_image_url = URL.createObjectURL(event.target.files[0]);
            $('img#post_featured_image_load').attr('src', post_image_url);
            $('label#label_img').css('display', 'none');
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

        //Post Edit
        $(document).on('click', '#edit_post', function(event){
            event.preventDefault();
            //Get Edit ID
            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'post-edit/'+edit_id,
                success : function(data){
                    $('#post_modal_edit input[name="title"]').val(data.title);
                    $('#post_modal_edit img#post_featured_image_load').attr('src', 'media/posts/' +data.image)
                    $('#post_modal_edit div.cl').html(data.cat_list);
                }
            });

            $('#post_modal_edit').modal('show');
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
            const copy_id = $(this).attr('copy_id');
            const rand = Math.floor(Math.random() * 10000);
            const title = $('input[title='+copy_id+']').val();
            const subtitle = $('input[subtitle='+copy_id+']').val();
            const btn_title_one = $('input[btn_title_one='+copy_id+']').val();
            const btn_link_one = $('input[btn_link_one='+copy_id+']').val();
            const btn_title_two = $('input[btn_title_two='+copy_id+']').val();
            const btn_link_two = $('input[btn_link_two='+copy_id+']').val();

            $('.comet-slider-container').append('<div class="card shadow" id="slider-card-'+rand+'">\n' +
                '                                                <div class="card-header ch" style="cursor: pointer;" data-toggle="collapse" data-target="#slide-'+rand+'"><h4>#Slider '+rand+'<span class="copy_remove_btn"><a style="z-index: 3;" id="comet-slide-copy-btn" copy_id='+rand+' href="#"><i class="fas fa-copy text-secondary" aria-hidden="true"></i></a><a id="comet-slide-remove-btn" remove_id='+rand+' href="#"><i class="fas fa-trash text-secondary" aria-hidden="true"></i></a></span></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Sub Title</label>\n' +
                '                                                                <input name="subtitle[]" type="text" class="form-control" value='+subtitle+'>\n' +
                '                                                                <input name="slide_code[]" type="hidden" class="form-control" value='+rand+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Title</label>\n' +
                '                                                                <input name="title[]" type="text" class="form-control" value='+title+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 01 Title</label>\n' +
                '                                                                <input name="btntitle_01[]" type="text" class="form-control" value='+btn_title_one+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 01 Link</label>\n' +
                '                                                                <input name="btnlink_01[]" type="text" class="form-control" value='+btn_link_one+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 02 Title</label>\n' +
                '                                                                <input name="btntitle_02[]" type="text" class="form-control" value='+btn_title_two+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">Button 02 Link</label>\n' +
                '                                                                <input name="btnlink_02[]" type="text" class="form-control" value='+btn_link_two+'>\n' +
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
           }
        });

        //Slider Video Show Form
        $(document).on('change', '#sf', function (e){
            e.preventDefault();
            const slider_video = URL.createObjectURL(e.target.files[0]);
            $('#show_slider_video').attr('src', slider_video);
        });


        //Slider Show
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
                '                                                                <input name="slide_code[]" type="hidden" class="form-control" value='+rand+'>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label for="">By</label>\n' +
                '                                                                <input name="by[]" type="text" class="form-control" by='+rand+' value='+by+'>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>');
            return false;
        });



        // //slider Video load
        // $(document).on('change', '#sv_file', function (e){
        //     e.preventDefault();
        //     const svu = URL.createObjectURL(e.target.files[0]);
        //     $('#slider_video_load').attr('src', svu);
        // });

    });



})(jQuery)

// const select = document.querySelector('#helper-0');
// select.classList.add('active');


// for(let i=0; i<2; i++){
//     select[0].classList.add('active');
// }


//Move Slider
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



// //Copy Slider
// $(document).on('click', '#comet-slide-copy-btn', function (e){
//     e.preventDefault();
//     const copy_code = $(this).attr('copy_id');
//     const rand = Math.floor(Math.random() * 10000);
//     $('#slider-card-'+copy_code).clone().insertAfter('#slider-card-'+copy_code).attr('id', "slider-card-"+rand);
//     // $('#slide-'+copy_code).clone().attr('id', "slide-"+rand);
//     ;
// });
