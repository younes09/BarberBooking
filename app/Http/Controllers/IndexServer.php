<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Session;


class IndexServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            if(!Session::has('lang')) session(['lang' => 'AR']);
            $allBarber = Users::join('barbers', 'users.id', '=', 'barbers.user_id')
                ->paginate(5);
            if (Session::get('lang') == 'AR') {
                $wilaya = Wilaya::distinct()->orderBy('wilaya_name', 'asc')->get(['wilaya_name','wilaya_code']);
            } else {
                $wilaya = Wilaya::distinct()->orderBy('wilaya_name_ascii', 'asc')->get(['wilaya_name_ascii','wilaya_code']);
            }
            
            return view('barber.searchBarber',compact('allBarber','wilaya'));
    }
}
