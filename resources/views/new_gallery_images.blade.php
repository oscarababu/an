@include('head_admin')
        <div class="full-height-admin">


        <div class="container" >

          <div class="row mt-5 ml-5">
                    
                    <div class="col" >
                      <h3>
                          @if ($items)
                                {{ $items->title }}
                                <input type="hidden" value="{{$items->id}}" id="hdn_item_id" />
                          @endif
                       </h3>
                    </div>

                    

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Upload Item Gallery Images
                    </button>

          </div>
                
          

        <div class="row mt-3 mb-3">
            

              @if ($images)
                @foreach($images as $val_images)
                  <div class="col-md-3 mt-3">
                      <div class="card ">
                          <img src="{{ str_replace('upload/','upload/w_300,c_scale/',$val_images->image_link) }}" />
                          
                          <div class="card-footer">
                            <small class="text-muted"><a id="{{ $image_id . '_' . $val_images->id }}" href="#" class="del_image">Delete</a></small>
                          </div>
                      </div>
                  </div>
                @endforeach
              @endif
            
        </div>



         <!-- Modal -->
         <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                            <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <div class="msg"></div>
                                <div class="progress mb-2">
                                  <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    
                                    <div class="img-container">
                                      <img id="image" src="" alt="Gallery Thumbnail Image">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
        <div class="col-md-12 docs-buttons">
          <!-- <h3>Toolbar:</h3> -->
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                <span class="fa fa-arrows"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
                <span class="fa fa-crop"></span>
              </span>
            </button>
          </div>
  
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, 0.1)">
                <span class="fa fa-search-plus"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, -0.1)">
                <span class="fa fa-search-minus"></span>
              </span>
            </button>
          </div>
  
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, -10, 0)">
                <span class="fa fa-arrow-left"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 10, 0)">
                <span class="fa fa-arrow-right"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, -10)">
                <span class="fa fa-arrow-up"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, 10)">
                <span class="fa fa-arrow-down"></span>
              </span>
            </button>
          </div>
  
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, -45)">
                <span class="fa fa-rotate-left"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, 45)">
                <span class="fa fa-rotate-right"></span>
              </span>
            </button>
          </div>
  
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleX&quot;, -1)">
                <span class="fa fa-arrows-h"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleY&quot;, -1)">
                <span class="fa fa-arrows-v"></span>
              </span>
            </button>
          </div>
  
          <div class="btn-group">
           
            <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;clear&quot;)">
                <span class="fa fa-remove"></span>
                Clear
              </span>
            </button>
          </div>


          <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;reset&quot;)">
                <span class="fa fa-refresh"></span>
                Reset
              </span>
            </button>
  
          <div class="btn-group">

            <label class="btn btn-warning btn-upload" for="inputImage" title="Upload image file">
              <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Import image with Blob URLs">
                <span class="fa fa-upload"></span>
                Browse 
              </span>
            </label>
            
          </div>

         
          <div class="btn-group">
              <button type="button" class="btn btn-success" id="save_gallery_image" >
                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                  Upload 
                </span>
              </button>
              
            </div>


              </div>
              
            </div>
          </div>
        </div>
                    

      </div>

      

      </div>
      


    </div>
            

            
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
           
            <script src="https://fengyuanchen.github.io/js/common.js"></script>
            <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="{{asset('cropper/jquery-cropper.js')}}"></script>
            <script src="{{asset('cropper/main.js')}}"></script>
            <!--
            <script src="{{asset('js/item.js')}}"></script> 
            -->
    </body>
</html>
