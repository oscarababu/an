@include('head') 
        <div class="full-height">

            @if ($items)
                @foreach($items as $val_items)
                    <input type="hidden" id="hdn_img_id" value="{{$val_items->id}}" />
                    <img id="img" src=""/>

                    @if(strlen($val_items->description) < 50)

                        <div class="info_linx">

                            <ul>
                            @if ($links)
                                @foreach($links as $val)
                                        
                                        @if(strtolower(str_replace(' ','-',App\Pages::find(explode('_', $val_items->page)[0])->page)) == strtolower(str_replace(' ','-',$val->page)))
                                            <li><a href="{{ url('/' . strtolower($val->type). '/' . strtolower(str_replace(' ','-',$val->page))) }}"><b style='font-weight:bold'> {{$val->page}}</b></a></li>
                                        @else
                                            <li><a href="{{ url('/' . strtolower($val->type). '/' . strtolower(str_replace(' ','-',$val->page))) }}">{{$val->page}}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                                            
                            </ul>
                            @if(!empty($val_items->description))
                                
                                    <div class="divider"></div>
                                    <div class="info_desc">
                                        {!! $val_items->description !!}
                                    </div>
                                
                            @endif
                        </div>
                    @else
                        <div class="info_large_content">
                            <h2>{{App\Pages::find(explode('_', $val_items->page)[0])->page}}</h2>
                            <a href="{{ url('/information/information') }}"><div class="cls_slide"></div></a>
                            {!! $val_items->description !!}
                        </div>
                    @endif

                @endforeach
            @endif

            
        </div>

        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script> 


        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>
        <script src="{{asset('js/info.js')}}"></script>
        
    </body>
</html>
