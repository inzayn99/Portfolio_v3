<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplyOnline;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class OnlineBookingController extends Controller
{
    public function index()
    {
        $online = ApplyOnline::first()->paginate(200);
        ApplyOnline::where('is_read',0)->update(['is_read'=>1]);

        return view('backend.online-booking.online-booking-list', compact('online'));
    }


    public function show(string $id)
    {
         // dd($id);
         $online = ApplyOnline::findOrFail($id);
         return view('backend.online-booking.online-booking-show',compact('online'));
    }


    public function destroy(string $id)
    {
        $online = ApplyOnline::findOrFail($id);
        $online->delete();
        return response()->json(['success' => true, 'message' => 'Online Booking deleted successfully.']);
    }
}
