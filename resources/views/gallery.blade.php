@include('head') 
        <div class="full-height-gallery">
             <div class="thumb-nail-wrapper" id="thumb-nail-wrapper">

             @if ($items)
                @foreach($items as $val)

                <a href="{{ url('/item/gallery/' . $val->page_link) }}">
                    <div class="thumb-nail">
                        <img src="{{ str_replace('upload/','upload/w_670,h_590,c_scale/',$val->image_link) }}" />
                    </div> 
                 </a>

                @endforeach
              @endif

            </div>
            
        </div>

        <script src="{{asset('js/gallery.js')}}"></script>
        
    </body>
</html>
