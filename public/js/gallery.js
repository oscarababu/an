window.addEventListener('load', function() {
    update();
});

$('.thumb-nail').mouseenter(function(){
  var id = $(this).attr('id').split('_');
    $("#plus_"+id[1]).fadeIn('slow');
    $("#title_"+id[1]).fadeIn('slow');
});

$('.thumb-nail').mouseleave(function(){
  var id = $(this).attr('id').split('_');
    $("#plus_"+id[1]).fadeOut('slow');
    $("#title_"+id[1]).fadeOut('slow');
});

function update() { 

    $progress = document.querySelector('#progressHold');

    var url = 'https://images.unsplash.com/photo-1536522147990-430415457f34?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80';
    
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
    
      console.log(progress);
    }
    
    function onComplete(event) {
      var $img = document.createElement('img');
      //$img.setAttribute('src', url);
      $progress.appendChild($img);
      console.log('complete', url);
    }
    
    function onError(event) {
      console.log('error');
    }
    
    request.open('GET', url, true);
    request.overrideMimeType('text/plain; charset=x-user-defined');
    request.send(null);

  } 

  
