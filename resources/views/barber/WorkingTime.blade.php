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
    <div class="container" style="margin-top: 0px;padding-top: 100px;direction: rtl;">
        <div class="row">
            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>
        </div>
        <div class="row justify-content-center" style="margin-bottom: 150px;">
            <div class="col-11">
                <form class="profile-class" action="{{url('/workingTimeUpdate',$WorkingHours[0]['barber_id'])}}" method="post">
                    @csrf
                    @if(Session::get('lang') == 'AR')
                        <label class=" mt-4">الأحد</label>
                    @else
                        <label class=" mt-4">Dimanche</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Dimanche1"  value="{{Str::substr($WorkingHours[0]['dimanche'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Dimanche2"  value="{{Str::substr($WorkingHours[0]['dimanche'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">الإثنين</label>
                    @else
                        <label class="mt-4">Lundi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Lundi1"  value="{{Str::substr($WorkingHours[0]['lundi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Lundi2"  value="{{Str::substr($WorkingHours[0]['lundi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">الثلاثاء</label>
                    @else
                        <label class="mt-4">Mardi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Mardi1"  value="{{Str::substr($WorkingHours[0]['mardi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Mardi2"  value="{{Str::substr($WorkingHours[0]['mardi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">الأربعاء</label>
                    @else
                        <label class="mt-4">Mercredi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Mercredi1"  value="{{Str::substr($WorkingHours[0]['mercredi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Mercredi2"  value="{{Str::substr($WorkingHours[0]['mercredi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">الخميس</label>
                    @else
                        <label class="mt-4">Jeudi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Jeudi1"  value="{{Str::substr($WorkingHours[0]['jeudi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Jeudi2"  value="{{Str::substr($WorkingHours[0]['jeudi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">الجمعة</label>
                    @else
                        <label class="mt-4">Vendredi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Vendredi1"  value="{{Str::substr($WorkingHours[0]['vendredi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Vendredi2"  value="{{Str::substr($WorkingHours[0]['vendredi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <label class="mt-4">السبت</label>
                    @else
                        <label class="mt-4">Samedi</label>
                    @endif
                    <input class="form-control" type="time" placeholder="" name="Samedi1"  value="{{Str::substr($WorkingHours[0]['samedi'], 0,5)}}">
                    <input class="form-control" type="time" placeholder="" name="Samedi2"  value="{{Str::substr($WorkingHours[0]['samedi'], 8)}}">
                    @if(Session::get('lang') == 'AR')
                        <p class="mt-5" style="color: red;"><span><b>ملاحظة:</b></span> في حالة عدم تعيين الوقت سيتم اضهار (مغلق)</p>
                    @else
                        <p class="mt-5" style="color: red;"><span><b>Note:</b></span> If the time is not set, it will be shown closed</p>
                    @endif
                    <button class="btn btn-primary my-3" type="submit" style="margin-top: 30px;background-color: #0d6efd;"> تحديث</button>
                </form>
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
