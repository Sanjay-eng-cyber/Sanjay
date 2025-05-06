<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('backend.events.index', compact('events'));
    }

    public function ajaxBook(Request $request, Event $event)
{
    if ($event->available_seats <= 0) {
        return response()->json(['success' => false, 'message' => 'No seats available.']);
    }
        $booking = new Booking;
        $booking->user_id = session('user_id');
        $booking->event_id = $event->id;
if($booking->save()){
    $event->decrement('available_seats');
    return response()->json([
        'success' => true,
        'message' => 'Ticket booked successfully!',
        'available_seats' => $event->available_seats
    ]);
}
}

}