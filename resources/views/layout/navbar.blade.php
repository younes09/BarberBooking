<div>
    <div class="sidebar">
        <div class="dismiss"><i class="fa fa-angle-left"></i></div>
        <div class="brand"><a class="navbar-brand" href="{{url('/')}}">Meshta Booking</a></div>
        <nav class="navbar navbar-dark navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav flex-column me-auto">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/searchBarber') }}" class="nav-link" >
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        Login
                                    </a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            Registers
                                        </a>
                                    </li>
                                @endif
                            @endif
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
                                            <a class="nav-link" href="#" onclick="document.getElementById('myform').submit()">Profile</a>
                                        </form>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('barberUpdateView'.Auth::user()->id)}}">Edit Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('createGallery')}}">Gallery</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('priceListe')}}">Price Liste</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('workingTime')}}">Opning Time</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('booking')}}">Appointments list</a></li>
                                    <hr>
                                @else
{{--                                    <li class="nav-item"><a class="nav-link" href="{{url('searchBarber')}}">Home</a></li>--}}
                                    <li class="nav-item"><a class="nav-link" href="{{url('customerProfile')}}">Customer Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('appointmentHistory')}}">Appointment history</a></li>
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
<a class="btn btn-primary open-menu" role="button" style="background: var(--bs-gray-900);margin-left: 15px;"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
