<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>African Ethno</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/images/fav.png">

        <meta name="Description" CONTENT="African Ethno began with an inspiration for specializing in East African ethnographic art, and now have grown to offer a diverse collection of fine African tribal art from across the continent.">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css" media="all">
     
        <!-- Styles -->
        <style>
            
        </style>
    </head>

    <body>
        <div class="menu">

               <a href="{{ url('/') }}"> 
                        <div class="logo">
                            <img src="{{ url('/') }}/images/logo.png" />
                        </div>
                </a>

                <div class="menu-wrapper">

                    @if ($menu)
                        @foreach($menu as $val)
                            @if(strtolower(trim(str_replace('-',' ',$current_page))) == strtolower(trim($val->page)))
                            
                                <div class="active-menu-link">
                                    <a href="{{ url('/' . strtolower($val->type) . '/' . strtolower(str_replace(' ', '-',$val->page))) }}">{{$val->page}}</a>
                                </div>
                            @else
                                <div class="menu-link">
                                    <a href="{{ url('/' . strtolower($val->type) . '/' . strtolower(str_replace(' ', '-',$val->page))) }}">{{$val->page}}</a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    
                </div>
                <div class="burger" onclick="myFunction()">

                    
                   
                   <div class="burger-slice"></div>
                   <div class="burger-slice"></div>
                   <div class="burger-slice"></div>
            
                </div>

                <div class="burger-menu" id="burger-menu">
                    <ul>
                    @if ($menu)
                        @foreach($menu as $val)
                            <li> <a href="{{ url('/' . strtolower($val->type) . '/' . strtolower(str_replace(' ', '-',$val->page))) }}">{{$val->page}}</a></li>  
                        @endforeach
                    @endif
                    </ul>
                </div>
        </div>
        <div class="load-bar" id="progress_bar">
            
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("burger-menu");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>