$('.rad_But').click(function(){
	console.log($(this).val());
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

		//console.log(getUserID);

		if(getUserID != '')
		{
			$.ajax({
				type: 'POST',
				url: 'postId',
				dataType: "json",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
				data: {"id": getUserID},
				success: function(data){
					//console.log(data);
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