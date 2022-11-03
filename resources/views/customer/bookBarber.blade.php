<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mechta Booking</title>
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
    <div class="container" style="margin-top: 0px;padding-top: 100px;">
{{--        <div class="row">--}}
{{--            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/hh.jpg" width="120" height="120"></div>--}}
{{--            <div class="col-12">--}}
{{--                <h3 style="font-weight: bold;text-align: center;margin-top: 6px;">Karim mouhamed</h3>--}}
{{--            </div>--}}
{{--            <div class="col-12" style="text-align: center;">--}}
{{--                <h6 style="color: #928d8d;">Barber at DzHairCut</h6>--}}
{{--            </div>--}}
{{--            <div class="col-12" style="text-align: center;"><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(160,160,160);"></i><i class="far fa-star" style="color: rgb(160,160,160);"></i></div>--}}
{{--            <div class="col">--}}
{{--                <p style="font-size: 11px;color: #928d8d;text-align: center;">(127 Review)</p>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col" style="text-align: right;font-size: 32px;"><a href="tel:025262782"><i class="fas fa-phone-alt"></i>
                    <p style="font-size: 16px;">Call</p>
                </a></div>
            <div class="col" style="text-align: center;font-size: 32px;"><a href="{{url('/rate')}}"><i class="far fa-heart"></i>
                    <p style="font-size: 16px;">Rate</p>
                </a></div>
            <div class="col" style="text-align: left;font-size: 32px;"><a href="{{url('/bookBarber')}}"><i class="far fa-calendar-alt"></i><p style="font-size: 16px;">Booking</p></a></div>
        </div>
        <div class="row justify-content-center" style="margin-top: 17px;padding-top: 5px;background: #F3F1F1;margin-bottom: 200px;">
            <div class="col-12 mt-3" style="text-align: center;padding-right: 0;padding-left: 0;margin-top: 0px;">
                <h1 style="padding-bottom: 0;border-bottom-color: #A2A2A2;font-weight: bold;text-decoration:  underline;">Booking</h1>
            </div>
            <div class="col-11" style="border-bottom-color: #A2A2A2;padding-bottom: 20px;">
                <h6 class="text-center" style="padding-bottom: 0;border-bottom-color: #A2A2A2;color: #9f9f9f;margin-top: 15px;text-align: center;">You can book a place at your favorite Barber without moving or waiting too long.</h6>
                <form style="text-align: left;" action="{{url('/addBooking')}}" method="post">
                    @csrf
                    <label class="form-label">Choose a day:</label>
                    <input class="form-control" type="date" min="{{date('Y-m-d')}}" name="date" required>
                    <label class="form-label" style="margin-top: 0;">Choose a time:</label>
                    <input class="form-control" type="time" name="time" required>
                    <div class="row" style="text-align: end;">
                        <div class="col"><button class="btn btn-primary mt-3" type="submit">Send</button></div>
                    </div>
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
