@include('head') 
        <div class="full-height">
            

            

            @if ($gallery)
                @foreach($gallery as $val)

                <input type="hidden" id="hdn_id" value="{{$val->id}}" />

                <img id="item_img" />

                <div class="linx">
                        <a href="{{ url('/gallery/' . $pagex) }}"><div class='cls_slide' id='cls_slide'></div></a>
                        <h4 class='this_project_ttl'  >{{$val->title}}</h4>
                    
                        <div  class='this_project_desc'>
                            <p>
                                {!!$val->description!!}
                            </p>
                        </div>
                        
                        <!--<h4><div class='ghost_linx'></div></h4>-->
                        
                        <h5 style='width:100%; float:left;'>
                            <div class='slider_controls'>
                                <div class='forward' style='cursor:pointer;'></div>
                                
                                <div class='backward' style='cursor:pointer;'></div>
                                <div class='slider_no'></div>
                        </div></h5>
			
                    </div>
                  
                @endforeach
              @endif

                    

        </div>

        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script> 

        <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>

  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="{{asset('js/item.js')}}"></script>
        
    </body>
</html>
