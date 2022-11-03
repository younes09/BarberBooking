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
    <div class="container" style="overflow-x: auto;">
        <div class="col-md-12 search-table-col">
            <span class="counter pull-right"></span>
            <div class="table-responsive table table-hover table-bordered results">
                <table class="table table-hover table-bordered">
                    <thead class="bill-header cs">
                        <tr>
                            <th class="text-nowrap col-lg-1" id="trs-hd-1">ID. No.</th>
                            <th id="trs-hd-3" class="col-lg-3 text-nowrap">Customer Name</th>
                            <th id="trs-hd-3" class="col-lg-3 text-nowrap">Tel</th>
                            <th id="trs-hd-4" class="col-lg-2">Date</th>
                            <th id="trs-hd-5" class="col-lg-2">Time</th>
                            <th id="trs-hd-5" class="col-lg-2">State</th>
                            <th id="trs-hd-6" class="col-lg-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        @foreach($bookingHistory as $bh)
                        <tr style="border-bottom: 1px solid rgb(0,0,0) ;">
                            <td class="text-nowrap">{{$bh->id}}</td>
                            <td class="text-nowrap">{{$bh->name}}</td>
                            <td class="text-nowrap">{{$bh->phone}}</td>
                            <td class="text-nowrap">{{$bh->date}}</td>
                            <td class="text-nowrap">{{$bh->time}}</td>
                            @if($bh->state)
                                <td style="color: green;">Approuved</td>
                            @else
                                <td style="color: orange;">Waiting</td>
                            @endif
                            <td class="text-nowrap" style="text-align: center;">
                                @if(!$bh->state)
                                    <form action="{{url('/approuveBooking',$bh->id)}}" class="pull-left" method="post">
                                        @csrf
                                        <button class="btn btn-success" style="margin: 2px;width: 39px;background: rgb(0,188,86);" type="submit">
                                            <i class="fa fa-check" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                @endif
                                    <form action="{{url('/dleltBooking',$bh->id)}}" class="pull-right" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit" style="margin: 2px;">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </button>
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
