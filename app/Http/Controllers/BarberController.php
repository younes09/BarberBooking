<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\PhotoGallery;
use App\Models\PriceListe;
use App\Models\Reviews;
use App\Models\Users;
use App\Models\Wilaya;
use App\Models\WorkingHours;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BarberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if(Auth::user()->user_type == "b"){
            if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
                Barber::create([
                    'user_id'=>Auth::user()->id
                ]);
            }
        }
        elseif (Auth::user()->user_type == "c"){
            if(count(Customer::where('user_id',Auth::user()->id)->get()) == 0){
                Customer::create([
                    'user_id'=>Auth::user()->id
                ]);
            }
        }

        $id = $request->b_id;
        session(['id_barber' => $id]);
        $BarberList = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
            ->where('barbers.user_id',$id)
            ->get();
        $barber_id = Barber::where('user_id',$id)->get('id')[0]['id'];
        $Reviews = Reviews::where('barber_id',$barber_id)->get();
        // GET all customer reviews for this barber

        $Customer = Users::join('customers', 'users.id', '=', 'customers.user_id')
            ->join('reviews','reviews.customer_id', '=','customers.id')
            ->where('reviews.barber_id',$barber_id)
            ->get();
        $WorkingHours = WorkingHours::where('barber_id',$barber_id)->get();
        $PriceListe = PriceListe::where('barber_id',$barber_id)->get();
        $gallery = PhotoGallery::where('barber_id',$BarberList[0]['id'])->get();

        return view('barber.barberProfile', compact('BarberList','Reviews','Customer', 'WorkingHours','PriceListe','gallery'));
    }

    public function barberUpdateView($id){
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        //$id = 1; //GET BARBER id from the session
        $Barber = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
            ->where('users.id',$id)
            ->get();
        $wilaya = Wilaya::distinct()->orderBy('wilaya_name_ascii', 'asc')->get('wilaya_name_ascii');
        //$Barber = Barber::where('id',$id)->get();
        return view('barber.barberUpdate',compact('Barber','wilaya'));
    }
    public function commune(Request $request){
        $output="";
        $commune = Wilaya::where('wilaya_name_ascii',$request->commune)->get();
        foreach ($commune as $commune){
            $output.= '<option value="'.$commune->commune_name_ascii.'">'.$commune->commune_name_ascii.'</option>';
        }
        return response($output);
    }

    public function barberUpdate(Request $request,$id){
        $img = Barber::where('user_id',$id)->get('profile_img')[0]['profile_img'];

        if($request->hasFile('image'))
        {
            if(!empty($img))if(file_exists('images/'.$img)) unlink("images/".$img);

            $image = $request->file('image');
            $randomString = date('Y-m-d').'_'. Str::random(30);
            $Extension = $image->getClientOriginalExtension();
            $name = $randomString.'.'.$Extension;
            $image->move(public_path().'/images/', $name);

            Barber::where('user_id',$id)
                ->update([
                    'salon_name'=>$request->salon,
                    'profile_img'=>$name,
                    'phone'=>$request->Phone,
                    'gps_location'=>$request->GPS,
                    'wilaya'=>$request->Wilaya,
                    'comune'=>$request->Commune,
                    'address'=>$request->Address,
                    'start_price'=>$request->Start_price,
                ]);
        }
        else{
            Barber::where('user_id',$id)
                ->update([
                    'salon_name'=>$request->salon,
                    'phone'=>$request->Phone,
                    'gps_location'=>$request->GPS,
                    'wilaya'=>$request->Wilaya,
                    'comune'=>$request->Commune,
                    'address'=>$request->Address,
                    'start_price'=>$request->Start_price,
                ]);
        }

        Users::where('id', $id)
            ->update([
                'name' => $request->Name,
                'family_name' => $request->Family_Name,
                'email' => $request->Email,
            ]);
        if(!empty($request->password)){
            Users::where('id', $id)
                ->update([
                    'password' => Hash::make($request->password)
                ]);
        }

        return redirect()->back()->with('success', 'Your images has been successfully');
    }

    public function barberBooking()
    {
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        return view('barber.barberBooking');
    }

    public function workingTime(){
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        $id = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];// barber id from session variable
        if(count(WorkingHours::where('barber_id',$id)->get()) == 0){
            WorkingHours::create([
                'barber_id'=>$id
            ]);
        }
        $WorkingHours = WorkingHours::where('barber_id',$id)->get();
        return view('barber.workingTime',compact('WorkingHours'));
    }

    public function workingTimeUpdate(Request $request,$id){
        //update working time
        WorkingHours::where('barber_id',$id)->update([
            'dimanche'=>$request->Dimanche1.' - '.$request->Dimanche2,
            'lundi'=>$request->Lundi1.' - '.$request->Lundi2,
            'mardi'=>$request->Mardi1.' - '.$request->Mardi2,
            'mercredi'=>$request->Mercredi1.' - '.$request->Mercredi2,
            'jeudi'=>$request->Jeudi1.' - '.$request->Jeudi2,
            'vendredi'=>$request->Vendredi1.' - '.$request->Vendredi2,
            'samedi'=>$request->Samedi1.' - '.$request->Samedi2
        ]);
        return redirect()->back();
    }

    public function priceListe(){
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }

        $id_barber = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];
        $PriceListe = PriceListe::where('barber_id',$id_barber)->get();
        return view('barber.priceListeUpdate',compact('PriceListe'));
    }

    public function deleteBarberService($id){
        PriceListe::where('id',$id)->delete();
        return redirect()->back();
    }

    public function addNewService(Request $request){
        $id_barber = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];
        PriceListe::create([
            'service_name' => $request->servise,
            'service_price'=> $request->price,
            'barber_id'=>$id_barber,
        ]);
        return redirect()->back();
    }

    public function rate(){
//        $barber = Barber::where('user_id',session('id_barber'))->get();
//        foreach ($barber as $br){
//            $temp = $br;
//        }
        return view('barber.rate');
    }

    public function addReview(Request $request){
        $id_customer = Customer::where('user_id',auth()->user()->id)->get()[0]['id'];
        $id_barber = Barber::where('user_id',session('id_barber'))->get()[0]['id'];
        Reviews::create([
            'rating'=>$request->stars,
            'comment'=>$request->comment,
            'customer_id'=>$id_customer,
            'barber_id'=>$id_barber,
            'state_of_approvment'=>0
        ]);

        // recalculate the avg rating for this barber
        $TotalReview = Reviews::where('barber_id',$id_barber)->get('rating');
        $sum = 0;
        $numbeOfReviews = count($TotalReview );
        foreach ($TotalReview as $tr){
            $sum = $sum + $tr->rating;
        }
        if ($sum != 0){
            $numbeOfReviews = $sum / $numbeOfReviews;
            Barber::where('id',$id_barber)->update([
                'rating_avrg'=>round($numbeOfReviews)
            ]);
        }
        else{
            Barber::where('id',$id_barber)->update([
                'rating_avrg'=>$request->stars
            ]);
        }
        return redirect()->back();
    }

    public function booking(){
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        $barber_id = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];
        $bookingHistory = Users::join('customers', 'users.id', '=', 'customers.user_id')
            ->join('appointments','appointments.customer_id', '=','customers.id')
            ->where('appointments.barber_id',$barber_id)
            ->get();
        return view('barber.barberBooking',compact('bookingHistory'));
    }

    public function addBooking(Request $request){
        $id_barber = Barber::where('user_id',session('id_barber'))->get()[0]['id'];
        $id_customer = Customer::where('user_id',auth()->user()->id)->get()[0]['id'];

        Appointment::create([
            'date'=> $request->date,
            'time'=> $request->time,
            'customer_id'=> $id_customer,
            'barber_id'=> $id_barber,
            'state'=> 0
        ]);
        return redirect()->back();
    }

    public function approuveBooking($id){
        Appointment::where('id',$id)->update([
            'state'=>1
        ]);
        return redirect()->back();
    }

    public function dleltBooking($id){
        Appointment::where('id',$id)->delete();
        return redirect()->back();
    }

    public function createGallery()
    {
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        $id_barber = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];
        $Images = PhotoGallery::where('barber_id',$id_barber)->get();
        return view('barber.createGallery',compact('Images'));
    }

    public function storeGallery(Request $request){
        if(count(Barber::where('user_id',Auth::user()->id)->get()) == 0){
            Barber::create([
                'user_id'=>Auth::user()->id
            ]);
        }

        $id_barber = Barber::where('user_id',Auth::user()->id)->get()[0]['id'];
//        $this->validate($request, [
//            'filename' => 'required',
//            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//        ]);
//        if($request->hasfile('filename'))
//        {
//            foreach($request->file('filename') as $image)
//            {
//                $randomString = Str::random(30);
//                $Extension=$image->getClientOriginalExtension();
//                $name=$randomString.'.'.$Extension;
//                $image->move(public_path().'/images/', $name);
//                PhotoGallery::create([
//                    'img_link'=>$name,
//                    'barber_id'=>$id_barber
//                ]);
//            }
//        }
        //================================================================================

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $randomString = date('Y-m-d').'_'. Str::random(30);
            $Extension = $image->getClientOriginalExtension();
            $name = $randomString.'.'.$Extension;
            $image->move(public_path().'/images/', $name);

            PhotoGallery::create([
                'img_link'=>$name,
                'barber_id'=>$id_barber
            ]);
        }

        return redirect()->back();
    }

    public function deleltImage(Request $request, $id){
       $image = PhotoGallery::find($id);
        unlink("images/".$image->img_link);
        PhotoGallery::where('id',$id)->delete();
        return redirect()->back();
    }
}
