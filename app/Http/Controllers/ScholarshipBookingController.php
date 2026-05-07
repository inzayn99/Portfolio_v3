<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplyScholarship;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class ScholarshipBookingController extends Controller
{
    public function index()
    {
        $scholarship = ApplyScholarship::latest()->paginate(400);
        ApplyScholarship::where('is_read',0)->update(['is_read'=>1]);

        return view('backend.online-booking.scholarship-booking-list', compact('scholarship'));
    }

    public function show(string $id)
    {
         // dd($id);
         $scholarship = ApplyScholarship::findOrFail($id);
         return view('backend.online-booking.scholarship-booking-show',compact('scholarship'));
    }


    public function destroy(string $id)
    {
        $scholarship = ApplyScholarship::findOrFail($id);
        $scholarship->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
    }
}
