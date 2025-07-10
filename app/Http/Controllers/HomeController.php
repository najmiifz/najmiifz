<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the landing page with top-rated barbershops.
     */
    public function index()
    {
        // Fetch barbershops and order them by their average rating.
        // 'withCount' is used to get the number of ratings.
        // We then order by the average rating in descending order and take the top 3.
        $popularBarbershops = Barbershop::withCount('ratings')
                                        ->withAvg('ratings', 'rating')
                                        ->orderByDesc('ratings_avg_rating')
                                        ->take(3)
                                        ->get();

        return view('beranda', compact('popularBarbershops'));
    }
}
