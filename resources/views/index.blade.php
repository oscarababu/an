@include('head')
        <div class="full-height">
                <img src="" id="item_img" />
                <div class="in-page-wrapper">
                        @if ($links)
                                @foreach($links as $val)
                                
                                <a href="{{ url('/' . strtolower($val->type) . '/' . strtolower(str_replace(' ', '-',$val->page))) }}">
                                        <div class="in-page-link">
                                                <p>{{strtoupper($val->page)}}</p>
                                        </div>
                                </a>

                                @endforeach
                        @endif
                        
                </div>
        </div>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script> 

        <script src="{{asset('js/custom.js')}}"></script>
        
    </body>
</html>
