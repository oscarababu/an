@include('head_admin')
        <div class="full-height-admin">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mt-2 mb-2">Items Reports</h4>
                </div>
            </div> 
                    
        <div class="container">

                <div class="row" >
                    
                    <div class="col" >
                    <table class='table'>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>First Page</th>
                            <th>Second Page</th>
                            <th>Third Page</th>
                            <th COLSPAN="4">Action</th>
                        </tr>
                    
                        @if ($items)
                            @foreach($items as $val)

                                <tr>
                                    <td>{{$val->title}}</td>
                                
                                    <td>
                                        @if($val->status ==0)
                                            <p>In Active</p>
                                        @else
                                            <p>Active</p>
                                        @endif
                                        </td>
                                        @if(explode('_',$val->page)[0] !=0)
                                            <td>
                                        {{ App\Pages::find(explode('_',$val->page)[0])->page . ' - ' . App\Pages::find(explode('_',$val->page)[0])->type }}
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if(explode('_',$val->page)[1] !=0)
                                            <td>
                                        {{ App\Pages::find(explode('_',$val->page)[1])->page . ' - ' . App\Pages::find(explode('_',$val->page)[0])->type }}
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if(explode('_',$val->page)[2] !=0)
                                            <td>
                                        {{ App\Pages::find(explode('_',$val->page)[2])->page . ' - ' . App\Pages::find(explode('_',$val->page)[0])->type }}
                                            </td>
                                        @else
                                            <td></td>
                                        @endif

                                    <td><a href="{{ url('/thumbnail_management/' . $val->id) }}">Thumbnail</a></td>
                                    <td><a href="{{ url('/image_management/' . $val->id) }}">Images</a></td>
                                    <td><a href="{{ url('/edit_info_item/' . $val->id) }}">Edit</a></td>
                                    <td><a href="{{ url('/image_management/' . $val->id) }}">Delete</a></td>
                                </tr>
                            
                            @endforeach
                        @endif
                    </table>

					</div>

                </div>
            
        </div>

        
            

            
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            <script src="https://fengyuanchen.github.io/js/common.js"></script>
            <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="{{asset('cropper/jquery-cropper.js')}}"></script>
            <script src="{{asset('js/page_management.js')}}"></script>
            <!--
            <script src="{{asset('js/item.js')}}"></script> 
            -->
    </body>
</html>
