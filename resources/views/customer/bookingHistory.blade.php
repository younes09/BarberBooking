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
    <div class="container" style="overflow-x:auto;direction: rtl;">
        <div class="col-md-12 search-table-col">
            <span class="counter pull-right"></span>
            <div class="table-responsive table table-hover table-bordered results">
                <table class="table table-hover table-bordered">
                    <thead class="bill-header cs">
                        <tr>
                            <th class="text-nowrap col-lg-1" id="trs-hd-1">ID.</th>
                            @if(Session::get('lang') == 'AR')
                                <th id="trs-hd-2" class="col-lg-3">اسم الحلاق</th>
                                <th id="trs-hd-3" class="col-lg-2">تاريخ</th>
                                <th id="trs-hd-4" class="col-lg-2">الوقت</th>
                                <th id="trs-hd-5" class="col-lg-2">حالة</th>
                                <th id="trs-hd-6" class="col-lg-2">تعديل</th>
                            @else
                                <th id="trs-hd-2" class="col-lg-3">Barber Name</th>
                                <th id="trs-hd-3" class="col-lg-2">Date</th>
                                <th id="trs-hd-4" class="col-lg-2">Time</th>
                                <th id="trs-hd-5" class="col-lg-2">State</th>
                                <th id="trs-hd-6" class="col-lg-2">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach($bookingList as $booking)
                        <tr style="border-bottom: 1px solid rgb(0,0,0) ;">
                            <td>{{$booking->id}}</td>

                            <td class="text-nowrap">
                                {{\App\Models\Users::join('barbers', 'users.id', '=', 'barbers.user_id')->where('barbers.id',$booking->barber_id)->get()[0]['name']}}
                                {{\App\Models\Users::join('barbers', 'users.id', '=', 'barbers.user_id')->where('barbers.id',$booking->barber_id)->get()[0]['family_name']}}
                            </td>
                            <td class="text-nowrap">{{$booking->date}}</td>
                            <td class="text-nowrap">{{$booking->time}}</td>
                            @if(Session::get('lang') == 'AR')
                                @if($booking->state) <td style="color: green">تمت الموافقة</td>
                                @else <td style="color: orange">في الانتظار</td>
                                @endif
                            @else
                                @if($booking->state) <td style="color: green">Approved</td>
                                @else <td style="color: orange">Waiting</td>
                                @endif
                            @endif




                            <td class="text-nowrap" style="text-align: center;">
                                <form action="{{url('deletBookingHistory')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{$booking->id}}" name="booking_id" hidden>
                                    <button class="btn btn-danger" type="submit" style="margin: 2px;"><i class="fa fa-trash" style="font-size: 15px;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
