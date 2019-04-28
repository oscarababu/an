window.addEventListener('load', function() {
    
    var LOCAL_URL = 'http://127.0.0.1:8000/';
    var hdn_img = $("#hdn_img_id").val();

    axios({
        url:LOCAL_URL+'fetch_info_background_image',
        method:'POST',
        data: {"id":hdn_img}
      }).then(function(res){
        //console.log(res.data.image_link);
        update(res.data.image_link);
        
      }).catch(function(err){
        console.log(err);
      });

});


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
    
      //console.log(progress);
    }
    
    function onComplete(event) {
      var $img = document.createElement('img');
     // $img.setAttribute('src', url);
      $progress.appendChild($img);
      //console.log('complete', url);

      document.getElementById("img").src= url;
    }
    
    function onError(event) {
      console.log('error');
    }
    
    request.open('GET', url, true);
    request.overrideMimeType('text/plain; charset=x-user-defined');
    request.send(null);

  } 

  
