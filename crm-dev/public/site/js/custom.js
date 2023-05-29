/*fixed nav*/
$(window).scroll(function() {
    var y = $(window).scrollTop();
    if (y > 150) {
      $("#header").addClass('not-top').scrollTop();
    } else {
      $("#header").removeClass('not-top');
    }
});

$(window).scroll(function() {
    var y = $(window).scrollTop();
    if (y > 5000) {
      $("#link").show();
    } else {
      $("#link").hide();
    }
});

 var swiper2 = new Swiper('.section_banner .swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 0,
    freeMode: false,
    navigation: {
     nextEl: '.section_banner .swiper-button-next',
     prevEl: '.section_banner .swiper-button-prev',
    },
});

/*aos*/
AOS.init({
   easing: 'ease-in-out-sine'
});
/*aos*/









$(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 imgUp"><div class="imagePreview"></div><label class="btn btn-primary"> <span><i class="fa fa-upload" aria-hidden="true"></i></span><input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});













    /*profile pic upload script*/
  
           $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
           $(".file-upload").click();
        });
    }); 
  
       
       








/*accordion plus minus*/
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('fa-plus fa-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);








/* file upload rename */
      
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});





 $(document).ready(function(){


            $("#formStep1").validate({
               rules: {
                 // no quoting necessary
                 first_name: "required",
                 // quoting necessary!
                 last_name: "required",
                 hk_id: "required",
                 email: { email:true,
                           required:true
                        },
                 rank: "required",
                 password: {
                     required: true,
                     minlength: 5
                  },
                  confirm_password: {
                     required: true,
                     minlength: 5,
                     equalTo: "#password"
                  },



               },
               messages: {
                  first_name: "Please enter your firstname",
                  last_name: "Please enter your lastname",
                  hk_id: "Please enter HKID",
                  rank: "Please enter rank",
                  password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                  },
                  confirm_password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long",
                     equalTo: "Please enter the same password as above"
                  },

                   email: { email:"Please enter a valid email address",
                           required:true
                        },


                  
               }

             });





            

            
         });





 $(document).ready(function(){


            $("#formSettings").validate({
               rules: {
                 // no quoting necessary
                 first_name: "required",
                 // quoting necessary!
                 last_name: "required",
                 hk_id: "required",
                 
                 rank: "required",
                 password: {
                     //required: true,
                     minlength: 5
                  },
                  confirm_password: {
                     //required: true,
                     minlength: 5,
                     equalTo: "#password"
                  },



               },
               messages: {
                  first_name: "Please enter your firstname",
                  last_name: "Please enter your lastname",
                  hk_id: "Please enter HKID",
                  rank: "Please enter rank",
                  password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                  },
                  confirm_password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long",
                     equalTo: "Please enter the same password as above"
                  },

                   email: { email:"Please enter a valid email address",
                           required:true
                        },


                  
               }

             });





            

            
         });