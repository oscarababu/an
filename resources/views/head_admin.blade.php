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

        <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
            
        
        <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
        <link rel="stylesheet" href="{{asset('cropper/main.css')}}">

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
                    
                    <div class="menu-link">
                        <a href="{{ url('/back_management') }}">Backgrounds</a>
                    </div>
                    
                    <div class="menu-link">
                        <a href="{{ url('/page_management') }}">Page Management</a>
                    </div>

                    <div class="menu-link">
                        <a href="{{ url('/items_reports') }}">Gallery Reports</a>
                    </div>

                    <div class="menu-link">
                        <a href="{{ url('/info_items_reports') }}">Information Pages</a>
                    </div>

                    <div class="menu-link">
                        <a href="{{ url('/new_information_page') }}">New Information Page</a>
                    </div>

                    <div class="menu-link">
                        <a href="{{ url('/new_gallery_content') }}">New Gallery Item</a>
                    </div>

                    
                </div>
        </div>