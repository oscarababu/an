@include('head')
        <div class="full-height">
                <img src="images/1495129626_ashantistool.jpg" />
                <div class="in-page-wrapper">
                        @if ($links)
                                @foreach($links as $val)
                                
                                <a href="{{ url('/' . strtolower($val->type) . '/' . strtolower(str_replace(' ', '-',$val->page))) }}">
                                        <div class="in-page-link">
                                                <p>{{$val->page}}</p>
                                        </div>
                                </a>

                                @endforeach
                        @endif
                        
                </div>
        </div>

        <script src="{{asset('js/custom.js')}}"></script>
        
    </body>
</html>
