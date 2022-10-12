<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>mechta</title>
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
        <div class="col-md-12 mb-5 pull-left">
                <h1>Add new servce</h1>
            <form action="{{url('/addNewService')}}" method="post">
                @csrf
                <label for="service">Service</label>
                <input id="service" type="text" class="search form-control" name="servise" placeholder="servise name" style="margin-bottom: 15px;" required>
                <label for="price">Price</label>
                <input id="price" type="text" class="search form-control" name="price" placeholder="price" style="margin-bottom: 15px;" required>
                <button class="btn btn-primary" type="submit"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>
            </form>

        </div>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                <tr>
                    <th class="text-nowrap col-lg-1" id="trs-hd-1">Service name</th>
                    <th id="trs-hd-3" class="col-lg-3">Price</th>
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
                @if(count($PriceListe) != 0)
                    @foreach($PriceListe as $pl)
                        <tr style="border-bottom: 1px solid rgb(0,0,0) ;">
                            <td>{{$pl->service_name}}</td>
                            <td class="text-nowrap">{{$pl->service_price}}</td>
                            <td class="text-nowrap" style="text-align: center;">
                                <form action="{{url('/deleteBarberService',$pl->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" style="margin: 2px;">
                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif
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
