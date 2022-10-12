<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deletReview($id){
        $barber_id = Reviews::where('id',$id)->get()[0]['barber_id'];
        Reviews::where('id',$id)->delete();
        // recalculate the avg rating for this barber
        $TotalReview = Reviews::where('barber_id',$barber_id)->get('rating');
        $sum = 0;
        $numbeOfReviews = count($TotalReview );
        foreach ($TotalReview as $tr){
            $sum = $sum + $tr->rating;
        }
        if ($sum != 0){
            $numbeOfReviews = $sum / $numbeOfReviews;
            Barber::where('id',$barber_id)->update([
                'rating_avrg'=>round($numbeOfReviews)
            ]);
        }
        return redirect('/');
    }

    public function approveReview($id){
        $flight = Reviews::find($id);

        $flight->state_of_approvment = '1';

        $flight->save();
        return redirect()->back();
    }
}
