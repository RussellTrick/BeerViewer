<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class AgeVerificationController extends Controller
{
    public function show()
    {
        Cookie::queue(Cookie::forget('age'));

        return view('age_verification');
    }

    public function verify(Request $request)
    {
        $birthdate = $request->input('birthdate');
        $age = Carbon::parse($birthdate)->age;

        Cookie::queue('age', $age, 60);

        return redirect('countries');
    }
}

