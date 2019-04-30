$(function () {
    'use strict';

    var LOCAL_URL = 'http://127.0.0.1:8000/';

    //$(".chk_back").prop('checked', true);

    $("#btn_check_all").click(function(){
        $(".chk_back").prop('checked', true);
    });

    $("#btn_un_check_all").click(function(){
        $(".chk_back").prop('checked', false);
    });


    $("#btn_back_update").click(function(){
        var arr = [];
        $(".chk_back").each(function() {
            var id = $(this).attr('id');
            var back = ($('#'+id).is(':checked')) ? 1 : 0;
            arr[id] = back;
        });

        axios({
            url:LOCAL_URL+'update_back_images',
            method:'POST',
            data:{images_arr:arr}
          }).then(function(res){
           // console.log(res.data);
          }).catch(function(err){
            console.log(err);
          });

    });
    
});