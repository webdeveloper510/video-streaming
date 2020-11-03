var APP_URL= $('#base_url').attr('data-url');

$('.rad_But').click(function(){
	//console.log($(this).val());
	if($(this).val()=='male'){
		$('.hide').hide();
	}
	else{
		$('.hide').show();
	}
})

$(document).ready(function() {

        $('.rad_But').each(function() {
            if ($(this).is(':checked') == true) {
                $(this).val()=='male' ? $('.hide').hide() : $('.hide').show();
            }
        });
        
    });

 function mufunc(){

 	 //console.log($('.subnav').get(0).style.opacity);
	 if($('.subnav').get(0).style.display=='' || $('.subnav').get(0).style.opacity==0){

 	 	$('.subnav').css({'top':'100%', 'display':'block', 'opacity':'1'})
 	 }
 	 else {
	 	$('.subnav').css({'top':'100%', 'display':'none', 'opacity':'0'})
 	 }
	 
    
        //$('.subnav').attr('style') ?  : $('.subnav').css({'top':'100%', 'opacity':'1'})

 }

 $("#selectCategory").change(function(){

					
		var getUserID = $(this).val();

		//console.log(getUserID);return false;

		if(getUserID != '')
		{

			$.ajax({
				type: 'POST',
				   url:APP_URL+"/postId",
				dataType: "json",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"id": getUserID},

				success: function(data){
					//console.log(data);return false;
					if(data.status!=0){

						console.log('yes');

					 $('#subCategory').empty();

					 $('#subCategory').append('<option>Choose Subcategory</option>');
		                   
					 $.each(data, function(key, value) {
		               $('#subCategory')
		              .append($("<option></option>")
		                .attr("value",value.id)
		                .text(value.subcategory)); 
                       });
					}

					else{
						//console.log('cc');
						 $('#subCategory').empty();

						 $('#subCategory').append('<option>Choose Subcategory</option>');
					}
					
				}
			});
		}
		else
		{
			console.log('no');
		}
		});


$('#file_input').change(function(){
	readURL(this);
})

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(document).on('click', '#checkPrice', function () {
	var token= $('.token').val();
	//console.log(token);
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/checkprice",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"token": token},

				success: function(data){
						console.log(data);

						if(data.status==1){

							$('#stripeDiv').show();

						var beforePrice= parseInt(data.token)/20;
						var afterPrice=beforePrice * (data.fee/100);
						var credit = 2.9;
						var total= parseFloat(beforePrice)+ parseFloat(afterPrice);
						$('.calculate').html('');
						$('.calculate').append("<table  class='table text-white'><tr><th>Price:</th><td>" +beforePrice+"</td></tr><tr class='text-white'><th>Fee:</th><td>"+data.fee+"%"+"</td></tr><tr><th>Total:</th><td>"+total.toFixed(2)+"</td></tr></table>")
						$('.amount').text('$'+total.toFixed(2));
						$('.price').val(total.toFixed(2));
						$('#tokens').val(data.token);
						}

						else{
							console.log('te');
						}
					
				}
		});

});

  $('.section_advance').click(function(){
    $(this).next('#collapseExample1').removeClass('show');
  })


