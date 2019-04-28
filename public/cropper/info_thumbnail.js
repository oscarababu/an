$(function () {
  'use strict';



  var console = window.console || { log: function () {} };
  var URL = window.URL || window.webkitURL;
  var $image = $('#image');
  //var $download = $('#download');
  var $dataX = $('#dataX');
  var $dataY = $('#dataY');
  var $dataHeight = $('#dataHeight');
  var $dataWidth = $('#dataWidth');
  var $dataRotate = $('#dataRotate');
  var $dataScaleX = $('#dataScaleX');
  var $dataScaleY = $('#dataScaleY');
  var options = {
    aspectRatio: NaN,
    autoCrop:false,
    preview: '.img-preview',
    crop: function (e) {
      $dataX.val(Math.round(e.detail.x));
      $dataY.val(Math.round(e.detail.y));
      $dataHeight.val(Math.round(e.detail.height));
      $dataWidth.val(Math.round(e.detail.width));
      $dataRotate.val(e.detail.rotate);
      $dataScaleX.val(e.detail.scaleX);
      $dataScaleY.val(e.detail.scaleY);
    }
  };

  var originalImageURL = $image.attr('src');
  var uploadedImageName = 'cropped.jpg';
  var uploadedImageType = 'image/jpeg';
  var uploadedImageURL;
  var itemId;
  var CLOUDINARY_URL = "https://api.cloudinary.com/v1_1/dct1ukpad/image/upload";
  var CLOUDINARY_UPLOAD_PRESET = "glz8tkwo";
  var LOCAL_URL = 'http://127.0.0.1:8000/';    


  $("#update_info_item").click(function(){
       var desc = tinyMCE.get('txt_desc').getContent();
       var id = $('#hdn_id').val();
       if(desc !=""){

        axios({
          url:LOCAL_URL+'update_info_item',
          method:'POST',
          data: {"id":id,"desc":desc}
        }).then(function(res){
          if(res.status =="200"){
            $(".msg").html(
              "<div class='alert alert-success' role='alert'>"+
              "Success: Item Saved"+
              "</div>"
            );
            
          }
          
        }).catch(function(err){
          console.log(err);
        });

       }else{
         $('.msg').html(
          "<div class='alert alert-danger' role='alert'>"+
          "Error: Description Empty "+
          "</div>"
         );
       }
  });

  $("#create_gallery_item").click(function(){
        
       var inputChk;
       var pageInputChk;
       var missingValue ="";
   
       var firstPage = $('#sel_first_page').val();
       var secondPage = "";
       var thirdPage = "";
   
       var title = $('#txt_title').val();
       var desc = tinyMCE.get('txt_desc').getContent();

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

          if(desc !=""){

              axios({
                url:LOCAL_URL+'create_info_item',
                method:'POST',
                data: {"title":title,"desc":desc,"firstPage":firstPage,"secondPage":secondPage,"thirdPage":thirdPage}
              }).then(function(res){
                console.log(res.data);
                if(res.data.status !="0"){
                  itemId = res.data.item_id;
                  $(".msg").empty();
                  $("#content_upload").hide();
                  $("#image_upload").fadeIn('slow');
                }else{
                  $(".msg").html(
                    "<div class='alert alert-danger' role='alert'>"+
                    "Error: Item already Exists"+
                    "</div>"
                  );
                }
                
              }).catch(function(err){
                console.log(err);
              });

          }else{
            $(".msg").html(
              "<div class='alert alert-danger' role='alert'>"+
              "Error: Enter Page Decription"+
              "</div>"
            );
          }

            
        }

  });


  $("#btn_image").click(function(){
    var canvas = $("#image").cropper('getCroppedCanvas').toDataURL(uploadedImageType);
    
    var formData = new FormData();
    formData.append('file',canvas);
    formData.append('upload_preset',CLOUDINARY_UPLOAD_PRESET);
    formData.append('cloud_name','dct1ukpad');
    formData.append('tags',itemId);

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
      //console.log(res);
      element.style.width = '100%'; 
      element.innerHTML = '100%';
      var up_image = res.data.url;
      var up_image_format = res.data.format;
      var up_image_public_id = res.data.public_id;

      var firstPage = $('#sel_first_page').val();
      var secondPage = "";
      var thirdPage = "";

      axios({
        url:LOCAL_URL+'save_gallery_item_image',
        method:'POST',
        data: {"firstPage":firstPage,"secondPage":secondPage,"thirdPage":thirdPage,"type":"full_image","up_image":up_image,"item_id":itemId,"up_image_format":up_image_format,"up_image_public_id":up_image_public_id}
      }).then(function(res){
        //console.log(res);

        $(".msg").html(
            "<div class='alert alert-success' role='alert'>"+
            "Success: Image Uploaded "+
            "</div>"
          );

          $("#another_item").show();
        
      }).catch(function(err){
        console.log(err);
      });

    }).catch(function(err){
      console.log(err);
    });

    
  });

  $("#another_item").click(function(){
        $(".msg").empty();
        $('#sel_first_page').val('');
        $('#sel_second_page').val('');
        $('#sel_third_page').val('');
        $('#txt_link').val('');
        $('#txt_link_title').val('');
        $('#txt_desc').val('');
   
        $('#txt_title').val('');
        $('#txt_desc').val('');
        tinymce.get('#txt_desc').setContent('');
        $("img").attr('src','');

        $("#content_upload").fadeIn('slow');
        $("#image_upload").hide();
        $(this).hide();
  });

  
  // Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Cropper
  $image.on({
    ready: function (e) {
      console.log(e.type);
    },
    cropstart: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropmove: function (e) {
      console.log(e.type, e.detail.action);
    },
    cropend: function (e) {
      console.log(e.type, e.detail.action);
    },
    crop: function (e) {
      console.log(e.type);
    },
    zoom: function (e) {
      console.log(e.type, e.detail.ratio);
    }
  }).cropper(options);

  // Buttons
  if (!$.isFunction(document.createElement('canvas').getContext)) {
    $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
  }

  if (typeof document.createElement('cropper').style.transition === 'undefined') {
    $('button[data-method="rotate"]').prop('disabled', true);
    $('button[data-method="scale"]').prop('disabled', true);
  }

  // Download
  //if (typeof $download[0].download === 'undefined') {
    //$download.addClass('disabled');
  //}

  // Options
  $('.docs-toggles').on('change', 'input', function () {
    var $this = $(this);
    var name = $this.attr('name');
    var type = $this.prop('type');
    var cropBoxData;
    var canvasData;

    if (!$image.data('cropper')) {
      return;
    }

    if (type === 'checkbox') {
      options[name] = $this.prop('checked');
      cropBoxData = $image.cropper('getCropBoxData');
      canvasData = $image.cropper('getCanvasData');
      
      options.ready = function () {
        $image.cropper('setCropBoxData', cropBoxData);
        $image.cropper('setCanvasData', canvasData);
      };
    } else if (type === 'radio') {
      options[name] = $this.val();
    }

    $image.cropper('destroy').cropper(options);
  });

  // Methods
  $('.docs-buttons').on('click', '[data-method]', function () {
    var $this = $(this);
    var data = $this.data();
    var cropper = $image.data('cropper');
    var cropped;
    var $target;
    var result;

    if ($this.prop('disabled') || $this.hasClass('disabled')) {
      return;
    }

    if (cropper && data.method) {
      data = $.extend({}, data); // Clone a new one

      if (typeof data.target !== 'undefined') {
        $target = $(data.target);

        if (typeof data.option === 'undefined') {
          try {
            data.option = JSON.parse($target.val());
          } catch (e) {
            console.log(e.message);
          }
        }
      }

      cropped = cropper.cropped;

      switch (data.method) {
        case 'rotate':
          if (cropped && options.viewMode > 0) {
            $image.cropper('clear');
          }

          break;

        case 'getCroppedCanvas':
          if (uploadedImageType === 'image/jpeg') {
            if (!data.option) {
              data.option = {};
            }

            data.option.fillColor = '#fff';
          }

          break;
      }

      result = $image.cropper(data.method, data.option, data.secondOption);

      switch (data.method) {
        case 'rotate':
          if (cropped && options.viewMode > 0) {
            $image.cropper('crop');
          }

          break;

        case 'scaleX':
        case 'scaleY':
          $(this).data('option', -data.option);
          break;

        case 'getCroppedCanvas':
          if (result) {
            // Bootstrap's Modal
            $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
            
            if (!$download.hasClass('disabled')) {
              download.download = uploadedImageName;
              $download.attr('href', result.toDataURL(uploadedImageType));
            }
          }

          break;

        case 'destroy':
          if (uploadedImageURL) {
            URL.revokeObjectURL(uploadedImageURL);
            uploadedImageURL = '';
            $image.attr('src', originalImageURL);
          }

          break;
      }

      if ($.isPlainObject(result) && $target) {
        try {
          $target.val(JSON.stringify(result));
        } catch (e) {
          console.log(e.message);
        }
      }
    }
  });
  

  // Keyboard
  $(document.body).on('keydown', function (e) {
    if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
      return;
    }

    switch (e.which) {
      case 37:
        e.preventDefault();
        $image.cropper('move', -1, 0);
        break;

      case 38:
        e.preventDefault();
        $image.cropper('move', 0, -1);
        break;

      case 39:
        e.preventDefault();
        $image.cropper('move', 1, 0);
        break;

      case 40:
        e.preventDefault();
        $image.cropper('move', 0, 1);
        break;
    }
  });

  // Import image
  var $inputImage = $('#inputImage');

  if (URL) {
    $inputImage.change(function () {
      var files = this.files;
      var file;
      if (!$image.data('cropper')) {
        return;
      }

      if (files && files.length) {
        file = files[0];

        if (/^image\/\w+$/.test(file.type)) {
          uploadedImageName = file.name;
          uploadedImageType = file.type;

          if (uploadedImageURL) {
            URL.revokeObjectURL(uploadedImageURL);
          }

          uploadedImageURL = URL.createObjectURL(file);
          $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
          $inputImage.val('');
        } else {
          window.alert('Please choose an image file.');
        }
      }
    });
  } else {
    $inputImage.prop('disabled', true).parent().addClass('disabled');
  }
});
