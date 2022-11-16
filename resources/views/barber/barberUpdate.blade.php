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
    <style>
        .big_text {
            font-size: larger;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    @include('layout.navbar')
    <div class="container" style="margin-top: 0px;padding-top: 100px;">
        <div class="row">
            @if($Barber[0]['profile_img'] == null)
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>
            @else
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="{{url('/images/'.$Barber[0]['profile_img'])}}" width="120" height="120"></div>
            @endif
        </div>
        <div class="row justify-content-center" style="margin-bottom: 150px;">
            <div class="col-11" style="direction: rtl;">
                <form class="profile-class" action="{{url('/barberUpdate',$Barber[0]['user_id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="mt-2 big_text">صورة</label>
                    <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png">
                    <label class="mt-4 big_text">اسم الصالون</label>
                    <input class="form-control" type="text" name="salon" value="{{$Barber[0]['salon_name']}}">
                    <label class=" mt-4 big_text">الإسم</label>
                    <input class="form-control" type="text" placeholder="Name" name="Name" required value="{{$Barber[0]['name']}}">
                    <label class="mt-4 big_text">اللقب</label>
                    <input class="form-control" type="text" placeholder="Family Name" name="Family_Name" required value="{{$Barber[0]['family_name']}}">
                    <label class=" mt-4 big_text">الجنس</label>
                    <select class="form-select" name="sex" required>
                        @if ($Barber[0]['sex'] == 'f')
                            <option value="f">انثى</option>
                            <option value="h">ذكر</option>
                        @elseif ($Barber[0]['sex'] == 'h')
                            <option value="h">ذكر</option>
                            <option value="f">انثى</option>
                        @else
                            <option value=""></option>
                            <option value="h">ذكر</option>
                            <option value="f">انثى</option>
                        @endif  
                    </select>
                    <label class=" mt-4 big_text">الصنف</label>
                    <select class="form-select" name="category" required>
                        @if ($Barber[0]['category'] == "femme")
                            <option value="femme">حلاقة السيدات</option>
                        @elseif ($Barber[0]['category'] == "homme")
                            <option value="homme">حلاقة الرجال</option>
                        @else
                            <option value="mixt"> مختلطة</option>
                        @endif
                        
                        <option value="homme">حلاقة الرجال</option>
                        <option value="femme">حلاقة السيدات</option>
                        <option value="mixt"> مختلطة</option>
                    </select>
                    <label class=" mt-4 big_text">تاريح الميلاد</label>
                    <input class="form-control" type="date" name="dateN" value="{{$Barber[0]['dateN']}}" required>
                    <label class="mt-4 big_text">الهاتف</label>
                    <input class="form-control" type="tel" placeholder="Phone" name="Phone" required value="{{$Barber[0]['phone']}}">
                    <label class="mt-4 big_text">البريد</label>
                    <input class="form-control" type="email" placeholder="mail@example.com" name="Email" required value="{{$Barber[0]['email']}}">
                    <label class="mt-4 big_text">الموقع الجغرافي</label>
                    <input class="form-control" type="url" placeholder="Google map link location" name="GPS" required value="{{$Barber[0]['gps_location']}}">
                    <label class="mt-4 big_text">الولاية</label>
                    <select class="form-select" name="Wilaya" id="wilaya">
                        <option value="{{$Barber[0]['wilaya']}}">{{$WilayaOfBarber}}</option>
                        @foreach($wilaya as $wl)
                            @if (Session::get('lang') == 'AR')
                                <option value="{{$wl->wilaya_code}}">{{$wl->wilaya_name}}</option>
                            @else
                                <option value="{{$wl->wilaya_code}}">{{$wl->wilaya_name_ascii}}</option>
                            @endif
                        @endforeach
                    </select>
{{--                    <input class="form-control" type="text" placeholder="Wilaya" name="Wilaya" required value="{{$Barber[0]['wilaya']}}">--}}
                    <label class="mt-4 big_text">البلدية</label>
                    <select class="form-select" name="Commune" id="commune">
                        <option value="{{$Barber[0]['comune']}}">{{$CommuneOfBarber}}</option>
                    </select>
{{--                    <input class="form-control" type="text" placeholder="Commune" name="Commune" required value="{{$Barber[0]['comune']}}">--}}
                    <label class="mt-4 big_text">العنوان</label>
                    <input class="form-control" type="text" placeholder="Address" name="Address" required value="{{$Barber[0]['address']}}">
                    <label class="mt-4 big_text">السعر المبدئي </label>
                    <input class="form-control" type="text" placeholder="Start price" name="Start_price" required value="{{$Barber[0]['start_price']}}"><br>
                    <label class="big_text">كلمة المرور</label>
                    <input class="form-control" type="text" placeholder="لا يمكننا إظهار أن كلمة المرور الخاصة بك مشفرة ... ولكن يمكنك تحديثها" name="password">
                    <button class="btn btn-primary my-3" type="submit" style="margin-top: 30px;background-color: #0d6efd;">تحديث</button>
                </form>
            </div>
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
