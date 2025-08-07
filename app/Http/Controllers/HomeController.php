<?php

namespace App\Http\Controllers;

use App\Data\DioceseData;
use App\Models\Diocese;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        return Inertia::render('home', [
            'dioceses' => DioceseData::collect(Diocese::with('image')->get()),
        ]);
    }
}
