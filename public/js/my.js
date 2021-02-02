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


$(document).on('click', '.user', function () {

    if($(this).hasClass("imChecked")){

      $(this).prop('checked', false);
       $(this).removeClass("imChecked");
    }

    else{
     $(this).prop('checked', true);
       $(this).addClass("imChecked");
    }

})
$(document).on('click', '.show_list', function () {
	$('.create_playlistt').show();
})

$(document).on('click','.select_list',function(){

		var listname= $(this).text();
		$(this).parent().find('.select_list').removeClass('active');
		$(this).addClass('active');
	//console.log(listname);return false;
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/selectListname",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"listname": listname},

				success: function(data){

					console.log(data);

					
				}
		});

})

$(document).on('change','#exampleFormControlSelect1',function(){

		var listid= $(this).val();
	//console.log(listid);return false;
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/showLists",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"id": listid},

				success: function(data){

				window.location.href = APP_URL+'/play';


					
				}
		});

})




$(document).ready(function(){

  var firstName = $('.firstName').text();
   var intials = $('.firstName').text().charAt(0);
   var profileImage = $('.profileImage').text(intials);
  
});
$(document).ready(function() {

       //console.log('hello');

        $('.rad_But').each(function() {
            if ($(this).is(':checked') == true) {
                $(this).val()=='male' ? $('.hide').hide() : $('.hide').show();
            }
        });


	var id1= $(".media1:checked").attr('class').split(' ');


	  var notId= $(".media1:not(:checked)").attr('class').split(' ');
	  
			$('#'+id1[1]).show();
			$('#'+notId[1]).hide();

  	   //var id1= $(".media1:checked").attr('class').split(' ');

  	//var notId2= $(".media1:not(:checked)").attr('class').split(' ');
  	//$('#'+id1[1]).show();
  	//$('#'+notId2[1]).hide();

        
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

$(document).on('keyup change', '#change_duration', function () {
//$("#change_duration").bind('keyup mouseup', function () {
	//console.log('yes');return false;
	var pay_price = $(this).attr('data-id') * $(this).val() + parseInt($('#additional').val()); 
	
	$('#offer_pay').val(pay_price);
	$('#change_text').html("You will Pay:" + $(this).attr('data-id') * $(this).val() + " "+"PAZ" + "+ "+ "Addtioanl Price"+" "+$('#additional').val()+" = "+ " "+pay_price+ " "+"PAZ");

	console.log(pay_price);     
});
function readURL(input) {

	document.getElementById('filename').textContent=input.files[0].name;

	//$('.filename').val();

	//console.log(input.files[0])
 
// var filepath = input.value;
// var extension = filepath.split('.')[1];
// if(extension=='mp4'){
// 	document.getElementById('image').style.display='none'
// 	document.getElementById('video_choose').style.display='block'
//    var $source =  $('#video') ;
// 	$source[0].src = URL.createObjectURL(input.files[0]);
//    $source.parent()[0].load();
// }
// else{
// 	document.getElementById('video_choose').style.display='none'
// 	document.getElementById('image').style.display='block'
// 	var $source = $("#image");
// 	$source[0].src = URL.createObjectURL(input.files[0]);
//    $source.parent()[0].load();
// }

  // console.log(input.value);return false;
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
    
//     reader.onload = function(e) {
//       $('#blah').attr('src', e.target.result);
//     }
    
//     reader.readAsDataURL(input.files[0]); // convert to base64 string
//   }
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

$(document).on('click', '.create_list', function () {
	var listname= $('.list').val();
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/createList",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"listname": listname},

				success: function(data){

					//console.log(data);return false;
					
					if(data.status==1){
						$('.message').show();
						$('.Playlist1').append("<h5 class='select_list'>"+data.listname+"</h5>");
						$('.message').html(data.message);
						$('.list').val('');

					}

					else{
							$('.message').show();

						$('.message').html(data.message);
					}

						
					
				}
		});

});

$(document).on('click', '.addNow', function () {
	var token= $('.token').val();
	var videoid= $('#vidid').val();
	var artist= $('.art_id').val();
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/addToLibrary",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"videoid": videoid, 'price':token, 'art_id':artist},

				success: function(data){

					console.log(data);return false;
					
					if(data.status==1){
						$('.message').show();

						$('.message').html(data.messge);

					}


						
					
				}
		});

});

$(document).on('click', '.multipleAdd', function () {

	var token= $('.total').text();
	var artistId= $('#art_id').val();
	
	$.ajax({
				type: 'POST',
			    url:APP_URL+"/addmMltiple",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {'price':token,'art_id':artistId},

				success: function(data){

				console.log(data);

					if(data.status==1){
						
							$('.message').show();

							$('.message').html(data.messge);
							setTimeout(function(){ 
								location.reload();
							}, 2000);

					}

					
				}
		});

});

$(document).on('click', '.library', function () {

		addMultiple('true',id='');

	

});

$(document).on('click', '.removeSession', function () {

	var id = $(this).attr('id');

		addMultiple('false',id);

	

});



function addMultiple(check,id){

	if(check=='false'){

		var remove = 'yes';
	}

	else{
		var remove = 'No';
	}

	//console.log('yes');return false;

	$.ajax({
				type: 'POST',
			    url:APP_URL+"/addMultipleVideo",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {'isRemove':remove,'id':id},

				success: function(data){

					console.log(data);

					if(id!=''){
						console.log('id h');
						//$('.media_div').find('#'+id).trigger("click");
					}

					//console.log(data);

					$('#exampleModal').html(data);
						if($('.total').text()==0){

							$('.close').trigger('click');
						}

					



						
					
				}
		});

}


$(document).on('click', '.section_advance', function () {

	$(this).parent().parent().find('.bar').hasClass('rightbar') ? $(this).parent().parent().find('.bar').removeClass('rightbar') : $(this).parent().parent().find('.bar').addClass('rightbar')
	
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
			 
			 clas1[1]=='audio1' ? $('.quality').hide():$('.quality').show();

			var notId1= $(".media1:not(:checked)").attr('class').split(' ');

			$('#'+clas1[1]).show();

			$('#'+notId1[1]).hide();
  })

 $('.action').click(function(){

  		var value = $(this).val();

  		var key = $(this).attr('data-key');

  		var userid = $(this).attr('user-id');

  

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

	$('#reqid').val(id);

}


function getofferid(id,desc,userid){


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

/*------------Select Multiple Video By  Choose--------------------------------------*/

$(document).on('click', '.bardot', function () {
	// $('.choose1').show();
	 $('.checkall').show();

	});

$(document).on('click','.slct_video',function(){
	console.log("asas");
	 var price = $(this).attr('data-id');

	 	var id = $(this).attr('id');
		 $("#"+id).toggleClass("selected");
	   var count = $('.count').text();

	   var tokens = $('.paz').text();

	   	 if($(this).prop("checked") == true){

                var Ischeck = true;

		      var newCount = parseInt(count)+1;

		     var newPaz = parseInt(tokens)+parseInt(price);

		        $('.paz').text(newPaz);

		        $('.count').text(newCount);

		          $('.choose1').show();
            }

            else{
            var Ischeck = false;

		 	var newCount = parseInt(count)-1;

		 	$('.count').text(newCount);

		 	 var newPaz = parseInt(tokens)-parseInt(price);
			 $('.paz').text(newPaz);
			 
            }

            newCount==0 ? $('.choose1').hide() : $('.choose1').show();
		




  		$.ajax({
				type: 'POST',
			    url:APP_URL+"/selectMultiple",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {"price": price, "id": id, "isCheck":Ischeck},

				success: function(data){

				     console.log(data);return false;
					
					
				}
		});

})


$(document).on('click','.off',function(){

	//alert('hello');return false;

		$('.media_div').find('.slct_video:checked').trigger("click");
		 $('.media_div').find('.checkall').css("display",'none');
})

$(document).on('click', '.addTowishlist', function () {

	$.ajax({
				type: 'POST',
			    url:APP_URL+"/addToWish",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {},

				success: function(data){

					//console.log(data);return false;

					if(data.status==1){
						$('html,body').animate({
							scrollTop: $("#message").offset().top
						}, 'slow');
						$('.message#message').show();

						$('.message').html(data.message);	
					}





						
					
				}
		});

});


/**-----------------------------------------------Add Tip To Artist------------------------------------------- */
$(document).on('click', '#addTip', function () {

	var paz = $("#paz_amount").val();
	var total_paz = $("#total_paz").text();
	var artistId = $(this).attr('data-id');

	//console.log(artistId);return false;
	$.ajax({
		type: 'POST',
		url:APP_URL+"/sendToTip",
		 headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   },

		data: {'price':paz, 'artistid':artistId, 'total_paz':total_paz},

		success: function(data){

			//console.log(data);return false;

			if(data.status){

				alert(data.message);

				location.reload();
				
			}			
			
		}
});

})
/*-------------------------------------------------Forget Password Link----------------------------------------------------*/
$(document).on('click', '#forgetLink', function () {

	var email = $('#email').val();

	$.ajax({
				type: 'POST',
			    url:APP_URL+"/resetPassword",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {'email':email},

				success: function(data){

					if(data==1){
						$('.show_message').html('Please Check your Email');
					}






						
					
				}
		});

});

/*--------------------------------------------check Name Exist-------------------------------------------------*/


$(document).on('keyup', '.checknameExist', function () {

	

	var redioChecked = $('.user:checked').val();

	var id = $(this).attr('data-id');

	//console.log(redioChecked);return false;

	$.ajax({
		type: 'POST',
		url:APP_URL+"/checknameExist",
		 headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   },

		data: {'nickname':$(this).val(),'name':$(this).attr('name'),'table':redioChecked},

		success: function(data){

			//console.log(data);
			if(data==1){
				//console.log('ys');
				$('#'+id).show();
				$('#'+id).addClass('alert alert-danger').removeClass('alert-success');
				$('#'+id).html(id=='email'?'Email Already Exist':'User Already Exist!');
			}

			else{

				$('#'+id).show();
				$('#'+id).addClass('alert alert-success').removeClass('alert-danger');

				$('#'+id).html(id=='email' ? 'Email Available!':'User Available');

			}


	
			
		}
});

})



function updateRead(){

	var ids = $('#notids').val();
	

	$.ajax({
		type: 'POST',
		url:APP_URL+"/readNotification",
		 headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   },

		data: {'id':ids},

		success: function(data){

			//console.log(data);
			if(data==1){
			  $('#bold').removeClass("bold");
			}

	
			
		}
});

}

/*-------------------------------Subscribe To Artist----------------------------------------------------*/

function subscribe(id,setValue){
	
	$.ajax({
		type: 'POST',
		url:APP_URL+"/subscribe",
		 headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   },

		data: {'id':id, 'bool':setValue},

		success: function(data){

			//console.log(data);return false;

			if(setValue && data.status==1){
				$('#subscribe').hide();
				$('#unsubscribe').show();
			}
			else if(!setValue && data.status==1){
				$('#subscribe').show();
				$('#unsubscribe').hide();
			}
	
			
		}
});
}

/*--------------------------------------------Order Video-------------------------------------------------*/

$(document).on('click','.off',function(){

	$('.media_div').find('.slct_video:checked').trigger("click");
	 $('.media_div').find('.checkall').css("display",'none');
})

$(document).on('submit', '#form_sub', function (event) {
	event.preventDefault();
       $.ajax({
			type: 'POST',
			url:APP_URL+"/orderVideo",
			 headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   },

			data: $(this).serialize(),

			success: function(data){

					if(data.status==1){
						$('.show_alert').show();
						$('.show_alert').html(data.message);
					}	
					
					else{

						$('.show_alert').show();
						$('.show_alert').html(data.message);
					}
				
			}
	});

});
/**-------------------------------------------------------Edit Offer Data-------------------------------------------------------------------- */


$(document).on('submit', '#edit_form', function (event) {
	event.preventDefault();
	var formData = new FormData($(this)[0]);
	//console.log(formData);return false;
       $.ajax({
			type: 'POST',
			url:APP_URL+"/edit_offer",
			 headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   },

			data: formData,
			processData: false,
			contentType: false,

			success: function(data){

				//console.log(data);return false;

				if(data.status==1){
					$('.alert-success').show();
					$('.alert-success').html(data.message);
					$('#close').trigger('click'); 
					 setTimeout(function(){ 
						$('#close').trigger('click'); 
						loadingmessage();
						location.reload();
					  }, 3000);
				}

				else{

					$('.alert-danger').show();
					$('.alert-danger').html(data.message);
					
				}


			}
	});

});


function loadingmessage(){
	alert('Offer Update Successfully!');
}


$(document).on('submit', '#edit_profile_info', function (event) {
	event.preventDefault();
	var formData = new FormData($(this)[0]);
	//console.log(formData);return false;
       $.ajax({
			type: 'POST',
			url:APP_URL+"/edit_info",
			 headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		   },

			data: formData,
			processData: false,
			contentType: false,

			success: function(data){

				//console.log(data);return false;

				if(data.status==1){
					$('.alert-success').show();
					$('.alert-success').html(data.message);

					setTimeout(function(){ 
						location.reload();
					 }, 3000);
				}

				else{

					$('.alert-danger').show();
					$('.alert-danger').html(data.message);
					
				}


			}
	});

});

function addTohistory(type){
	var id = $('#vidid').val();
		$.ajax({
				type: 'POST',
			    url:APP_URL+"/addTohistory",
				 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },

				data: {'id':id, 'types':type},

				success: function(data){	
					//console.log(data);

				}
		});

}

// function change_other(){
// 			//var x =[];
// 		$('.edittable').each(function(index, obj)
// 		{
// 			var text = $(this).text();
// 			$(this).html("<input type='text' value='"+text+">'");
// 		    //x.push($(this).text());
// 		});

// 		//console.log(x);
// }

$('.image').click(function(){
	var image_type = $(this).attr('data-id');
	$('#image_type').val(image_type);
	$('.image_change').trigger('click');
})

$(document).on('change','#change_section',function(){

	var value = $(this).val();
		console.log(value);
	//$('.container').find('.'+value).hide()
	$('.container .filter_div').each(function(i, obj) {
		var hide_div = $(this).attr('id');

		console.log(hide_div);
		
		$('.container').find('#'+hide_div).hide()
		$('.container').find('#'+value).show();
		//console.log($(this).attr('id'));
		//test
	});
	

})

function imageUpdate(data){


	$('#imageChange').click();


}

$('#filechange').submit(function(e){
	//console.log('abc');
	e.preventDefault();

var formData = new FormData($(this)[0]);

//console.log(formData);return false;

$.ajax({
	type: 'POST',
	url:APP_URL+"/change_image",
	 headers: {
	 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },

	data: formData,
	processData: false,
	contentType: false,

	success: function(data1){

		console.log(data1);

		if(data1.status==1){
			location.reload();
		}

	


	}
});
});

function edit_offer(data){
		var json_info = JSON.parse(data);
		var url = 'http://localhost/laravel/video-streaming/storage/app/public/video/';
		var src= url+json_info.media;
		//console.log(json_info);return false;
		$('#title').val(json_info.title);
		$("input[value='" + json_info.type + "']").prop('checked', true);
		$('#offerid').val(json_info.id);
		$('#min').val(json_info.min);
		$('#max').val(json_info.max);
		$('#additional_price').val(json_info.additional_price);
		$('#video').attr('src',src);
		$('#file_url').val(json_info.media);
		$('#price').val(json_info.price);
		$('#speed').val(json_info.delieveryspeed);
		$('#description').val(json_info.description);
		$('#select_status').val(json_info.offer_status).attr("selected","selected");
		$('#quality').val(json_info.quality).attr("selected","selected");
		$('#selectCategory').val(json_info.categoryid).attr("selected","selected");;
	//alert('helo');
	//$('#myModal').modal('show');
}


function change_other_info(data){

	var json_info = JSON.parse(data);

	$('#aboutme').val(json_info.aboutme);
	$('#weight').val(json_info.weight).attr("selected","selected");
	$('#height').val(json_info.height).attr("selected","selected");
	$('#sexology').val(json_info.sexology).attr("selected","selected");
	$('#haircolor').val(json_info.haircolor).attr("selected","selected");
	$('#eyecolor').val(json_info.eyecolor).attr("selected","selected");
	$('#privy').val(json_info.privy).attr("selected","selected");
	$('#hairlength').val(json_info.hairlength).attr("selected","selected");
}


/**------------------------------------------------------Filter Projects ------------------------------------------------- */

function filterproject(data){

	var value = data.value;

	var dataset = $('.filteration_table tbody').find('tr ');

	//console.log(dataset);return false;
  
    dataset.show();
    
    dataset.filter(function(index, item) {
		//console.log($(item).find('td:eq(5)').text().indexOf());return false;
      return $(item).find('td:eq(5)').text().indexOf(value) === -1;
    }).hide();


}

$(document).on('keyup', '#calculate_tokens', function () {
	var amount = parseInt($(this).val())/20;
	var fees = (parseFloat(amount)*$("#fees").val())/100;
	$('#real_amount').val(parseFloat(amount)-parseFloat(fees));
	//$('.show_fees').text("After Calculate Service Fees" +" "+$("#fees").val())

})


/**--------------------------------------------------Data Table Js---------------------------------------------------------- */

/* Formatting function for row details - modify as you need */
function format ( d , type) {

	// var hair = d.haircolor.split(',');
	// var privy = d.privy.split(',');
	// var lense = d.eyecolor.split(',');

   //console.log(type);

	// `d` is the original data object for the row
	if(type=='offer')
	{
		updateStatus(d.id,type);
    return '<div class="offer">'+
	'<div class="row">'+
	  '<div class="col">'+
			'<div class="descriptions">'+
			'<h3 class="description">Description :</h3>'+
			'<p>'+ d.description +'</p>'+
			'</div>'+
	  '</div>'+
		'<div class="col">'+
		'<h3 class="look">Additional Request :</h3>'+
		'<p>'+d.userdescription+'</p>'+
		'</div>'+
	'<div class="col">'+
	'<table>'+
	'<tr>'+
	'<td> <p>Categories :</p>'+
	'<p class="category">'+d.catgories+'</p>'+
	'</td>'+
	'<td> <p class="quality">Quality :</p>'+
	'<p>'+d.quality+'px</p>'+
	'</td>'+
	'</tr>'+
	'<tr><td>Reward:</td><td class="Reward">300PAZ</td></tr>'+
	'<tr>'+
	'</table>'+
	'<div class="">'+
	'<button type="button"class="btn btn-primary">Upload Content</button>'+
	'</div>'+
	'</div>'+
	'</div>'+
	'</div>';
   }

   else{
	updateStatus(d.id,type);
	return '<div class="project">'+
	'<div class="row">'+
	  '<div class="col">'+
			'<div class="descriptions">'+
			'<h3 class="description">Description :</h3>'+
			'<p>'+d.description+'</p>'+
			'</div>'+
	  '</div>'+
		'<div class="col">'+
		'<h3>Look :</h3>'+
		'<p style="color:red;">Hair Color'+'</p>'+
		'<span>'+d.haircolor+'</span>'+
		'<p style="color:red;">Eye Color'+'</p>'+
		 '<span>'+d.eyecolor+'</span>'+
		'<p style="color:red;">Privy'+'</p>'+
		'<span>'+d.privy+'</span>'+
		'</div>'+
	'<div class="col">'+
	'<table>'+
	'<tr>'+
	'<td> <p>Categories :</p>'+
	'<p class="category">'+d.category_name+'</p>'+
	'</td>'+
	'<td> <p class="quality">Quality :</p>'+
	'<p>'+d.quality+'px</p>'+
	'</td>'+
	'</tr>'+
	'<tr><td>Reward:</td><td class="Reward">'+d.total_price+'PAZ</td></tr>'+
	'<tr>'+
	'</table>'+
	'<div class="">'+
	'<button type="button"class="btn btn-primary">Upload Content</button>'+
	'</div>'+
	'</div>'+
	'</div>'+
	'</div>';
   }
}

$(document).ready(function() {
    var table = $('#example').DataTable({
       'ajax': APP_URL+'/artist/getRequests/projects',
       'columns': [
            {
                'className':      'details-control',
                'orderable':      false,
                'data':           null,
                'defaultContent': ''
            },
            { 'data': 'title' },
            { 'data': 'media' },
			{ 
				'data': 'duration' ,
				// render: function ( data, type, row ) {
				// 	return  data+'Minutes';
				// }
			},
			{
		
            "data": null,
			"defaultContent": 'Projects'
			},
            { 'data': 'user_name' },
            { 'data': 'status' },
            { 
				'data': 'remaining_days' ,
				render: function ( data, type, row ) {
					return  data < 0 ? 'Expired' : data +' Days';
				}
			}
        ],
      //  'order': [[1, 'asc']]
	} );
	

	    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if(row.child.isShown()){
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data(),'request')).show();
            tr.addClass('shown');
        }
    });

    // Handle click on "Expand All" button
    $('#btn-show-all-children').on('click', function(){
        // Enumerate all rows
        table.rows().every(function(){
            // If row has details collapsed
            if(!this.child.isShown()){
                // Open this row
                this.child(format(this.data(),'request')).show();
                $(this.node()).addClass('shown');
            }
        });
    });

    // Handle click on "Collapse All" button
    $('#btn-hide-all-children').on('click', function(){
        // Enumerate all rows
        table.rows().every(function(){
            // If row has details expanded
            if(this.child.isShown()){
                // Collapse row details
                this.child.hide();
                $(this.node()).removeClass('shown');
            }
        });
	});




	/**-----------------------------------------------------For Orders----------------------------------------------------------- */
	var table1 = $('#example1').DataTable({
		'ajax': APP_URL+'/artist/getRequests/orders',
		'columns': [
			 {
				 'className':      'details-control',
				 'orderable':      false,
				 'data':           null,
				 'defaultContent': ''
			 },
			 { 'data': 'title' },
			 { 'data': 'type' },
			 { 'data': 'choice' },
			 {
		 
			 "data": null,
			 "defaultContent": 'Orders'
			 },
			 { 'data': 'nickname' },
			 { 'data': 'status' },
			 { 
				 'data': 'remaining_days',
				 render: function ( data, type, row ) {
					return  data < 0 ? 'Expired': data+' Days';
				}
				 }
		 ],
	   //  'order': [[1, 'asc']]
	 } );
	 
 
		 // Add event listener for opening and closing details
	 $('#example1 tbody').on('click', 'td.details-control', function(){
		 var tr = $(this).closest('tr');
		 var row = table1.row( tr );
 
		 if(row.child.isShown()){
			 // This row is already open - close it
			 row.child.hide();
			 tr.removeClass('shown');
		 } else {
			 // Open this row
			 row.child(format(row.data(),'offer')).show();
			 tr.addClass('shown');
		 }
	 });
 
	 // Handle click on "Expand All" button
	 $('#btn-show-all-children1').on('click', function(){
		 // Enumerate all rows
		 table1.rows().every(function(){
			 // If row has details collapsed
			 if(!this.child.isShown()){
				 // Open this row
				 this.child(format(this.data(),'offer')).show();
				 $(this.node()).addClass('shown');
			 }
		 });
	 });
 
	 // Handle click on "Collapse All" button
	 $('#btn-hide-all-children1').on('click', function(){
		 // Enumerate all rows
		 table1.rows().every(function(){
			 // If row has details expanded
			 if(this.child.isShown()){
				 // Collapse row details
				 this.child.hide();
				 $(this.node()).removeClass('shown');
			 }
		 });
	 });

});


function updateStatus(id,type){
	$.ajax({
		type: 'POST',
		url:APP_URL+"/update_Status",
		 headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   },

		data: {'id':id, 'type':type},

		success: function(data){	
			console.log(data);

		}
});
}

function getPaz(a){
	$('.set_paz').val(a);
	//console.log(a);
}
/*------------------------------------------Add Active Class-----------------------------------------------*/

// $('.nav-item').click(function(){
// 	$(this).parent('.nav').find('.nav-item').removeClass('active');
// 	$(this).addClass('active');
// })



// $(document).on('click', '.showoffer', function () {

// 	$('#nav-tab').find('.tabss').removeClass('active');

// 	//alert('hello');

// 	$('#nav-tab').find('#nav-offer-tab').addClass('active').trigger('classChange');

// 	$('#nav-offer-tab').trigger('click');




// })

