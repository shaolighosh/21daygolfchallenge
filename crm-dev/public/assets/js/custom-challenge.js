$(document).ready(function() {
    $('.toggle-btn').click(function() {
        $(this).toggleClass('add-on');
        $('.nav-section-header').toggleClass('on');
        $('body').toggleClass('add-body');
    });

    $('.btn-close-header').click(function() {
        $('.nav-section-header').toggleClass('on');
        $('body').toggleClass('add-body');
    });

});

$(".nav-toggle").click(function() {
    $(this).toggleClass("nav-close");
    $(".map-overlay-section").slideToggle();
});

// 

$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

var ref = $(this).closest('fieldset');
var stepData = "Step "+$('input[name="step"]',ref).val();


if($('input[name="step"]',ref).val() != null){

    if(!$('.completedVideo',ref).is(":checked") && $('input[name="step"]',ref).val() != ''){

        $.alert({
            title: 'Alert!',
            content: 'Please check I have completed the step',
        });
        return false;
    }

}



if($('input[name="share_video_url"]',ref).val() == ''){

    $.ajax({
        //url: 'http://golf.local.com/index.php/ajax/submit_without_video', 
         url: 'https://myeverythinggolf.com/21-day-challenge/crm-dev/index.php/ajax/submit_without_video', 
        data: {step:$('input[name="step"]',ref).val()},                         
        type: 'post',
        
        success: function(php_script_response){

        }
    });

//      $.alert({
//         title: 'Alert!',
//         content: 'Please upload video.',
//     });
//   //alert("Please upload video.");
//   //$('input[name="share_video_url"]',ref).val();
//   return false;
}
//elseif()
else{

     $.ajax({
        //url: 'http://golf.local.com/index.php/ajax/addRewardsPoint', // <-- point to server-side PHP script 
        url: 'https://myeverythinggolf.com/21-day-challenge/crm-dev/index.php/ajax/addRewardsPoint',
        data: {share_data:stepData},                         
        type: 'post',
        
        success: function(php_script_response){

        }
    });
}



//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
$("#progressbar li").eq($("fieldset").index(current_fs)).addClass("visit");
//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);

$(".file-upload").hide();


});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
$("#progressbar li").eq($("fieldset").index(previous_fs)).removeClass("visit");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});