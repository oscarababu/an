@include('head_admin')
        <div class="full-height-admin">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mt-2 mb-2">Edit {{ App\Pages::find(explode('_',$items->page)[0])->page}} Page</h4>
                </div>
            </div>
            <div class="msg">
                        
            </div>  
                    

        <div class="container">


                <div class="row" >
                    
                    <div class="col" >
                        <input type="hidden" id="hdn_id" value="{{$items->id}}" />
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea id="txt_desc" rel="Descrpition" class="form-control" rows="7">{{$items->description}}</textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="button" id="update_info_item" class="btn btn-primary btn-lg float-right" value="Edit" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">

                       


        

                        

                        
                    </div>
                    

                </div>
                
            </div>
            
    </div>

        

    


    </div>
            

            
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            <script src="https://fengyuanchen.github.io/js/common.js"></script>
            <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
            <script src="{{asset('cropper/jquery-cropper.js')}}"></script>
            <script src="{{asset('cropper/info_thumbnail.js')}}"></script>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init(
                {
                    selector: 'textarea',  // change this value according to your HTML
                    toolbar: 'undo redo | styleselect | bold italic | link image',
                    plugins: "link",
                    }
            );</script>

            <!--
            <script src="{{asset('js/item.js')}}"></script> 
            -->
    </body>
</html>
