<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\PhotoGallery;
use App\Models\Users;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function barberList(){

        return view('customer.bookBarber');
    }
    public function bookingHistory(){
        return view('customer.bookingHistory');
    }
    public function customerProfile(){
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
        $customerInfo = Customer::join('users', 'users.id', '=', 'customers.user_id')
            ->where('user_id',Auth::user()->id)
            ->get();
        foreach( $customerInfo as $ci) $customerInfo = $ci;
        $wilaya = Wilaya::distinct()->orderBy('wilaya_name_ascii', 'asc')->get('wilaya_name_ascii');
        return view('customer.customerProfile',compact('customerInfo','wilaya'));
    }
    public function customerRating(){
        return view('customer.customerRating');
    }
    public function customerUpdate(){
        return view('customer.customerUpdate');
    }
    public function customerCreate(){
        return view('customer.customerCreate');
    }
    public function searchBarber(){
        $allBarber = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
            ->get();
        $wilaya = Wilaya::distinct()->orderBy('wilaya_name_ascii', 'asc')->get('wilaya_name_ascii');
        return view('barber.searchBarber',compact('allBarber','wilaya'));
    }

    public function commune(Request $request){
        $output="";
        $commune = Wilaya::where('wilaya_name_ascii',$request->commune)->get();
        foreach ($commune as $commune){
            $output.= '<option value="'.$commune->commune_name_ascii.'">'.$commune->commune_name_ascii.'</option>';
        }
        return response($output);
    }

    public function getBarbersSearched(Request $request){
        $barber_search = $request->search;
        $barber_wilaya = $request->wilaya;
        $barber_comune = $request->commune;
        $barber_note = $request->note;

        if(empty($barber_search)){
            $allBarber = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
                ->Where('barbers.wilaya',$barber_wilaya)
                ->Where('barbers.comune',$barber_comune)
                ->Where('barbers.rating_avrg','>=',$barber_note)
                ->get();
        }
        else{
            $allBarber = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
                ->Where('barbers.wilaya',$barber_wilaya)
                ->Where('barbers.comune',$barber_comune)
                ->Where('barbers.rating_avrg','>=',$barber_note)
                ->where('users.name','LIKE','%'.$barber_search.'%')
                ->orWhere('users.family_name','LIKE','%'.$barber_search.'%')
                ->orWhere('barbers.salon_name','LIKE','%'.$barber_search.'%')
                ->get();
        }

        $wilaya = Wilaya::distinct()->orderBy('wilaya_name_ascii', 'asc')->get('wilaya_name_ascii');
        return view('barber.searchBarber',compact('allBarber','wilaya'));
    }

    public function appointmentHistory(){
        if(count(Customer::where('user_id',Auth::user()->id)->get()) == 0){
            Customer::create([
                'user_id'=>Auth::user()->id
            ]);
        }
        $id_customer = Customer::where('user_id',auth()->user()->id)->get()[0]['id'];
        $bookingList = Appointment::where('customer_id',$id_customer)->get();

        return view('customer.bookingHistory',compact('bookingList'));
    }

    public function deletBookingHistory(Request $request){
        Appointment::where('id',$request->booking_id)->delete();
        return redirect()->back();
    }

    public function bookBarber(){
        return view('customer.bookBarber');
    }

    public function customer_update(Request $request){

        Customer::where('user_id',$request->id)
            ->update([
            'phone'=>$request->phone,
            'wilaya'=>$request->wilaya,
            'comune'=>$request->commune,
            'gps_location'=>$request->gps_location
        ]);
        if (!empty($request->image)){
            $img = Customer::where('user_id',$request->id)->get('profile_img')[0]['profile_img'];
            if(!empty($img))if(file_exists('images/'.$img)) unlink("images/".$img);

            $date = date('Y-m-d').'_'. Str::random(30);
            $Extension = $request->file('image')->getClientOriginalExtension();
            $name = $date.'.'.$Extension;
            $request->file('image')->move(public_path().'/images/', $name);
            Customer::where('user_id',$request->id)
                ->update([
                    'profile_img'=>$name,
                ]);
        }
        Users::where('id',$request->id)
            ->update([
                'name'=>$request->name,
                'family_name'=>$request->family_name,
                'email'=>$request->mail,
            ]);
        if($request->password != null)
            Users::where('id',$request->id)
                ->update([
                    'password'=>Hash::make($request->password)
                ]);
        return redirect()->back();
    }

}
