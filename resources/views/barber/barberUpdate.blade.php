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
    <div class="container" style="margin-top: 0px;padding-top: 100px;">
        <div class="row">
            @if($Barber[0]['profile_img'] == null)
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="assets/img/pngegg.png" width="120" height="120"></div>
            @else
                <div class="col-md-12" style="text-align: center;"><img class="rounded-circle" style="box-shadow: 0px 0px 10px 0px rgb(93,89,89);border: 3px solid rgb(216,219,222) ;" src="{{url('/images/'.$Barber[0]['profile_img'])}}" width="120" height="120"></div>
            @endif
        </div>
        <div class="row justify-content-center" style="margin-bottom: 150px;">
            <div class="col-11">
                <form class="profile-class" action="{{url('/barberUpdate',$Barber[0]['user_id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="mt-2">Image</label>
                    <input class="form-control" type="file" name="image">
                    <label class="mt-4">Salon name</label>
                    <input class="form-control" type="text" name="salon" value="{{$Barber[0]['salon_name']}}">
                    <label class=" mt-4">Name</label>
                    <input class="form-control" type="text" placeholder="Name" name="Name" required value="{{$Barber[0]['name']}}">
                    <label class="mt-4">Family Name</label>
                    <input class="form-control" type="text" placeholder="Family Name" name="Family_Name" required value="{{$Barber[0]['family_name']}}">
                    <label class="mt-4">Phone</label>
                    <input class="form-control" type="tel" placeholder="Phone" name="Phone" required value="{{$Barber[0]['phone']}}">
                    <label class="mt-4">Email</label>
                    <input class="form-control" type="email" placeholder="mail@example.com" name="Email" required value="{{$Barber[0]['email']}}">
                    <label class="mt-4">GPS Google</label>
                    <input class="form-control" type="url" placeholder="Google map link location" name="GPS" required value="{{$Barber[0]['gps_location']}}">
                    <label class="mt-4">Wilaya</label>
                    <select class="form-select" name="Wilaya" id="wilaya">
                        <option value="">{{$Barber[0]['wilaya']}}</option>
                        @foreach($wilaya as $wl)
                            <option value="{{$wl->wilaya_name_ascii }}">{{$wl->wilaya_name_ascii}}</option>
                        @endforeach
                    </select>
{{--                    <input class="form-control" type="text" placeholder="Wilaya" name="Wilaya" required value="{{$Barber[0]['wilaya']}}">--}}
                    <label class="mt-4">Commune</label>
                    <select class="form-select" name="Commune" id="commune">
                        <option value="">{{$Barber[0]['comune']}}</option>
                    </select>
{{--                    <input class="form-control" type="text" placeholder="Commune" name="Commune" required value="{{$Barber[0]['comune']}}">--}}
                    <label class="mt-4">Address</label>
                    <input class="form-control" type="text" placeholder="Address" name="Address" required value="{{$Barber[0]['address']}}">
                    <label class="mt-4">Start Price</label>
                    <input class="form-control" type="text" placeholder="Start price" name="Start_price" required value="{{$Barber[0]['start_price']}}"><br>
                    <label>Password</label>
                    <input class="form-control" type="text" placeholder="We cant show ur passwor its ecrypted ... but u can updat it" name="password">
                    <button class="btn btn-primary my-3" type="submit" style="margin-top: 30px;background-color: #0d6efd;">Update</button>
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
