@include('head_admin')
        <div class="full-height-admin">

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="mt-2 mb-2">Create New Page</h4>
                </div>
            </div>
            <div class="msg">
                        
            </div>  
                    
        <div class="container">


                <div class="row" >
                    
                    <div class="col" >
                        <div class="form-group">
                            <label for="title">Type of Page</label>
							<input type='hidden' id='hdn_page_id' value='' />
							<select class="form-control" name="title" id='sel_type' >
								<option></option>
								<option>Gallery</option>
								<option>Information</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Page</label>
							<input class="form-control" id='ipt_page' type='text'/>
                        </div>
					</div>
					
					<div class="col">
                        <div class="form-group">
                            <label>Top Bar Link</label>
							<select class="form-control" id='chk_top_link' >
								<option>OFF</option>
								<option>ON</option>
								
                            </select>
                        </div>

                        <div class="form-group">	
                            <label>Home Page Link</label>
							<select class="form-control" id='chk_home_link' >
								<option>OFF</option>
								<option>ON</option>
								
                            </select>
                        </div>

                        <div class="form-group">
							
							<label>In Page Link</label>
							<select class="form-control" id='chk_in_page_link' >
								<option>OFF</option>
								<option>ON</option>
                            </select>
                        </div>
							
							
                        <input type="submit" name="submit" id="btn_create_new_page" class="btn btn-success float-right ml-2" value="Create Page">
                        <input type="submit" name="submit" id="btn_edit_page" class="btn btn-success float-right ml-2" value="Edit Page">
						
					
					</div>

                </div>
            
        </div>

        

    <div class="container">

        <div class="row">
            <div class="col">
                <h4 class="mt-2 mb-2">Pages</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class='tabs'>
                    <div class='ins_tabs2 tabb m-2' id="gallery_mng" >
                            Gallery Pages
                        </div>
                        <div class='ins_tabs2 tabb m-2'  id="info_mng" >
                            Information Pages
                        </div>
                </div>        
            </div>
        </div>

      <div class="row">
            <div class="col-md-12 ">

                    <div class='hold_gallery_table tab_ui col-md-12 mb-5' id='gallery_mng_ui' >
                   
                    <table class="table" id='pages_report'>
                        
                        </table>
                    </div>
                    
                    <div class='hold_information_table tab_ui col-md-12 mb-5' id='info_mng_ui'>
                
                    <table class="table" id='info_pages_report'>
                        
                        </table>
                    </div>
                    
                </div>
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
