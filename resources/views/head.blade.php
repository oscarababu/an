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
                    <div class="menu-link">
                        <a href="{{ url('/info') }}">Information</a>
                    </div>
                    <div class="menu-link">
                        <a href="{{ url('/gallery') }}">Field Photography
                    </div>
                    <div class="menu-link">
                        <a href="{{ url('/gallery') }}">Archives</a>
                    </div>
                    <div class="menu-link">
                        <a href="{{ url('/gallery') }}">Recent Acquisition</a>
                    </div>
                </div>
        </div>
        <div class="load-bar" id="progress_bar">
        
        </div>