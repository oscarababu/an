@include('head')
        <div class="full-height">
                <img src="images/1495129626_ashantistool.jpg" />
                <div class="in-page-wrapper">
                        <a href="{{ url('/gallery') }}">
                                <div class="in-page-link">
                                        <p>RECENT ACQUISITION</p>
                                </div>
                        </a>
                        <a href="{{ url('/gallery') }}">
                                <div class="in-page-link">
                                        <p>ARCHIVES</p>
                                </div>
                        </a>
                        <a href="{{ url('/gallery') }}">
                                <div class="in-page-link">
                                        <p>FIELD PHOTOGRAPHY</p>
                                </div>
                        </a>
                        <a href="{{ url('/info') }}">
                                <div class="in-page-link">
                                        <p>INFORMATION</p>
                                </div>
                        </a>
                </div>
        </div>

        <script src="{{asset('js/custom.js')}}"></script>
        
    </body>
</html>
