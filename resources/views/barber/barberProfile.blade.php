<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mechta Booking</title>
    <link rel="icon" href="{{url('assets/img/barber-shop.png')}}">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Responsive-Image-Grid.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">
</head>

<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row" style="padding-top: 100px;">
            @if($BarberList[0]['profile_img'] == null)
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>
            @else
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="{{url('images/'.$BarberList[0]['profile_img'])}}" width="120" height="120"></div>
            @endif

            <div class="col-12">
                <h3 style="font-weight: bold;text-align: center;margin-top: 6px;">{{$BarberList[0]['name'].' '.$BarberList[0]['family_name']}}</h3>
            </div>
            <div class="col-12" style="text-align: center;">
                @if(Session::get('lang') == 'AR')
                <h6 style="color: #928d8d;direction: rtl;" >حلاق في {{$BarberList[0]['salon_name']}}</h6>
                @else
                <h6 style="color: #928d8d;">Barber at {{$BarberList[0]['salon_name']}}</h6>
                @endif
            </div>
            <div class="col-12" style="text-align: center;">
                @for($i=0;$i<$BarberList[0]['rating_avrg'];$i++)
                    <i class="fas fa-star" style="color: rgb(255,230,1);"></i>
                @endfor
                @for($i=0;$i<5-$BarberList[0]['rating_avrg'];$i++)
                    <i class="far fa-star" style="color: rgb(255,230,1);"></i>
                @endfor
            </div>
            <div class="col">
                @if(Session::get('lang') == 'AR')
                <p style="font-size: 11px;color: #928d8d;text-align: center;direction: rtl;">({{count($Reviews)}} مراجعة)</p>
                @else
                <p style="font-size: 11px;color: #928d8d;text-align: center;">({{count($Reviews)}} Review)</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col" style="text-align: right;font-size: 32px;">
                @if(Auth::user()->user_type == "c")
                <a href="tel:{{$BarberList[0]['phone']}}">
                    <i class="fas fa-phone-alt"></i>
                    @if(Session::get('lang') == 'AR')
                        <p style="font-size: 16px;">إتصل</p>
                    @else
                        <p style="font-size: 16px;">Call</p>
                    @endif
                </a>
                @endif
            </div>
            <div class="col" style="text-align: center;font-size: 32px;">
                @if(Auth::user()->user_type == "c")
                <a href="{{url('/rate')}}">
                    <i class="far fa-heart"></i>
                    @if(Session::get('lang') == 'AR')
                        <p style="font-size: 16px;">تقييم</p>
                    @else
                        <p style="font-size: 16px;">Rate</p>
                    @endif
                </a>
                @endif
            </div>
            <div class="col" style="text-align: left;font-size: 32px;">
                @if(Auth::user()->user_type == "c")
                <a href="{{url('/bookBarber')}}" >
                    <i class="far fa-calendar-alt"></i>
                    @if(Session::get('lang') == 'AR')
                    <p style="font-size: 16px;">الحجز</p>
                    @else
                    <p style="font-size: 16px;">Booking</p>
                    @endif
                </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col" style="text-align: center;padding-right: 0;padding-left: 0;">
                <div>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">
                                @if(Session::get('lang') == 'AR')
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    حول
                                @else
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                    About
                                @endif
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">
                                @if(Session::get('lang') == 'AR')
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    الصور
                                @else
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    Gallery
                                @endif
                            </a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">
                                @if(Session::get('lang') == 'AR')
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    تقييمات
                                @else
                                    Reviews
                                @endif
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <div class="row" style="background: #F3F1F1;">
                                <div class="col">
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            @if(Session::get('lang') == 'AR')
                                            <h4 style="font-size: 15.684px;">إسم الصالون</h4>
                                            @else
                                            <h4 style="font-size: 15.684px;">Buisness name</h4>
                                            @endif
                                            <h6 style="color: #5D5959;font-size: 14px;">{{$BarberList[0]['salon_name']}}</h6>
                                        </div>
                                        <div class="col" style="text-align: left;">
                                            @if(Session::get('lang') == 'AR')
                                                <h4 style="font-size: 15.684px;">السعر يبدأ من</h4>
                                                <h6 style="color: #5D5959;font-size: 14px;direction: rtl;">{{$BarberList[0]['start_price']}} دج </h6>
                                            @else
                                                <h4 style="font-size: 15.684px;">Start from</h4>
                                                <h6 style="color: #5D5959;font-size: 14px;">{{$BarberList[0]['start_price']}} Da</h6>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0;padding: 30px;background: url(&quot;assets/img/5UAWECLJVFOXQS6RPEGA3XXU3M.png&quot;) right / contain no-repeat;">
                                        <div class="col" style="text-align: left;">
                                            @if(Session::get('lang') == 'AR')
                                            <h4 style="font-size: 15.684px;">العنوان</h4>
                                            @else
                                            <h4 style="font-size: 15.684px;">Address</h4>
                                            @endif
                                            <h6 style="color: #5D5959;font-size: 14px;">{{$BarberList[0]['wilaya']}}, {{$BarberList[0]['comune']}}.</h6>
                                            <div class="row">
                                                <div class="col"><a href="{{$BarberList[0]['gps_location']}}" target="_blank">
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: var(--bs-blue);font-size: 14px;">احصل على اتجاه <span><i class="fas fa-arrow-right"></i></span></h6>
                                                        @else
                                                            <h6 style="color: var(--bs-blue);font-size: 14px;">Get Direction <span><i class="fas fa-arrow-right"></i></span></h6>
                                                        @endif
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($WorkingHours) != 0)
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            @if(Session::get('lang') == 'AR')
                                                <h4 style="font-size: 15.684px;">أوقات العمل</h4>
                                            @else
                                                <h4 style="font-size: 15.684px;">Opning Hours</h4>
                                            @endif
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                        <h6 style="color: #5D5959;font-size: 14px;">الأحد</h6>
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">Dimanche</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['dimanche'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['dimanche']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                        <h6 style="color: #5D5959;font-size: 14px;">الإثنين</h6>
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">Lundi</h6>
                                                    @endif

                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['lundi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                    <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['lundi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                    <h6 style="color: #5D5959;font-size: 14px;">الثلاثاء</h6>
                                                    @else
                                                    <h6 style="color: #5D5959;font-size: 14px;">Mardi</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['mardi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                    <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['mardi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                    <h6 style="color: #5D5959;font-size: 14px;">الأربعاء</h6>
                                                    @else
                                                    <h6 style="color: #5D5959;font-size: 14px;">Mercredi</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['mercredi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['mercredi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                        <h6 style="color: #5D5959;font-size: 14px;">الخميس</h6>
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">Jeudi</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['jeudi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['jeudi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                        <h6 style="color: #5D5959;font-size: 14px;">الجمعة</h6>
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">Vendredi</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['vendredi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['vendredi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 30px;">
                                        <div class="col" style="text-align: left;">
                                            <div class="row">
                                                <div class="col">
                                                    @if(Session::get('lang') == 'AR')
                                                        <h6 style="color: #5D5959;font-size: 14px;">السبت</h6>
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">Samedi</h6>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    @if($WorkingHours[0]['samedi'] == ' - ')
                                                        @if(Session::get('lang') == 'AR')
                                                            <h6 style="color: #dc3545;font-size: 14px;">مغلق</h6>
                                                        @else
                                                            <h6 style="color: #dc3545;font-size: 14px;">Closed</h6>
                                                        @endif
                                                    @else
                                                        <h6 style="color: #5D5959;font-size: 14px;">{{$WorkingHours[0]['samedi']}}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: left;padding: 30px;">
                                    @if(Session::get('lang') == 'AR')
                                        <h4 style="font-size: 17.684px;font-weight: bold;">قائمة الخدمات</h4>
                                    @else
                                        <h4 style="font-size: 17.684px;font-weight: bold;">Price Liste</h4>
                                    @endif
                                    @foreach($PriceListe as $pl)
                                    <div class="row" style="border-radius: 0px;border-bottom: 1px dashed #A8A8A8 ;">
                                        <div class="col-9">
                                            <p style="font-size: 15px;">{{$pl['service_name']}}</p>
                                        </div>
                                        <div class="col-3">
                                            @if(Session::get('lang') == 'AR')
                                            <p style="font-size: 15px;direction: rtl;">{{$pl['service_price']}} دج</p>
                                            @else
                                            <p style="font-size: 15px;">{{$pl['service_price']}} Da</p>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-2">
                            <div class="row ">
                                @if(count($gallery) == 0)
                                    <h1 class="mt-5">Gallery vide</h1>
                                @else
                                    @foreach($gallery as $gl)
                                    <div class="col-sm-12 col-md-3 p-1">
                                        <img class="img-fluid" src="{{url('/images/'.$gl->img_link)}}">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-3">
                            <div class="row" style="background: #f3f1f1;">
                                <div class="col">
                                    @foreach($Customer as $rv)
                                    <div class="card" style="margin: 12px;box-shadow: 0px 0px 6px 0px rgb(177,177,177);border-radius: 4px;">
                                        <div class="card-body" style="text-align: right;">
                                            <div class="row">
                                                <div class="col-3">
                                                    @if($rv->profile_img == null)
                                                        <img class="rounded-circle" style="width: 64px;height: 62px;box-shadow: 0px 0px 16px 1px rgba(33,37,41,0.14);border-style: solid;border-color: rgb(216,219,222);" src="assets/img/user.png">
                                                    @else
                                                        <img class="rounded-circle" style="width: 64px;height: 62px;box-shadow: 0px 0px 16px 1px rgba(33,37,41,0.14);border-style: solid;border-color: rgb(216,219,222);" src="{{url('/images/'.$rv->profile_img)}}">
                                                    @endif
                                                </div>
                                                <div class="col" style="text-align: left;">
                                                    <h4>
                                                        {{$rv->name}}
                                                    </h4>
                                                    <span>
                                                        @for($i=0;$i<$rv['rating'];$i++)
                                                            <i class="fas fa-star" style="color: rgb(255,230,1);"></i>
                                                        @endfor

                                                        @for($i=0;$i<5-$rv['rating'];$i++)
                                                            <i class="far fa-star" style="color: rgb(255,230,1);"></i>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="card-text" style="text-align: left;">{{$rv['comment']}}</p>
                                                @if(Auth::user()->user_type == "c")
                                                    @if(Auth::user()->id == $rv->user_id)
                                                    <a href="{{url('/deletReview'.$rv['id'])}}" class="btn btn-danger btn-sm" >
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Delete
                                                    </a>
                                                    @endif
                                                @endif
{{--                                            <a href="{{url('/deletReview'.$rv['id'])}}"class="btn btn-danger btn-sm" style="font-weight: bold;font-size: 14px;"><i class="fas fa-trash" style="color: var(--bs-white);"></i>&nbsp;Delet</a>--}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>

</html>
