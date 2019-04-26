@include('head_admin')
        <div class="full-height-admin">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mt-2 mb-2">New Information Page</h4>
                </div>
            </div>
            <div class="msg">
                        
            </div>  
                    
        


        <div class="container" id="content_upload">


                <div class="row" >
                    
                    <div class="col" >
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="txt_title"  rel="Title" name="title" class="form-control required" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea id="txt_desc" rel="Descrpition" class="form-control" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="col">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">First Page</label>
                                    <select id="sel_first_page" class="form-control required_page">
                                        <option></option>
                                        @if ($pages)
                                                @foreach($pages as $val)
                                                
                                                <option value="{{$val->id}}">{{$val->page}}</option>

                                                @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Second Page</label>
                                    <select id="sel_second_page" class="form-control required_page">
                                        <option></option>
                                        @if ($pages)
                                                @foreach($pages as $val)
                                                
                                                <option value="{{$val->id}}">{{$val->page}}</option>

                                                @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Third Page</label>
                                    <select id="sel_third_page" class="form-control required_page">
                                        <option></option>
                                        @if ($pages)
                                                @foreach($pages as $val)
                                                
                                                <option value="{{$val->id}}">{{$val->page}}</option>

                                                @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Link Title</label>
                                    <input type="text" id="txt_link_title" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Link</label>
                                    <input type="text" id="txt_link" class="form-control" />
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="button" id="create_gallery_item" class="btn btn-primary btn-lg float-right" value="Next" />
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                
            </div>
            
    </div>

        

    <div class="container" id="image_upload">

        <div class="row mt-3 mb-3">
            <div class="col">
                <div class="progress">
                    <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <!-- <h3>Demo:</h3> -->
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
              <button type="button" class="btn btn-success" id="btn_image" >
                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                  Upload 
                </span>
              </button>
              
            </div>

            <div class="btn-group">
              <button type="button" class="btn btn-danger" id="another_item" >
                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                  Create Another Item 
                </span>
              </button>
              
            </div>
  
          <!-- Show the cropped image in modal -->
          <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                </div>
              </div>
            </div>
          </div><!-- /.modal -->
  
        </div><!-- /.docs-buttons -->

  
         
  
        </div><!-- /.docs-toggles -->
      </div>


    </div>
            

            
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            <script src="https://fengyuanchen.github.io/js/common.js"></script>
            <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="{{asset('cropper/jquery-cropper.js')}}"></script>
            <script src="{{asset('cropper/info_thumbnail.js')}}"></script>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init({selector:'textarea'});</script>

            <!--
            <script src="{{asset('js/item.js')}}"></script> 
            -->
    </body>
</html>
