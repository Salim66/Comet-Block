$(document).ready(function(){

	// $('#price-range-submit').hide();
    //
	// $("#min_price,#max_price").on('change', function () {
    //
	//   $('#price-range-submit').show();
    //
	//   var min_price_range = parseInt($("#min_price").val());
    //
	//   var max_price_range = parseInt($("#max_price").val());
    //
	//   if (min_price_range > max_price_range) {
	// 	$('#max_price').val(min_price_range);
	//   }
    //
	//   $("#slider-range").slider({
	// 	values: [min_price_range, max_price_range]
	//   });
    //
	// });
    //
    //
	// $("#min_price,#max_price").on("paste keyup", function () {
    //
	//   $('#price-range-submit').show();
    //
	//   var min_price_range = parseInt($("#min_price").val());
    //
	//   var max_price_range = parseInt($("#max_price").val());
    //
	//   if(min_price_range == max_price_range){
    //
	// 		max_price_range = min_price_range + 100;
    //
	// 		$("#min_price").val(min_price_range);
	// 		$("#max_price").val(max_price_range);
	//   }
    //
	//   $("#slider-range").slider({
	// 	values: [min_price_range, max_price_range]
	//   });
    //
	// });
    //
    //
	// $(function () {
	//   $("#slider-range").slider({
	// 	range: true,
	// 	orientation: "horizontal",
	// 	min: 0,
	// 	max: 10000,
	// 	values: [1000, 8000],
	// 	step: 1,
    //
	// 	slide: function (event, ui) {
	// 	  if (ui.values[0] == ui.values[1]) {
	// 		  return false;
	// 	  }
    //
	// 	  $("#min_price").val(ui.values[0]);
	// 	  $("#max_price").val(ui.values[1]);
	// 	}
	//   });
    //
	//   $("#min_price").val($("#slider-range").slider("values", 0));
	//   $("#max_price").val($("#slider-range").slider("values", 1));
    //
	// });
    //
	// $("#slider-range,#price-range-submit").click(function () {
    //
	//   var min_price = $('#min_price').val();
	//   var max_price = $('#max_price').val();
    //
	//   alert(min_price);
	// });


        $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 5000,
            values: [ 100, 700 ],
            slide: function( event, ui ) {
                $( "#amount_start" ).val( ui.values[0] );
                $( "#amount_end" ).val( ui.values[1] );



                var start = $('#amount_start').val();
                var end = $('#amount_end').val();


                $.ajax({
                    type : 'get',
                    dataType : 'html',
                    url : '/product',
                    data : { start: start, end: end },   //'start=' +start+ '& end=' +end,
                    success: function(data){

                        $('#divTodo').html(data);

                    }
                });

            }
        });

    } );



});
