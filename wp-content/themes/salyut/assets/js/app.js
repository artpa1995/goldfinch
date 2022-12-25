$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });

 
 /*  labeli  id*/$("#file-upload").change( function(){
/*  formai id*/     $("#form_img_upload").submit();
})

      





});

// $(document).ready(function(){

//     // Get value on button click and show alert
//     $(".kn").click(function(){
//         var a = $(".a").val();
//         var b = $(".b").val();
//         var c = $(".c").val();
//         var d = $(".c").val();
//         var e = $(".e").val();
//         var y = (((parseInt(a)/10)+(parseInt(b)/18)+(parseInt(c)/250))/3)+(((parseInt(d)/120)+(parseInt(e)/4))/2);
//        //  var str = $(".a").val();
//       console.log(y);
//     });
// });



console.log('ijfiwjfiw');

let app = new Vue({
	el: '#app',
	data: {
        items: ['a', 'b', 'c', 'd', 'e'],
	},
});