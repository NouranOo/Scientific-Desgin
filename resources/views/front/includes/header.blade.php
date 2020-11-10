<!-- start of navbar -->
<div class="Navbar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('public/assets/front/img/logo.jpg')}}" alt=""></a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">الرئيسيه <span class="sr-only">(current)</span></a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">معلومات عنا</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item ">--}}
                    {{--<a class="nav-link " href="#">تواصل معنا</a>--}}
                    {{--</li>--}}
                </ul>
                <form class=" my-2 my-lg-0">
                    <div class="icons ">
                        @if($setting->facebook)
                            <a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($setting->phone)
                            <a class="whatsapp" href="" title="{{$setting->phone}}"><i class="fab fa-whatsapp"></i></a>
                        @endif
                        @if($setting->instagram)
                            <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($setting->twitter)
                            <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($setting->youtube)
                            <a href=""><i class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
<!-- end of navbar -->
