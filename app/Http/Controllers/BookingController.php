<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
{
    $bookings = Booking::where('user_id', session('user_id'))
        ->with('event') 
        ->latest() 
        ->paginate(10);

    return view('backend.bookings.index', compact('bookings'));
}
}
