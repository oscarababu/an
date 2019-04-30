@include('head_admin')
        <div class="full-height-admin">


        <div class="container" >

          <div class="row mt-5 ml-1">

                    
                    <button type="button" class="btn btn-primary ml-1" id="btn_check_all">
                      Check All
                    </button>

                    <button type="button" class="btn btn-primary ml-1" id="btn_un_check_all">
                      Un Check All
                    </button>

                    <button type="button" class="btn btn-success ml-1" id="btn_back_update">
                      Update Background Images
                    </button>

          </div>
                
          

        <div class="row mt-3 mb-3">
            

              @if ($images)
                @foreach($images as $val_images)
                  <div class="col-md-3 mt-3">
                      <div class="card ">
                          <img src="{{ str_replace('upload/','upload/w_300,c_scale/',$val_images->image_link) }}" />
                          
                          <div class="card-footer">
                               @if($val_images->background == 1)
                                <input class='chk_back' id='{{$val_images->id}}' type='checkbox' checked/>
                                @else
                                <input class='chk_back' id='{{$val_images->id}}' type='checkbox' />
                                @endif
                          </div>
                      </div>
                  </div>
                @endforeach
              @endif
            
        </div>     

      </div>

      

      </div>
      


    </div>
            

            
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
           
            <script src="https://fengyuanchen.github.io/js/common.js"></script>
            <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="{{asset('cropper/jquery-cropper.js')}}"></script>
            <script src="{{asset('js/back_mgt.js')}}"></script>
            <!--
            <script src="{{asset('js/item.js')}}"></script> 
            -->
    </body>
</html>
