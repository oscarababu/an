
var LOCAL_URL = 'http://127.0.0.1:8000/';

window.addEventListener('load', function() {

  $( ".linx" ).draggable();
    
    var id  = $("#hdn_id").val();
    
    axios({
      url:LOCAL_URL+'fetch_first_item_image',
      method:'POST',
      data: {id:id}
    }).then(function(res){
      var imageUrl = res.data[0].image;
      var arr = [];
      update(imageUrl);
      

      for(var q = 0; q < res.data.length; q++){
          arr[q] = res.data[q].image;
          //console.log(res.data[q].image);
      }
      var i = 0;
      $('.forward').click(function(){
        i = i + 1; // increase i by one
        i = i % arr.length;
        
        update(arr[i]);
        $('.slider_no').html("<h4>"+parseInt(i+1)+"/"+parseInt(res.data.length)+"</h4>");
      });

      $('.backward').click(function(){
        if (i === 0) { // i would become 0
            i = arr.length; // so put it at the other end of the array
        }
        i = i - 1;
        
        update(arr[i]);
        $('.slider_no').html("<h4>"+parseInt(i+1)+"/"+parseInt(res.data.length)+"</h4>");
        
      });

      $('.slider_no').html("<h4>1/"+parseInt(res.data.length)+"</h4>");
      
      
    }).catch(function(err){
      console.log(err);
    });

    
});


function nextItem() {
  i = i + 1; // increase i by one
  i = i % arr.length; // if we've gone too high, start from `0` again
  return arr[i]; // give us back the item of where we are now
}

function prevItem() {
  if (i === 0) { // i would become 0
      i = arr.length; // so put it at the other end of the array
  }
  i = i - 1; // decrease by one
  return arr[i]; // give us back the item of where we are now
}




function update(url) { 

    $progress = document.querySelector('#progress_bar');

    var request = new XMLHttpRequest();
    request.onprogress = onProgress;
    request.onload = onComplete;
    request.onerror = onError;
    
    function onProgress(event) {
      if (!event.lengthComputable) {
        return;
      }
      var loaded = event.loaded;
      var total = event.total;
      var progress = (loaded / total).toFixed(2);

      var element = document.getElementById("progress_bar"); 
      var width = 1; 
      element.style.width = parseInt(progress * 100) + '%'; 
    
    }
    
    function onComplete(event) {
      var $img = document.createElement('img');
      //$img.setAttribute('src', url);
      $progress.appendChild($img);
      //console.log('complete', url);
      //$("#item_img").attr('src',url);
      document.getElementById("item_img").src = url;
    }
    
    function onError(event) {
      console.log('error');
    }
    
    request.open('GET', url, true);
    request.overrideMimeType('text/plain; charset=x-user-defined');
    request.send(null);

  } 
  
 $("#create_gallery_item").click(function(){
    var inputChk;
    var pageInputChk;
    var missingValue ="";

    var firstPage = $('#sel_first_page').val();
    var secondPage = $('#sel_second_page').val();
    var thirdPage = $('#sel_third_page').val();

    var CLOUDINARY_URL = "https://api.cloudinary.com/v1_1/dct1ukpad/image/upload";
    var CLOUDINARY_UPLOAD_PRESET = "glz8tkwo";
    var galleryImg = $('#gallery_thumb_nail').prop('files')[0];
    var title = $('#txt_title').val();
    var desc = $('#txt_desc').val();

    
    
    /*

    var element = document.getElementById("progress-bar"); 

    axios({
      url:CLOUDINARY_URL,
      method:'POST',
      headers:{
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      data: formData,
      onUploadProgress:  function( progressEvent ) {
        this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
        
        var random = Math.round(Math.random() * (+99 - +93) + +93);
        
        if(this.uploadPercentage < parseInt(random)){
          element.style.width = this.uploadPercentage + '%';
          element.innerHTML = this.uploadPercentage + '%';
        }
        
      }.bind(this)
    }).then(function(res){
      element.style.width = '100%'; 
      element.innerHTML = '100%';
      console.log(res.data.public_id);
    }).catch(function(err){
        console.log(err);
    });

    */

    if(firstPage =="" && secondPage =="" && thirdPage == ""){
      pageInputChk = false;
    }else{
      pageInputChk = true;
    }

    $(".required").each(function() {

        var input_val = $("#"+$(this).attr("id")).val();
        if(input_val ==""){
          inputChk = false;
          missingValue = missingValue + " " + $(this).attr("rel") + ", ";
        }else{
          inputChk = true;
        }
        
    });

      if(inputChk ==false || pageInputChk == false){

          if(inputChk ==false && pageInputChk == true){
            $(".msg").html(
              "<div class='alert alert-danger' role='alert'>"+
              "Error: These Value(s) are Missing "+missingValue+
              "</div>"
            );
          }

          if(inputChk ==false && pageInputChk == false){
            $(".msg").html(
              "<div class='alert alert-danger' role='alert'>"+
              "Error: These Value(s) are Missing "+
                missingValue+
                " Select Page"+
              "</div>"
            );
          }

          if(inputChk ==true && pageInputChk == false){
              $(".msg").html(
                "<div class='alert alert-danger' role='alert'>"+
                "Error: These Value(s) are Missing "+
                  " Select Page"+
                "</div>"
              );
          }
        
      }else{
        
        axios({
          url:'http://127.0.0.1:8000/create_gallery_item',
          method:'POST',
          data: {"title":title,"desc":desc,"firstPage":firstPage,"secondPage":secondPage,"thirdPage":thirdPage}
        }).then(function(res){
          //console.log(res.data);
              var item_id = res.data.item_id;

              //IMAGE UPLOAD TO CLOUDINARY

              var formData = new FormData();
              formData.append('file',galleryImg);
              formData.append('upload_preset',CLOUDINARY_UPLOAD_PRESET);
              formData.append('cloud_name','dct1ukpad');
              formData.append('tags',item_id);

              var element = document.getElementById("progress-bar"); 

              axios({
                url:CLOUDINARY_URL,
                method:'POST',
                headers:{
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: formData,
                onUploadProgress:  function( progressEvent ) {
                  this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                  
                  var random = Math.round(Math.random() * (+99 - +93) + +93);
                  
                  if(this.uploadPercentage < parseInt(random)){
                    element.style.width = this.uploadPercentage + '%';
                    element.innerHTML = this.uploadPercentage + '%';
                  }
                  
                }.bind(this)
              }).then(function(res){
                element.style.width = '100%'; 
                element.innerHTML = '100%';
                var up_image = res.data.url;
                var up_image_format = res.data.format;
                var up_image_public_id = res.data.public_id;
                
                axios({
                  url:'http://127.0.0.1:8000/save_gallery_item_image',
                  method:'POST',
                  data: {"up_image":up_image,"item_id":item_id,"up_image_format":up_image_format,"up_image_public_id":up_image_public_id}
                }).then(function(res){
                  console.log(res);
                }).catch(function(err){
                  console.log(err);
                });

                //console.log(res.data);
              }).catch(function(err){
                  console.log(err);
              });
              //IMAGE UPLOAD TO CLOUDINARY

        }).catch(function(err){
            console.log(err);
        });

      }
      
 });