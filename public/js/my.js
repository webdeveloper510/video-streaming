var storage_url;
var selectLoader;

var APP_URL = $('#base_url').attr('data-url');

$('.rad_But').click(function () {
    if ($(this).val() == 'male') {
        $('.hide').hide();
        $("#tits").removeAttr("required");
        $("#ass").removeAttr("required"); 
    } 
    else {
        $('.hide').show();
        $("#tits").attr("required", true);
        $("#ass").attr("required", true);    
    }
})

$(document).on('click', '.user', function () {

    $(this).val() == 'users'
        ? $('.discount').show()
        : $('.discount').hide();

    if ($(this).hasClass("imChecked")) {

        $(this).prop('checked', false);
        $(this).removeClass("imChecked");
    } else {
        $(this).prop('checked', true);
        $(this).addClass("imChecked");
    }

})
$(document).on('click', '.show_list', function () {
    $('.create_playlistt').show();
})

$(document).on('click', '.select_list', function () {

    var listname = $(this).text();
    $(this)
        .parent()
        .find('.select_list')
        .removeClass('active');
    $(this).addClass('active');
    //console.log(listname);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/selectListname",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "listname": listname
        },

        success: function (data) {

            console.log(data);

        }
    });

})

$(document).on('change', '#exampleFormControlSelect1', function () {

    var listid = $(this).val();
    //console.log(listid);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/showLists",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "id": listid
        },

        success: function (data) {

            window.location.href = APP_URL + '/play';

        }
    });

})

$(document).ready(function () {

//    console.log('ffhfhf')


    storage_url = $('#storagePath').attr('url');

    var checked_radio = $('.user:checked').val();

    checked_radio == 'contentprovider'
        ? $('.discount').hide()
        : $('.discount').show()

    function format3(d) {

        //console.log(d);return false;
        var disable = d.remaining_days > 0
            ? 'disabled'
            : ''

        var original_media = d.deliever_media;

        var reward = ( d.price * d.choice);

        var price = d.userdescription!='No Additional Requests' ? reward + parseInt(d.additional_price) : reward;

        var folder = d.type == 'video'
            ? 'video'
            : 'audio';

        var existMedia = d.deliever_media
            ? storage_url + '/' + folder + '/' + original_media
            : '';

        return '<div class="offer"><div class="row"><div class="col"><div class="descriptions"' +
                '><h3 class="description">Description :</h3><p>' + d.description + '</p></div><' +
                '/div><div class="col"><h3 class="look">Additional Request :</h3><p>' + d.userdescription +
                '</p></div><div class="col"><table><tr><td> <p>Categories :</p><p class="catego' +
                'ry">' + d.catgories + '</p></td><td> <p class="quality">Quality :</p><p>' + d.quality +
                'p</p></td></tr><tr><td colspan="2">Paid: <span class="Reward" style="color: go' +
                'ld !important;">' + d.tokens + '<b style="color: gold !important;font-family: ' +
                'Alfa Slab One;font-weight: 400;"> PAZ </b></span></td></tr><tr></table><div cl' +
                'ass="mt-3"><a href=' + existMedia + ' id="hash" download></a><button type="but' +
                'ton"class="btn btn-primary" onclick="download1(this)">Download</button>&nbsp;&' +
                'nbsp;<button type="button" class="btn btn-outline-success"' + disable + '>Canc' +
                'el Order</button></div></div></div></div>';
    }

    //console.log('yes');
    var table2 = $('#example2').DataTable({
        'ajax': APP_URL + '/customer_orders/orders',
        'columns': [
            {
                'className': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            }, {
                'data': 'title',

            }, {
                'data': 'type'
            }, 
            {
                'data': 'choice',
                render: function (data, type, row) {
                        return  data + ' Minute(s)';
                     }
            },
             {
                'data': 'delieveryspeed',
                // render: function (data, type, row) {
                //     return data < 0
                //         ? 'Expired'
                //         : data + ' Days';
                // }
                render:function(data,type,row){

                    return parseInt(data)+1+" "+'days'
                }
            }, 
            {
                'data': 'nickname'
            }, 
            {
                'data': 'status',
                render:function(data,type,row){
                    if(data=='cancel'){
                        $('#model_text').html(row.reason_of_cancel);
                        return "<u><a href='#' data-toggle='modal' data-target='#Cancelled'>"+data+"</a></u>"
                    }
                    else{
                        return data;
                    }

                }
            },
            {
                'data': 'created_at'
            }
        ]
    });

    // Add event listener for opening and closing details
    $('#example2 tbody').on('click', 'td', function () {
        var tr = $(this).closest('tr');
        var row = table2.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row
                .child
                .hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row
                .child(format3(row.data()))
                .show();
            tr.addClass('shown');
        }
    });

    // Handle click on "Expand All" button
    $('#btn-show-all-children1').on('click', function () {
        // Enumerate all rows
        table2
            .rows()
            .every(function () {
                // If row has details collapsed
                if (!this.child.isShown()) {
                    // Open this row
                    this
                        .child(format3(this.data()))
                        .show();
                    $(this.node()).addClass('shown');
                }
            });
    });

    // Handle click on "Collapse All" button
    $('#btn-hide-all-children1').on('click', function () {
        // Enumerate all rows
        table2
            .rows()
            .every(function () {
                // If row has details expanded
                if (this.child.isShown()) {
                    // Collapse row details
                    this
                        .child
                        .hide();
                    $(this.node()).removeClass('shown');
                }
            });
    });

    var firstName = $('.firstName').text();
    var intials = $('.firstName')
        .text()
        .charAt(0);
    var profileImage = $('.profileImage').text(intials);

    $(".hoverVideo").hover(function () {
        playVideo(this);


    }, function () {
        pause(this);
    });

    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }

});
function pause(a) {
    var video = a;
    video.currentTime = 0;
    video.pause();
}

function download1(a) {
    var anchor = $(a)
        .prev()
        .attr('href');
    if (anchor) {
        $('#hash')[0].click();
    } else {
        $("#download").addClass('show');
    }

}
function playVideo(a) {

    var starttime = 0; // start at 7 seconds
    var endtime = 10; // stop at 17 seconds

    var video = a;

    //console.log(a);return false; console.log(video[0].duration);return false;

    a.autoplay = true;
    a.muted = true;

    //console.log(video);return false;

    a.addEventListener("timeupdate", function () {
        console.log(this.currentTime);
        if (this.currentTime >= endtime) {

            a.currentTime = starttime;
            playVideo();
        }
    }, false);

    //suppose that video src has been already set properly
    a.load();
    a.play(); //must call this otherwise can't seek on some browsers, e.g. Firefox 4
    try {
        a.currentTime = starttime;
    } catch (ex) {
        //handle exceptions here
    }
}
$(document).ready(function () {
    $('.rad_But').each(function () {
        if ($(this).is(':checked') == true) {
            $(this).val() == 'male'
                ? $('.hide').hide()
                : $('.hide').show();
        }
    });
   
    var id1 = $(".media1:checked")
        .attr('class')
        .split(' ');

    var notId = $(".media1:not(:checked)")
        .attr('class')
        .split(' ');

    $('#' + id1[1]).show();

    $('#' + notId[1]).hide();


    

});

function selectVideoBasedOnOption(a){
    var selected_div =$(a).val();
    console.log(selected_div);
    $('.uploa_outer').hide();
    $('#'+selected_div).show();
    
}

function mufunc() {

    //console.log($('.subnav').get(0).style.opacity);
    if ($('.subnav').get(0).style.display == '' || $('.subnav').get(0).style.opacity == 0) {

        $('.subnav').css({'top': '100%', 'display': 'block', 'opacity': '1'})
    } else {
        $('.subnav').css({'top': '100%', 'display': 'none', 'opacity': '0'})
    }

    // $('.subnav').attr('style') ?  : $('.subnav').css({'top':'100%',
    // 'opacity':'1'})

}



$("#selectCategory").change(function () {

    var getUserID = $(this).val();

    //console.log(getUserID);return false;

    if (getUserID != '') {

        $.ajax({
            type: 'POST',
            url: APP_URL + "/postId",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            data: {
                "id": getUserID
            },

            success: function (data) {
                //console.log(data);return false;
                if (data.status != 0) {

                    console.log('yes');

                    $('#subCategory').empty();

                    $('#subCategory').append('<option>Choose Subcategory</option>');

                    $.each(data, function (key, value) {
                        $('#subCategory').append(
                            $("<option></option>").attr("value", value.id).text(value.subcategory)
                        );
                    });
                } else {
                    //console.log('cc');
                    $('#subCategory').empty();

                    $('#subCategory').append('<option>Choose Subcategory</option>');
                }

            }
        });
    } else {
        console.log('no');
    }
});

$(document).on('change', '.file_input', function () {

    var id = $(this).attr('id');

    id
        ? readURL(this, true)
        : readURL(this, false);
})

$(document).on('change', '.chooseImage', function () {

    //alert('he;p');return false;
    readURL1(this);
})

function readURL1(input) {

    var filepath = input.value;

    var extension1 = filepath.split('.')[1];

    var ext = $.trim(extension1);

    if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {

        input.nextElementSibling.textContent = input
            .files[0]
            .name;

    } else {

        input.nextElementSibling.textContent = 'Please Select Image';
    }

}

$(document).on('keyup change', '#change_duration', function () {
    var pay_price = $(this).attr('data-id') * $(this).val();
    if ($(".add_price:checked").val() == 'Yes') {
        var pay_price = $(this).attr('data-id') * $(this).val() + parseInt(
            $('#additional').val()
        )
    } else {
        var pay_price = $(this).attr('data-id') * $(this).val();
    }
    $('#offer_pay').val(pay_price);
    $('#change_text').html("You will Pay:" + pay_price + " PAZ");

    //console.log(pay_price);
});

$(document).on('click', '.add_price', function () {

    //$data-id = $('#change_duration').attr('data-id');

    var total = $('#change_duration').attr('data-id') * $('#change_duration').val();
    var add_price = $('#additional').val()

    $('.add_price').attr('disabled', false);
    //$(this).val())
    if ($(this).val() == 'Yes') {

        $(".extra_price").children().attr("required", true);

        $(this).attr('disabled', true);
        $('.extra_price').show();
        $('#offer_pay').val(parseInt(total) + parseInt(add_price));

        //$('.price_add').html('');
        $('#change_text').html('');
        var total = parseInt(total) + parseInt(add_price)
        //$('.price_add').html('');
        $('#change_text').html('');
        $('#change_text').html("You will Pay:" + total + " PAZ");

    } else {

        $(".extra_price").children().removeAttr('required');

        $(this).attr('disabled', true);
        $('.extra_price').hide();
        $('#offer_pay').val(total);
        //var total = parseInt(total)-parseInt(add_price)
        $('.price_add').html('');
        $('#change_text').html('');

        $('#change_text').html("You will Pay:" + total + " PAZ");

    }

    $(this).off('click');

})

$(document).on('click', '.additional_price', function () {
    alert('hello');
})
function readURL(input, bool) {

    var radio_checked = $(".select_media_pic:checked").val();

    var filepath = input.value;

    var extension = filepath.split('.')[1];

    if (bool) {

        input.nextElementSibling.textContent = input
            .files[0]
            .name;

        return false;

    }

    if (extension != 'mp3' && radio_checked != 'video') {

        $('.disable_this').prop('disabled', true);

        input.nextElementSibling.textContent = 'Please Select Audio File';

        return false;

    } else if (extension != 'mp4' && radio_checked != 'audio') {

        $('.disable_this').prop('disabled', true);

        input.nextElementSibling.textContent = 'Please Select Video File';

        //document.getElementById('filename').textContent='Please Select Video File';

        return false;

    } else {
        $('.disable_this').prop('disabled', false);
        input.nextElementSibling.textContent = input
            .files[0]
            .name;
        //document.getElementById('filename').textContent=input.files[0].name;
    }

}

$(document).on('click', '.radioBtn', function () {
	var id = $(this).attr('id');
 
	$('.'+id).show();
	if(id=='video'){
    
		$('.image').hide();
	}
	else{
		$('.video').hide();
	}
})


$(document).on('click', '#checkPrice', function () {
    //alert('hello');return false;
    var token = $('.token').val();
    //console.log(token);
    $.ajax({
        type: 'POST',
        url: APP_URL + "/checkprice",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "token": token
        },

        success: function (data) {
            //console.log(data);

            if (data.status == 1) {

                $('#stripeDiv').show();

                var beforePrice = parseInt(data.token) / 20;
                var afterPrice = beforePrice * (data.fee / 100);
                var bonus = parseFloat(1000 * (40 / 100)) - parseFloat(1000 * (data.fee / 100));
                var credit = 2.9;
                var total = parseFloat(beforePrice) + parseFloat(afterPrice);
                $('.calculate').html('');
                $('.bonusPAZ').html('Bonus PAZ :' + bonus + 'PAZ');
                $('.calculate').append(
                    "<table  class='table text-white'><tr><th>Price:</th><td>" + beforePrice + "</t" +
                    "d></tr><tr class='text-white'><th>Fee:</th><td>" + data.fee + "%</td></tr><tr>" +
                    "<th>Total:</th><td>" + total.toFixed(2) + "</td></tr></table>"
                )
                $('.amount').text('$' + total.toFixed(2));
                $('.price').val(total.toFixed(2));
                $('#fees').val(afterPrice);
                $('#tokens').val(data.token);
            } else {
                //console.log('te');
            }

        }
    });

});

$(document).on('click', '.create_list', function () {
    var listname = $('.list').val();
    $.ajax({
        type: 'POST',
        url: APP_URL + "/createList",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "listname": listname
        },

        success: function (data) {
            if (data.status == 1) {

                $("<h5 class='select_list'>" + data.listname + "</h5>").insertBefore('.before');

            } else {
                $('.message').show();

                $('.message').html(data.message);
            }

        }
    });

});

$(document).on('click', '.send_time', function () {
    $(this)
        .addClass('btn btn-success')
        .removeClass('btn-info');

    $('#timeframe').val($(this).val());
})

$(document).on('click', '#timeFrame', function () {
    var timeframe = $('#timeframe').val();
    $.ajax({
        type: 'POST',
        url: APP_URL + "/insertTime",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "timeframe": timeframe
        },

        success: function (data) {

            //console.log(data);return false;

            if (data == 1) {

                location.reload();
            } else {
                alert('Some Error Occure');
            }

        }
    });

});

$(document).on('click', '.addNow', function () {
    var token = $('.token').val();
    var videoid = $('#vidid').val();
    var artist = $('.art_id').val();
    $.ajax({
        type: 'POST',
        url: APP_URL + "/addToLibrary",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "videoid": videoid,
            'price': token,
            'art_id': artist
        },

        success: function (data) {
            //console.log(data); return false;
            if (data.status == 1) {
                if (data.messge == 'Insufficient Paz Tokens!') {
                    $('.insuffiecient').show();
                } else {

                    console.log('yes');
                    $('.message').show();

                    $('.message').html(data.messge);

                    setTimeout(function () {
                        location.reload()
                    }, 3000);

                }

            }

        }
    });

});

$(document).on('click', '.multipleAdd', function () {

    var token = $('.total').text();
    var artistId = $('#art_id').val();

    $.ajax({
        type: 'POST',
        url: APP_URL + "/addmMltiple",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'price': token,
            'art_id': artistId
        },

        success: function (data) {

            console.log(data);

            if (data.status == 1) {
                $('#success_message').show();

                $('#success_message').html(data.messge);
                setTimeout(function () {
                    location.reload();
                }, 2000);

            }

        }
    });

});


/*----------------------------------------------Add In Library-------------------------------------------------------*/

$(document).on('click', '.add_in_library', function () {
    $.ajax({
        type: 'POST',
        url: APP_URL + "/libraryAdded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
        },

        success: function (data) {
            
            console.log(data);
                    
                    if(data==1){
                        $('#success_message').show();
                        $('#success_message').html('Added In Playlist');
                        setTimeout(function(){ 
                            location.reload()
                        }, 3000);

                    }
                    else{
                        
                         $('#success_message').show();
                        $('#success_message').html('Some Error Occure');
                        
                    }

        }
    });

});

$(document).on('click', '.library', function () {

    addMultiple('true', id = '');

});

$(document).on('click', '.removeSession', function () {

    var id = $(this).attr('id');

    addMultiple('false', id);

    $(this)
        .parent()
        .remove();

});

function addMultiple(check, id) {

    if (check == 'false') {

        var remove = 'yes';
    } else {
        var remove = 'No';
    }

    //console.log('yes');return false;

    $.ajax({
        type: 'POST',
        url: APP_URL + "/addMultipleVideo",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'isRemove': remove,
            'id': id
        },

        success: function (data) {

            console.log(data);

            if (id != '') {
                console.log('id h');
            }

            $('#exampleModal').html(data);

            if ($('.total').text() == 0) {

                console.log('yes');

                $('.close').trigger('click');
            }

        }
    });

}

$(document).on('click', '.section_advance', function () {

    $(this)
        .parent()
        .parent()
        .find('.bar')
        .hasClass('rightbar')
            ? $(this)
                .parent()
                .parent()
                .find('.bar')
                .removeClass('rightbar')
            : $(this)
                .parent()
                .parent()
                .find('.bar')
                .addClass('rightbar')

})

$(document).on('click', '.link_click', function () {
    if ($(this).hasClass('active')) {} else {

        $(this)
            .parent()
            .find('li')
            .removeClass('active');
        $(this).addClass('active');
    }

    var controls = $(this).children().attr('aria-controls');
   // console.log(controls);
    $('.tab-content').find('.fade').removeClass('show active');
    $('.tab-content').find('#'+controls).addClass('show active');
})

$(document).on('click', '.media', function () {

    var clas = $(this)
        .attr('class')
        .split(' ');

    var notId = $(".media:not(:checked)")
        .attr('class')
        .split(' ');

    $('#' + clas[1]).show();
    $('#' + notId[1]).hide();

});

$(document).on('click', '.media1', function () {

    var clas1 = $(this)
        .attr('class')
        .split(' ');

    clas1[1] == 'audio1'
        ? $('.quality').hide()
        : $('.quality').show();

    var notId1 = $(".media1:not(:checked)")
        .attr('class')
        .split(' ');

    $('#' + clas1[1]).show();

    $('#' + notId1[1]).hide();
})

$('.action').click(function () {

    var value = $(this).val();

    var key = $(this).attr('data-key');

    var userid = $(this).attr('user-id');

    $.ajax({
        type: 'POST',
        url: APP_URL + "/updateStatus",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "status": value,
            "key": key,
            "userid": userid
        },

        success: function (data) {

            //console.log(data);return false;

            if (data.status == 1) {

                $('#messge')
                    .show()
                    .html(data.messge);

                setTimeout(function () {

                    location.reload();

                }, 2000);

            }

        }
    });

})

function getId(id) {

    $('#reqid').val(id);

}



function getofferid(id, desc, userid) {

    $(".description").val(desc);

    $('#offerid').val(id);
    $('#userid').val(userid);

}

function editdesc(id, desc) {

    $(".description").val(desc);

    $('#offerid').val(id);

}

function showDiv() {
    $('.notif').toggle();
}

/* ------------Select Multiple Video By 
 * Choose--------------------------------------
 */

$(document).on('click', '.bardot', function () {
    // $('.choose1').show();
    $('.checkall').show();

});

$(document).on('click', '.slct_video', function () {
    //console.log("asas");
    var price = $(this).attr('data-id');

    var id = $(this).attr('id');
    $("#" + id).toggleClass("selected");
    var count = $('.count').text();

    var tokens = $('.paz').text();

    if ($(this).prop("checked") == true) {

        var Ischeck = true;

        var newCount = parseInt(count) + 1;

        var newPaz = parseInt(tokens) + parseInt(price);

        $('.paz').text(newPaz);

        $('.count').text(newCount);

        $('.choose1').show();
    } else {
        var Ischeck = false;

        var newCount = parseInt(count) - 1;

        $('.count').text(newCount);

        var newPaz = parseInt(tokens) - parseInt(price);
        $('.paz').text(newPaz);

    }

    newCount == 0
        ? $('.choose1').hide()
        : $('.choose1').show();

    $.ajax({
        type: 'POST',
        url: APP_URL + "/selectMultiple",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            "price": price,
            "id": id,
            "isCheck": Ischeck
        },

        success: function (data) {

            console.log(data);

            // $('.choose1 .selected').html(''); $('.choose1
            // .selected').append("<li>"+data.result[0].title+"<span
            // class='price'>"+data.result[0].price+"PAZ</span><button
            // id="+data.result[0].id+" class='removeSession btn btn-info'>X</button>
            // </li>")

        }
    });

})

$(document).on('click', '.off', function () {

    //alert('hello');return false;

    $('.media_div')
        .find('.slct_video:checked')
        .trigger("click");
    $('.media_div')
        .find('.checkall')
        .css("display", 'none');
})

$(document).on('click', '.addTowishlist', function () {

    $.ajax({
        type: 'POST',
        url: APP_URL + "/addToWish",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {},

        success: function (data) {

            //console.log(data);return false;

            if (data.status == 1) {
                $('html,body').animate({
                    scrollTop: $("#message")
                        .offset()
                        .top
                }, 'slow');
                $('.message#message').show();

                $('.message').html(data.message);
            }

        }
    });

});

$(document).on('click', '.aedit', function (event) {
    $(this)
        .prev('.saveBtn')
        .show();
    //$('.aedit').on('click',function(){ console.log('ssss');
    $(this)
        .prev()
        .prev('.select_list')
        .replaceWith(function (i, text) {
            return $("<input>", {
                type: "text",
                value: text,
                name: 'edit',
                class: 'input_val'
                //id: this.id
            })

        });

})

function savePlaylist(a) {
    var value = $(a)
        .prev('.input_val')
        .val();
    var id = $(a).attr('data-id');

    $.ajax({
        type: 'POST',
        url: APP_URL + "/editPlaylist",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'listname': value,
            'id': id
        },

        success: function (data) {

            console.log(data);

            if (data.status == 1) {
                $(a)
                    .prev('.input_val')
                    .replaceWith(function (i, text) {
                        return $("<h5>", {
                            type: "text",
                            text: data.listname,
                            class: 'select_list'
                            //id: this.id
                        })

                    });
                $(a).hide();

            } else {
                console.log('ee')
            }

        }
    });

}

/**-----------------------------------------------Add Tip To Artist------------------------------------------- */
$(document).on('click', '#addTip', function () {

    var paz = $("#paz_amount").val();
    var total_paz = $("#total_paz").text();
    var artistId = $(this).attr('data-id');

    //console.log(artistId);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/sendToTip",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'price': paz,
            'artistid': artistId,
            'total_paz': total_paz
        },

        success: function (data) {

            //console.log(data);return false;

            if (data.status) {

                alert(data.message);

                location.reload();

            }

        }
    });

})
/* -------------------------------------------------Forget Password
 * Link----------------------------------------------------
 */
$(document).on('click', '#forgetLink', function () {

    $('.close_popup').trigger('click');

    var email = $('#email').val();

    $.ajax({
        type: 'POST',
        url: APP_URL + "/resetPassword",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'email': email
        },

        success: function (data) {

            if (data == 1) {

                $('.show_message').show();

                $('.show_message').html('Please check email inbox/spam folder');
            }

        }
    });

});

function editVideoinfo(data) {
    var json_info = data;
    var type = json_info.type;
    $('.video_title').val(json_info.title)
    $('#mediaid').val(json_info.id)
    $('#type').val(json_info.type)
    $('.' + type).show();
    $('.video_price').val(json_info.price)
    $('.video_quality')
        .val(json_info.convert)
        .attr("selected", "selected");

    $('.video_category')
        .val(json_info.catid)
        .attr("selected", "selected");
    if(type=='video'){
        $('.video_category').attr('required',true);
        $('.audio_category').removeAttr('required',true);
    }

    else{
        $('.audio_category').attr('required',true);
        $('.video_category').removeAttr('required',true);
    }
    $('.video_description').val(json_info.description)

}

$(document).on('click', '#withdrawmoney', function () {

    var amount = $('#real_amount').val();

    $.ajax({
        type: 'POST',
        url: APP_URL + "/draw_money",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'amount': amount
        },

        success: function (data) {

            console.log(data);

        }
    });

});



function copy(url) {

    var tempInput = document.createElement("input");
    tempInput.style = "position: absolute; left: -1000px; top: -1000px";
    tempInput.value = url;
    document
        .body
        .appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    console.log("Copied the text:", tempInput.value);
    document
        .body
        .removeChild(tempInput);
    document
        .getElementById('myBtn')
        .innerHTML = 'Copied';

}

/* --------------------------------------------check Name
 * Exist-------------------------------------------------
 */

$(document).on('keyup', '.checknameExist', function () {

    var redioChecked = $('.user:checked').val();

    //console.log(redioChecked);

    var id = $(this).attr('data-id');

    //console.log(redioChecked);return false;

    $.ajax({
        type: 'POST',
        url: APP_URL + "/checknameExist",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'nickname': $(this).val(),
            'name': $(this).attr('name'),
            'table': redioChecked
        },

        success: function (data) {
            if (data == 1) {
                $('#' + id).show();
                $('#' + id)
                    .addClass('alert alert-danger')
                    .removeClass('alert-success');
                $('#' + id).html(
                    id == 'email'
                        ? 'Email Already Exist'
                        : 'User Already Exist!'
                );
            } else {

                $('#' + id).show();

                $('#' + id)
                    .addClass('alert alert-success')
                    .removeClass('alert-danger');

                $('#' + id).html(
                    id == 'email'
                        ? 'Email Available!'
                        : 'User Available'
                );

            }

        }
    });

})

/**-------------------------------------------------Check Title Exist---------------------------------------------------------------- */

$(document).on('keyup', '.title', function () {

    $.ajax({
        type: 'POST',
        url: APP_URL + "/checktitleExist",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'title': $(this).val(),
            'table': $(this).attr('table')
        },

        success: function (data) {

            //console.log(data);return false;
            if (data == 1) {
                $('#messagediv').show();
                $('#messagediv')
                    .addClass('alert alert-danger')
                    .removeClass('alert-success');
                $('#messagediv').html('Title Unavailable!')
            }
            // else {

            //     $('#messagediv').show();
            //     $('#messagediv')
            //         .addClass('alert alert-success')
            //         .removeClass('alert-danger');
            //     $('#messagediv').html('Title Available!');

            // }

        }
    });

})


function updateRead() {

    var ids = $('#notids').val();

    $.ajax({
        type: 'POST',
        url: APP_URL + "/readNotification",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'id': ids
        },

        success: function (data) {

            console.log(data);
            if (data == 1) {
                $('#bold').removeClass("bold");
            }

        }
    });

}

/* -------------------------------Subscribe To
 * Artist----------------------------------------------------
 */

function subscribe(id, setValue) {

    $.ajax({
        type: 'POST',
        url: APP_URL + "/subscribe",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'id': id,
            'bool': setValue
        },

        success: function (data) {

            if (setValue && data.status == 1) {
                $('#subscribe').hide();
                $('#unsubscribe').show();
            } else if (!setValue && data.status == 1) {
                $('#subscribe').show();
                $('#unsubscribe').hide();
            }

        }
    });
}

function showPlaylistVedio(data) {

    var videos = JSON.parse(data);
    
    $('#list').val(videos.id);

    var titles = videos.titles;

    var videos_playlist = videos.videos;

    $('.listname').html(videos.playlistname)

    $('#exampleModalCenterTitle').html(videos.playlistname);
    
    var split_title = titles.split(',');

    var videos_playlist = videos_playlist.split(',');

    var name = videos
        .names
        .split(',');
    var div = '';
    $('.video_append').html('')
    var lengthVideo=0;

    for (var i = 0; i < videos_playlist.length; i++) {
        
        var url = storage_url + '/video/' + videos_playlist[i];
        if (i == 0) {
            $('.videodata').html(
                "<video width='100%'  controls controlsList='nodownload' disablePictureInPictur" +
                "e><source id='firstvideo' src='" + url + "' type='video/mp4'></video><h3 class" +
                "='firsttitle'>" + split_title[i] + "</h3><p>March 5,2021<p>"
            )
        }
        div += "<div class='row lists12'><div class='videolist col-6'><video width='150px' hei" +
                "ght='100px' controlsList='nodownload' disablePictureInPicture><source src='" +
                url + "' type='video/mp4'></video></div><div class='videonameq col-6'><h3>" +
                split_title[i] + "</h3><p>" + name[i] + "</p> </div></div>"
                lengthVideo++;
    }

    $('.video_append').append(div);

    $('.lengthVideo').html(lengthVideo);

}

function getSrcUrl(a){
    var src = $(a).find('.videolist').children().find('source').attr("src");
    $('#firstvideo').attr('src',src)
    $('.videodata video').get(0).play();
}

/**----------------------------------------------------------Start Reviewing------------------------------------------------------------------ */


function startReviw(a,type,data){

    var src = $(a).find('source').attr("src");
    var id = $('.verify_id').val();
    
    $.ajax({
        type: 'POST',
        url: APP_URL + "/verifyVideo",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{'videoid':id,'type':type,'data':data},

        success: function (response) { 

         //console.log(response);return false;
            
                  if(typeof response =='object' && response!='')
                    {
                        console.log('object');
                        var id = response.id;

                        var src = storage_url+ '/video/' + response.media;

                         $('#first').attr('src',src); 
                        $('.verify_id').val(id);
                        $('#sample_video').get(0).play();
                        $('#sample_video').attr('controls',true);
                        //$('#sample_video').prop("onclick", null).attr("onclick", null)
                    }

                    else if(response==''){

                        alert('Already Watched this video by another');

                        //console.log('dddd');

                        // $('#sample_video').get(0).play();

                        // $('#sample_video').attr('controls',true);

                        //$('#sample_video').prop("onclick", null).attr("onclick", null)
                    }

                    else{
                        console.log('ddddd');

                        $('#sample_video').get(0).play();

                           $('#sample_video').attr('controls',true);

                        //$('#sample_video').prop("onclick", null).attr("onclick", null)
                    }


        }

    });
}

function permit(a,status,data,type){

    var id =   $(a).attr('data-id');

    $.ajax({
        type: 'POST',
        url: APP_URL + "/isVerifiedOrNot",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{'videoid':id, 'bool':status,'data':data,'type':type},

        success: function (data) {

            console.log(data);

            if(typeof data =='object' && data!='')
            {
                var nextid = data.id;

                console.log('yes');
                console.log(nextid);

                var src = storage_url+ '/video/' + data.media;

                 $('#first').attr('src',src); 
                $('.verify_id').val(nextid);
                $('#'+id).remove();
                $('#sample_video').get(0).play();
               // $('#sample_video').attr('controls',true);
                //$('#sample_video').prop("onclick", null).attr("onclick", null)
            }
            else{
                alert('some error');
            }
        }

    });
}

function legelorNot(mediaid,id,artistid,status){

    $.ajax({
        type: 'POST',
        url: APP_URL + "/islegelOrNot",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{'videoid':mediaid, 'artistid':artistid,'reportid':id, 'bool':status},

        success: function (data) {

            console.log(data);

            // if(data==1){
            //     location.reload();
            // }
            // else{
            //     alert('some error');
            // }
        }

    });

}

$(document).on('click','#deletePlaylist',function(){
   var id = $('#list').val();
   var listname = $('#exampleModalCenterTitle').text();
   bootbox.confirm({
    message: 'Do you want to really delete playlist ?',
    buttons: {

        confirm: {
            label: 'delete',
            className: 'btn btn-danger'

        },
        cancel: {
            label: 'cancel',
            className: 'btn btn-light'
        }
    },
    callback: function (result) {

        if (result) {
            // AJAX Request
            $.ajax({
                type: 'POST',
                url: APP_URL + "/deletePlaylist",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                data: {
                    'id': id,
                    'listname':listname
                },
        
                success: function (data) {
                    
                    console.log(data);
                        
                        if(data==1){
                            location.reload();
                       }
                        else{
                            location.reload();
                        }
        
                }
            });
        }
    }
});
    
})


/* --------------------------------------------Order * Video------------------------------------------------- */

$(document).on('click', '.off', function () {

    $('.media_div')
        .find('.slct_video:checked')
        .trigger("click");
    $('.media_div')
        .find('.checkall')
        .css("display", 'none');
})

$(document).on('submit', '#form_sub', function (event) {
    event.preventDefault();
    var visiblie = $('#popup_visibile').val();
   // console.log(visiblie);return false;
    $.ajax({
        type: 'POST',  
        url: APP_URL + "/orderVideo",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {

        // console.log(data);

        //   return false;
            if (data.status == 1) {
                if(visiblie==1){

                    $('.successfull').show();


                }

                else{
                    setTimeout(function () {
                        location.reload()
                    }, 2000);
                }
                // $('.show_alert').html(data.message);
              
            } else {

                $('.show_alert').show();
                $('.show_alert').html(data.message);
                setTimeout(function () {
                    location.reload()
                }, 2000);
            }

        }
    });

});


/*------------------------------------------------------Report Video---------------------------------------------------------------*/
$(document).on('submit', '#report', function (event) {
    event.preventDefault();
    var visiblie = $('#popup_visibile').val();
   // console.log(visiblie);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/report",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {

            if(data==1){
                $('#show_message').show();
                $('#show_message').html('Thank you for your suggestion!');
            }
            else{
                alert('Some error');
            }

        

        }
    });

});




$(document).on('click', '.visible_popup', function (event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: APP_URL + "/popupClose",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{},

        success: function (data) {

            //console.log(data);return false;

        }
    });

})

function reloadPage(){

    location.reload();
}
/**-------------------------------------------------------Edit Offer Data-------------------------------------------------------------------- */

$(document).on('submit', '#edit_form', function (event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $('.button_disable').attr('disabled',true);
    $.ajax({
        type: 'POST',
        url: APP_URL + "/edit_offer",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: formData,
        processData: false,
        contentType: false,
        xhr: function () {
            var xhr = $
                .ajaxSettings
                .xhr();
            if (xhr.upload) {
                xhr
                    .upload
                    .addEventListener('progress', function (event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        $('.percentage').html(percent + '%');
                        if (percent == 100) {
                            $('.loader').hide();
                        }
                    }, true);
            }
            return xhr;
        },

        success: function (data) {

            $('.button_disable').removeAttr('disabled');      

            if (data.status == 1) {
                $('.alert-success').show();
                $('.alert-success').html(data.message);
                $('#close').trigger('click');
                setTimeout(function () {
                    $('#close').trigger('click');
                    loadingmessage();
                    location.reload();
                }, 1000);
            } else {

                $('.alert-danger').show();
                $('.alert-danger').html(data.message);

            }

        }
    });

});

function loadingmessage() {
    alert('Offer Update Successfully!');
}

$(document).on('submit', '#edit_profile_info', function (event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $('.loader').show();
    $('.button_disable').attr('disabled',true);
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/edit_info",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: formData,
        processData: false,
        contentType: false,
        xhr: function () {
            var xhr = $
                .ajaxSettings
                .xhr();
            if (xhr.upload) {
                xhr
                    .upload
                    .addEventListener('progress', function (event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        $('.percentage').html(percent + '%');
                        if (percent == 100) {
                            $('.loader').hide();
                        }
                    }, true);
            }
            return xhr;
        },

        success: function (data) {

            $('.button_disable').removeAttr('disabled');


            if (data.status == 1) {
              
                // $('.alert-success').show(); $('.alert-success').html(data.message);
                $('.popup_close').trigger('click');
                location.reload();
            } else {

                $('.alert-danger').show();
                $('.alert-danger').html(data.message);

            }

        }
    });

});

/* ------------------------------------------------------Edit Video
 * Info------------------------------------------
 */

$(document).on('submit', '#edit_Video_info', function (event) {
    event.preventDefault();
    $('.button_disable').attr('disabled',true);
    $.ajax({
        type: 'POST',
        url: APP_URL + "/artist/editVedio",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),
        success: function (data) {
            $('.button_disable').removeAttr('disabled');

           // console.log(data);

            if (data == 1) {
                $('.alert-success').show();
                $('.alert-success').html('Update Successfully!');
                setTimeout(function () {
                    location.reload()
                }, 2000)
                //$('.close').trigger('click'); location.reload();
            } else {

                $('.alert-danger').show();
                $('.alert-danger').html(data.message);

            }

        }
    });

});

$(document).ready(function () {

   /**-------------------------------------- Get Currnt Date and Time ------------------------------------------------------------------- */
   var today = new Date();

   //console.log(today);return false;
   var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
   var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
   var dateTime = date+' '+time;
  // console.log(dateTime);
   var localTime = today.getTime();
  // console.log("local Time" + localTime);
   var localOffset = today.getTimezoneOffset(); 
  // console.log("local Time in minutes" + localOffset);
   var hours = parseFloat(localOffset / 60);           
   $('.timezone').val(hours);
   $('.created_at').val(dateTime)
   $('.updated_at').val(dateTime)
   //console.log("hours" + parseFloat(330/60));

   //console.log(dateTime)
    // Delete
    $('.delete').click(function () {

        // Delete id
        var deleteid = $(this).attr('data-id');
        var src1 = $(this).attr('data-url');
        var img_src = $(this).attr('img-src');
        var table = $(this).attr('table');
        var message = table == 'offer'
            ? "Do you really want to delete this Offer?"
            : "Do you really want to delete this Item? <br/> Your Customer will lose access t" +
                    "o it immediately!"

        //console.log(table);return false; Confirm box
        bootbox.confirm({
            message: message,
            buttons: {

                confirm: {
                    label: 'delete',
                    className: 'btn btn-danger'

                },
                cancel: {
                    label: 'cancel',
                    className: 'btn btn-light'
                }
            },
            callback: function (result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        type: 'POST',
                        url: APP_URL + "/delete_offer",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: deleteid,
                            table: table,
                            media_url:src1,
                            image_url:img_src
                        },
                        success: function (response) {

                            console.log(response);
                            if (response == 1) {

                                $(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .remove();

                                setTimeout(function () {
                                    location.reload();
                                }, 1000);

                            } else {

                                location.reload();
                            }

                        }
                    });
                }
            }
        });
    });
});

function addTohistory(type) {
    var id = $('#vidid').val();
    $.ajax({
        type: 'POST',
        url: APP_URL + "/addTohistory",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'id': id,
            'types': type
        },

        success: function (data) {
            //console.log(data);

        }
    });

}

$('.image').click(function () {
   // console.log('yes');
    var image_type = $(this).attr('data-id');
    selectLoader = image_type=='profilepicture' ? 'profile_loader' : 'cover_loader';
   // $(this).parent().parent().find('.img-fluid').show();
    $('#image_type').val(image_type);
    //console.log(image_type);
    $('.image_change').trigger('click');
})

$(document).on('change', '#change_section', function () {

    var value = $(this).val();
   // console.log(value);
    if (value == 'all') {

        $('.filter_div').show();

    } else {
        $('.container .filter_div').each(function (i, obj) {
            var hide_div = $(this).attr('id');

            console.log(hide_div);

            $('.container')
                .find('#' + hide_div)
                .hide()
            $('.container')
                .find('#' + value)
                .show();
            //console.log($(this).attr('id')); test
        });
    }

})
$('body').click(function(){
    $('.alert-success').hide()
    $('.alert-danger').hide()
  });
theFile = document.getElementsByClassName('image_change')
function imageUpdate() {

   // theFile = event;
    
    $('.'+selectLoader).show();

    $('#imageChange').click();

}


$('#filechange').submit(function (e) {
    //console.log('abc');
    e.preventDefault();

    var formData = new FormData($(this)[0]);

    //$('.img-fluid').show();

    //console.log(formData);return false;

    $.ajax({
        type: 'POST',
        url: APP_URL + "/change_image",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: formData,
        processData: false,
        contentType: false,

        success: function (data1) {

            //console.log(data1);

            if (data1.status == 1) {
                location.reload();
            }

        }
    });
});

function edit_offer(data) {
    //console.log(data);
    //console.log(data);return false;
    var json_info = data;
    var url = 'http://localhost/laravel/video-streaming/storage/app/public/video/';
    var src = url + json_info.media;
    //console.log(json_info);return false;
    $('#title').val(json_info.title);
    $("input[value='" + json_info.type + "']").prop('checked', true);
    $('.thumbnail').show();
    $('.file').show();   
     $('#offerid').val(json_info.id);
    $('#min').val(json_info.min);
    $('#max').val(json_info.max);
    $('#additional_price').val(json_info.additional_price);
    $('#video').attr('src', src);
    //$('#file_url').val(json_info.media);
    $('#file_name').val(json_info.media);
    $('#file_image').val(json_info.audio_pic);
    $('.chooseImage').next('#filename').replaceWith('<span id="filename" style="color:red;">'+json_info.audio_pic+'</span>');
    $('.file_input').next('#filename').replaceWith('<span id="filename" style="color:red;">'+json_info.media+'</span>');
    $('#price').val(json_info.price);
    $('#speed').val(json_info.delieveryspeed);
    $('#description').val(json_info.description);
    $('.chooseImage #filename').text(json_info.audio_pic);
    $('.file_input #ilename').text(json_info.media);

    if(json_info.type=='video'){
        $('.thumbnail1').text('Video Thumbnail');
        $('.label12').text('Overview Video (~30s)');
    }

    else{
        $('.thumbnail1').text('Audio Thumbnail');
        $('.label12').text('Overview Audio (~30s)');
    }

    $('.' + json_info.type).show();
    $('#select_status').val(json_info.offer_status).attr("selected", "selected");
    $('#quality').val(json_info.quality).attr("selected", "selected");
    $('.' + json_info.type).val(json_info.categoryid).attr("selected", "selected");
}

function change_other_info(data) {
    
   // console.log(data);return false;

    var json_info = data;

    $('#aboutme').val(json_info.aboutme);
    $('#weight')
        .val(json_info.weight)
        .attr("selected", "selected");
    $('#height')
        .val(json_info.height)
        .attr("selected", "selected");
    $('#sexology')
        .val(json_info.sexology)
        .attr("selected", "selected");
    $('#haircolor')
        .val(json_info.haircolor)
        .attr("selected", "selected");
    $('#eyecolor')
        .val(json_info.eyecolor)
        .attr("selected", "selected");
    $('#privy')
        .val(json_info.privy)
        .attr("selected", "selected");
    $('#hairlength')
        .val(json_info.hairlength)
        .attr("selected", "selected");
}

/**------------------------------------------------------Filter Projects ------------------------------------------------- */

function filterproject(data) {

    var value = data.value;

    var name = $(data)
    .find(":selected")
    .val();

    var table1 = name == '' ? dataTable('All') : dataTable(name);
    dataTableInitialise(table1);
    var dataset = $('.filteration_table tbody').find('tr ');


    if(data.text=='all'){
        dataset.show();
    }

    else{
   // console.log(value);
    //console.log(dataset);return false;

    dataset.show();

    dataset
        .filter(function (index, item) {
            return $(item)
                .find('td:eq(5)')
                .text()
                .indexOf(value) === -1;
        })
        .hide();

}
}


function filterproject1(data){

    var value = data.value;
 
  var dataset = $('.filteration_table tbody').find('tr ');


    if(data.text=='all'){
        
        dataset.show();
    }

    else{
   // console.log(value);
    //console.log(dataset);return false;

    dataset.show();

    dataset
        .filter(function (index, item) {
            return $(item)
                .find('td:eq(6)')
                .text()
                .indexOf(value) === -1;
        })
        .hide();

}

}

$(document).on('keyup change', '#calculate_tokens', function () {

    var amount = parseInt($(this).val()) / 20;
    var fees = (parseFloat(amount) * $("#fees").val()) / 100;
    $('#real_amount').val(parseFloat(amount) - parseFloat(fees));
    //$('.show_fees').text("After Calculate Service Fees" +" "+$("#fees").val())

})

/**--------------------------------------------------Data Table Js---------------------------------------------------------- */

/* Formatting function for row details - modify as you need */
function format(d, type) {

    $('.offer_id').val(d.id);

    var reward = ( d.price * d.choice);

    var price = d.userdescription!='No Additional Requests' ? reward + parseInt(d.additional_price) : reward;

    var disabled = d.remaining_days < 0 || d.paid_status==1
        ? 'disabled'
        : ''

        var text =  d.paid_status==1
        ? 'Delievered'
        : 'Deliever Now'

    // var visiblity = d.paid_status==1 ? "style=display:none":"style=display:block"

    var file = d.type == 'video'
        ? 'Upload Video'
        : 'Upload Audio';

    var html = d.type == 'audio'
        ? '<label>Upload Image</label><input type="file" name="audio_pic"/>'
        : '';

    // console.log(d);return false; var hair = d.haircolor.split(','); var privy =
    // d.privy.split(','); var lense = d.eyecolor.split(','); console.log(type); `d`
    // is the original data object for the row
    if (type == 'offer') {
        updateStatus(d.id, type);
        return '<div class="offer"><div class="row"><div class="col"><div class="descriptions"' +
                '><h3 class="description">Description :</h3><p>' + d.description + '</p></div><' +
                '/div><div class="col"><h3 class="look">Additional Request :</h3><p>' + d.userdescription +
                '</p></div><div class="col"><table><tr><td> <p>Categories :</p><p class="catego' +
                'ry">' + d.catgories + '</p></td><td> <p class="quality">Quality :</p><p>' + d.quality +
                'p </p></td></tr><tr><td colspan="2">Reward:<span class="Reward" style="color: ' +
                'gold !important;">' + price  + '<b style="color: gold !important;font-family' +
                ': Alfa Slab One;font-weight: 400;"> PAZ </b></span></td></tr><tr><td colspan="' +
                '2"><div class="col-md-12"><form class="uploadOffer" method="post" enctype="mul' +
                'tipart/form-data"><label>' + file +
                '</label><input type="file" name="media">' + html + '<div><input type="hidden" ' +
                'name="offerid" value=' + d.id + '><input type="hidden" name="userid" value=' +
                d.userid + '><input type="hidden" name="artistid" value=' + d.artistid + '><div' +
                ' class="loader col-6" style="display:none"><span style="color:green; font-weig' +
                'ht: bold;">Uploading...</span><img src="http://localhost/laravel/video-streami' +
                'ng/public/images/loading2.gif" width="50px" height="50px"/><span class="percen' +
                'tage" style="color:green;font-weight: bold;"></span></div></form></div></td></' +
                'tr></table><div class="alert alert-success" id="success" style="display:none">' +
                '</div><div class=""><button type="submit"class="btn btn-primary" onclick="form' +
                'submit(this)"' + disabled + '>'+text+'</button><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordercancel">Cancel</button>'+
        '</div></div></div></div>';
    } 
    else {  
        updateStatus(d.id, type);
        return '<div class="project"><div class="row"><div class="col"><div class="description' +
                's"><h3 class="description">Description :</h3><p>' + d.description + '</p></div' +
                '></div><div class="col"><h3>Look :</h3><p style="color:red;">Hair Color</p><sp' +
                'an>' + d.haircolor + '</span><p style="color:red;">Eye Color</p><span>' + d.eyecolor +
                '</span><p style="color:red;">Privy</p><span>' + d.privy + '</span></div><div c' +
                'lass="col"><table><tr><td> <p>Category :</p><p class="category">' + d.category_name +
                '</p></td><td> <p class="quality">Quality :</p><p>' + d.quality + 'p</p></td></' +
                'tr><tr><td colspan="2">Reward:<span class="Reward" style="color: gold !importa' +
                'nt;">' + d.tokens + '<b style="color: gold !important;font-family: Alfa Slab O' +
                'ne;font-weight: 400;"> PAZ </b></span></td></tr><tr></table><div class=""><but' +
                'ton type="button"class="btn btn-primary">Upload Content</button></div></div></' +
                'div></div>';
    }
}


/*-------------------------------------Cancel Order-----------------------------------------------------------*/


$("#cancelOrder").validate({

    rules: {
        reason: {
            required: '#reason_cancel:blank'
        },
        reason_cancel:{
            required: '#reason:blank'
        }
    },
  submitHandler: function (form) {
    var form = $("#cancelOrder");

    $.ajax({
        type: 'POST',
        url: APP_URL + "/cancelOrder",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(form).serialize(),

        success: function (data) {

            //console.log(data);return false;

            if(data==1){

                alert('Canceled');
            }

            else{

                alert('Some Error');
            }

        }
    });
}

});

function formsubmit(scop) {

    var form = $('.uploadOffer');
    var formdata = new FormData(form[0]);

    $('.loader').show();
    $('.percentage').html('0');
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/deleiver",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formdata,
        processData: false,
        contentType: false,
        xhr: function () {
            var xhr = $
                .ajaxSettings
                .xhr();
            if (xhr.upload) {
                xhr
                    .upload
                    .addEventListener('progress', function (event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        $('.percentage').html(percent + '%');
                        if (percent == 100) {
                            $('.loader').hide();
                        }
                    }, true);
            }
            return xhr;
        },

        success: function (data) {

          // console.log(data);return false;

            if (data == 1) {

                $('#success').show();

                $('#success').html('Content Uploaded');

                setTimeout(function () {
                    location.reload();
                }, 2000)
            } else {

                alert('Some Error');

            }

        }

    });

}


/*----------------------------Convert Audio To Video----------------------------------------------------------*/

    // $('form').transloadit({
    //   wait: true,
    //   triggerUploadOnFileSelection: true,
    //   params: {
    //     auth: {
    //       // To avoid tampering use signatures:
    //       // https://transloadit.com/docs/api/#authentication
    //       key: '995b974268854de2b10f3f6844566287',
    //     },
    //     // It's often better store encoding instructions in your account
    //     // and use a `template_id` instead of adding these steps inline
    //     steps: {
    //       ':original': {
    //         robot: '/upload/handle'
    //       },
    //       imported_image: {
    //         robot: '/http/import',
    //         url: 'https://images.pexels.com/photos/3429740/pexels-photo-3429740.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
    //       },
    //       resized_image: {
    //         use: 'imported_image',
    //         robot: '/image/resize',
    //         result: true,
    //         height: 768,
    //         imagemagick_stack: 'v2.0.7',
    //         resize_strategy: 'fillcrop',
    //         width: 1024,
    //         zoom: false
    //       },
    //       merged: {
    //         use: {
    //             'steps':[
    //                 {'name':':original',
    //                 'as':'audio'
                        
    //                 },
    //                 {
    //                 'name':'resized_image',
    //                 'as':'image'
                        
    //                 }
    //                 ]
                
    //         },
    //         robot: '/video/merge',
    //         result: true,
    //         ffmpeg_stack: 'v4.3.1',
    //         preset: 'ipad-high'
    //       },
    //       exported: {
    //         use: ['imported_image','resized_image','merged',':original'],
    //         robot: '/s3/store',
    //       // key: "AKIARBASIKHRR6UI4MTC",
    //       ///  secret: "o5t0PJ7mDgT1jx8HY0jCjGh56ZCjlEIfh",
    //         credentials: "mp3-img-to-mp4",
    //       "path": "uploads/${file.id}.${file.ext}"
    //       }
    //     }
    //   }
    // });

$(document).ready(function () {

    /**-----------------------------------------------------For Orders----------------------------------------------------------- */
    var name = $('#select_option')
        .find(":selected")
        .val();

    var value = window
        .location
        .href
        .substring(window.location.href.lastIndexOf('/') + 1);

    value == 'offer'
        ? $('#active').addClass('active')
        : '';

    //console.log(name);

    var artistCountry = $("#all_country").val();

    $('#countries')
        .val(artistCountry)
        .attr("selected", "selected");

    //console.log(name);

    var table1 = dataTable(name);

    dataTableInitialise(table1);

    // Add event listener for opening and closing details


});

function dataTableInitialise(table1){
     $('#example1 tbody').off('click', 'tr'); 
    $('#example1 tbody').on('click', 'tr', function () {
    //console.log(table1);
   
        //console.log('yes');
        var tr = $(this)
        var row = table1.row(tr);

        if (row.child.isShown()) {
           // console.log('ssdssss');

            // This row is already open - close it
            row
                .child
                .hide();
            tr.removeClass('shown');
        } else {

            // Open this row
            row
                .child(format(row.data(), 'offer'))
                .show();
            tr.addClass('shown');
        }
    });

    // Handle click on "Expand All" button
    $('#btn-show-all-children1').on('click', function () {
        // Enumerate all rows
        table1
            .rows()
            .every(function () {
                // If row has details collapsed
                if (!this.child.isShown()) {
                    // Open this row
                    this
                        .child(format(this.data(), 'offer'))
                        .show();
                    $(this.node()).addClass('shown');
                }
            });
    });

    // Handle click on "Collapse All" button
    $('#btn-hide-all-children1').on('click', function () {
        // Enumerate all rows
        table1
            .rows()
            .every(function () {
                // If row has details expanded
                if (this.child.isShown()) {
                    // Collapse row details
                    this
                        .child
                        .hide();
                    $(this.node()).removeClass('shown');
                }
            });
    });
}


function dataTable(name){

    //console.log(name);return false;
    
    return $('#example1').DataTable({
        'ajax': name != 'All'
            ? APP_URL + '/artist/getRequests/orders/' + name
            : APP_URL + '/artist/getRequests/orders',

            
            destroy: true,

        'columns': [
            {
                'className': 'details-control',
                'orderable': false,
                'data': null,
                'defaultContent': ''
            },
             {
            'data': 'title'
            },   
            {
                'data': 'type'
            }, 
            {
                'data': 'choice',
                render: function (data, type, row) {
                    return  data + ' Minute(s)';
                 }
            }, 
            {
                'data': 'nickname'
            }, 
            {
                'data': 'status',
                render: function (data, type, row) {
                    // console.log(data);
                    return row.remaining_days < 0
                        ? 'Expired'
                        : data;
                }
            }, 
            {
                'data': 'dates_submision',
                render: function (data, type, row) {
                    // console.log(data);
                    return data + '(23:59)';
                }
            }
            
        ],
        "createdRow": (row, data, dataIndex) => {
            var text = $('td', row).eq(5).text();
            text=='Expired' ? updatedStatus(data.id):'';
            //console.log(data);
            if(data.status=='new')
            {
                $('td', row).eq(5).addClass('green');           
            
            }

            if(data.status=='due')
            {
                $('td', row).eq(5).addClass('red');           
            
            }

            if(data.status=='process')
            {
                $('td', row).eq(5).addClass('orange');           
            
            }
        }
            
        //  'order': [[1, 'asc']]
    });
}
function updatedStatus(id){

   // event.preventDefault();
    //console.log(id);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/updatedCancelStatus",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {'id':id},

        success: function (data) {

            console.log(data);

        }
    });

}

function selectUsername(a){
    var length = $(a).val();
    var html='';
    for(var i=0; i< length; i++){
        html+="<div class='row'>"+
        "<div class='col-6'>"+
        "<div class='form-group'>"+
        "<select class='custom-select valid' name='social_plateform[]' id='inputGroupSelect01'>"+
              "<option selected=''>Choose...</option>"+
              "<option value='Facebook'>Facebook</option>"+
              "<option value='Instagram'>Instagram</option>"+
              "<option value='Youtube'>Youtube</option>"+
              "<option value='Sharesome'>Sharesome</option>"+
              "<option value='Xpurity'>Xpurity</option>"+
              "<option value='WeChat'>WeChat</option>"+
              "<option value='Tiktok'>Tiktok</option>"+
             "<option value='Twitter'>Twitter </option>"+
        "</select>"+
          "</div>"+
          "</div>"+
          "<div class='col-6'>"+
          "<div class='form-group'>"+              
              "<input type='text' name='username[]' class='form-control'>"+
            "</div>"+
         " </div>"+
     "</div>";
    }
$('.amountmedia').html(html);

}

function updateStatus(id, type) {
    $.ajax({
        type: 'POST',
        url: APP_URL + "/update_Status",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'id': id,
            'type': type
        },

        success: function (data) {
            console.log(data);

        }
    });
}

function getPaz(a) {
    $('.set_paz').val(a);
    //console.log(a);
}

$(document).on('click', '.select_media_pic', function () {

    
    var value = $(this).val();

    if (value == 'audio') {
        $('.file1').show();

                    $('.video').removeAttr('required');
                    $('.audio').attr('required',true);
					$('.media_label').text('Upload Sample Audio (~30s)');
					$('.label12').text('Overview  Audio (~30s)');
					$('.media_label12').text('Audio');
					$('.thumbnail1').text('Image Upload');
                    $('.thumbnail').hide();

					$('.convert').hide();
					$('.audio').show();
					$('.video').hide()

			}
			else{
                $('.file1').hide();
                $('.thumbnail').show();

                $('.file').show();
                $('.audio').removeAttr('required');
                $('.video').attr('required',true);
				$('.media_label12').text('Video');
				$('.thumbnail1').text('Video Thumbnail');
				$('.media_label').text('Upload Sample Video (~30s)');
				$('.label12').text('Overview Video (~30s)');
				$('.audio').hide()
				$('.convert').show();
				$('.video').show()
			}
})

/** -------------------------------------------------Upload New Offer ---------------------------------------------------------*/

$(function () {
    $('a[data-toggle="tab"]').on('click', function (e) {
        //alert('console');return false;
        window
            .localStorage
            .setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = window
        .localStorage
        .getItem('activeTab');
    if (activeTab) {
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
        window
            .localStorage
            .removeItem("activeTab");
    }
});

/* --------------------------------------Customers
 * Orders----------------------------------------
 */

if ($("#social_media").length > 0) {
    $("#social_media").validate({

        rules: {
            'media[]': {
                required: true
            },
            gender:{
                required: true
            }
        },
        messages: {
            'media[]': {
                required: "Please Enter Media",
                maxlength: "Enter Media"
            },
            'gender': {
                required: "Select Radio Button",
            }
        },
        submitHandler: function (form) {
            //event.preventDefault();
            var form = $("#social_media");
            var formData = new FormData($(form)[0]);

            $('.loader').show();
            $('.percentage').html('0');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + "/uploadSocial",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = $
                        .ajaxSettings
                        .xhr();
                    if (xhr.upload) {
                        xhr
                            .upload
                            .addEventListener('progress', function (event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                $('#top_title').html('Uploding...' + percent + '%');
                                $('.percentage').html(percent + '%');
                                if (percent == 100) {
                                    $('.loader').hide();
                                }
                            }, true);
                    }
                    return xhr;
                },
                success: function (response) {
                    //console.log(response);return false;
                    if (response.status == 1) {
                        $('#success').show();
                        $('#success').html(response.messge);

                        setTimeout(function () {
                            location.reload();
                        }, 2000)

                    } else {

                        $('#success').show();
                        $('#success').html(response.messge);

                    }
                }
            });
        }
    })
}

/**---------------------------------------Suport Functyiong------------------------------------- */

if ($("#technical_functiong").length > 0) {
    $("#technical_functiong").validate({

        rules: {
            technical_issue: {
                required: true
            },

            description: {
                required: true,
                maxlength: 2000
            },
            match_recaptcha: {
                required: true,
                equalTo: "#recaptcha"
            }
        },
        messages: {
            technical_issue: {
                required: "Please Select Issue"
            },

            match_recaptcha: "Please Match Recaptcha",

            description: {
                required: "Please Add Description",
                maxlength: 'Character may be less than 2000'
            }
        },
        submitHandler: function (form) {
            //event.preventDefault();
            var form = $("#technical_functiong");
            var formData = new FormData($(form)[0]);

            $('.loader').show();
            $('.percentage').html('0');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + "/artist/insert_support",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = $
                        .ajaxSettings
                        .xhr();
                    if (xhr.upload) {
                        xhr
                            .upload
                            .addEventListener('progress', function (event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                $('#top_title').html('Uploading...' + percent + '%');
                                $('.percentage').html(percent + '%');
                                if (percent == 100) {
                                    $('.loader').hide();
                                }
                            }, true);
                    }
                    return xhr;
                },
                success: function (response) {
                    if (response == 1) {
                        $('#success').show();
                        $('#success').html('Ticket Created Successfully! <br> We will reach out to you Email shortly');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } 
                    else {
                        $('#error').show();
                        $('#error').html('Some Error');
                    }
                }
            });
        }
    })
}

if ($("#myForm").length > 0) {
    $("#myForm").validate({

        rules: {
            title: {
                required: true,
                maxlength: 30
            },
            radio:{
                required: true,
            },
          
            thumbnail_pic:{
                required: true
            },
            convert: {
                required: true
            },
            category: {
                required: true
            },
            description: {
                required: true,
                maxlength: 2000
            }
        },
        messages: {
            title: {
                required: "Please Add Title",
                maxlength: 'Character may be less than 30'

            },
            radio: {
                required: "Please Select Option",
             

            },
          
            thumbnail_pic:{
                required: "Please Enter Image",
            },
            category: {
                required: "Choose Quality"
            },

            convert: {
                required: "Choose Category"
            },

            description: {
                required: "Please Add Description",
                maxlength: 'Character may be less than 2000'
            }
        },
        submitHandler: function (form) {
            //event.preventDefault();
            var form = $("#myForm");
            var formData = new FormData($(form)[0]);

            $('.loader').show();
            $('.percentage').html('0');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + "/postContent",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = $
                        .ajaxSettings
                        .xhr();
                    if (xhr.upload) {
                        xhr
                            .upload
                            .addEventListener('progress', function (event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                $('#top_title').html('Uploding...' + percent + '%');
                                $('.percentage').html(percent + '%');
                                if (percent == 100) {
                                    $('.loader').hide();
                                }
                            }, true);
                    }
                    return xhr;
                },
                success: function (response) {

                // console.log(response);
                //    return false;  

                    if (response.errors) {

                        jQuery.each(response.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $('.loader').hide();
                        //$('.percentage').hide();
                        if (response.status == 1) {
                            $('#success').show();
                            $('#success').html(response.messge);

                            setTimeout(function () {
                                location.reload();
                            }, 2000);

                            // location.reload(); $('.popup_close').trigger('click');

                        } else {

                            $('#error').show();
                            $('#error').html(response.messge);

                        }

                    }
                }
            });
        }
    })
}

if ($("#create_offer").length > 0) {
    $("#create_offer").validate({
        rules: {
            title: {
                required: true,
                maxlength: 30
            },
            quality: {
                required: true
            },
            description: {
                required: true,
                maxlength: 2000
            }
        },
        messages: {
            title: {
                required: "Please Add Title",
                maxlength: 'Character may be less than 30'

            },
            quality: {
                required: "Choose Quality"
            },


            description: {
                required: "Please Add Description",
                maxlength: 'Character may be less than 2000'
            }
        },
        submitHandler: function (form) {

            
            //event.preventDefault();
            var form = $("#create_offer");
            var formData = new FormData($(form)[0]);

            $('.loader').show();
            $('.percentage').html('0');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + "/createOffer",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = $
                        .ajaxSettings
                        .xhr();
                    if (xhr.upload) {
                        xhr
                            .upload
                            .addEventListener('progress', function (event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                $('#top_title').html('Uploding...' + percent + '%');
                                $('.percentage').html(percent + '%');
                                if (percent == 100) {
                                    $('.loader').hide();
                                }
                            }, true);
                    }
                    return xhr;
                },
                success: function (data) {

                    //console.log(data);return false;

                    if (data.errors) {

                        jQuery.each(data.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {

                        $('.loader').hide();
                        //console.log(data);return false;

                        if (data.status == 1) {
                            $('#success').show();
                            $('#success').html(data.messge);

                            setTimeout(function () {
                                location.reload()
                            }, 2000);

                            //location.reload(); $('.popup_close').trigger('click');

                        } else {

                            $('#error').show();
                            $('#error').html(data.messge);

                        }

                    }
                }
            });
        }
    })
}

$("#edit").on('click', function () {
    var inf = $(".replace");
    inf.each(function () {
        $(this).replaceWith(function (i, text) {

            if (this.id == 'country') {
                $('#' + this.id).hide();
                $('.' + this.id).show();
                return;
            } else {
                return $("<input>", {
                    type: "text",
                    value: text,
                    name: this.id,
                    class: 'replace'
                    //id: this.id
                })
            }

        });

    });
    $(this).hide();
    $(this)
        .next()
        .show();

});



$('#cancel').click(function () {
    //alert('hello');
    $('.replace').each(function () {
        $(this).replaceWith(function (i, text) {
            if (this.class == 'country') {
                $('.' + this.class).hide();
                $('#' + this.class).show();
                return;
            } else {
                return $("<span />", {
                    text: this.value,
                    class: this.class
                    //id: this.id
                })
            }
        })
    });
	$(this)
	.hide();
	$('.apply').hide()
	$('#edit').show()
})

function deleteName(id,appname,name){
    event.preventDefault();
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/deleteName",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {'id':id,'social_name':appname,'username':name},

        success: function (data) {
           // console.log(data);return false;
            if (data == 1) {

                alert("Successfully deleted!");

                location.reload();

            } else {
                alert('Some Error Occure')
                location.reload();

            }

        }
    });
}

$(document).on('submit', '#updateUser', function (event) {
    event.preventDefault();
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/updateArtist",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {

            console.log(data);

            if (data == 1) {

                alert('Edit Successfully!');

                location.reload();

            } else {
                alert('Password Wrong')
                location.reload();

            }

        }
    });

});


/**------------------------------------------------------------Save Username------------------------------------------------------- */
$(document).on('submit', '#user', function (event) {
    event.preventDefault();
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/userName",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {
            //console.log(data);return false;
                if(data==1){
                    $('#success').show();
                    $('#success').html('Saved Successfully!');
                    setTimeout(function(){
                        location.reload();
                    },2000);
                }

        }
    });

});

function appendDiv(a){
    $('#save').removeAttr('disabled')
    //console.log('yhis');
    var html  = "<div class='row social_append px-3'>"+
                            "<div class='col-md-6'>"+
                                                "<div class='form-group'>"+
                                "<select class='custom-select valid' name='social_plateform[]' id='inputGroupSelect01' required>"+
                                        "<option value=''>Choose...</option>"+
                                        "<option value='Facebook'>Facebook</option>"+
                                        "<option value='Instagram'>Instagram</option>"+
                                        "<option value='Youtube'>Youtube</option>"+
                                        "<option value='Sharesome'>Sharesome</option>"+
                                        "<option value='Xpurity'>Xpurity</option>"+
                                        "<option value='WeChat'>WeChat</option>"+
                                        "<option value='Tiktok'>Tiktok</option>"+
                                        "<option value='Twitter'>Twitter"+
                                        "</option>"+
                                    "</select>"+
                                "</div>"+
                "</div>"+
                        "<div class='col-md-6'>"+
                                    "<div class='form-group'>"+
                                        "<input type='text' required name='username[]' class='form-control'>"+
                                        "</div>"+
                            "</div>"+
"</div>"; 

    $('.amountmedia ').prepend(html);
}

function seconds_to_min_sec(seconds, id, vidid) {
   // console.log('yes');
    //console.log(seconds);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(seconds / 3600);
    var seconds = seconds - minutes * 60;
  
    var addZeroSeconds = parseInt(seconds) > 9 ? parseInt(seconds) : '0' + parseInt(seconds);
    var addZeroMinutes = parseInt(minutes)  > 9 ? minutes : '0' + minutes;
     // console.log(addZeroSeconds);
   // console.log(addZeroMinutes);
    //console.log(hours);return false;
    var addZeroHours = parseInt(hours) > 9 ? parseInt(hours) : '0' + parseInt(hours);
    var duration = parseInt(minutes) == 0 ?  '00:' + addZeroSeconds : addZeroMinutes + ":" + addZeroSeconds;
    var hours_sys = hours == 0 ?  '00:' + duration :    addZeroHours + ":" + duration;
    $(id).html(hours_sys);
    $.ajax({
        type: 'POST',
        url: APP_URL + "/duration",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {'duration': hours_sys,'id': vidid},

        success: function (data) {
            console.log(data);
        }
    });

}



/* ---------------------------------------------------Edit Artist Personal
 * Info-----------------------------------
 */

$(document).on('submit', '#artist_info', function (event) {
    event.preventDefault();

    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/contentProvider",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {

            //console.log(data);return false;

            if (data == 1) {

                window.location.href = APP_URL + '/artists/dashboard';

            } else {

                location.reload();

            }

        }
    });

});

/* ------------------------------------------------------Customer Issue
 * --------------------------------------------------------
 */

$(document).on('submit', '#customer_issue', function (event) {
    event.preventDefault();
    $('.close').trigger('click');
    //console.log(formData);return false;
    $.ajax({
        type: 'POST',
        url: APP_URL + "/customer_issue",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: $(this).serialize(),

        success: function (data) {

            console.log(data);

            if (data == 1) {

                //alert('done');

            } else {

                location.reload();

            }

        }
    });

});

function removeBadge(id) {

    //console.log(id);

    $.ajax({
        type: 'POST',
        url: APP_URL + "/removeBadge",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            'id': id
        },

        success: function (data) {

            console.log(data);

        }
    });
}

/* ------------------------------------------Add Active
 * Class-----------------------------------------------
 */

// $('.nav-item').click(function(){
// $(this).parent('.nav').find('.nav-item').removeClass('active');
// $(this).addClass('active'); }) $(document).on('click', '.showoffer', function
// () { 	$('#nav-tab').find('.tabss').removeClass('active');  alert('hello');
// $('#nav-tab').find('#nav-offer-tab').addClass('active').trigger('classChange');
// $('#nav-offer-tab').trigger('click'); })
