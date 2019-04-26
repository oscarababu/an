@include('head') 
        <div class="full-height">
            <img src="images/1495129626_ashantistool.jpg" />
            
            <div class="info_linx">
                    <ul>
                    @if ($links)
                        @foreach($links as $val)

                            <li><a href="{{ url('/' . strtolower($val->type). '/' . strtolower(str_replace(' ','-',$val->page))) }}">{{$val->page}}</a></li>

                            @endforeach
                        @endif
                                    
                    </ul>
            </div>

            
        </div>

        <script src="{{asset('js/gallery.js')}}"></script>
        
    </body>
</html>
