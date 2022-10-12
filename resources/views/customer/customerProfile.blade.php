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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    @include('layout.navbar')
    <div class="container" style="margin-top: 0;padding-top: 100px;">
        <div class="row">
            @if($customerInfo->profile_img == null)
            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>
            @else
            <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="{{url('/images/'.$customerInfo->profile_img)}}" width="120" height="120"></div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12 mt-4 p-5" style="text-align: center;">
                <form class="user-profile text-start" action="{{url('/customer_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{$customerInfo->user_id}}" name="id" hidden>
                    <input class="form-control" name="image" type="file" accept="image/*">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" name="name" type="text" required="" value="{{$customerInfo->name}}">
                    <label for="family_name" class="form-label">Family Name</label>
                    <input class="form-control" name="family_name" type="text" required="" value="{{$customerInfo->family_name}}">
                    <label for="wilaya" class="form-label">wilaya</label>
                    <select class="form-select" name="wilaya" id="wilaya">
                        <option value="">{{$customerInfo->wilaya}}</option>
                        @foreach($wilaya as $wl)
                            <option value="{{$wl->wilaya_name_ascii }}">{{$wl->wilaya_name_ascii}}</option>
                        @endforeach
                    </select>
{{--                    <input class="form-control" name="wilaya" type="text" required="" value="{{$customerInfo->wilaya}}">--}}
                    <label for="commune" class="form-label">commune</label>
                    <select class="form-select" name="commune" id="commune">
                        <option value="">{{$customerInfo->comune}}</option>
                    </select>
{{--                    <input class="form-control" name="commune" type="text" required="" value="{{$customerInfo->comune}}">--}}
                    <label for="phone" class="form-label">phone</label>
                    <input class="form-control" name="phone" type="tel" required="" value="{{$customerInfo->phone}}">
                    <label for="mail" class="form-label">mail</label>
                    <input class="form-control" name="mail" type="email" required="" value="{{$customerInfo->email}}">
                    <label for="gps_location" class="form-label">GPS location</label>
                    <input class="form-control" name="gps_location" type="text" required="" value="{{$customerInfo->gps_location}}">
                    <label for="password" class="form-label">password</label>
                    <input class="form-control" name="password" type="text" id="myInput" placeholder="password are ecrypted we can't show it here ...">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
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
