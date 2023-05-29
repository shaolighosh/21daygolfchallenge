$(".toggle-menu").click(function () {
    $(this).toggleClass("nav-close");
    $(".nav-primary").slideToggle();
});



$('.multiple-items').slick({    
    arrows: true,
    fade: false,
    dots: true, 
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
});


//Reference: 
//https://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
;(function($) {

    // Browser supports HTML5 multiple file?
    var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
        isIE = /msie/i.test( navigator.userAgent );

    $.fn.customFile = function() {

      return this.each(function() {

        var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
            $wrap = $('<div class="file-upload-wrapper">'),
            $input = $('<input type="text" class="file-upload-input" />'),
            // Button that will be used in non-IE browsers
            $button = $('<button type="button" class="file-upload-button">Browse</button>'),
            // Hack for IE
            $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');

        // Hide by shifting to the left so we
        // can still trigger events
        $file.css({
          position: 'absolute',
          left: '-9999px'
        });

        $wrap.insertAfter( $file )
          .append( $file, $input, ( isIE ? $label : $button ) );

        // Prevent focus
        $file.attr('tabIndex', -1);
        $button.attr('tabIndex', -1);

        $button.click(function () {
          $file.focus().click(); // Open dialog
        });

        $file.change(function() {

          var files = [], fileArr, filename;

          // If multiple is supported then extract
          // all filenames from the file array
          if ( multipleSupport ) {
            fileArr = $file[0].files;
            for ( var i = 0, len = fileArr.length; i < len; i++ ) {
              files.push( fileArr[i].name );
            }
            filename = files.join(', ');

          // If not supported then just take the value
          // and remove the path to just show the filename
          } else {
            filename = $file.val().split('\\').pop();
          }

          $input.val( filename ) // Set the value
            .attr('title', filename) // Show filename in title tootlip
            .focus(); // Regain focus

        });

        $input.on({
          blur: function() { $file.trigger('blur'); },
          keydown: function( e ) {
            if ( e.which === 13 ) { // Enter
              if ( !isIE ) { $file.trigger('click'); }
            } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
              // On some browsers the value is read-only
              // with this trick we remove the old input and add
              // a clean clone with all the original events attached
              $file.replaceWith( $file = $file.clone( true ) );
              $file.trigger('change');
              $input.val('');
            } else if ( e.which === 9 ){ // TAB
              return;
            } else { // All other keys
              return false;
            }
          }
        });

      });

    };

    // Old browser fallback
    if ( !multipleSupport ) {
      $( document ).on('change', 'input.customfile', function() {

        var $this = $(this),
            // Create a unique ID so we
            // can attach the label to the input
            uniqId = 'customfile_'+ (new Date()).getTime(),
            $wrap = $this.parent(),

            // Filter empty input
            $inputs = $wrap.siblings().find('.file-upload-input')
              .filter(function(){ return !this.value }),

            $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

        // 1ms timeout so it runs after all other events
        // that modify the value have triggered
        setTimeout(function() {
          // Add a new input
          if ( $this.val() ) {
            // Check for empty fields to prevent
            // creating new inputs when changing files
            if ( !$inputs.length ) {
              $wrap.after( $file );
              $file.customFile();
            }
          // Remove and reorganize inputs
          } else {
            $inputs.parent().remove();
            // Move the input so it's always last on the list
            $wrap.appendTo( $wrap.parent() );
            $wrap.find('input').focus();
          }
        }, 1);

      });
    }

}(jQuery));

$('input[type=file]').customFile();


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

//alert("dd");

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