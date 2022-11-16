<?php


namespace App\Http\Controllers;


use App\Models\Wilaya;

use Illuminate\Http\Request;


class GetCommune extends Controller
{
    public function __invoke(Request $request)
    {
        $output="";
        $commune = Wilaya::where('wilaya_code',$request->commune)->get();
        foreach ($commune as $commune){
            $output.= '<option value="'.$commune->id.'">'.$commune->commune_name.'</option>';
        }
        return response($output);
    }
}
