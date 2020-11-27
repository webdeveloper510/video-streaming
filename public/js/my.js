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

// $(document).on('click', '.user', function () {

//     if($(this).is(":checked")){

//     			$(this).prop('checked',false);
//     }

//     else{
//     	$(this).prop('checked',true);
//     		console.log('ff');
//     }

// })
$(document).ready(function(){
	//alert('hel');return false;
  var firstName = $('.firstName').text();
  //console.log(firstName);return false;
   var intials = $('.firstName').text().charAt(0);
   var profileImage = $('.profileImage').text(intials);
});
$(document).ready(function() {


        $('.rad_But').each(function() {
            if ($(this).is(':checked') == true) {
                $(this).val()=='male' ? $('.hide').hide() : $('.hide').show();
            }
        });


     var id= $(".media:checked").attr('class').split(' ');

     //alert(id);

  	var notId= $(".media:not(:checked)").attr('class').split(' ');
  	$('#'+id[1]).show();
  	$('#'+notId[1]).hide();

  	   var id1= $(".media1:checked").attr('class').split(' ');

  	var notId2= $(".media1:not(:checked)").attr('class').split(' ');
  	$('#'+id1[1]).show();
  	$('#'+notId2[1]).hide();

        
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

$(document).on('change', '#file_input', function () {
	//alert('he;p');return false;
	readURL(this);
})

function readURL(input) {


  var $source = $('#blah');
   $source[0].src = URL.createObjectURL(input.files[0]);
  $source.parent()[0].load();
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(document).on('click', '#checkPrice', function () {
	//alert('hello');return false;
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
						//console.log(data);

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
							//console.log('te');
						}
					
				}
		});

});
$(document).on('click', '.section_advance', function () {
	$(this).parent().parent().find('.bar').hasClass('rightbar') ? $(this).parent().parent().find('.bar').removeClass('rightbar') : $(this).parent().parent().find('.bar').addClass('rightbar')

	//$('#bar').hasClass('rightbar') ? $('.bar').removeClass('rightbar') : $('#bar').addClass('rightbar');
	
})
$(document).on('click', '.link_click', function () {
	 if($(this).hasClass('active')){
}
else{
	$(this).parent().find('li').removeClass('active');
	$(this).addClass('active');
}
})


  $(document).on('click', '.media', function () {


  	    	var clas = $(this).attr('class').split(' ');

  	    var notId= $(".media:not(:checked)").attr('class').split(' ');
  	 
    $('#'+clas[1]).show();
  	$('#'+notId[1]).hide();


  });

    $(document).on('click', '.media1', function () {

  			
  		var clas1 = $(this).attr('class').split(' ');

  	var notId1= $(".media1:not(:checked)").attr('class').split(' ');
  	$('#'+clas1[1]).show();
  	$('#'+notId1[1]).hide();
  })

 $('.action').click(function(){

 	//console.log('kk');
  		var value = $(this).val();

  		var key = $(this).attr('data-key');

  		var userid = $(this).attr('user-id');

  		//console.log(value);

  		$.ajax({
				type: 'POST',
			    url:APP_URL+"/updateStatus",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"status": value, "key": key, "userid":userid},

				success: function(data){

					//console.log(data);return false;
						
						if(data.status==1){

								$('#messge').show().html(data.messge);

								setTimeout(function(){ 

									location.reload();

								}, 2000);

						}
					
				}
		});

  })

function getId(id){
	//console.log(id);
	$('#reqid').val(id);
}


function getofferid(id,desc,userid){

	//console.log(id);

	$(".description").val(desc);

	$('#offerid').val(id);
	$('#userid').val(userid);

}

function editdesc(id,desc){

$(".description").val(desc);

$('#offerid').val(id);
}

function showDiv(){
	$('.notif').toggle();
}





