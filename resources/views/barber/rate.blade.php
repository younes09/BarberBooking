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
<div class="container" style="margin-top: 0px;padding-top: 100px;">
{{--    <div class="row">--}}
{{--        @if($BarberList[0]['profile_img'] == null)--}}
{{--            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>--}}
{{--        @else--}}
{{--            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="{{url('images/'.$BarberList[0]['profile_img'])}}" width="120" height="120"></div>--}}
{{--        @endif--}}
{{--        <div class="col-12">--}}
{{--            <h3 style="font-weight: bold;text-align: center;margin-top: 6px;">Karim mouhamed</h3>--}}
{{--        </div>--}}
{{--        <div class="col-12" style="text-align: center;">--}}
{{--            <h6 style="color: #928d8d;">Barber at DzHairCut</h6>--}}
{{--        </div>--}}
{{--        <div class="col-12" style="text-align: center;"><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(255,230,1);"></i><i class="far fa-star" style="color: rgb(160,160,160);"></i><i class="far fa-star" style="color: rgb(160,160,160);"></i></div>--}}
{{--        <div class="col">--}}
{{--            <p style="font-size: 11px;color: #928d8d;text-align: center;">(127 Review)</p>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col" style="text-align: right;font-size: 32px;"><a href="#"><i class="fas fa-phone-alt"></i>
            @if(Session::get('lang') == 'AR')
                <p style="font-size: 16px;">إتصل</p>
            @else
                <p style="font-size: 16px;">Call</p>
            @endif
                
            </a></div>
        <div class="col" style="text-align: center;font-size: 32px;"><a href="{{url('/rate')}}"><i class="far fa-heart"></i>
            @if (Session::get('lang') == 'AR')
                <p style="font-size: 16px;">تقييم</p>
            @else
                <p style="font-size: 16px;">Rate</p>
            @endif
                
            </a></div>
        <div class="col" style="text-align: left;font-size: 32px;">
            <a href="{{url('/bookBarber')}}">
                <i class="far fa-calendar-alt"></i>
                @if (Session::get('lang') == 'AR')
                    <p style="font-size: 16px;">حجز</p>
                @else
                    <p style="font-size: 16px;">Booking</p>
                @endif
                
            </a>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 17px;padding-top: 5px;background: #F3F1F1;margin-bottom: 200px;">
        <div class="col-12 mt-3" style="text-align: center;padding-right: 0;padding-left: 0;margin-top: 0px;">
            @if (Session::get('lang') == 'AR')
                <h1 style="padding-bottom: 0;border-bottom-color: #A2A2A2;font-weight: bold;text-decoration:  underline;">تقييم</h1>
            @else
                <h1 style="padding-bottom: 0;border-bottom-color: #A2A2A2;font-weight: bold;text-decoration:  underline;">Rating</h1> 
            @endif
            
        </div>
        <div class="col-11">
            <form class="profile-class" action="{{url('/addReview')}}" method="post">
                @csrf
                @if (Session::get('lang') == 'AR')
                    <label class=" mt-4">عدد النجوم</label>
                @else
                    <label class=" mt-4">Stars number</label>
                @endif
                
                <select name="stars" value="">
                    <option name="1" id="">1</option>
                    <option name="2" id="">2</option>
                    <option name="3" id="">3</option>
                    <option name="4" id="">4</option>
                    <option name="5" id="">5</option>
                </select>
                <br>

                @if (Session::get('lang') == 'AR')
                    <label class="mt-4">تعليق</label>
                    <textarea class="form-control" type="text" name="comment" placeholder="أكتب تعليق ..." required></textarea>
                @else
                    <label class="mt-4">Comment</label>
                    <textarea class="form-control" type="text" name="comment" placeholder="Type your comment here ..." required></textarea>
                @endif
                
                
                <div class="row" style="text-align: end;">
                    @if (Session::get('lang') == 'AR')
                        <div class="col my-3"><button class="btn btn-primary mt-3" type="submit">إرسال</button></div>
                    @else
                        <div class="col my-3"><button class="btn btn-primary mt-3" type="submit">Submit</button></div>
                    @endif
                    
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
