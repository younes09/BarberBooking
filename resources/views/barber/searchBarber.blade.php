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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    @include('layout.navbar')

    <div class="container">
        <div class="row pt-4" style="background-color: #7343E0;">
            <div class="col p-4">
                @if(Session::get('lang') == 'AR')
                    <h1 class="mt-4" style="color: rgb(255,255,255);direction: rtl;">إكتشفوا</h1>
                    <h6 class="mb-5" style="color: rgb(255,255,255);direction: rtl">أفضل صالونات الحلاقة</h6>
                @else
                    <h1 class="mt-4" style="color: rgb(255,255,255);">Discover</h1>
                    <h6 class="mb-5" style="color: rgb(255,255,255);">Find the perfect Barbermen</h6>
                @endif

                <form action="{{url('/getBarbersSearched')}}" method="post">
                    @csrf
                    <div class="row" style="@php if(Session::get('lang') == 'AR') echo "direction: rtl;"  @endphp">
                        <div class="col-4">
                            @if(Session::get('lang') == 'AR')
                            <label class="form-label text-white" for="wilaya">بالولاية</label>
                            @else
                            <label class="form-label text-white" for="wilaya">Wilaya</label>
                            @endif
                            <select class="form-select" name="wilaya" id="wilaya" required>
                                @if(Session::has('wilaya'))
                                    <option value="{{Session::get('wilaya')}}">{{Session::get('wilaya')}}</option>
                                @else
                                    <option value=""></option>
                                @endif
                                @foreach($wilaya as $wl)
                                    <option value="{{$wl->wilaya_name_ascii }}">{{$wl->wilaya_name_ascii}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            @if(Session::get('lang') == 'AR')
                            <label class="form-label text-white" for="commune">بالبلدية</label>
                            @else
                            <label class="form-label text-white" for="commune">Commune</label>
                            @endif
                            <select class="form-select" name="commune" id="commune" required>
                                @if(Session::has('comune'))
                                    <option value="{{Session::get('comune')}}">{{Session::get('comune')}}</option>
                                @else
                                    <option value=""></option>
                                @endif
                            </select>
                        </div>
                        <div class="col-4">
                            @if(Session::get('lang') == 'AR')
                            <label class="form-label text-white" for="note">بالتقييم</label>
                            @else
                            <label class="form-label text-white" for="note">Note</label>
                            @endif
                            <select class="form-select" name="note" id="note" required>
                                @if(Session::has('note'))
                                    <option value="{{Session::get('note')}}">{{Session::get('note')}}</option>
                                @else
                                    <option value=""></option>
                                @endif
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-4">
                            @if(Session::get('lang') == 'AR')
                                <label class="form-label text-white" for="note">بالصنف</label>
                            @else
                                <label class="form-label text-white" for="note">Preference</label>
                            @endif
                            <select class="form-select" name="sex" id="sex" required>
                                @if(Session::has('sex'))
                                    <option value="{{Session::get('sex')}}">{{Session::get('sex')}}</option>
                                @else
                                    <option value=""></option>
                                @endif
                                <option value="Femme - انثى">حلاقة السيدات</option>
                                <option value="Homme - ذكر">حلاقة الرجال </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text" style="background: rgba(255,255,255,0.51);border-right-width: 0px;color: rgb(255,255,255);">
                            <i class="fas fa-search" style="font-size: 21px;"></i>
                        </span>
                        @if(Session::get('lang') == 'AR')
                            @if(Session::has('search'))
                                <input class="form-control" type="text" style="background: rgba(255,255,255,0.51);" placeholder="بالإسم" name="search" id="search" value="{{Session::get('search')}}">
                            @else
                                <input class="form-control" type="text" style="background: rgba(255,255,255,0.51);" placeholder="بالإسم" name="search" id="search" value="">
                            @endif
                            <button class="btn btn-primary" type="submit" style="background: rgb(99,109,225);">بحث</button>
                        @else
                            @if(Session::has('search'))
                                <input class="form-control" type="text" style="background: rgba(255,255,255,0.51);" placeholder="Any barbermen" name="search" id="search" value="{{Session::get('search')}}">
                            @else
                                <input class="form-control" type="text" style="background: rgba(255,255,255,0.51);" placeholder="Any barbermen" name="search" id="search" value="">
                            @endif
                            <button class="btn btn-primary" type="submit" style="background: rgb(99,109,225);">Search</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center align-items-center" style="margin-top: 46px;">
            @if(count($allBarber) == 0)
                <img src="{{url('/assets/img/2953962.jpg')}}" alt="" srcset="">
            @endif
            {{-- liste of barbers --}}
            @foreach($allBarber as $brb)
            <div class="col-11 mb-5" style="border-bottom-style: solid;border-bottom-color: rgb(203,203,203); @php if(Session::get('lang') == 'AR') echo "direction: rtl;"; @endphp">
                <div class="row justify-content-start align-items-center mb-3">
                    <div class="col-auto">
                        @if(empty($brb->profile_img))
                        <div style="background: url('assets/img/pngegg.png') center / cover no-repeat;height: 48px;width: 48px;border-radius: 28px;border: 1px solid rgb(0,0,0) ;"></div>
                        @else
                        <div style="background: url({{url('images/'.$brb->profile_img)}}) center / cover no-repeat;height: 48px;width: 48px;border-radius: 28px;border: 1px solid rgb(0,0,0) ;"></div>
                        @endif
                    </div>
                    <div class="col">
                        <h5 style="font-size: 16px;">{{$brb->name.' '.$brb->family_name}}</h5>
                        @if(Session::get('lang') == 'AR')
                            <h6 style="font-style: italic;font-size: 11px;color: #8E8E8E;">   حلاق في {{$brb->salon_name}}   </h6>
                        @else
                            <h6 style="font-style: italic;font-size: 11px;color: #8E8E8E;">Barber at {{$brb->salon_name}}</h6>
                        @endif
                    </div>
                    <div class="col-auto" style="text-align: center;">
                        <form action="{{url('/barberProfile')}}" method="post">
                            @csrf
                            <input type="text" name="b_id" value="{{$brb->user_id}}" hidden>
                            @if(Session::get('lang') == 'AR')
                                <button class="btn btn-outline-success btn-sm" type="submit" style="color: rgb(255,255,255);background: rgb(32,173,80);">فتح</button>
                            @else
                                <button class="btn btn-outline-success btn-sm" type="submit" style="color: rgb(255,255,255);background: rgb(32,173,80);">Open</button>
                            @endif
                        </form>

                    </div>
                </div>
                <div class="row justify-content-start align-items-center">
                    <div class="col-auto">
                        @if(Session::get('lang') == 'AR')
                            <h6 class="text-center" style="font-size: 11px;color: #8E8E8E;">تقييم</h6>
                        @else
                            <h6 class="text-center" style="font-size: 11px;color: #8E8E8E;">Rating</h6>
                        @endif
                        <div>
                            @for($i=0;$i<$brb['rating_avrg'];$i++)
                                <i class="fas fa-star" style="color: rgb(255,230,1);"></i>
                            @endfor
                            {{--                <i class="fas fa-star-half-alt" style="color: rgb(255,230,1);"></i>--}}
                            @for($i=0;$i<5-$brb['rating_avrg'];$i++)
                                <i class="far fa-star" style="color: rgb(255,230,1);"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="col-5" style="text-align: center;">
                        @if(Session::get('lang') == 'AR')
                            <h6 style="font-size: 11px;color: #8E8E8E;">يبدأ السعر من  </h6>
                            <h6 style="font-size: 12px;color: #000000;">{{$brb['start_price']}} دج </h6>
                        @else
                            <h6 style="font-size: 11px;color: #8E8E8E;">Starting from </h6>
                            <h6 style="font-size: 12px;color: #000000;">{{$brb['start_price']}} Da</h6>
                        @endif

                    </div>
{{--                    <div class="col-auto">--}}
{{--                        <h6 style="font-size: 11px;color: #8E8E8E;">Distacne </h6>--}}
{{--                        <h6 class="text-center" style="font-size: 12px;color: #000000;">1.2 Km</h6>--}}
{{--                    </div>--}}
                </div>
                <p hidden>{{$Picturs = \App\Models\PhotoGallery::where('barber_id',$brb['id'])->get('img_link')}}</p>
                @if(count($Picturs) == 3)
                    <div class="row mt-3 mb-5">
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[0]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[1]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[2]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                    </div>
                @elseif(count($Picturs) == 2)
                    <div class="row mt-3 mb-5">
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[0]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[1]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                    </div>
                @elseif(count($Picturs) == 1)
                    <div class="row mt-3 mb-5">
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[0]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                    </div>
                @elseif(count($Picturs) > 3)
                    <div class="row mt-3 mb-5">
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[0]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[1]['img_link']}}') center / cover no-repeat;border-radius: 5px;"></div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="text-holder" style="width: 110px;height: 110px;background: url('images/{{$Picturs[2]['img_link']}}') center / cover no-repeat;border-radius: 5px;">
                                <h1 style="font-size: 24px;color: rgb(255,255,255);background: rgba(152,168,228,0.7);">+{{count($Picturs)-3}}</h1>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="row float-end">
            <div class="col">{{$allBarber->onEachSide(1)->links()}}</div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#wilaya").change(function(){
                $value = $(this).val();
                $.ajax({
                    type:'get',
                    url:'{{url('/commune')}}',
                    data:{'commune':$value},

                    success:function (data) {
                        //console.log(data);
                        $('#commune').html(data);
                    }
                });
            })
            $("#search")
        });
    </script>
</body>

</html>
