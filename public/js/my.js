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

	 console.log($('.subnav').get(0).style.opacity);

	 if($('.subnav').get(0).style.opacity=='' || $('.subnav').get(0).style.opacity==0){

	 	$('.subnav').css({'top':'100%', 'opacity':'1'})
	 }
	 else {
	 	$('.subnav').css({'top':'100%', 'opacity':'0'})
	 }
	 
    
       //$('.subnav').attr('style') ?  : $('.subnav').css({'top':'100%', 'opacity':'1'})


}