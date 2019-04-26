@include('head') 
        <div class="full-height-gallery">
             <div class="thumb-nail-wrapper" id="thumb-nail-wrapper">

             @if ($items)
                @foreach($items as $val)

                <a href="{{ url('/item/gallery/' . $pagex . '/' . $val->page_link) }}">
                    <div class="thumb-nail" id="thumb_{{$val->id}}">
                        <div class="plus" id="plus_{{$val->id}}" ></div>
                        <div class="title_tag" id="title_{{$val->id}}" >{{$val->title}}</div>
                        
                        <img src="{{ str_replace('upload/','upload/w_670,h_590,c_scale/',$val->image_link) }}" />
                    </div> 
                 </a>

                @endforeach
              @endif

            </div>
            
        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>


        <script src="{{asset('js/gallery.js')}}"></script>
        
    </body>
</html>
