<div>
    <div class="sidebar">
        <div class="dismiss"><i class="fa fa-angle-left"></i></div>
        @if(Session::get('lang') == 'AR')
        <div class="brand"><a class="navbar-brand" href="{{url('/')}}">مشطة</a></div>
        @else
        <div class="brand"><a class="navbar-brand" href="{{url('/')}}">Meshta</a></div>
        @endif
        <nav class="navbar navbar-dark navbar-expand" style="">
            <div class="container-fluid">
                <ul class="navbar-nav flex-column me-auto">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/lang') }}" class="nav-link" >
                                        <i class="fa fa-language" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                        @if(Session::get('lang') == 'AR')
                                            Englais
                                        @else
                                            العربية
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/searchBarber') }}" class="nav-link" >
                                        <i class="fa fa-home" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                        @if(Session::get('lang') == 'AR')
                                            الرئيسية
                                        @else
                                            Home
                                        @endif

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                        @if(Session::get('lang') == 'AR')
                                            تسجيل الخروج
                                        @else
                                            {{ __('Logout') }}
                                        @endif

                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">
                                        <i class="fa fa-sign-in" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                        @if(Session::get('lang') == 'AR')
                                            تسجيل الدخول
                                        @else
                                            Login
                                        @endif

                                    </a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">
                                            <i class="fa fa-user-plus" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                                تسجيل عضو جديد
                                            @else
                                                Registers
                                            @endif

                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item">
                                {{--
                                <a class="nav-link" href="#">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                    Conatct Us
                                </a>
                                --}}
                            </li>
                        </div>
                    @endif
                    <hr>
                        @if (Route::has('login'))
                            @auth
                                @if(Auth::user()->user_type == "b")
                                    <li class="nav-item">
                                        <form id="myform" action="{{url('barberProfile')}}" method="post">
                                            @csrf
                                            <input type="text" value="{{Auth::user()->id}}" name="b_id"  hidden>
                                            <a class="nav-link" href="#" onclick="document.getElementById('myform').submit()"><i class="fa fa-user" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                                @if(Session::get('lang') == 'AR')
                                                    الملف الشخصي
                                                @else
                                                    Profile
                                                @endif

                                            </a>
                                        </form>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('barberUpdateView'.Auth::user()->id)}}"><i class="fa fa-pencil-square" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                                تعديل الملف الشخصي
                                            @else

                                                Edit Profile
                                            @endif

                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('createGallery')}}"><i class="fa fa-picture-o" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                                معرض الصور
                                            @else
                                                Gallery
                                            @endif
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('priceListe')}}"><i class="fa fa-dollar-sign" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                                قائمة الخدمات
                                            @else
                                                Price Liste
                                            @endif

                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('workingTime')}}"><i class="fa fa-clock-o" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                                أوقات العمل
                                            @else
                                                Opning Time
                                            @endif
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('booking')}}"><i class="fa fa-calendar" style="margin-right: 0.5rem;" aria-hidden="true"></i>
                                            @if(Session::get('lang') == 'AR')
                                            قائمة المواعيد
                                            @else
                                            Appointments list
                                            @endif
                                        </a>
                                    </li>
                                    <hr>
                                @else
{{--                                    <li class="nav-item"><a class="nav-link" href="{{url('searchBarber')}}">Home</a></li>--}}

                                    <li class="nav-item"><a class="nav-link" href="{{url('customerProfile')}}"><i class="fa fa-user" style="margin-right: 0.5rem;"></i>Profile</a></li>
                                            @if(Session::get('lang') == 'AR')
                                                الملف الشخصي
                                            @else
                                                Profile {{Session::get('lang')}}
                                            @endif
                                           </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('appointmentHistory')}}"><i class="fa fa-history" aria-hidden="true" style="margin-right: 0.5rem;"></i>
                                            @if(Session::get('lang') == 'AR')
                                                قائمة المواعيد
                                            @else
                                                Appointment history
                                            @endif

                                        </a></li>
{{--                                    <li class="nav-item"><a class="nav-link" href="{{url('bookBarber')}}">Book Barber</a></li>--}}
                                @endif
                            @endif
                        @endif
                </ul>
            </div>
        </nav>
    </div>
    <div class="overlay"></div>
</div>
@if(Session::get('lang') == 'AR')
<a class="btn btn-primary open-menu" role="button" style="background: var(--bs-gray-900);margin-left: 15px;"><i class="fa fa-navicon"></i>&nbsp;قائمة</a>
@else
<a class="btn btn-primary open-menu" role="button" style="background: var(--bs-gray-900);margin-left: 15px;"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
@endif
