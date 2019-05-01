@include('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>

        <div class="full-height">
            <img src="" id="item_img"  />
            
            <div class="info_linx">
                <p class="p-1">

                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
                    {{ Form::open(array('url' => 'login_fnc')) }}
                </p>
                    <ul>
                            <li>
                       
                                {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email')) }}
                            </li>
                            <li>
                                {{ Form::password('password',array('placeholder' => 'Password'),array('class' => 'form-control')) }}
                            </li>
                            <li>
                                 {{ Form::submit('Login') }}
                            </li>
                    </ul>
                    <!--
                        <ul>
                            <li><input type='text' class='form-control' placeholder='Email' /></li>
                            <li><input type='password' class='form-control' placeholder='Password' /></li>
                            <li><input type="button" id="create_gallery_item" class="btn btn-primary float-right" value="Login" /></li>
                        </ul>
                    -->
                    {{ Form::close() }}
            </div>

            
        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>

            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script> 

            <script src="{{asset('js/custom.js')}}"></script>
        
    </body>
</html>
