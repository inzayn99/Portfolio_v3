<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickInquiry;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class QuickInquiryController extends Controller
{


    public function index()
    {
        $quickinquiry = QuickInquiry::first()->paginate(1000);
        QuickInquiry::where('is_read',0)->update(['is_read'=>1]);

        return view('backend.online-booking.quick-inquiry-list', compact('quickinquiry'));
    }


    // public function quickshow(string $id)
    // {
    //      // dd($id);
    //      $quickinquiry = QuickInquiry::findOrFail($id);
    //      return view('backend.online-booking.quick-inquiry-show',compact('quickinquiry'));
    // }


    public function destroy(string $id)
    {
        $quickinquiry = QuickInquiry::findOrFail($id);
        $quickinquiry->delete();
        return response()->json(['success' => true, 'message' => 'Inquiry deleted successfully.']);
    }
}

