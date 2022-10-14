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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
@include('layout.navbar')
<div class="container pt-5"><br><br>
{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if(session('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="row">
        <div class="col-md-12">
            <h3>Gallerie</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{url('/storeGallery')}}" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="file" name="image">

                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

            </form>
        </div>
    </div>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                <tr>
                    <th id="trs-hd-3" class="col-lg-3 text-nowrap">Picture</th>
                    <th id="trs-hd-6" class="col-lg-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Images as $im)
                    <tr style="border-bottom: 1px solid rgb(0,0,0) ;">
                        <td class="text-center "><img src="{{url('/images/'.$im->img_link)}}" alt="" style="height: 90px;"> </td>
                        <td class="text-center" style="text-align: center;">
                        <form action="{{url('/deleltImage',$im->id)}}" class="pull-right" method="post">
                            @csrf
                            <input type="text" name="imgLink" value="{{url('/images/'.$im->img_link)}}" hidden>
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
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/Sidebar-Menu.js"></script>
<script src="assets/js/Table-With-Search.js"></script>
<script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>
</html>
