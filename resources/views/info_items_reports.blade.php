@include('head_admin')
        <div class="full-height-admin">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mt-2 mb-2">Information Pages Reports</h4>
                </div>
            </div> 
                    
        <div class="container">

                <div class="row" >
                    
                    <div class="col" >
                    <table class='table'>
                        <tr>
                            <th>Page</th>
                            <th>Status</th>
                            <th COLSPAN="">Action</th>
                        </tr>
                    
                        @if ($items)
                            @foreach($items as $val)

                                <tr>
                                    
                                         @if(explode('_',$val->page)[0] !=0)
                                            <td>
                                        {{ App\Pages::find(explode('_',$val->page)[0])->page }}
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>
                                        @if($val->status ==0)
                                            <p>In Active</p>
                                        @else
                                            <p>Active</p>
                                        @endif
                                        </td>
                                       

                                    <td><a href="{{ url('/thumbnail_management/' . $val->id) }}">Thumbnail</a></td>
                                    
                                    <td><a href="{{ url('/edit_info_item/' . $val->id) }}">Edit</a></td>
                                    @if($val->status == 1)
                                        <td><a href="{{ url('/disable_item/' . $val->id) }}">Disable</a></td>
                                    @else
                                        <td><a href="{{ url('/enable_item/' . $val->id) }}">Enable</a></td>
                                    @endif
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
